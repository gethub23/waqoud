<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['price','package_id','user_id'];

    /**
     * Get the user that owns the PackageUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the pakage that owns the PackageUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pakage()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
}
