<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'type'];

    public function leases()
    {
        return $this->hasMany(Lease::class);
    }
}
