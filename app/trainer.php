<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    protected $fillable = ['name','last_name','description','avatar'];
    /**
         * Get the route key for the model.
         *
         * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
