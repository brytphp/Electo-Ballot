<?php

namespace App\Http\Controllers\Voter\Ballot;

use App\Http\Controllers\Controller;
use LaravelQRCode\Facades\QRCode;
use PDF;

class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function download()
    {
        if (is_null(auth()->user()->voted_at)) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // $path = public_path().'/receipts/qr-code.png';
        // $qr_code = '/qr-code.png';
        // QRCode::text('QR Code Generator for Laravel!')
        //     ->setOutfile($path)
        //     ->png();

        // return view('voter.receipt.receipt',);

        $customPaper = [0, 0, 350.00, 250];
        $pdf = PDF::loadView('voter.receipt.receipt', compact('user'))->setPaper($customPaper, 'landscape');

        $pdf->render();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $canvas->page_text(290, 775, '{PAGE_NUM}', 10, 8, [0, 0, 0]);

        return $pdf->download($user->voter_id.'.pdf');
    }
}
