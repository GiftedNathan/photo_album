<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $albums = Album::with('photos')->get();
        // return view('albums.index')->with('albums', $albums);

        $albums = Album::all();
        return view('albums.index')->with('albums', $albums);

        // return view('albums.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Album $album)
    {
        return view('albums.create', compact('album', $album));
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
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image'

        ]);

        // return request()->cover_image;

        // return $fileNameWithExt = request()->file('cover_image')->getClientOriginalName();
        $fileNameWithExt = request()->cover_image;

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // $extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        $path = request()->cover_image->storeAs('public/album_covers', $fileNameToStore);
        // $path = request()->cover_image->storeAs('public/album_covers', $newFileName);

        $validatedData['cover_image'] = $fileNameToStore;

        $album = Album::create($validatedData);

        // $album = new Album();
        // $album->name = request()->input('name');
        // $album->description = request()->input('description');
        // $album->cover_image = $fileNameToStore;
        // $album->save();

        return redirect('albums')->with('success', 'Album successfully created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('/albums.edit', compact('album', $album));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        // dd($album);
        $validatedData = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image'

        ]);
        // return request()->cover_image;

        // return $fileNameWithExt = request()->file('cover_image')->getClientOriginalName();
        $fileNameWithExt = request()->cover_image;

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // $extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        $path = request()->cover_image->storeAs('public/album_covers', $fileNameToStore);
        // $path = request()->cover_image->storeAs('public/album_covers', $newFileName);

        $validatedData['cover_image'] = $fileNameToStore;

        $album->update($validatedData);

        // dd($validatedData);

        // $photo->update($validatedData);

        return redirect('albums/'.$album->id)->with('success', 'Album successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        // dd($album->photos);
        // $files = Storage::files('public/album_covers');
        // $directory = Storage::directories('public/photos/'.$album->id);
        // dd($directory);

        if (Storage::delete('public/album_covers/'.$album->cover_image)  ) { // delete cover image from storage
            Storage::deleteDirectory('public/photos/'.$album->id); // delete album folder from storage
            $album->photos()->delete(); // delete all pictures of this album in the photos table
            $album->delete(); // delete this album from albums table
        } else {
            return redirect('albums/'.$album->id)->with('error', 'oh ooh, Unable to delete Album. Try again!');
        }

        return redirect('albums')->with('success', 'album successfully deleted!');
    }
}
