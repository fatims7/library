<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentLog extends Model
{
    use HasFactory;

    protected $table = 'rent_logs';

    protected $fillable = [
        'book_id', 'user_id', 'rent_date', 'deadline'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
