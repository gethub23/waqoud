<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Intro extends Model
{
    use HasTranslations; 
    use UploadTrait ; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image' , 'title' , 'description'];

    public $translatable = ['title','description'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function getImageAttribute($value)
    {
        return asset('/storage/images/intros/'.$value);
    }

    public function setImageAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['image'] = $this->uploadAllTyps($value, 'intros');
        }
    }

}
