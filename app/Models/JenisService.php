<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisService extends Model
{
    public function services()
    {
        return $this->hasMany(Service::class, 'jenisService_id', 'id');
    }
}