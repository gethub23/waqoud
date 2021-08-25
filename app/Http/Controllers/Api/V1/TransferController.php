<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IBank;
use App\Http\Resources\Api\BankResource;
use App\Repositories\Interfaces\ITransfer;
use App\Http\Requests\Api\Transfer\StoreTransferRequest;

class TransferController extends Controller
{
    use Responses ;

    protected $bank;
    protected $transfer;

    public function __construct(IBank $bank , ITransfer $transfer)
    {
        $this->bank = $bank;
        $this->transfer = $transfer;
    }

    public function banks()
    {
        $banks = BankResource::collection($this->bank->get()) ;
        $this->response('success' , '' , $banks);
    }

    public function storeTransfer(StoreTransferRequest $request)
    {
        $transfer = $this->transfer->store($request->validated() + ([ 'user_id' => auth()->id()])) ; 
        $this->response('success' , __('apis.transfered')); 
    }
}
