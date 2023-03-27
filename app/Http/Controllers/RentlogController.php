<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RentlogController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        $books = Book::all();
        $rentlogs = Rentlog::with(['user', 'book'])->orderBy('return_date')->get();
        return view('rentbooks', ['users'=> $users, 'books' => $books, 'rentlogs' => $rentlogs]);
    }

    public function insert(Request $request)
    {
        //tanggal pinjam dan deadline pengembalian otomatis
        // dd($request);
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['deadline'] = Carbon::now()->addDay(3)->toDateString();


        //ambil buku untuk dipinjam dan cek stock buku
        $book = Book::findOrFail($request->book_id)->only('stock');
        
        // dd($book['stock']);

        if($book['stock'] <= 0) {
            Session::flash('message', 'Buku gagal dipinjam');
            Session::flash('alert-class', 'alert-danger');
            return redirect('rentbooks');

        } else {
            //user meminjam maksimal 3 buku
            $max = RentLog::where('user_id', $request->user_id)->where('return_date', null)->count();
            // dd($max);
            
            if($max == 3) {
                Session::flash('message', 'User Telah Mencapai Batas Maksimum Peminjaman Buku');
                Session::flash('alert-class', 'alert-danger');
                return redirect('rentbooks');

            } else {
                //tidak boleh pinjam buku yang sama (belum dikembalikan)
            $rent_lama = RentLog::where('user_id', $request->user_id)->where('book_id', $request->book_id)->get();
            // dd($rent_lama);

            if (!$rent_lama->isEmpty()) {
                Session::flash('message', 'Buku Sudah Pernah Dipinjam');
                Session::flash('alert-class', 'alert-danger');
                return redirect('rentbooks');
    
            } else {
                DB::beginTransaction();
                RentLog::create($request->all());
                $book = Book::findOrFail($request->book_id);
                $book->stock = $book->stock - 1;
                $book->save();

                // dd($book);

                DB::commit();

                Session::flash('message', 'Buku Berhasil Dipinjam');
                Session::flash('alert-class', 'alert-success');
                return redirect('rentbooks');
            }

                DB::rollBack();
            }
        }
    }

    public function return($id)
    {
        DB::beginTransaction();
        $rent = RentLog::where('id', $id)->first();

        $rent->return_date = Carbon::now()->toDateString();
        $rent->save();

        $book = Book::findOrFail($rent->book_id);
        $book->stock = $book->stock + 1;
        $book->save();

        // dd($book);

        DB::commit();

        Session::flash('notice', 'Buku Telah Dikembalikan');
        Session::flash('alert-class', 'alert-success');
        return redirect('rentbooks');

        DB::rollBack();
    }

    public function cancel($id)
    {
        DB::beginTransaction();

        $cancel = RentLog::where('id', $id)->first();
        $cancel->delete();

        $book = Book::findOrFail($cancel->book_id);
        $book->stock = $book->stock + 1;
        $book->save();

        DB::commit();
        return redirect('rentbooks')->with('status', 'Peminjaman telah dibatalkan');

        DB::rollBack();
    }
}
