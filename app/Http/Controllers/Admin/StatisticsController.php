<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\IUser;
use DB ;
class StatisticsController extends Controller
{
    protected $user;

    public function __construct(IUser $user)
    {
        $this->user = $user;
    }

    public function index(){
        view()->share([
            'users' => $this->user->chartData('user'),
            'admins' => $this->user->chartData('admin'),
        ]);
        return view('admin.statistics.index');
    }
}
