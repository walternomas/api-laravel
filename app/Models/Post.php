<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function getExcerptAttribute()
    {
        return substr($this->content, 0, 120);
    }

    public function getPublishedAtAttribute()
    {
        // return $this->created_at->format('d/m/Y');
        return $this->created_at->diffForHumans();
    }
}
