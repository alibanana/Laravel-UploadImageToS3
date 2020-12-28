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

    // Store Images
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

        // return redirect('/home')->with('success', 'A new folder has been created successfully!');
        return response()->json(['success'=>'Images Has Been Uploaded Successfully']);
    }

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

    // View the folder's images
    public function show($id)
    {
        $folder = Folder::findorfail($id);
        
        return view('view', compact('folder'));
    }

    // Show form to update folder details.
    public function editFolder()
    {
        return view('edit');
    }

    
}
