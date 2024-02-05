<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    //not allowed for mass assign
    // protected $guraded = [
    //     'id',
    //     'created_at',
    //     'updated_at'
    // ];

    //for mass assigned enabled
    protected $fillable = [
        'content',
        'like',
        'user_id'
    ];

    public function comments()
    {
        //one to many i.e. one idea can have many comments
        return $this->hasMany(Comment::class, 'idea_id', 'id');
    }

    public function user()
    {
        //reverse of one to many i.e. many ideas can be relate to one user
         return $this->belongsTo(User::class);
    }
}
