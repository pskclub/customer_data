<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = [
        'name', 'company', 'address', 'date', 'bidder', 'quotation', 'delivery', 'deposit', 'condition', 'note', 'type'
    ];

    public function bills()
    {
        return $this->hasMany('App\Models\BillList', 'bill_id');
    }

    public function deleteAll()
    {
        $this->bills()->delete();
        $this->delete();
    }
}
