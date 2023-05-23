<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
    ];
    public function books()
    {
        return $this->hasMany( Book::class);
    }

}