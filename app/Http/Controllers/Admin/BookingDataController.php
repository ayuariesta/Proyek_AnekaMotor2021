<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Alert;
use App\Models\Category;
use App\Models\Payment;

class BookingDataController extends Controller
{
    public function index(){
        $services =  DB::table('services')
        ->join('users', 'services.user_id', '=', 'users.id')
        ->select('users.name', 'services.service_date', 'services.status', 'queue', 'services.id')
        ->get();
        return view('admin.bookingdata', compact('services'));
    }

    public function detail($id)
    {
    	$booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
     	return view('admin.bookingdetail', compact('booking', 'bookings'));
    }

    public function save(Request $request, $id){
        
        $service = Service::where('id', $id)->first();
        $service->status = $request->status;
        $service->queue= $request->queue;
        $service->update();
        alert()->success('Input data is successfull');
        return redirect('bookingdata');
    }

    public function seePayment($id){
        $service = Service::where('id', $id)->first();
        $payments = Payment::where('service_id', $service->id)->get();
    	return view('admin.seePayment', compact('service', 'payments'));
    }

}
