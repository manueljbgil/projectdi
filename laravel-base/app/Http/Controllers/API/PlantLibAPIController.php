<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\apiRequests\PlantLibStoreRequest;
use App\Http\Requests\apiRequests\PlantLibUpdateRequest;
use Illuminate\Contracts\Validation\Validator;
use App\PlantLib;
use App\Http\Controllers\Controller;

/**
 * 
 * @group PlantLib management
 * 
 * Methods for managing Plants Library
 */
class PlantLibAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantlib = PlantLib::all();

        //OK STATUS
        return response()->json($plantlib,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantLibStoreRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file("image")->store('PlantLibImages');
            $data['image'] = $file;
        }

        $plantlib = PlantLib::create($data);
        
        //CREATED STATUS
        return response()->json($plantlib,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PlantLib $plantlib)
    {
        //OK STATUS
        return response()->json($plantlib,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlantLibUpdateRequest $request, $plantlib)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file("image")->store('PlantLibImages');
            $data['image'] = $file;
        }

        $plantlib->update($data);

        //OK STATUS
        return response()->json($plantlib,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantLib $plantlib)
    {
        $plantlib->delete();

        //NO CONTENT STATUS
        return response()->json(null,204);
    }

    public function universe(PlantLib $plantlib)
    {
        //OK STATUS
        return response()->json($plantlib,200);
    }
}
