<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'name',
        'email',
        'contact',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public static $rules = [
        'name' => 'required|min:10',
        'email' => 'required|min:2',
        'contact' => 'required|min:5',
        'password' => 'required|min:8'
    ];

    public function category() {
        return $this->hasMany('App\Models\Category','admin_id');
      }
    public $timestamps = true;

}
