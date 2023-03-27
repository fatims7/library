<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usercount = User::where('role', 'user')->count();
        $bookcount = Book::count();
        $bookstock = Book::sum('stock');
        $bookavailable = Book::where('stock', '>', 0)->count();
        $bookrent = RentLog::where('return_date', null)->count();
        return view('dashboard', ['user_count' => $usercount,'book_available' => $bookavailable, 'book_count' => $bookcount, 'book_rent' => $bookrent, 'book_stock' => $bookstock ]);
    }
}
