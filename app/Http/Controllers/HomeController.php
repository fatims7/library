<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lists;
use App\Models\RentLog;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('users/home');
    }

    public function showRentLog ()
    {
        $rentlog = RentLog::with(['user', 'book'])->where('user_id', Auth::user()->id)->where('return_date', null)->orderBy('deadline')->get();
        return response()->json(['rentlog' => $rentlog]);
    }

    public function rentLogs()
    {
        return view('users/rentlogs');
    }

    public function showRentLogs()
    {
        $rentlogs = RentLog::with(['user', 'book'])->where('user_id', Auth::user()->id)->where('return_date', '!=', null)->orderBy('id')->get();
        return response()->json(['rentlog' => $rentlogs]);
    }   

    public function list()
    {
        $booklist = Lists::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('users/list', ['booklist' => $booklist]);
    }

}
