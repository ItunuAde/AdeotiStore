<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    
    public static $rules = [
        'name' => 'required|min:3'
    ];
    
    public function products() {
      return $this->hasMany('Product','categories_id');
      return $this->belongsTo('Admin','admin_id');
    }
    public $timestamps = true;  
}
