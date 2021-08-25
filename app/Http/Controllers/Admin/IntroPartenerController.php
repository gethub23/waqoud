<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IIntroPartener;
use App\Http\Requests\Admin\IntroParteners\Store;

class IntroPartenerController extends Controller
{
    protected $Repo;

    public function __construct(IIntroPartener $IRepo)
    {
        $this->Repo = $IRepo;
    }

    /***************************  get all   **************************/
    public function index()
    {
        $rows = $this->Repo->get();
        return view('admin.introparteners.index', compact('rows'));
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        $this->Repo->store($request->validated());
        return response()->json();
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        $row = $this->Repo->findOrFail($id);
        $this->Repo->update($row , $request->validated());
        return response()->json();
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
         $row = $this->Repo->findOrFail($id);
         $this->Repo->softDelete($row);
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if ($this->Repo->delete($ids)) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
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
        $client = $this->userRepo->findOrFail($request->id);
        $data = [
            'sender'        => auth()->id(),
            'title_ar'      => 'تنبيه اداري',
            'title_en'      => 'Administrative Notify',
            'message_ar'    => $request->message_ar ? $request->message_ar : $request->message_en ,
            'message_en'    => $request->message_en ? $request->message_en : $request->message_ar,
            'data'          => [
                'type'       => 0 ,
            ],
        ];
        dispatch(new AcceptAd($client, $data));
        return redirect()->back()->with('success', 'تم ارسال الاشعار بنجاح');
    }
}
