<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\apiRequests\TreeLibStoreRequest;
use App\Http\Requests\apiRequests\TreeLibUpdateRequest;
use Illuminate\Contracts\Validation\Validator;
use App\TreeLib;
use App\Http\Controllers\Controller;

/**
 * 
 * @group TreeLib management
 * 
 * Methods for managing Trees Library
 */
class TreeLibAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treelib = TreeLib::all();

        //OK STATUS
        return response()->json($treelib,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TreeLibStoreRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file("image")->store('TreeLibImages');
            $data['image'] = $file;
        }

        $treelib = TreeLib::create($data);
        
        //CREATED STATUS
        return response()->json($treelib,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TreeLib $treelib)
    {
        //OK STATUS
        return response()->json($treelib,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TreeLibUpdateRequest $request, TreeLib $treelib)
    {
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file("image")->store('TreeLibImages');
            $data['image'] = $file;
        }

        $treelib->update($data);

        //OK STATUS
        return response()->json($treelib,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TreeLib $treelib)
    {
        $treelib->delete();

        //NO CONTENT STATUS
        return response()->json(null,204);
    }
}
