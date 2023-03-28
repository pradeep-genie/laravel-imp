<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadFileController extends Controller
{
   public function index(){

      $image_details = Image::get();

    return view('frontend/photos/index',['image_details'=>$image_details]);
   }

   public function create(){

      return view('frontend/photos/upload');
   }

   public function upload(Request $request){

      if (isset($request->image_id) && $request->image_id != null) {

      $update_image = Image::find($request->image_id);
      $update_image->name = $request->name;

      if($request->hasfile('image')){

         $destination = 'public/uploads/'. $update_image->image;
         if(File::exists($destination)){

            File::delete($destination);
         }
         $file = $request->file('image');
         $extention = $file->getClientOriginalExtension();
         $filename= time().'.'.$extention;
         $file->move('public/uploads/',$filename);
         $update_image->image = $filename;
      }
      $update_image->save();

      return redirect()->route('photos.index');

     }else{

      $image_data = new Image();
      $image_data->name = $request->name;
      if($request->hasfile('image')){

         $file = $request->file('image');
         $extention = $file->getClientOriginalExtension();
         $filename= time().'.'.$extention;
         $file->move('public/uploads/',$filename);
         $image_data->image = $filename;
      }
      $image_data->save();
      
      return redirect()->route('photos.index');
     }


   }

   public function edit($id){

      $edit_image = Image::find($id);
      return view('frontend/photos/upload',['edit_image'=>$edit_image]);
   }

   public function delete($id){
      $delete_image = Image::find($id)->delete();
      return redirect()->back();
   }
}