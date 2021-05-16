<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $guarded = array();

    public function spareparts()
    {
        return $this->hasMany(Sparepart::class, 'category_id', 'id');
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
