<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Review::with('tutorial', 'tutorialepisode')->get();
        return view('Review.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $result= Review::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "review"=>$request->review,
            "tutorial_id"=>$request->tutorial_id,
            "tutorial_episode_id"=>$request->tutorial_episode_id,
            "created_at"=>date('Y-m-d H:i:s'), 
        ]);
        if($result){
            return redirect('review')->with('success', 'Review added successfully');
        }else{
            return redirect('review/create')->with('failure', 'something went wrong unable to add Review');
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
        $result= Review::destroy($decrypted_id);
        if($result){
            return redirect('review')->with('success', 'data deleted successfully');
        }else{
            return redirect('review')->with('failure', 'something went wrong unable to delete data');
        }
    }
}
