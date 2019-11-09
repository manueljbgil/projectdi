<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\apiRequests\BackyardStoreRequest;
use App\Http\Requests\apiRequests\BackyardUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Backyard;
use App\Http\Controllers\Controller;

/**
 * 
 * @group Backyard management
 * 
 * Methods for managing Backyards
 */
class BackyardAPIController extends Controller
{
    /**
     * Display a listing of the backyards with the associated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$user = $request->user();
        $backyard = Backyard::with('user')->get();

        //OK STATUS
        return response()->json($backyard,200);
        /*$response = [
            'data' => $backyard,
            'message' => "backyards",
            'result' => 'ok',
            'user' => $user
        ];*

        return $response;*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @bodyParam name string required The name of the backyard
     * @bodyParam description string A description for the backyard
     * @bodyParam image image An image for the backyard
     * @bodyParam user_id int The id of the user associated with the backyard
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackyardStoreRequest $request)
    {
        $data = $request->all();
        
        if($request->hasFile('image')){
            $file = $request->file("image")->store('backyardImages');
            $data['image'] = $file;
        }

        $backyard = Backyard::create($data);
        
        //CREATED STATUS
        return response()->json($backyard,201);
    }

    /**
     * Display the specific backyard.
     *
     * @bodyParam id int required The id of the backyard
     * @param  \App\Backyard  $backyard
     * @return \Illuminate\Http\Response
     */
    public function show(Backyard $backyard)
    {
        //OK STATUS
        return response()->json($backyard,200);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @bodyParam name string The name of the backyard
     * @bodyParam description string A description for the backyard
     * @bodyParam image image An image for the backyard
     * @bodyParam user_id int The id of the user associated with the backyard
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BackyardUpdateRequest $request, Backyard $backyard)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file("image")->store('backyardImages');
            $data['image'] = $file;
        }    

        $backyard->update($data);

        //OK STATUS
        return response()->json($backyard,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @bodyParam id int required The id of the backyard to be removed
     * @param  \App\Backyard  $backyard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Backyard $backyard)
    {
        $backyard->delete();

        //NO CONTENT STATUS
        return response()->json(null,204);
    }
}
