<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;

/**
 * 
 * @group Types Displaying
 * 
 * Displays the types of plantae.
 */
class TypeAPIController extends Controller
{
    /**
     * Display all types of plantae
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = $request->user();
        $types = Type::all();

        //OK STATUS
        //return response()->json($types,200);
        $response = [
            'data' => $types,
            'message' => "types",
            'result' => 'OK',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Display the specified type of plantae.
     *
     * @bodyParam name required string name of the category
     * @bodyParam scientific_name string scientific name of the category
     * @bodyParam description string description of the category
     * @param  Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //OK STATUS
        $response = [
            'data' => $type,
            'message' => "specific type",
            'result' => 'OK',
            'code' => 200
        ];

        return $response;
    }
}
