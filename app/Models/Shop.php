<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }
}
