<?php

namespace App\Http\Controllers;

use App\Backyard;
use App\Plantation;
use App\User;
use App\Library;
use App\Image;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlantationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        //$types = Type::all();
        $types =['' => 'Select a type'] + Type::pluck('name','id')->all();

        Log::info($request->backyard_id);
        
        return view('createPlantation')
            ->with("types",$types)
            ->with("backyard",$request->backyard_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'description' => 'max:255',
            'type_id'=> 'required|exists:types,id' 
        ]);

        //create plant
        $data = $request->all();
        $data = $data + array('user_id' => auth()->user()->id);
        $plantation = Plantation::create($data);
        
        //create library
        $library = array('user_id' => auth()->user()->id);
        $library = $library + array('plantation_id' => $plantation->id);
        $library = $library + array('backyard_id' => $request->backyard_id);
        $lib = Library::create($library);
        
        //add first image
        if($request->hasFile('path')){
            $file = $request->file("path")->store('librariesImages');
            $image['path'] = $file;
            $image['library_id'] = $lib->id;
            Image::create($image);
        }
        
        
        return redirect()->action('BackyardController@show', $plantation->backyard_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plantation  $plantation
     * @return \Illuminate\Http\Response
     */
    public function show(Plantation $plantation)
    {
        $library = Library::all()->where('plantation_id',$plantation->id)
                                 ->first();

        
        $images = Image::all()->where('library_id',$library['id'])->pluck('path');
        $imageslib = Image::all()->where('library_id',$library['id']);

        Log::info($library);

        return view('layouts.showPlant')->with('imageslib',$imageslib)
                                ->with('images',$images)
                                -> with('plantation',$plantation)
                                -> with('library_id',$library['id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plantation  $plantation
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantation $plantation)
    {
        //$types = Type::all();
        $types =['' => 'Select a type'] + Type::pluck('name','id')->all();

        return view('editPlantation')->with('plantation',$plantation)
                                     ->with('types', $types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plantation  $plantation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantation $plantation)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'description' => 'max:255',
            'type_id'=> 'required|exists:types,id'
        ]);
        
        $data = $request->all();
        $data = $data + array('user_id' => auth()->user()->id);
        
        $plantation->update($data);
        return redirect()->action('BackyardController@show', $plantation->backyard_id)->with('success','Plantation Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plantation  $plantation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantation $plantation)
    {
        $plantation->delete();
        return redirect()->action('BackyardController@show', $plantation->backyard_id)->with('success','Plant Removed');
    }
}
