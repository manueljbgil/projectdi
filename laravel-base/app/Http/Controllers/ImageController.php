<?php

namespace App\Http\Controllers;

use App\Image;
use App\Plantation;
use App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view("backyards")->with("backyards",$user->backyards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Log::info($request->library);
        return view('uploadImage')->with('library',$request->library);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request->all());
        if($request->hasFile('path')){
            $file = $request->file("path")->store('librariesImages');
            $image['path'] = $file;
            $image['library_id'] = $request->library_id;

            Image::create($image);
        }
        
        $plantid = Library::all()->where('id',$request->library_id)->pluck('plantation_id');
        Log::info($plantid);
        $plant = Plantation::all()->where('id',$plantid[0])->first();
        Log::info($plant);

        return redirect()->action('PlantationController@show', $plant)->with('success','Image Created');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        // will not be implemented
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //will not be implemented
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $image)
    {
        Log::info($image);
        $image1 = Image::all()->where('id',$image)->first();
        $lib = $image1->library_id;
        //Log::info($library);

        $image1->delete();
        return redirect()->action('LibraryController@show', $lib)->with('success','Image Removed');
    }
}
