<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ISetting;

class IntroSetting extends Controller
{
    protected  $setting ;

    public function __construct(ISetting $setting)
    {
        $this->setting = $setting;

    }

    public function index()
    {
        $data = $this->setting->getAppInformation();
        return view('admin.intro_setting.index' , compact('data'));
    }
}
