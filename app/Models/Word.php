<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    public function user()
{
    return $this->belongsTo(User::class);
}

protected $fillable = [
    'user_id',
    'english', // ★ 追加
    'onsetu',
    'yomikata',
    'imi',
    'ruigo',
    'iikae',
    'image_path',
    'hold_flag',
    'category_id',
];

public function category()
{
    return $this ->belongsTo(Category::class);
}

}