<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'locked',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(Tag::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Tag::class, 'parent_id');
    }

    public function audios()
    {
        return $this->belongsToMany(Audio::class, 'segments');
    }
}
