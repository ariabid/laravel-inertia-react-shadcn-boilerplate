<?php

namespace App\Models;

use App\Traits\ActivityLoggable;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, ActivityLoggable, SoftDeletes, HasSlug;

    protected $guarded = ['id'];

    protected function casts() {
        return [
            'puck_body' => 'json'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function scopePublished($posts)
    {
        return $posts->where('status', 1);
    }
}
