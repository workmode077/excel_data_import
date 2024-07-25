<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends  Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','email','password','status','remember_token'];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\UserFactory::new();
    }
  
}
