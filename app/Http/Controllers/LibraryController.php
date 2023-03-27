<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lists;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index(Request $request)
    {   
        
        if ($request->search || $request->category) {
            
            $books = Book::filter(request(['search', 'category']))->paginate(4);
            
        } else {
            
            $books = Book::with(['lists'])->paginate(4);
        }
    
        $non = Book::doesntHave('lists')->get();
        return view('library/booklist', ['books' => $books, 'non' => $non]);
    }

    
    public function category(Category $category)
    {
        return view('library/booklist', [
            'books' => $category->books
        ]);
    }
    
    public function show($code)
    {
        // dd($code);
        $categories = Category::select('id', 'name')->get();
        $books = Book::where('code', $code)->first();
        return view('library/bookdetail', ['books' => $books, 'categories' => $categories]);
    }

    public function add(Request $request)
    {
        if($request->ajax()) {
            // $data = $request->all();
            // print_r($data);

            $book_id = $request->book_id;
            $user_id = $request->user_id;

            if(Lists::where('user_id', Auth::id())->where('book_id', $book_id)->exists()) {
                // return response()->json(['status' => 'already added']);

                $list = Lists::where('user_id', Auth::id())->where('book_id', $book_id)->first();
                $list->delete();
                $icon = 0;

                $response = array('icon' => $icon);
                return response()->json(['status' => 'removed from read list']);

            } else {
                
                $list = new Lists();
                $list->user_id = $user_id;
                $list->book_id = $book_id;
                $list->save();
               
                return response()->json(['status' => 'added to read list']);
            }
        }
    }
}
