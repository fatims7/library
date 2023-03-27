<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user', ['users' => $users]);
    }

    public function delete($username)
    {
        $username = User::where('username', $username)->first();
        $username->delete();
        return redirect('user')->with('status', 'Buku berhasil dihapus');
    }

    public function deleted()
    {
        $deleted = User::onlyTrashed()->get();
        return view('deleted', ['deleted' => $deleted]);
    }

    public function restore($username)
    {
        $username = User::withTrashed()->where('username', $username)->first();
        $username->restore();
        return redirect('user')->with('status', 'Buku berhasil direstore');
    }

    public function destroy($username)
    {
        $username = User::withTrashed()->where('username', $username)->first();
        $username->forceDelete();
        return redirect('user-deleted')->with('status', 'Buku berhasil dihapus');
    }

}

