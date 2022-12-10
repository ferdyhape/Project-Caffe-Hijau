<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\item_category;

class item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'picture',
    ];

    protected $guarded = ['id'];

    public function item_category()
    {
        return $this->belongsTo(item_category::class, 'category_id', 'id');
    }
}
