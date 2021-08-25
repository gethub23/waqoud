<?php

namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;

trait  Responses
{

    public  function validationResponse($validator){
        $response = [
            'success'   => 'fail',
            'message'   => $validator->errors()->first(),
            'data'      => [],
            'extra'     => [],
        ];
        throw new HttpResponseException(response()->json( $response , 200));
    }

    public  function  sendResponse($result, $message = '', $extraData = null){
        $response = [
            'success'  => true,
            'message'  => $message,
            'data'     => $result,
            'extra'    => [
                'block'  => auth()->check() && auth()->user()->block  == 1 ? true : false ,
                'active' => auth()->check() && auth()->user()->active == 1 ? true : false ,
                'extra'  => $extraData
            ],
            'pages'    => $extraData,
        ];
        throw new HttpResponseException(response()->json( $response , 200));
    }

    public  function  errorResponse($result, $message = '', $extraData = null){
        $response = [
            'success'  => false,
            'message'  => $message,
            'data'     => $result,
            'extra'    => [
                'block'  => auth()->check() && auth()->user()->block  == 1 ? true : false ,
                'active' => auth()->check() && auth()->user()->active == 1 ? true : false ,
                'extra'  => $extraData
            ],
        ];
        throw new HttpResponseException(response()->json( $response , 200));
    }

    public function paginationModel( $col ){
            $data = [
                'total'         => $col -> total()              ??'',
                'count'         => $col -> count()              ??'',
                'per_page'      => $col -> perPage()            ??'',
                'next_page_url' => $col -> nextPageUrl()        ??'',
                'perv_page_url' => $col -> previousPageUrl()    ??'',
                'current_page'  => $col -> currentPage()        ??'',
                'total_pages'   => $col -> lastPage()           ??'',
            ];
            return $data;
    }

    /**
     * keys : success, fail, needActive, exit, blocked
     */
    function response($key, $message , $data = [], $extra = [] , $page = false )
    {
        $response = [
            'key'            => $key,
            'message'        => $message,
            'data'           => $data,
            'pagination'     => $page != false ?  $this->paginationModel($data) : false, 
            'extra'          => [
                        'block'  => auth()->check() && auth()->user()->block  == 1 ? true : false ,
                        'active' => auth()->check() && auth()->user()->active == 1 ? true : false ,
                        'extra'  => $extra
            ],
        ];
        throw new HttpResponseException(response()->json( $response , 200));
    }
}

