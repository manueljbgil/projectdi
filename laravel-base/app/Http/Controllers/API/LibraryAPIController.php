<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\apiRequests\LibraryStoreRequest;
use App\Http\Requests\apiRequests\LibraryUpdateRequest;
use App\Library;
use App\Plantation;


/**
 * 
 * @group Library management
 * 
 * Methods for managing Libraries
 */
class LibraryAPIController extends Controller
{
    /**
     * Display a listing of the libraries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libraries = Library::with('plantation')->get();
        
        //OK STATUS
        //return response()->json($plantation,200);
        $response = [
            'data' => $libraries,
            'message' => "libraries",
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Store a newly created library in storage.
     *
     * @bodyParam plantation_id int required The id of the plantation associated with the library
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryStoreRequest $request)
    {
        $data = $request->all();

        $library = Library::create($data);

        //CREATED STATUS
        //return response()->json($backyard,201);
        $response = [
            'data' => $library,
            'message' => "new library",
            'result' => 'created',
            'code' => 201
        ];

        return $response;
    }

    /**
     * Display the specified Library.
     *
     * @param  Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {

        $plant = $library['plantation_id'];
        $plantation = Plantation::find($plant);

        $response = [
            'data' => $library,
            'plantation' => $plantation,
            'message' => "library",
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @bodyParam plantation_id int required The id of the plantation associated with the library
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(LibraryUpdateRequest $request,Library $library)
    {
        $data = $request->all();

        $library->update($data);

        //OK STATUS
        //return response()->json($backyard,200);
        $response = [
            'data' => $library,
            'message' => 'library updated',
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Remove the specified library from storage.
     * 
     * @param  Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        $library->delete();

        $response = [
            'data' => null,
            'message' => 'library deleted',
            'result' => 'no content',
            'code' => 204
        ];

        return $response;
    }
}
