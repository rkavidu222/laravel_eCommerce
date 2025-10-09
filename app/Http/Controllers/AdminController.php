<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function category()
    {

        $data=Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
        {
            $request->validate([
                'category_name' => 'required|string|max:255',
            ]);

            $category = new Category();
            $category->category_name = $request->input('category_name');
            $category->save();

            return redirect()->back()->with('success', 'Category added successfully!');
        }

        public function delete_category($id)
        {
            $data = Category::find($id);
            $data->delete();

            return redirect()->back()->with('success', 'Category deleted successfully!');
        }


}
