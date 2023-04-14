<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $search){
        if($search !== null){
            $search_split = mb_convert_kana($search, 's'); // 全角スペースを半角に変換
            $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る
            foreach( $search_split2 as $value ){
                $query->where('title', 'like', '%' .$value. '%');
            }
        }
        return $query;
    }
}
