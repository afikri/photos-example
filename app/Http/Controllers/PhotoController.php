<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;

use Intervention\Image\Facades\Image as Image;
// use Intervention\Image\ImageManager;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();		
        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if success
      	$photo = new Photo;
		$photo->title = $request->input('title');
        $files[0] = $request->file('photo_0');
        $files[1] = $request->file('photo_1');

        $destinationPath = 'uploads/';
        $thumbnailPath = 'uploads/thumbnail/';
        
        $fileName0 = time().$files[0]->getClientOriginalName();
        $fileName1 = time().$files[1]->getClientOriginalName();

        $files[0]->move($destinationPath, $fileName0);
        $files[1]->move($destinationPath, $fileName1);

        $photo->photo_0 = $destinationPath.$fileName0;
        $photo->photo_1 = $destinationPath.$fileName1;

        //make thumbnail of first photo
        $thumbnail = Image::make($destinationPath.$fileName0);
        $thumbnail->resize(480,360);
        $thumbnail->save($thumbnailPath.'tn-'.$fileName0);

        $photo->save();
        return redirect('photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photos = Photo::findOrFail($id);
		return view('photos.show',compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
