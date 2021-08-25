<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\Create;
use App\Http\Requests\Admin\Admin\Update;
use App\Http\Requests\Admin\Admin\UpdateProfile;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IUser;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    protected $userRepo, $roleRepo;

    public function __construct(IUser $user,IRole $role)
    {
        $this->userRepo = $user;
        $this->roleRepo = $role;
    }

    /***************************  get all admins  **************************/
    public function index()
    {
        $admins = $this->userRepo->where(['user_type' => 'admin']);
        $roles  = $this->roleRepo->get();
        return view('admin.admins.index', compact('admins','roles'));
    }


    /***************************  store admin **************************/
    public function store(Create $request)
    {
        $this->userRepo->store($request->validated()+(['user_type' => 'admin']));
        return response()->json();
    }

    /***************************  edit admin  **************************/
    public function edit($id)
    {
        $admin = $this->userRepo->findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }

    /***************************  update admin  **************************/
    public function update( $id ,Update $request)
    {
        $admin = $this->userRepo->findOrFail($id);
        $this->userRepo->update($admin,array_filter($request->validated()));
        return response()->json();
    }

    /***************************  delete admin  **************************/
    public function destroy($id)
    {
         $role = $this->userRepo->findOrFail($id);
         $this->userRepo->softDelete($role);
         return response()->json(['id' =>$id]);
    }

    /***************************  update profile  **************************/
    public function updateProfile(UpdateProfile $request,$id)
    {
        $admin = $this->userRepo->findOrFail($id);
        $this->userRepo->update($admin , $request->validated());
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
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
