<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use App\Models\InvoiceAttachment;
use Illuminate\Support\Facades\Storage;

class InvoiceDetailController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {

        $invoices=Invoice::where('id',$id)->first();
        $details=InvoiceDetail::where('invoice_id',$id)->get();
        $attachments=InvoiceAttachment::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','details','attachments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $attach=InvoiceAttachment::find($request->id_file);
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_number);
        $attach->delete();
        Session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }
     public function getFile($invoice_number,$file_number){
        $file=Storage::disk('public_uploads')->path($invoice_number.'/'.$file_number);
        return response()->download($file);
     }

    public function openFile($invoice_number,$file_number){
       $file=Storage::disk('public_uploads')->path($invoice_number.'/'.$file_number);
       return response()->file($file);
    }
}
