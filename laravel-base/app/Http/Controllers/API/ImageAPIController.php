<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\apiRequests\ImageStoreRequest;
use App\Http\Requests\apiRequests\ImageUpdateRequest;
use App\Library;
use App\Image;

/**
 * 
 * @group Image management
 * 
 * Methods for managing Images
 */
class ImageAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::with('library')->get();
        
        //OK STATUS
        //return response()->json($plantation,200);
        $response = [
            'data' => $images,
            'message' => "images",
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @bodyParam path string required The path to the image
     * @bodyParam library_id int required The id of the library where the image will be stored
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageStoreRequest $request)
    {
        $data = $request->all();
        
        if($request->hasFile('path')){
            $file = $request->file("path")->store('librariesImages');
            $data['path'] = $file;
        }

        $library = $data['library_id'];
        $image = Image::create($data);
        
        //CREATED STATUS
        //return response()->json($backyard,201);
        $response = [
            'data' => $image,
            'library' => $library,
            'message' => "new image",
            'result' => 'ok',
            'code' => 201
        ];

        return $response;
    }

    /**
     * Display the specified path to the image.
     *
     * @param  Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        $lib = $image['library_id'];
        $library = Library::find($lib);

        $response = [
            'data' => $image,
            'plantation' => $library,
            'message' => "image",
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Update the specified image in storage.
     * 
     * @bodyParam path string The path to the image
     * @bodyParam plantation_id int The id of the plantation associated with the library
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageUpdateRequest $request,Image $image)
    {
        $data = $request->all();
        
        if($request->hasFile('path')){
            $file = $request->file("path")->store('librariesImages');
            $data['path'] = $file;
        }

        $library = $data['library_id'];
        $image->update($data);
        
        //CREATED STATUS
        //return response()->json($backyard,201);
        $response = [
            'data' => $image,
            'library' => $library,
            'message' => "image updated",
            'result' => 'ok',
            'code' => 200
        ];

        return $response;
    }

    /**
     * Remove the specified path to the image from storage.
     *
     * @param  Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        $response = [
            'data' => null,
            'message' => 'image deleted',
            'result' => 'no content',
            'code' => 204
        ];

        return $response;
    }
}
