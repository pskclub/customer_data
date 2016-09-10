<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'name', 'email', 'tel', 'mobile', 'company', 'website', 'address', 'taxpayers'
    ];

    public function images()
    {
        return $this->hasMany('App\Models\CustomerImage', 'customer_id');
    }

    public function bills()
    {
        return $this->hasMany('App\Models\Bill', 'customer_id');
    }

    public function deleteAll()
    {
        $this->images()->delete();
        $this->bills()->delete();
        $this->delete();
    }
}
