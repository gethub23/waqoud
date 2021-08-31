<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Bank extends Model
{
    use HasTranslations; 
    use UploadTrait ; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['icon','name','iban','account_number','account_name'];

    public $translatable = ['name'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function getIconAttribute($value)
    {
        return asset('/storage/images/banks/'.$value);
    }

    public function setIconAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['icon'] = $this->uploadAllTyps($value, 'banks');
        }
    }
    
}
