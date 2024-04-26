<?php

namespace App\Console\Commands;

use App\Repositories\InvoiceRepository;
use App\Service\InvoiceService;
use Illuminate\Console\Command;

class InvoiceIPL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gh:invoice-ipl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating and sending invoice IPL to buyer';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $invoiceRepository = new InvoiceRepository;

        $code = $invoiceRepository->sendInvoiceMail();
        $this->info("------------------------------------------------------");
        $this->info('Invoice Send Mail Started!');

        if ($code == 200) {
            $this->info("Invoice Sended...");
            $this->newLine();
        }
    }
}
