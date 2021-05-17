<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\JenisService;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'jenis_services' =>JenisService::all(),
            'categories' => Category::all()
        ]);
    }

    public function adminHome()
    {
        $sparepart = Sparepart::count();
        $category = Category::count();
        $user = User::count();
        $jenisService = JenisService::count();
        $contact = Contact::count();
        $booking = Service::count();
        $users = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        return view('admin.adminHome', compact('sparepart', 'category', 'user', 'jenisService', 'contact', 'booking', 'users'));
    }
}
