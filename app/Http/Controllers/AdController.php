<?php

namespace App\Http\Controllers;

use App\Model\Ad;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo 'create';
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data = Ad::find($id);
//        return $data;
        if(!$data) {
           return response('404', 404);
        }
        $data['content'] = str_replace("\n", '<br>', $data['content']);
        $data['content'] = str_replace(" ", '&nbsp', $data['content']);
        return view('talk')->with('data',$data);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo 'destory';
    }

    public function empyt() {
        return response('', 404);
    }
}
