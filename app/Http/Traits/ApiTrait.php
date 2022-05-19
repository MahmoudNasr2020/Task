<?php


namespace App\Http\Traits;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait ApiTrait
{
    public function response($data,$msg,$status)
    {
        return response()->json([
            'data'      =>  $data,
            'message'   =>  $msg,
            'status'    =>   $status
        ]);
    }

}
