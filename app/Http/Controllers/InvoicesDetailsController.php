<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\invoices_details;
use App\Models\invoice_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicesDetailsController extends Controller
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $invoices = invoice_attachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }


    public function getInvoice($id){
        // $invoices = Invoices::where('id', $id)->first();
        $invoices = Invoices::find($id);
        $details = invoices_details::where('id_Invoice', $id)->get();
        $attachments = invoice_attachments::where('invoice_id' , $id)->get();

        return view('invoices.details_invoice', compact('invoices', 'details', 'attachments'));
    }

    public function get_file($invoice_number,$file_name)
    {
        $pathToFile = public_path('Attachments/'.$invoice_number.'/'.$file_name);
        return response()->download($pathToFile);
    }
    public function open_file($invoice_number,$file_name)
    {
        $pathToFile = public_path('Attachments/'.$invoice_number.'/'.$file_name);
        return response()->file($pathToFile);
    }
}
