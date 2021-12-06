<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inote extends Model
{
    use HasFactory;
    protected $table = 'inotes';
    protected $primaryKey = 'id';
    protected $guared = [];

    public function category()
    {
        return $this->belongsToMany(Category::class,'category_id','id');
    }
}
