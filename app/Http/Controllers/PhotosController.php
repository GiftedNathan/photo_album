<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        // dd($album_id);
        return view('photos.create')->with('album_id', $album_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'album_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        // return $fileNameWithExt = request()->file('cover_image')->getClientOriginalName();
        $fileNameWithExt = request()->image;

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // $extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);
        $extension = $request->file('image')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        $path = request()->image->storeAs('public/photos/'.request()->album_id, $fileNameToStore);

        // $validatedData['album_id'] = request()->album_id;
        $validatedData['image'] = $fileNameToStore;
        $validatedData['size'] = request()->file('image')->getMaxFilesize();

        // dd($validatedData['image']);
        $photo = Photo::create($validatedData);

        return redirect('albums/'.request()->album_id)->with('success', 'Photo successfully uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo', $photo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo', $photo));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $validatedData = request()->validate([
            'album_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        // return $fileNameWithExt = request()->file('cover_image')->getClientOriginalName();
        $fileNameWithExt = request()->image;

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // $extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);
        $extension = $request->file('image')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        $path = request()->image->storeAs('public/photos/'.request()->album_id, $fileNameToStore);

        // $validatedData['album_id'] = request()->album_id;
        $validatedData['image'] = $fileNameToStore;
        $validatedData['size'] = request()->file('image')->getMaxFilesize();

        // dd($validatedData);

        $photo->update($validatedData);

        return redirect('photos/'.$photo->id)->with('success', 'Photo successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        // dd($photo);

        if (Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->image) ) {
            $photo->delete();
        } else {
            return redirect('photos/'.$photo->id)->with('error', 'oh ooh, Unable to delete Photo. Try again!');
        }

        return redirect('albums/'.$photo->album_id)->with('success', 'Photo successfully deleted!');
    }
}
