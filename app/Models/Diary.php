<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{

    protected $table = 'diaries';

    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'diary_tag', 'diary_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
