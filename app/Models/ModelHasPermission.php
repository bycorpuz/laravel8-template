<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelHasPermission extends Model
{
    protected $table = 'model_has_permissions';

    protected $fillable = [
        'permission_id', 'model_type', 'model_id'
    ];
}