<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\AddEditClientRequest;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IUser;
use App\Jobs\BlockUser;
use App\Jobs\AcceptAd;
use App\Jobs\NotifyUser;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $userRepo;

    public function __construct(IUser $user)
    {
        $this->userRepo = $user;
    }

    /***************************  get all clients  **************************/
    public function index()
    {
        $clients = $this->userRepo->where(['user_type' => 'user']);
        return view('admin.clients.index', compact('clients'));
    }


    /***************************  store client **************************/
    public function store(AddEditClientRequest $request)
    {
        $this->userRepo->store($request->validated()+(['user_type' => 'user']));
        return response()->json();
    }

    /***************************  update client  **************************/
    public function update(AddEditClientRequest $request, $id)
    {
        $admin = $this->userRepo->findOrFail($id);
        $this->userRepo->update($admin , $request->validated());
        return response()->json();
    }

    /***************************  delete client **************************/
    public function destroy($id)
    {
         $client = $this->userRepo->findOrFail($id);
         $this->userRepo->softDelete($client);
         return response()->json(['id' =>$id]);
    }

    public function blockUser($id)
    {
        $client = $this->userRepo->findOrFail($id);
        $this->userRepo->block($client);
        $data = [
            'sender'        => auth()->id(),
            'title_ar'      => 'حظر',
            'title_en'      => 'Block',
            'message_ar'    => 'تم حظرك من قبل الادراه ',
            'message_en'    => 'You have been banned by admin',
            'data'          => [
                'type'       => 4 ,
            ],
        ];
        dispatch(new BlockUser($client, $data));
        return redirect()->back()->with('success', 'تم حظر المستخدم بنجاح');
    }

    public function notify(Request $request)
    {
        if ($request->id == 'all'){
            $clients = $this->userRepo->where(['user_type' => 'user']);
        }else{
            $clients = $this->userRepo->findOrFail($request->id);
        }

        if ($request->type == 'email')
            dispatch(new NotifyUser($clients, $request));
        elseif ($request->type == 'notify')
            dispatch(new NotifyUser($clients, $request));
        else
            dispatch(new NotifyUser($clients, $request));

        return redirect()->back()->with('success', 'تم ارسال الاشعار بنجاح');
    }
    

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if ($this->userRepo->delete($ids)) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
