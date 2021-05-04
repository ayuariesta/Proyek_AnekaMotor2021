<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Alert;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CustomerController extends Controller
{

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        alert()->error('Your customer has been successfully deleted', 'Deleted');
        return redirect('customers');
    }

   

    public function getAllUserServerSide(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('is_admin','=',"0")->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function indexGetUser()
    {
        return view("admin.customers");
    }
  
}
