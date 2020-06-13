<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //Table Name
    protected $table ='items';
    protected $fillable = [
        'serialNo',
        'assetTag',
        'itemName',
        'brand',
        'type',
        'dateMoveIn',
    ];

    //Primary Key
    public $primaryKey = 'serialNo';

    //Timestamps
    public $timestamps = true;

    public function inventory()
    {
        return $this->belongsTo('App\Inventory');
    }

}
