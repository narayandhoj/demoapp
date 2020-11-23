<?php

namespace Modules\Users\Controllers;

use Auth;
use PDF;
use Hash;
use Dompdf\Dompdf;
use Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  consumersRepository  $contents
     * @return void
     */
    public function __construct(){
    }

    public function index()
    {
        $pdf = new Dompdf();
        $pdf->set_option('defaultMediaType', 'print');

        $pdf=PDF::loadView('Users::demopdf');
        $pdf->output();
        
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(0, 0, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $pdf->setPaper('a4');

        return $pdf->stream();
    } 
}