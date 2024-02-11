<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function apiindex(){
        return view('frontend.invoice.index');
    }
}
