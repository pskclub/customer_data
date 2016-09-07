<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'name', 'email', 'tel', 'mobile', 'company', 'website', 'address', 'taxpayers', 'image', 'image_more'
    ];
}
