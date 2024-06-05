<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'name'
    ];

    public function diaries()
    {
        return $this->belongsToMany(Diary::class, 'diary_tag', 'tag_id', 'diary_id');
    }
}
