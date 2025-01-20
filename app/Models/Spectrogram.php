<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectrogram extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'version',
        'audio_id',
    ];

    public function audio()
    {
        return $this->belongsTo(Audio::class);
    }
}
