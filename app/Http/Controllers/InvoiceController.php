<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceAttachment;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allInvoices=Invoice::all();
        return view('invoices.invoices',compact('allInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        return view('invoices.add_invoice', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invoiceData = $request->all();
        Invoice::create($invoiceData);

        $invoiceDetailData = $request->only(['invoice_number', 'product', 'section_id', 'note']);
        $invoice_id = Invoice::latest()->first()->id;
        $invoiceDetailData['invoice_id'] = $invoice_id;
        $invoiceDetailData['user'] = Auth::user()->email;
        InvoiceDetail::create($invoiceDetailData);

        if ($request->hasFile('pic')) {

            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $attachData = ['file_name' => $file_name,'created_by'=>Auth::user()->email ,'invoice_number' => $request->invoice_number,'invoice_id' => $invoice_id];
            InvoiceAttachment::create($attachData);

            $request->pic->move(public_path('Attachments/' . $request->invoice_number), $file_name);
        }
        Session()->flash('Add', 'تم اضافة الفاتوره بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function getProducts($id)
    {
        $products = DB::table('products')->where('section_id', $id)->pluck("product_name", "id");
        return json_encode($products);
    }
}
