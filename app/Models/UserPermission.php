<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $table = 'user_permissions';

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    public function collection(){
        return $this->belongsTo(Collection::class, 'collection_id');
    }
}
