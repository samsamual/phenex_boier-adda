<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Show all authors
    public function index()
    {
        menuSubmenu('authors','allAuthors');
        $data['authors'] = Author::latest()->paginate(10);
        return view('admin.authors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
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
        'name'  => 'required|string|max:255',
        'phone' => 'nullable|string|max:15',
        'email' => 'nullable|email|max:255',
        'bio'   => 'nullable|string',
        'img'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $author = new Author();
    $author->name = $request->name;
    $author->phone = $request->phone;
    $author->email = $request->email;
    $author->bio = $request->bio;
    $author->active = $request->has('active') ? 1 : 0;
    $author->addedby_id = Auth::id();

    // if ($request->hasFile('img')) {
    //     $file = $request->file('img');
    //     $filename = time() . '.' . $file->getClientOriginalExtension();
    //     $file->move(public_path('uploads/author_images'), $filename);
    //     // $author->img = 'uploads/author_images/' . $filename;
    //     $author->img =  $filename;
    // }

    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // Store file in storage/app/public/author_img
        $file->storeAs('public/author_img', $filename);

        // Save relative path for easy display
        // $author->img = 'storage/author_img/' . $filename;
        $author->img = $filename;
    }


    $author->save();

    return redirect()->route('authors.index')->with('success', 'Author created successfully!');
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
        menuSubmenu('authors', 'allAuthors');
        $data['author'] = Author::findOrFail($id);
        return view('admin.authors.edit', $data);
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
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'bio' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $author = Author::findOrFail($id);
        $author->name = $request->name;
        $author->phone = $request->phone;
        $author->email = $request->email;
        $author->bio = $request->bio;
        $author->active = $request->has('active') ? 1 : 0;
        $author->editedby_id = Auth::id();

        // Handle new image upload
        if ($request->hasFile('img')) {
            // Delete old file if exists
            if ($author->img && Storage::disk('public')->exists('author_img/' . basename($author->img))) {
                Storage::disk('public')->delete('author_img/' . basename($author->img));
            }

            // Store new image in storage/app/public/author_img
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/author_img', $filename);

            // Save relative path for web access
            // $author->img = 'storage/author_img/' . $filename;
            $author->img = $filename;
        }

        $author->save();

        return redirect()->back()->with('success', 'Author updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Author::find($id);
        if ($department->image) {
            $old_file = 'department_images/' . $department->image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
        }

        $department->delete();
        return back()->with("success","Department Delated Successfuly");
    }

    public function authorsActive(Request $request)
    {
        if($request->mode=='true'){
            DB::table('authors')->where('id',$request->id)->update(['active'=>1]);
        }
        else{
            DB::table('authors')->where('id',$request->id)->update(['active'=>0]);
        }
        return response()->json(['msg'=>'Successfully updated Publisher','status'=>true]);
    }
}