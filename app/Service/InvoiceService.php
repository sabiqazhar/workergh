<?php

namespace App\Service;

use App\Mail\InvoiceMail;
use App\Repositories\InvoiceRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class InvoiceService
{
    public function __construct(
        protected InvoiceRepository $invoiceRerpository
    ){}

    public function sendInvoiceMail()
    {
        $invoice = $this->invoiceRerpository->createInvoiceIPL();
        $buyer = $this->invoiceRerpository->getBuyerIPL();
        $month = Carbon::now()->translatedFormat('F');

        if ($invoice) {
            foreach($buyer as $buyer) {
                Mail::to($buyer->buyer->account->email)->queue(new InvoiceMail(
                    name:$buyer->buyer->name,
                    amount:number_format($buyer->units->ipl_amount),
                    month: $month
                ));
            }
            return 200;
        } else {
            return 400;
        }
    }

    public function testProject()
    {
        $data = $this->invoiceRerpository->getProjectIPL();

        if (empty($data)) {
            return (object) [
                "statusCode" => 400,
                "message" => "Data tidak ditemukan!",
                "data" => []
            ];
        }

        return (object) [
            "statusCode" => 200,
            "message" => "Data ditemukan!",
            "data" => $data
        ];
    }

    public function testBuyer()
    {
        $data = $this->invoiceRerpository->getBuyerIPL();

        if (empty($data)) {
            return (object) [
                "statusCode" => 400,
                "message" => "Data tidak ditemukan!",
                "data" => []
            ];
        }

        return (object) [
            "statusCode" => 200,
            "message" => "Data ditemukan!",
            "data" => $data
        ];
    }
}
