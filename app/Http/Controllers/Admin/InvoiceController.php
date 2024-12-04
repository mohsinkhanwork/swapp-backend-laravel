<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:invoices,admin');
    }

    public function index(){
        $invoices=Invoice::with('invoiceable')->get();
        return view('admin.invoices.index',compact('invoices'));
    }
}
