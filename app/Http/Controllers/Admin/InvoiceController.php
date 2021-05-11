<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Alert;
use App\Models\JenisService;

class InvoiceController extends Controller
{
    public function detail($id)
    {
    	$booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $jenisServices = JenisService::all();
     	return view('admin.invoice', compact('booking', 'bookings', 'jenisServices'));
    }
}
