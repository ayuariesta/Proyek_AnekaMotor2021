<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailService extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'sparepart_id', 'id');
    }
}
