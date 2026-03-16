<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       menuSubmenu('galleries', 'all_gallery');
       $galleries = Gallery::latest()->paginate(30);
       return view('admin.galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       menuSubmenu('galleries', 'create_gallery');
       return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'featured_image'=>'required|image',
        ]);

      

        $gallery = New Gallery();

        $gallery->title = $request->title;
        $gallery->designation = $request->designation;
        $gallery->active = $request->active ? true:false;
        if ($request->hasFile('featured_image')) {
            $file = $request->featured_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('galleries/' . $imageName, File::get($file));
            $gallery->featured_image = $imageName;
        }

        $gallery->addedby_id =Auth::id();
        $gallery->save();


        // if($request->hasfile('extraImages'))
        // {
        //    foreach($request->file('extraImages') as $file)
        //    {

        //        $imageName = rand(111111,999999).time().'.'.$file->getClientOriginalExtension();
        //        Storage::disk('public')->put('gallery_items/' . $imageName, File::get($file));
        //        $galleryItem = new GalleryItem();
        //        $galleryItem->gallery_id = $gallery->id;
        //        $galleryItem->image = $imageName;
        //        $galleryItem->description = $gallery->description;
        //        $galleryItem->addedby_id = Auth::id();
        //        $galleryItem->save();
        //    }

        // }


        return back()->with("success","Gallery Created Successfuly");



    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {

        return view('admin.galleries.edit',compact('gallery'));
    }

    public function itemDescriptionUpdate(Request $request, GalleryItem $ImageItemUpdate){

        $ImageItemUpdate->description = $request->data;
        $ImageItemUpdate->save();
        return true;
    }

    public function imageItemDelete(GalleryItem $ImageItemDelete)
    {

        if ($ImageItemDelete->image_name) {
            $old_file = 'galleries/' . $ImageItemDelete->image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
        }

         $ImageItemDelete->delete();
         return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
            $request->validate([
                'title'=>'required',
                'featured_image'=>'nullable|sometimes',
            ]);

            $gallery->title = $request->title;
            $gallery->designation = $request->designation;
            $gallery->active = $request->active ? true:false;
            if ($request->hasFile('featuredImage')) {
                $old_file = 'galleries/' . $gallery->featured_image;
                if (Storage::disk('public')->exists($old_file)) {
                    Storage::disk('public')->delete($old_file);
                }
                $file = $request->featuredImage;
                $ext = "." . $file->getClientOriginalExtension();
                $imageName = time() . $ext;
                Storage::disk('public')->put('galleries/' . $imageName, File::get($file));
                $gallery->featured_image = $imageName;
            }

            $gallery->editedby_id =Auth::id();
            $gallery->save();


            // if($request->hasfile('extraImages'))
            // {

            //    foreach($request->file('extraImages') as $file)
            //    {
            //         $galleryItem = new GalleryItem();
            //         $old_file = 'gallery_items/' . $galleryItem->image;
            //         if (Storage::disk('public')->exists($old_file)) {
            //             Storage::disk('public')->delete($old_file);
            //         }
            //         $imageName = rand(111111,999999).time().'.'.$file->getClientOriginalExtension();
            //         Storage::disk('public')->put('gallery_items/' . $imageName, File::get($file));
            //         $galleryItem->gallery_id = $gallery->id;
            //         $galleryItem->image = $imageName;
            //         $galleryItem->description = $gallery->description;
            //         $galleryItem->editedby_id = Auth::id();
            //         $galleryItem->save();
            //    }

            // }
            return back()->with("success","Gallery Upadated Successfuly");
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->featured_image) {
            $old_file = 'galleries/' . $gallery->featured_image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
        }
        // foreach($gallery->images as $image){

        //     $old_file = 'gallery_items/' . $image->image;
        //     if (Storage::disk('public')->exists($old_file)) {
        //         Storage::disk('public')->delete($old_file);
        //     }
        //     $image->delete();

        // }
        $gallery->delete();
        return back()->with("success","Gallery Delated Successfuly");
    }
}
