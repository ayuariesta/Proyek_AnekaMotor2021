<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class TypeServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JenisService::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="' . $data->id . '">Edit</button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("admin.typeService");
    }

    public function destroy($id)
    {
        $typeService = new JenisService();
        $typeService->deleteData($id);
        return response()->json(['success' => 'Type of Service deleted successfully']);
    }

    public function store(Request $request, JenisService $jenis_Service)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $jenis_Service->storeData($request->all());

        return response()->json(['success' => 'Type of Service added successfully']);
    }

    public function edit($id)
    {
        $article = new JenisService();
        $data = $article->findData($id);

        $html = '<div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" name="name" id="editTitle" value="' . $data->name . '">
                </div>
                <div class="form-group">
                    <label for="Price">Price:</label>
                    <input type="text" class="form-control" name="price" id="editDescription" value="' . $data->price . '">
                </div>';

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $article = new JenisService();
        $article->updateData($id, $request->all());

        return response()->json(['success' => 'Type of Service updated successfully']);
    }
}
