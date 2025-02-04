<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['property_id', 'file_path', 'file_type'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
