<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'privileges';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['privilege', 'role_header'];

    public function scopeWithoutEmpty($query)
    {
        return $query->where('privilege','!=', 'empty');
    }

    public function scopeGetCount($query)
    {
        return $query->count();
    }

    public function scopeGetCountWithoutEmpty($query)
    {
        return $query->where('privilege','!=', 'empty')->count();
    }
    
}
