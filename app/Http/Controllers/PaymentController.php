<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Service;
use App\Models\Category;
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

}
