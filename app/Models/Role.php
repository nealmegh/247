<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['role_name'];

    public const IS_ADMIN = 1;
    public const IS_CUSTOMER = 2;
    public const IS_MANAGER = 3;
    public const IS_AGENT = 4;
    public const IS_DRIVER= 5;

}
