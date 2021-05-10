<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jenisService()
    {
        return $this->belongsTo(Jenis_Service::class, 'jenisService_id', 'id');
    }

    public function detail_services()
    {
        return $this->hasMany(DetailService::class, 'service_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'service_id', 'id');
    }
}
