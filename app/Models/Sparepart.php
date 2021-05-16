<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{

    protected $table = 'spareparts';
    protected $guarded = array();

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function detail_services()
    {
        return $this->hasMany(DetailService::class, 'sparepart_id', 'id');
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