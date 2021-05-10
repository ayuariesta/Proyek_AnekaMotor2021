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

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('is_admin','=',"0")->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return '<button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("admin.customers");
    }

    public function destroy($id)
    {
        $user = new User;
        $user->deleteData($id);
        return response()->json(['success'=>'User deleted successfully']);
    }
}
