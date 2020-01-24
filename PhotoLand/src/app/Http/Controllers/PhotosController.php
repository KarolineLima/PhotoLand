<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
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
        $photo = new Photo;
        $photo->user_id = Auth::id();
        $photo->fotografo = Auth::user()->name;

        $validatedData = $request->validate([
            'local' => 'required|max:255',
            'pictureDate' => 'required|max:255',
            'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);

        //dd($request->file('fileUpload'));
        
        if ($files = $request->file('fileUpload')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = $validatedData['local'] . "." . $files->getClientOriginalExtension();
            $path = $request->file('fileUpload')->storeAs('photos',$profileImage);
            // dd($path);
        
         
            $photo->local = $validatedData['local'];
            $photo->pictureDate = $validatedData['pictureDate'];
            $photo->fileUpload = $profileImage;
            $photo->save();
           // dd($photo);
         }


        return redirect(route('photos.index'))->with('success', 'Photo is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $photo = Photo::findOrFail($photo->id);
        return view('photos.edit', compact('photo'));
        
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
        
        $photoUp = Photo::findOrFail($photo->id);


        $validatedData = $request->validate([
            'local' => 'required|max:255',
            'pictureDate' => 'required|max:255',
            'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);
        
        //dd($validatedData);
        if ($files = $request->file('fileUpload')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = $validatedData['local'] . "." . $files->getClientOriginalExtension();
            //dd($profileImage);
            $path = $request->file('fileUpload')->storeAs('photos',$profileImage);
            //dd($path);
        
        
            $photoUp->local = $validatedData['local'];
            $photoUp->local = $validatedData['pictureDate'];
            $photoUp->fileUpload = $profileImage;
            //dd($photoUp);
            $photoUp->update();
           
         }

        return redirect(route('photos.index'))->with('success', 'Photo is successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo = Photo::findOrFail($photo->id);
        $photo->delete();

        return redirect(route('photos.index'))->with('success', 'Photo is successfully deleted');
    
    }
}
