<?php

namespace App\Http\Controllers;
use App\Image;
use App\Library;
use App\Plantation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LibraryController extends Controller
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
    public function create()
    {
        // will not be implemented
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // will not be implemented
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        $images = Image::all()->where('library_id',$library->id)->pluck('path');
        $imageslib= Image::all()->where('library_id',$library->id);

        /*$im = [];
        foreach($images as $image){
            array_push($im, (object)[
                'id' => $image->id,
                'path' => $image->path
            ]);
            Log::info(json_encode($im));
        }
        $finalIm = json_encode($im);

        //$images = []*/
        
        //$lib = Library::all()->where('id',$image->library_id)->pluck('id');
        $plantation = Plantation::all()->where('id',$library->plantation_id)->first();
        Log::info($imageslib);

        return view('showLibrary')->with('images',$images)
                                  ->with('imageslib',$imageslib)
                                  ->with('plantation',$plantation)
                                  ->with('library',$library->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
        //will not be implemented
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {
        //will not be implemented
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        //maybe will not be implemented
    }
}
