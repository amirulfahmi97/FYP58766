<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Notifications\Notifiable;

class Location extends Model
{
    use Notifiable;
    use SearchableTrait;
    //Table Name
    protected $table ='locations';

    //Full text search
    protected $searchable = [
        'columns' => [
            'full_text_searches.locationID'  => 10,
            'full_text_searches.locationName'   => 10,
        ]
    ];

    protected $fillable = [
        'locationID',
        'locationName',
    ];

    //Primary Key
    protected $primaryKey = 'locationID';
    public $incrementing = false;

    //Timestamps
    public $timestamps = true;

    public function inventory()
    {
        return $this->hasMany('App\Inventory');
    }
}
