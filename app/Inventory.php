<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
     //Table Name
     protected $table ='inventories';
     protected $fillable = [
         'serialNo',
         'assetTag',
         'itemName',
         'brand',
         'type',
         'dateMoveIn',
         'dateMoveOut',
         'locName',
         'place',
         'status',
         'image',
     ];

     //Primary Key
     protected $primaryKey = 'serialNo';
     public $incrementing = false;

     //Timestamps
     public $timestamps = true;

     //Inventories may have an infinite number of items.
     public function item()
     {
         return $this->hasOne('App\Item');
     }

     public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
