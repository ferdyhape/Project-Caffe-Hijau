<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'attention',
        'fzAttention',
        'offer',
        'fzOffer',
        'picture',
    ];

    protected $guarded = ['id'];
}
