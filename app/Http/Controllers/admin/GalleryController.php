<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\model\gallery_image;
use Validator;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function create(){
      $data['gallery']=gallery_image::all();
      $data['page_title']='Gallery Section';
      $data['assets_admin']=url('assets/admin');
      return view('admin.gallery.add_gallery',$data);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'gallery_image' => 'required|max:7400',
        ]);
        if($validator) {
            $gallery_image = new gallery_image;
            $number=random_int( 1, 9999 );
            $date=date('Y-m-d');
            $gallery_image->title="image_".$date.'_'.$number;
            $gallery_image->save();
            $file = rami_file_uploading($request->file('gallery_image'), 'gallery', $gallery_image->id, '');
            $gallery_image->image = $file;
            $gallery_image->save();
            return response()->json(['status' => 'success'], 200);
        }else{
            return response()->json(['status' => 'fail'], 400);
        }
    }
    public function edit_image($id) {
      $data['gallery_image'] = gallery_image::find($id);
      $data['page_title'] = 'Edit Gallery Image';
      $data['assets_admin'] = url('assets/admin');
      return view('admin.gallery.edit_gallery', $data);
    }
    public function update_image(Request $request, $id) {
      $gallery_image = gallery_image::find($id);
      $messages = [
      ];
      $this->validate($request, [
        'title' => 'required',
        'gallery_image' => 'max:7400',
      ], $messages);
      $gallery_image->title = $request->title;
      $gallery_image->sequence = $request->sequence;
      $gallery_image->save();
      if ($gallery_image->id) {
        if ($request->file('gallery_image')) {
          $image = rami_file_uploading($request->file('gallery_image'), 'gallery', $gallery_image->id, '');
          $gallery_image->image = $image;
          $gallery_image->save();
        }
      }
      set_flash_msg('flash_success', 'Gallery Image Updated Successsfully.');
      return redirect('admin/gallery/' . $gallery_image->id);
    }
    public function delete_image($id) {
      $gallery_image = gallery_image::find($id);
      rami_get_file_delete($gallery_image->image);
      $gallery_image->delete();
      set_flash_msg('flash_success', 'Hotel Image Deleted Successsfully.');
      return redirect('admin/gallery');
    }
}