<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $primaryKey = 'id_articulo';

    public $incrementing = false;

    public $timestamps = false;
}
