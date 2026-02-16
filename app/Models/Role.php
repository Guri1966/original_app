<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // 1. セミコロン(;)が抜けていました

class Role extends Model
{
    use HasFactory;

    // 2. スペルミス：fillable (lが一つ足りなかった)
    // 3. 記述ミス：protected $fillable (変数の$が抜けていた)
    protected $fillable = [
        'name',
        'display_name',
    ];

    public function users()
    {
        // アロー演算子の前後のスペースはあっても動きますが、詰めるのが一般的です
        return $this->belongsToMany(User::class);
    }
}