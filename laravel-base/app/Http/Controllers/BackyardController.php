<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackyardStoreRequest;
use App\Backyard;
use App\Tree;
use App\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BackyardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backyards = Backyard::with('user')->get();
        return view("backyards")->with("backyards",$backyards);
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
        //antes de ter sessions
        $data = $data + array('user_id' => 1);
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
        //echo $backyard['id'];

        //$showBackyardTrees = Tree::all()->where('backyard_id',$backyard['id']);
        //$showBackyardPlants = Plant::all()->where('backyard_id',$backyard['id']);
         
        
        return view("showBackyard")
            ->with("backyardName",$backyard);
            //->with("backyardTrees",$showBackyardTrees)
            //->with("backyardPlants",$showBackyardPlants);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Backyard  $backyard
     * @return \Illuminate\Http\Response
     */
    public function edit(Backyard $backyard)
    {
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
