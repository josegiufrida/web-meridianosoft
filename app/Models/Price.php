<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PriceList;

class Price extends Model
{
    use HasFactory;

    protected $table = 'precios';

    public $incrementing = false;

    public $timestamps = false;

    public function getList(){
        return $this->belongsTo(PriceList::class, 'id_lista');
    }

}
