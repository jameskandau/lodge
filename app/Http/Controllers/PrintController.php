<?php

namespace App\Http\Controllers;
use Vsmoraes\Pdf\Pdf;
use Illuminate\Http\Request;
use App\Payment;
class PrintController extends Controller
{
   private $pdf;

    public function __construct(Pdf $pdf)
   {
   	$this->pdf = $pdf;
   }
    public function receipt($id)
    {

    	
    	$payment = Payment::findOrFail($id);
       $html = view('pdfs.example',compact('payment'))->render();

        return $this->pdf
            ->load($html)
            ->show();
    }
}
