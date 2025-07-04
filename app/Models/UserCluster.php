<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCluster extends Model
{
    protected $fillable = [
        'nama',
        'akses',
        'no_telp',
        'url_pict',
        'id_role',
    ];

    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'id_role');
    }
}
