<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackyardStoreRequest;
use App\Backyard;
use App\Plantation;
use App\User;
use App\Library;
use App\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BackyardController extends Controller
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
    public function create()
    {
        //with user_id
        return view('createBackyard');
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
            'name' => 'string|required|max:255',
            'description' => 'string',
            'image' => 'image'
        ]);
        
        $data = $request->all();
        $data = $data + array('user_id' => auth()->user()->id);
        if($request->hasFile('image')){
            $file = $request->file("image")->store('backyardImages');
            $data['image'] = $file;
        }
        

        $backyard = Backyard::create($data);
        return redirect('/backyards')->with('success','Backyard Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Backyard  $backyard
     * @return \Illuminate\Http\Response
     */
    public function show(Backyard $backyard)
    {
        if(auth()->user()->id != $backyard->user_id){
            return redirect('/backyards')->with('error','Unauthorized Page');
        }

        $backyardPlantations = Plantation::all()->where('backyard_id', $backyard['id']);
        Log::info($backyardPlantations);

        
        //foreach para todos os backyardPlantations ids
        $libraries = [];
        foreach($backyardPlantations as $plantation){
            $lib = Library::all()->where('plantation_id',$plantation['id']);
            
            array_push($libraries,$lib);
            Log::info(json_encode($libraries));
        }
        
        $images = [];
        foreach($libraries as $l){
                Log::info("lib " .$l);
                if(sizeof($l) != 0){
                    Log::info("entrei " .$l[0]['plantation_id']);
                    
                    $im = (object)null;
                    $im->id = $l[0]['plantation_id'];
                    $im->im = Image::all()->where('library_id',$l[0]['id'])->pluck('path')->first();
                    
                    foreach($backyardPlantations as $plant){
            
                        if($plant['id'] == $im->id){
                            Log::info('entrei');
                            $plant = (object)$plant;
                            $plant->image = $im->im;
                            $plant = (object)$plant;
                        }
                        else{ 
                            $plant = (object)$plant;
                            $plant->image = null;
                            $plant = (object)$plant; 
                        }
                    }

                    Log::info(json_encode($im));
                    array_push($images,$im);
                }
        }

        Log::info(json_encode($images));
        Log::info("Backyard Plantations  " .json_encode($backyardPlantations));

        return view("showBackyard")
            ->with("backyardName",$backyard)
            ->with("backyardPlantations",$backyardPlantations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Backyard  $backyard
     * @return \Illuminate\Http\Response
     */
    public function edit(Backyard $backyard)
    {

        if(auth()->user()->id != $backyard->user_id){
            return redirect('/backyards')->with('error','Unauthorized Page');
        }

        return view('editBackyard')->with('backyard',$backyard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Backyard  $backyard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Backyard $backyard)
    {
        $this->validate($request,[
            'name' => 'string|required|max:255',
            'description' => 'string',
            'image' => 'image',
            'user_id'=>'exists:users,id'
        ]);
        
        $data = $request->all();
        //antes de ter sessions
        //$data = $data + array('user_id' => 1);
        if($request->hasFile('image')){
            $file = $request->file("image")->store('backyardImages');
            $data['image'] = $file;
        }
        
        $backyard->update($data);
        return redirect('/backyards')->with('success','Backyard Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Backyard  $backyard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Backyard $backyard)
    {
        $backyard->delete();
        return redirect('/backyards')->with('success','Backyard Removed');
    }
}
