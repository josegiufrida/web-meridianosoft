<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collection;

class CollectionUpdate extends Model
{
    use HasFactory;

    protected $table = 'collections_updates';

    protected $primaryKey = 'collection_id';

    public $timestamps = false;

    public function collection(){
        return $this->belongsTo(Collection::class, 'collection_id');
    }
}
