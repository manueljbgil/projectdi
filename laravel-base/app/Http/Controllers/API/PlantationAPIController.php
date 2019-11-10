<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Requests\apiRequests\PlantationsStoreRequest;
use App\Http\Requests\apiRequests\PlantationUpdateRequest;
use App\Http\Controllers\Controller;
use App\Plantation;

/**
 * 
 * @group Plantations management
 * 
 * Methods for managing Plantations
 */
class PlantationAPIController extends Controller
{
    /**
     * Display all the plantations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plantations = Plantation::with('backyard')->with('type')->get();
        
        //OK STATUS
        //return response()->json($plantation,200);
        $response = [
            'data' => $plantations,
            'message' => "plantations",
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Store a newly created plantation in storage.
     *
     * @bodyParam name string required The name of the plant
     * @bodyParam description string A description for the plantation
     * @bodyParam image image An image for the plant
     * @bodyParam backyard_id int required The id of the backyard associated with the plantation
     * @bodyParam type_id int required The id of the plant type associated with the plantation
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantationsStoreRequest $request)
    {
        $data = $request->all();

        $plantation = Plantation::create($data);
        
        //CREATED STATUS
        //return response()->json($backyard,201);
        $response = [
            'data' => $plantation,
            'message' => "new plantation",
            'result' => 'created',
            'code' => 201
        ];

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  Plantation  $plantation
     * @return \Illuminate\Http\Response
     */
    public function show(Plantation $plantation)
    {
        $response = [
            'data' => $plantation,
            'message' => 'plantation',
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @bodyParam name string The name of the plant
     * @bodyParam description string A description for the plantation
     * @bodyParam image image An image for the plant
     * @bodyParam user_id int The id of the backyard associated with the plantation
     * @bodyParam type_id int The id of the plant type associated with the plantation
     * @param  \Illuminate\Http\Request  $request
     * @param  Plantation  $plantation
     * @return \Illuminate\Http\Response
     */
    public function update(PlantationUpdateRequest $request, Plantation $plantation)
    {
        $data = $request->all();

        $plantation->update($data);

        //OK STATUS
        //return response()->json($backyard,200);
        $response = [
            'data' => $plantation,
            'message' => 'plantation updated',
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Remove the specified plantation from storage.
     *
     * @bodyParam plantation Plantation required The id of the plantation to be removed
     * @param  Plantation  $plantation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantation $plantation)
    {
        $plantation->delete();

        $response = [
            'data' => null,
            'message' => 'plantation deleted',
            'result' => 'no content',
            'code' => 204
        ];

        return $response;
    }
}
