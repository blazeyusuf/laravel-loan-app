<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class PhotoController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(  $request, [
            
            'profile'  => 'image|required|max:1999'
           
            
        ]);

//handle file upolad
if($request->hasFile('profile')){
    //get filename with the extension
    $filenameWithExt = $request->file('profile')->getClientOriginalName();
    // GET just filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //get just ext
    $extension = $request->file('profile')->getClientOriginalExtension();
    //filename to store
    $fileNameToStore = $filename.'_'.time().'.'.$extension;
    //upload image
    $path = $request->file('profile')->store('public/photo', $fileNameToStore);

} else {
    $fileNameToStore = 'noimage.jpg';
}
        
        // Create Post
        $photo = new Photo;
        $photo->profile = $request->$fileNameToStore; 
        $photo->save();

        return redirect('/')->with('success','You have successfully Completed your post'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     $photo = Photo::find($id);
     $photo->delete(); 
     return redirect('/search');
    }
}
