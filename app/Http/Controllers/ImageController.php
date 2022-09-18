<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
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
       $this->validate($request, [
            
            'profile'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'account_id' => 'required'
            
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
    $fileProfileToStore = $filename.'_'.time().'.'.$extension;
    //upload image
    $path = $request->file('profile')->storeAs('public/Profile', $fileProfileToStore);

} else {
    $fileProfileToStore = 'noimage.jpg';
}

        
        // Create Post
        $image = new Image;
        $image->profile = $fileProfileToStore;
        $image->account_id = $request->input('account_id');
        
       
        
        $image->save();

        return redirect()->back()->with('success','You have successfully Completed your post'); 
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
    $image = Image::find($id);
     $image->delete(); 
     return redirect('/search');
    }
}
