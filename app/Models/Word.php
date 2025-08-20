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
    'yomikata',
    'imi',
    'ruigo',
    'iikae',
    'hold_flag',
];
}