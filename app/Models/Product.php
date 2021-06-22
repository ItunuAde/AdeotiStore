<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'availability',
    ];
    
    public static $rules = [
        'category_id' => 'required|integer',
        'title' => 'required|min:2',
        'description' => 'required|min:20',
        'price' => 'required|numeric',
        'availability' => 'required|integer|min:0|max:1',
    ];
      
    public function category() {
      return $this->belongsTo('App\Models\Category','category_id');
    }
    public $timestamps = true;
}
