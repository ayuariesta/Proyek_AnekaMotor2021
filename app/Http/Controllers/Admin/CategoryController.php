<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="' . $data->id . '">Edit</button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view("admin.category");
    }

    public function destroy($id)
    {
        $category = new Category();
        $category->deleteData($id);
        return response()->json(['success' => 'Category deleted successfully']);
    }

    public function store(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $category->storeData($request->all());

        return response()->json(['success' => 'Category added successfully']);
    }

    public function edit($id)
    {
        $category = new Category();
        $data = $category->findData($id);

        $html = '<div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" name="name" id="editTitle" value="' . $data->name . '">
                </div>';

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $category = new Category();
        $category->updateData($id, $request->all());

        return response()->json(['success' => 'Category updated successfully']);
    }
}
