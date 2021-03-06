<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collection;

class CollectionUpdate extends Model
{
    use HasFactory;

    protected $table = 'collections_updates';

    protected $primaryKey = 'update_id';

    public $timestamps = false;

    public function collection(){
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    protected $fillable = [
        'company_id', 'collection_id', 'updated_at'
    ];
}
