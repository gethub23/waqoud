<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Models\StationAccount;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IBank;
use App\Http\Requests\Provider\Accounts\addAccountRequest;
use App\Http\Requests\Provider\Accounts\editAccountRequest;

class accountController extends Controller
{
    protected $bank ;

    public function __construct(IBank $bank)
    {
        $this->bank = $bank ; 
    }
    public function accounts()
    {
        $accounts = auth('station')->user()->accounts ; 
        return view('provider.accounts.index' , compact('accounts'));
    }


    public function addAccountPage()
    {
        $banks = $this->bank->get();
        return view('provider.accounts.add' , compact('banks'));
    }
    public function addAccount(addAccountRequest $request)
    {
        $account = StationAccount::create($request->validated() + (['station_id' => auth('station')->id()])) ; 
        return response()->json(['message' => __('site.account_added') , 'url' => url('provider/accounts')]);
    }

    public function editAccountPage($id)
    {
       $account = StationAccount::findOrFail($id) ; 
       $banks = $this->bank->get();
       return view('provider.accounts.edit' , compact('banks' , 'account'));
    }

    public function editAccount(editAccountRequest $request , $id)
    {
        $account = StationAccount::findOrFail($id)->update($request->validated()) ; 
        return response()->json(['message' => __('site.account_edited') , 'url' => url('provider/accounts')]);
    }
    public function deleteAccount($id)
    {
        $account = StationAccount::findOrFail($id)->delete() ; 
        return response()->json(['message' => __('site.account_deleted')]);
    }

}
