<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\apiRequests\PlantStoreRequest;
use App\Http\Requests\apiRequests\PlantUpdateRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Plant;
use App\Http\Controllers\Controller;

/**
 * 
 * @group Plant management
 * 
 * Methods for managing Plants
 */
class PlantAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plant = Plant::all();

        //OK STATUS
        return response()->json($plant,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantStoreRequest $request)
    {
        $data = $request->all();
        $plant = Plant::create($data);
        
        //CREATED STATUS
        return response()->json($plant,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        //OK STATUS
        return response()->json($plant,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlantUpdateRequest $request, Plant $plant)
    {
        $data = $request->all();
        $plant->update($data);

        //OK STATUS
        return response()->json($plant,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();

        //NO CONTENT STATUS
        return response()->json(null,204);
    }
}
