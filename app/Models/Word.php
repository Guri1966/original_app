<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
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

    /**
     * 単語を登録したユーザー
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * 単語が属するカテゴリ（任意）
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}