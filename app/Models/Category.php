<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $guared = [];

    public function inote()
    {
        return $this->belongsToMany(Inote::class,'inote_id','id');
    }
}
