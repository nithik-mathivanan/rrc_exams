<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;

class CertificateController extends Controller{
  
  public function createName(){
  	return view('certificate.certificate_gen');
  }
  
   

}