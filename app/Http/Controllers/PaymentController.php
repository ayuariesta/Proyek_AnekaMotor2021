<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Service;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $service = Service::where('id', $id)->first();
        $categories = Category::all();
        $payment = Payment::where('service_id', $service->id)->first();
    	return view('payment', compact('service', 'payment', 'categories'));
    }

    public function save(Request $request, $id)
    {
        $date = Carbon::now();
        $service = Service::where('id', $id)->first();
        $payment = Payment::where('service_id', $service->id)->first();

        $payment = new Payment;
        $payment->service_id = $service->id;
        $payment->order_date = $date;
        $payment->namaRek = $request->namaRek;
        $payment->bank = $request->bank;
        $payment->total = $request->total;
        $file = $request->file('buktiPayment');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();
     
        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
    
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
     
        // Proses Upload File
        $destinationPath = 'images\bukti';
        $file->move($destinationPath,$file->getClientOriginalName());
        $payment->buktiPayment = $nama_file;
        $payment->save();
        $service->status = 'Already sent payment';
        $service->update();
        alert()->success('Thank you for sending payment');
        return redirect('history');
    }

    public function seePayment($id){
        $categories = Category::all();
        $service = Service::where('id', $id)->first();
        $payments = Payment::where('service_id', $service->id)->get();
    	return view('detailPayment', compact('service', 'payments', 'categories'));
    }

}
