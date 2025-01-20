<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'audio_id',
        'tag_id',
        'user_id'
    ];

    public function audio()
    {
        return $this->belongsTo(Audio::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
