<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = [
        'topic', 'name', 'company', 'address', 'date', 'bidder', 'quotation', 'delivery', 'deposit', 'condition', 'note', 'type'
    ];

    public function billLists()
    {
        return $this->hasMany('App\Models\BillList', 'bill_id');
    }

    public function getTypeTranAttribute()
    {
        switch ($this->type) {
            case 'quotation_vat' :
                return 'ใบเสนอราคา VAT';
            case 'quotation_cash'   :
                return 'ใบเสนอราคา CASH';
            case 'quotation_list'  :
                return 'ใบเสนอราคา LIST';
            case 'quotation_bill'  :
                return 'ใบเสร็จรับงิน';
            default:
                return "unknown";
        }

    }

    public function getTypeHeadAttribute()
    {
        switch ($this->type) {
            case 'quotation_vat' :
                return 'ใบเสนอราคา';
            case 'quotation_cash'   :
                return 'ใบเสนอราคา';
            case 'quotation_list'  :
                return 'Price List';
            case 'quotation_bill'  :
                return 'ใบเสร็จรับงิน';
            default:
                return "unknown";
        }

    }


    public function deleteAll()
    {
        $this->billLists()->delete();
        $this->delete();
    }
}
