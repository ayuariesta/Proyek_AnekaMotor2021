<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
		$categories = Category::all();
    	return view('profile', compact('user', 'categories'));
    }

    public function update(Request $request)
    {
    	 $this->validate($request, [
            'password'  => 'confirmed',
        ]);

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phoneNumber = $request->phoneNumber;
    	$user->address = $request->address;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

    	alert()->success('User successfully updated', 'Success');
    	return redirect('profile');
    }

	public function indexAdmin()
    {
        $user = User::where('id', Auth::user()->id)->first();
		$categories = Category::all();
    	return view('profileAdmin', compact('user', 'categories'));
    }

	public function profilAdmin(Request $request)
    {
    	 $this->validate($request, [
            'password'  => 'confirmed',
        ]);

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phoneNumber = $request->phoneNumber;
    	$user->address = $request->address;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

    	alert()->success('Admin successfully updated', 'Success');
    	return redirect('profileAdmin');
    }
}
