<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function index()
    {
        menuSubmenu('publishers','allPublishers');
        $data['publishers'] = Publisher::paginate(50);
        return view('admin.publishers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('publishers','createPublishers');
        return view('admin.publishers.create');
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
               'name_en'=> 'string|required',
               'image'=> 'required|image',
           ]);


           $department = new Publisher();
           $department->name_en = $request->name_en;
           $department->name_bn = $request->name_bn ?? null;
           $department->excerpt_en = $request->excerpt_en;
           $department->excerpt_bn = $request->excerpt_bn ?? null;
           $department->featured = $request->featured ? true:false;

           if ($request->hasFile('image')) {
               $file = $request->image;
               $ext = "." . $file->getClientOriginalExtension();
               $imageName = time() . $ext;
               Storage::disk('public')->put('department_images/' . $imageName, File::get($file));
               $department->image = $imageName;
           }

           $department->addedby_id = Auth::id();
           $department->save();
           return redirect()->route('publishers.index')->with("success","Publisher Created Successfuly");


    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        menuSubmenu('publishers','allpublishers');
        $data['publishers'] = Publisher::find($id);
        return view('admin.publishers.edit',$data);
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
        $request->validate([
            'name_en'=> 'string|required',
            'image'=>'nullable|sometimes',
        ]);


        $department = Publisher::find($id);
        $department->name_en = $request->name_en;
        $department->name_bn = $request->name_bn ?? null;
        $department->excerpt_en = $request->excerpt_en;
        $department->excerpt_bn = $request->excerpt_bn ?? null;
        $department->featured = $request->featured ? true:false;
        $department->active = $request->active ? true:false;

        if ($request->hasFile('image')) {
            $old_file = 'department_images/' . $department->image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('department_images/' . $imageName, File::get($file));
            $department->image = $imageName;
        }

        $department->editedby_id = Auth::id();
        $department->save();
        return redirect()->back()->with("success","Publisher Update Successfuly");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Publisher::find($id);
        if ($department->image) {
            $old_file = 'department_images/' . $department->image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
        }

        $department->delete();
        return back()->with("success","Department Delated Successfuly");
    }




    public function publishersActive(Request $request)
    {
        if($request->mode=='true'){
            DB::table('publishers')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('publishers')->where('id',$request->id)->update(['active'=>0]);
        }
        return response()->json(['msg'=>'Successfully updated Publisher','status'=>true]);
    }
}
