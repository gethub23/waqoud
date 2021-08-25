<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name' ];

    public $translatable = ['name'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get all of the stations for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stations()
    {
        return $this->hasMany(Station::class, 'city_id', 'id');
    }
}
