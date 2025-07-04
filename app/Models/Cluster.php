<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'shift'
    ];

    public function user_cluster() {
        return $this->hasOne(UserCluster::class, 'id', 'user_id');
    }
}
