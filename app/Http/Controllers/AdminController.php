<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function category()
    {
        return view('admin.category');
    }

    public function add_category(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Create a new category
        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Category added successfully!');
    }
}
