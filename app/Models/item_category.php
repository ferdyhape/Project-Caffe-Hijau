<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\item;

class item_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(item::class, 'category_id', 'id');
    }
}
