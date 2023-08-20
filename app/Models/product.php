<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'description',
        'small_description',
        'brand',
        'original_price',
        'delling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];


}
