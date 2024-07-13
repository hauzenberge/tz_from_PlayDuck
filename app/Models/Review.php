<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'book_id',
        'user_id',
        'comment',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
