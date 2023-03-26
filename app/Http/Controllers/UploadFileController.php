<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
   public function index(){
      $image_details = Image::get();
      // dd($image_details);
    return view('frontend/photos/index',['image_details'=>$image_details]);
   }

   public function create(){

      return view('frontend/photos/upload');
   }

   public function upload(Request $request){

      $image = $request->image;
      $name = $image->getClientOriginalName();
      $image->storeAs('public/uploads',$name);

      $image_data = new Image();
      $image_data->name = $request->name;
      $image_data->image = $name;
      $image_data->save();
      return redirect()->back();


   }
}