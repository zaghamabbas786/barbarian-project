<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $table = 'users';
    
    protected $fillable = [ 'username','email','password','cpassword','image','payment','sub_id','invoice','customer_id','contact'];
   
}
