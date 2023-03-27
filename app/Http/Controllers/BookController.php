<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book', ['books' => $books]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('book-add', ['categories' => $categories]);
    }

    public function insert(Request $request)
    {

        $validate = $request->validate([
            'code' => ['required', 'max:255', 'unique:books'],
            'image' => ['image', 'file', 'max:1024'],
            'title' => ['required', 'max:255'],
            'author' => ['required', 'max:255'],
            'publisher' => ['required', 'max:255'],
            'synopsis' => ['nullable'],
            'stock' =>['nullable']
        ]);

        if($request->file('image')) {

            $ext = $request->file('image')->getClientOriginalExtension();
            $new = str_replace(array('/', ':', ' '), '-', $request->title).'.'.$ext;
            // dd($new);
            $validate['image'] = $request->file('image')->storeAs('image', $new);
        }

        $book = Book::create($validate);
        $book->categories()->sync($request->categories);
        return redirect('book');
    }

    public function edit($code)
    {
        $books = Book::where('code', $code)->first();
        $categories = Category::all();
        return view('book-edit', ['categories' => $categories, 'books'=> $books]);
    }

    public function update(Request $request, $code)
    {
        // dd($request);
        if($request->file('img')) {
            $ext = $request->file('img')->getClientOriginalExtension();
            $name = str_replace(array('/', ':', ' '), '-', $request->title).'.'.$ext;
            $newimg = $request->file('img')->storeAs('image', trim($name));
            $request['image'] = $newimg;
        }

        // dd($request);

        $book = Book::where('code', $code)->first();
        $book->update($request->all());


        if($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('book');
    }

    public function delete($code)
    {
        $book = Book::where('code', $code)->first();
        $book->delete();
        return redirect('book')->with('status', 'Buku berhasil dihapus');
    }

    public function deleted()
    {
        $deleted = Book::onlyTrashed()->get();
        return view('deleted', ['deleted' => $deleted]);
    }

    public function restore($code)
    {
        $book = Book::withTrashed()->where('code', $code)->first();
        $book->restore();
        return redirect('book')->with('status', 'Buku berhasil direstore');
    }

    public function destroy($code)
    {
        $book = Book::withTrashed()->where('code', $code)->first();
        // dd($book);
        $book->forceDelete();
        return redirect('book-deleted')->with('status', 'Buku berhasil dihapus');
    }

}
