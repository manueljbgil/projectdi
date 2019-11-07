<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\apiRequests\TreeStoreRequest;
use App\Http\Requests\apiRequests\TreeUpdateRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Tree;
use App\Http\Controllers\Controller;

/**
 * 
 * @group Tree management
 * 
 * Methods for managing Trees
 */
class TreeAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tree = Tree::all();

        //OK STATUS
        return response()->json($tree,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TreeStoreRequest $request)
    {
        $data = $request->all();
        $tree = Tree::create($data);
        
        //CREATED STATUS
        return response()->json($tree,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tree $tree)
    {
        //OK STATUS
        return response()->json($tree,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TreeUpdateRequest $request, Tree $tree)
    {
        $data = $request->all();
        $tree->update($data);

        //OK STATUS
        return response()->json($tree,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tree $tree)
    {
        $tree->delete();

        //NO CONTENT STATUS
        return response()->json(null,204);
    }
}
