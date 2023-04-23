<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstStore extends Model
{
    use HasFactory;

    protected $fillable = [
        'storename',
    ];

    public function posts()
    {
        return $this->hasMany(post::class, 'store_id', 'id');
    }
}
