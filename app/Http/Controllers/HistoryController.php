<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Alert;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookings = Service::where('user_id', Auth::user()->id)->get();
        $categories = Category::all();
        return view('history', compact('bookings', 'categories'));
    }

    public function detail($id)
    {
        $booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $categories = Category::all();
        return view('historyDetail', compact('bookings', 'booking', 'categories'));
    }

    public function update(Request $request, $id)
    {

    	$booking = Service::findOrFail($id);
    	$booking->name_stnk = $request->name_stnk;
    	$booking->number_plat = $request->number_plat;
    	$booking->nama_motor = $request->nama_motor;
    	$booking->jenis_motor= $request->jenis_motor;
        $booking->complaint= $request->complaint;
    	$booking->update();
    	alert()->success('Booking successfully updated', 'Success');
    	return redirect('history');
    }
}
