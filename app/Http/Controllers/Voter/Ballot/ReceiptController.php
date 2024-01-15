<?php

namespace App\Http\Controllers\Voter\Ballot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use LaravelQRCode\Facades\QRCode;

class ReceiptController extends Controller
{
    public function download()
    {
        if (is_null(auth()->user()->voted_at)) {
            return redirect()->route('login');
        }


        // try {
        //     $action = Crypt::decryptString(request()->action);
        // } catch (DecryptException $e) {
        //     abort(404);
        // }

        $path = public_path() . '/receipts/qr-code.png';
        $qr_code = '/qr-code.png';
        QRCode::text('QR Code Generator for Laravel!')
            ->setOutfile($path)
            ->png();

        // return view('voter.receipt.receipt', compact('qr_code'));


        $customPaper = array(0, 0, 450.00, 250);
        $pdf = PDF::loadView('voter.receipt.receipt', compact('qr_code'))->setPaper($customPaper, 'landscape');


        $pdf->render();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $canvas->page_text(290, 775, '{PAGE_NUM}', 10, 8, [0, 0, 0]);
        // $canvas->page_text(270, 790, 'RESTRICTED', 10, 8, [0, 0, 0]);
        // $canvas->page_text(270, 20, 'RESTRICTED', 10, 8, [0, 0, 0]);

        return $pdf->stream(auth()->user()->voter_id . '.pdf');


        return back();
    }
}
