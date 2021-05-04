<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
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
        $bookings = Booking::where('user_id', Auth::user()->id)->get();
        return view('history', compact('bookings'));
    }

    public function detail($id)
    {
        $booking = Booking::where('id', $id)->first();
        $bookings = Booking::where('id', $booking->id)->get();
        return view('historyDetail', compact('bookings', 'booking'));
    }

    public function update(Request $request, $id)
    {

    	$booking = Booking::findOrFail($id);
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
