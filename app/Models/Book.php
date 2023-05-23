<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book extends Model
{
    use SoftDeletes;
    protected $table = 'books';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'cover'
    ];
    public function categories()
    {
        return $this->belongsTo( Category::class, 'category_id', 'id' );
    }
}