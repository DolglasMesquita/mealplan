<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'food_name',
        'image',
        'food_description',
        'category_id',
        'category_id',
        'food_price'
    ];

    



    public function category() {
        return $this->belongsTo(Category::class);
    }

}
