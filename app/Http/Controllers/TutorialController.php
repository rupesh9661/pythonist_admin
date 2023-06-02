<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorial= Tutorial::all();
        return view('Tutorial.index', compact('tutorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tutorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('cover_image')) {
            $image = $request->file('cover_image');
            $img_name = $image->getClientOriginalName();
            $img_final_name = "cover_image" . date("YmdHis") . $img_name;
            // $path = public_path('images/profile_images/');
            $path='images/cover_images/';
            $image->move($path, $img_final_name);
        }else{
            $img_final_name='';
        }
        $result= Tutorial::create([
            "title"=>$request->title,
            "url"=>$request->url,
            "price"=>$request->price,
            "description"=>$request->description,
            "created_by"=>Auth::user()->id,
            "updated_by"=>Auth::user()->id,
            "cover_image"=>$img_final_name
        ]);
        if($result){
            return redirect('tutorial')->with('success', 'Tutorial added successfully');
        }else{
            return redirect('tutorial/create')->with('failure', 'something went wrong unable to add Tutorial');
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
        $data['tutorial']=Tutorial::find($decrypted_id);
        return view('Tutorial.edit', compact("data"));
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
            "title"=>$request->title,
            "url"=>$request->url,
            "price"=>$request->price,
            "description"=>$request->description,
            "updated_by"=>Auth::user()->id,
        ];
        if ($request->file('cover_image')) {
            $image = $request->file('cover_image');
            $img_name = $image->getClientOriginalName();
            $img_final_name = "cover_image" . date("YmdHis") . $img_name;
            // $path = public_path('images/profile_images/');
            $path='images/cover_images/';
            $image->move($path, $img_final_name);
            $update_arr['cover_image']=$img_final_name;
        }
        $result= Tutorial::where('id', $id)->update($update_arr);
        if($result){
            return redirect('tutorial')->with('success', 'data updated successfully');
        }else{
            return redirect('tutorial')->with('failure', 'something went wrong unable to update data');
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
        $result= Tutorial::destroy($decrypted_id);
        if($result){
            return redirect('tutorial')->with('success', 'data deleted successfully');
        }else{
            return redirect('tutorial')->with('failure', 'something went wrong unable to delete data');
        }
    }
}
