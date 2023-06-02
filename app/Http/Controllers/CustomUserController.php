<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;

class CustomUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['role']=['admin', 'teacher', 'user'];
        return view('User.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $result= User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "role"=>$request->role, 
            "password"=>bcrypt($request->password)
        ]);
        if($result){
            return redirect('user')->with('success', 'user added successfully');
        }else{
            return redirect('user/create')->with('failure', 'something went wrong unable to add user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decrypted_id=Crypt::decrypt($id);
        $data['user']=User::find($decrypted_id);
        $data['role']=['admin', 'teacher', 'user'];
        return view('User.edit', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $update_arr=[
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "role"=>$request->role       
        ];
        if(!empty($request->password)){
            $update_arr["password"]=bcrypt($request->password);
        }
        $result= User::where('id', $id)->update($update_arr);
        if($result){
            return redirect('user')->with('success', 'data updated successfully');
        }else{
            return redirect('user')->with('failure', 'something went wrong unable to update data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $decrypted_id=Crypt::decrypt($id);
        $result= User::destroy($decrypted_id);
        if($result){
            return redirect('user')->with('success', 'data deleted successfully');
        }else{
            return redirect('user')->with('failure', 'something went wrong unable to delete data');
        }
    }
}
