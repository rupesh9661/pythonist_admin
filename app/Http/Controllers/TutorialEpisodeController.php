<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Models\TutorialEpisode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class TutorialEpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorial= TutorialEpisode::with('tutorial')->get();
        return view('TutorialEpisode.index', compact('tutorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tutorial']=Tutorial::all();
        return view('TutorialEpisode.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result= TutorialEpisode::create([
            "title"=>$request->title,
            "tutorial_id"=>$request->tutorial,
            "url"=>$request->url,
            "description"=>$request->description,
            "created_by"=>Auth::user()->id,
            "updated_by"=>Auth::user()->id,
        ]);
        if($result){
            return redirect('tutorialepisode')->with('success', 'TutorialEpisode added successfully');
        }else{
            return redirect('tutorialepisode/create')->with('failure', 'something went wrong unable to add TutorialEpisode');
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
        $data['tutorial']=Tutorial::all();
        $data['tutorialepisode']=TutorialEpisode::find($decrypted_id);
        return view('TutorialEpisode.edit', compact("data"));
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
            "tutorial_id"=>$request->tutorial,
            "url"=>$request->url,
            "description"=>$request->description,
            "updated_by"=>Auth::user()->id,
        ];
        $result= TutorialEpisode::where('id', $id)->update($update_arr);
        if($result){
            return redirect('tutorialepisode')->with('success', 'data updated successfully');
        }else{
            return redirect('tutorialepisode')->with('failure', 'something went wrong unable to update data');
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
        $result= TutorialEpisode::destroy($decrypted_id);
        if($result){
            return redirect('tutorialepisode')->with('success', 'data deleted successfully');
        }else{
            return redirect('tutorialepisode')->with('failure', 'something went wrong unable to delete data');
        }
    }
}
