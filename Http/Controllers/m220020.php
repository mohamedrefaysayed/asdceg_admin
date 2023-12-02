<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
 
use Redirect,Response;
 
use App\User;
   
class m220020 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('id','desc')->paginate(8);
   
        return view('m220020',$data);
    }
    
   
    public function show($id)
    {   
        $where = array('id' => $id);
        $user  = User::where($where)->first();
 
        return Response::json($user);
    }
 
}