<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
public function printPdf(Invoice $invoice)
{
   return view('invoices.show', ["invoice" => $invoice]);
}
}