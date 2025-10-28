<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'word_id',
        'correct_count',
        'answer_count',
    ];

    /**
     * リレーション設定
     * 単語と1対1の関係
     * @return \Illuminate\Database\Elogquent\Relations\BelongsTo
     */
    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}