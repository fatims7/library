<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    public function add()
    {
        return view('category-add');
    }

    public function insert(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'max:100', 'unique:categories']
        ]);

        $category = Category::create($request -> all());
        return redirect('category');
    }

    public function edit($name)
    {
        $categories = Category::where('name', $name)->first();
        return view('category-edit', ['categories' => $categories]);
    }

    public function update(Request $request, $name)
    {
        $categories = Category::where('name', $name)->first();
        $categories->update($request->all());
        return view('category-edit', ['categories' => $categories]);
    }

    public function destroy($name)
    {
        $category = Category::where('name', $name)->first();
        $category->delete();
        return redirect('category')->with('status', 'Buku berhasil dihapus');
    }
}
