<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'income_amount',
        'remarks',
    ];

    // UserModelのリレーション
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
