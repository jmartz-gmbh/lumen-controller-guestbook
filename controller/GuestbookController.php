<?php

namespace App\Http\Controllers;

use \http\Env\Response;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class GuestbookController extends Controller
{
    /**
     * @param  Request  $request
     * @return Response
     */
    public function latest(Request $request){
        $connection = DB::table('guestbooks');

        $guestbooks = $connection->where('active','=','1')->orderBy('id', 'desc')->select(['id'])->get();

        $this->addData('guestbooks',$guestbooks);
        $this->addMessage('success','All your Guestbook.');

        return $this->getResponse();
    }

    /**
     * @param  Request  $request
     * @return Response
     */
    public function id(Request $request, int $id){
        $guestbook = DB::table('guestbooks')->where('id','=',$id)->select(['name', 'message','created_at']);

        $count = $guestbook->count();

        if($count === 1){
            $this->addData('guestbook',$guestbook->first());
        }
        else{
            $this->addMessage('success','Guestbook doesnt exists.');
        }

        return $this->getResponse();
    }

    /**
     * @param  Request  $request
     * @return Response
     */
    public function add(Request $request){
        $guestbook = DB::table('guestbooks');

        $count = $guestbook->count();

        if($count === 1){
            $this->addMessage('success','Guestbook entry added.');
        }
        else{
            $this->addMessage('success','Guestbook entry failed.');
        }

        return $this->getResponse();
    }
}
