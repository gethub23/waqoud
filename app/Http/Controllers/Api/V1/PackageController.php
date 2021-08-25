<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IPackage;
use App\Http\Resources\Api\PackageResource;

class PackageController extends Controller
{
    use Responses ;
    protected $package ;

    public function __construct(IPackage $package)
    {
        $this->package = $package ;
    }

    public function packages()
    {
        $this->response('sucess' , '' , PackageResource::collection($this->package->get()) );
    }
}
