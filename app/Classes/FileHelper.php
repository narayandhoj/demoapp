<?php 

namespace App\Classes;

use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

Class FileHelper
{
	/**
	 * upload file 
	 * @param  [file] $file [file to upload]
	 * @param  [array] $validTypes [Valid file types]
	 * @param  [string] $path [path to upload file]
	 * @return [string] $file_name [file name to store in db]
	 */
	public function upload($file, $path, $validTypes = null){

		$filename = time().str_replace(' ','_', $file->getClientOriginalName());

		Storage::disk('public')->putFileAs(
		        $path,
		        $file,
		        $filename
		      );

		return $path.$filename;
	}

	public function compressUpload($file, $path, $validTypes = null)
	{
		$filename = time().str_replace(' ','_', $file->getClientOriginalName());

		$img = Image::make($file->getRealPath());

		$mime = explode('/', $img->mime());

		$img->resize(300, 300, function ($constraint) {
		    $constraint->aspectRatio();
		})->encode($mime[1]);

		Storage::disk('public')->put(
		        $path.$filename,
		        $img->__toString()
		      );

		return $path.$filename;
	}

	/**
	 * [uploadMultiple description]
	 * @param  [array] $files      [array of file to be uploaded]
	 * @param  [type] $path       [description]
	 * @param  [type] $validTypes [description]
	 * @return [arrray] $file_name   [array of file names to be stored]
	 */
	public function uploadMultiple($files, $path, $validTypes = null){
		$file_names = [];

		foreach ($files as $key => $file) {
			$filename = time().str_replace(' ','_', $file->getClientOriginalName());

			Storage::disk('public')->putFileAs(
			        $path,
			        $file,
			        $filename
			      );

			$file_names[] = $path.$filename;
		}

		return $file_names;
	}
}
?>