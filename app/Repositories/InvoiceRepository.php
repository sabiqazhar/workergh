<?php

namespace App\Repositories;

use App\Mail\InvoiceMail;
use App\Models\Invoice\BuyerUnits;
use App\Models\Invoice\InvoiceIpl;
use App\Models\Project\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvoiceRepository
{
    public function getProjectIPL()
    {
        return Project::with(['units' => function ($query) {
            $query->where('ipl_status', 1);
        }])->where('ipl_status', 1)->get();
    }

    public function getBuyerIPL()
    {
        return BuyerUnits::with(['buyer', 'units'])
            ->whereHas('units.project', function ($query) {
                $query->where('ipl_status', 1);
            })->whereHas('units', function ($query) {
                $query->where('ipl_status', 1);
            })->get();
    }

    public function createInvoiceIPL()
    {
        $projects = $this->getProjectIPL();
        $invoices = [];

        DB::beginTransaction();
        try {
            foreach ($projects as $project) {
                foreach ($project->units as $unit) {
                    $invoice = InvoiceIpl::create([
                        'unit_id'        => $unit->id,
                        'invoice_number' => InvoiceIpl::generateInvoiceNumber(),
                        'amount'         => $unit->ipl_amount,
                        'status'         => 0
                    ]);
                    $invoices[] = $invoice;
                }
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return $invoices;
    }

    public function sendInvoiceMail()
    {
        $invoice = $this->createInvoiceIPL();
        $buyer = $this->getBuyerIPL();
        $month = Carbon::now()->translatedFormat('F');

        if ($invoice) {
            foreach($buyer as $buyer) {
                if ($buyer->units->ipl_amount != 0 || $buyer->units->ipl_amount != NULL) {
                    Mail::to($buyer->buyer->account->email)->queue(new InvoiceMail(
                        name:$buyer->buyer->name,
                        amount:number_format($buyer->units->ipl_amount),
                        month: $month
                    ));
                }
            }
            return 200;
        } else {
            return 400;
        }
    }
}
