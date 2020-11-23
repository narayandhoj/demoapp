<?php

namespace Modules\Users\Controllers;

use Auth;
use Hash;
use Validator;
use Illuminate\Http\Request;
use App\Classes\FileHelper;

use App\Http\Controllers\Controller;
use Modules\Users\Repositories\UsersRepository;
use Modules\Users\Repositories\ImagesRepository;

class ImagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  consumersRepository  $contents
     * @return void
     */
    public function __construct(UsersRepository $users, ImagesRepository $images){
        $this->images = $images;
        $this->filehelper = new FileHelper();
        $this->upload_path = 'uploads/images/';
    }

    public function index()
    {
        $user = Auth::user();
        $images = $user->images()->paginate(1);
        return view('Users::images')->with([
            'images' => $images
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $rules = [
            'images' => 'required',
        ];

        $validator = Validator::make($data,$rules);

        if($validator->fails()){
            return redirect()->back()->withWarningMessage('Images required');
        }

        $images = $request->file('images');
        $files = $this->filehelper->uploadMultiple($images,$this->upload_path);
        $image_data = [];

        foreach ($files as $key => $value) {
            $row = array('image' => $value);
            $image_data[] = $row;
        }

        $user->images()->createMany($image_data);

        return redirect()->back()->withSuccessMessage('Uploaded');
    }

    public function destroy($id)
    {
        $image = $this->images->find($id);

        if($image){
            $image->delete();
            return redirect()->back()->withSuccessMessage('Deleted');
        }
    }   
}