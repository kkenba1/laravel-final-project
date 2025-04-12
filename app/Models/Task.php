<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // ✅ Add this part to allow mass assignment
    protected $fillable = ['title', 'notes', 'user_id'];

    // ✅ Define the inverse relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
