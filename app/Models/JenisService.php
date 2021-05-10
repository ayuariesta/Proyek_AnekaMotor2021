<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisService extends Model
{

    protected $table = 'jenis_services';
    protected $guarded = array();

    public function services()
    {
        return $this->hasMany(Service::class, 'jenisService_id', 'id');
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

}