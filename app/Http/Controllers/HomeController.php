<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Folder;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $folders = Folder::orderBy('created_at', 'DESC')->withCount('images')->paginate(20);

        return view('home', compact('folders', 'countFolders'));
    }

    // Show form to store folders.
    public function create()
    {
        return view('create');
    }

    // Store new Folder
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg',
            'imagenames' => 'required',
        ]);
        $validator->setAttributeNames(['imagenames'=>'images']);
        $validator->validate();

        $folder = new Folder;
        $folder->user_id = Auth::user()->id;
        $folder->name = $input['name'];
        $folder->description = $input['description'];
        $folder->save();

        $images = $request->file('images');
        $imagenames = $input['imagenames'];

        foreach ($images as $img){
            if (in_array($img->getClientOriginalName(), $imagenames)) {
                $img_stored = $this->storeImage($folder, $img);
            }
        }

        return response()->json(['success'=>'Images Has Been Uploaded Successfully']);
    }

    // Function to store images
    private function storeImage($folder, $image) {
        $path = Auth::user()->email.'/'.$folder->name.'/'.$image->getClientOriginalName();
        Storage::disk('s3')->put($path, file_get_contents($image));

        $img_stored = new Image;
        $img_stored->folder_id = $folder->id;
        $img_stored->filename = $image->getClientOriginalName();
        $img_stored->path = $path;
        $img_stored->save();

        return $img_stored;
    }

    // View the folder details
    public function show($id)
    {
        $folder = Folder::findorfail($id);
        
        return view('view', compact('folder'));
    }

    // Show form to update folder details.
    public function edit($id)
    {
        $folder = Folder::findorfail($id);

        return view('edit', compact('folder'));
    }

    // Update the Folder
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'images' => 'required',
        ]);
        $validator->setAttributeNames(['imagenames'=>'images']);
        $validator->validate();

        $folder = Folder::findorfail($id);

        // If the folder's name is changed, move files to new folders.
        if ($input['name'] != $folder->name) {
            $s3Files = Storage::disk('s3')->allFiles(Auth::user()->email.'/'.$folder->name);

            // Move each file to a new directory.
            foreach ($s3Files as $file) {
                $image = Image::where('path', $file)->first();
                $newPath = Auth::user()->email.'/'.$input['name'].'/'.$image->filename;
                $image->path = $newPath;
                $image->save();

                Storage::disk('s3')->move($file, $newPath);
            }

            // Delete previous directory.
            Storage::disk('s3')->deleteDirectory(Auth::user()->email.'/'.$folder->name);
        }

        $folder->name = $input['name'];
        $folder->description = $input['description'];

        // User has uploaded new images.
        if ($request->has('imagenames')){
            // Deletes previous Images
            foreach ($folder->images as $image) {
                Storage::disk('s3')->delete(Auth::user()->email.'/'.$folder->name.'/'.$image->filename);
                $image->delete();
            }

            // Upload new Images
            $images = $request->file('images');
            $imagenames = $input['imagenames'];
            foreach ($images as $img){
                if (in_array($img->getClientOriginalName(), $imagenames)) {
                    $img_stored = $this->storeImage($folder, $img);
                }
            }
        // User has deleted some existing images.
        } else if (count($input['images']) != count($folder->images)) {
            foreach ($folder->images as $image) {
                if (!in_array($image->filename, $input['images'])) {
                    Storage::disk('s3')->delete(Auth::user()->email.'/'.$folder->name.'/'.$image->filename);
                    $image->delete();
                }
            }
        }

        $folder->save();

        return response()->json(['success'=>'Images Has Been Uploaded Successfully']);
        // return redirect('folders');
    }

    // Delete a specific folder
    public function destroy($folder_id)
    {
        $folder = Folder::findorfail($folder_id);

        // Delete folder on s3 bucket
        Storage::disk('s3')->deleteDirectory(Auth::user()->email.'/'.$folder->name);

        // Delete data on database
        $folder->delete();

        return redirect('folders');
    }
}