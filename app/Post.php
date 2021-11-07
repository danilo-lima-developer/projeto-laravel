<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'image',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
