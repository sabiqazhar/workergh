<?php

namespace App\Http\Controllers;

use App\Service\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct(
        protected InvoiceService $invoiceService
    ){}

    public function testMail()
    {
        try {

            $code = $this->invoiceService->sendInvoiceMail();

            if ($code == 400) {
                return (object) [
                    "statusCode"    => $code,
                    "message"       => "gagal terkirim",
                ];
            }

            return (object) [
                'statusCode' => $code,
                'message'    => 'Email berhasil dikirim',
            ];

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function testProject()
    {
        try {

            $data = $this->invoiceService->testProject();

            if ($data->statusCode == 400) {
                return (object) [
                    "statusCode"    => $data,
                    "message"       => "gagal terkirim",
                ];
            }

            return (object) [
                'statusCode' => $data,
                'message'    => 'Email berhasil dikirim',
            ];

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function testBuyer()
    {
        try {

            $data = $this->invoiceService->testBuyer();

            if ($data->statusCode == 400) {
                return (object) [
                    "statusCode"    => $data,
                    "message"       => "gagal terkirim",
                ];
            }

            return (object) [
                'statusCode' => $data,
                'message'    => 'Email berhasil dikirim',
            ];

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
