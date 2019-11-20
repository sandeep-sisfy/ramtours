<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hotel;
use App\model\room;
use App\model\hotel_type;
use App\model\hotel_amenity;
use App\model\hotel_feature;
use App\model\Location;
use App\model\hotel_image;
use App\model\card;
use Validator;

class HotelController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Hotels';
        $data['hotels']=hotel::all();
        $data['all_count']=hotel::all()->count();
        $data['trash_count']=hotel::onlyTrashed()->count();
        $data['locations']=Location::all();
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel.all_hotel',$data);
    }
    /**
    * Show the form for creating a new resource.
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $data['page_title']='Add hotel';
        $data['hotel_types']=hotel_type::all();
        $data['amenities']=hotel_amenity::all();
        $data['features']=hotel_feature::all();
        $data['cards']=card::all();
        $data['main_locations']=Location::where(['loc_par'=>0])->get();
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel.add_hotel',$data);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $hotel=new hotel;
      $messages = [           
      ];
      $this->validate($request, [
        'hotel_name' => 'required|unique:hotels',
        'hotel_display_name' => 'required',
        'hotel_type' => 'required',
        'hotel_location' => 'required',
      ], $messages);
      $hotel->hotel_name=$request->hotel_name;
      $hotel->hotel_display_name=$request->hotel_display_name;
      $hotel->hotel_code=$request->hotel_code;
      $hotel->hotel_star=$request->hotel_star;
      $hotel->hotel_address=$request->hotel_address;
      $hotel->hotel_type=serialize($request->hotel_type);
      $hotel->hotel_amenities=serialize($request->hotel_amenities);
      $hotel->hotel_features=serialize($request->hotel_features);
      $hotel->hotel_contact=$request->hotel_contact;
      $hotel->hotel_email=$request->hotel_email;
      $hotel->hotel_website=$request->hotel_website;
      $hotel->hotel_location=$request->hotel_location;
      $hotel->tourist_tax=$request->tourist_tax;
      $hotel->place_payment_tax=$request->place_payment_tax;
      $hotel->hotel_vac_apartment=$request->hotel_vac_apartment;
      $hotel->hotel_desc=$request->hotel_desc;
      $hotel->additional_comment=$request->additional_comment;
      $hotel->infant_price=$request->infant_price;
      $hotel->infant_price_currency=$request->infant_price_currency;
      $hotel->hotel_card=$request->hotel_card;
      $hotel->hotel_include_local_tax=$request->hotel_include_local_tax;
      $hotel->hotel_instruction_text=$request->hotel_instruction_text;      
      $hotel->save();
      /*$hotel->id;
      $location_code=Location::find($hotel->hotel_location)->loc_short_code;
      if(empty($location_code)){
        $location_code='AAAA';
      }
      $hotel->hotel_code=sprintf($location_code.'%04d', $hotel->id);*/
      $hotel->save();             
      if($request->go_to_next_page==0){
        set_flash_msg('flash_success','Hotel Inserted Successfully.');
        return redirect('admin/hotel'); 
      }else{
        set_flash_msg('flash_success','Hotel Inserted Successsfully.Please add his galary');
        return redirect('admin/hotel/gallery/'.$hotel->id);             
      } 
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
      $data['hotel']=hotel::find($id);
      $data['hotel_types']=hotel_type::all();
      $data['amenities']=hotel_amenity::all();
      $data['features']=hotel_feature::all();
      $data['cards']=card::all();
      $data['main_locations']=Location::where(['loc_par'=>0])->get();
      $data['page_title']='Edit hotel';
      $data['assets_admin']=url('assets/admin');
      return view('admin.hotel.edit_hotel',$data);
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hotel=hotel::find($id);
        $messages = [
            
        ];
        $this->validate($request, [
            'hotel_name' => 'required',
            'hotel_display_name' => 'required',
            'hotel_type' => 'required',
            'hotel_location' => 'required',
        ], $messages);         
        $hotel->hotel_name=$request->hotel_name;
        $hotel->hotel_display_name=$request->hotel_display_name;
        $hotel->hotel_code=$request->hotel_code;
        $hotel->hotel_star=$request->hotel_star;
        $hotel->hotel_address=$request->hotel_address;
        $hotel->hotel_type=serialize($request->hotel_type);
        $hotel->hotel_amenities=serialize($request->hotel_amenities);
        $hotel->hotel_features=serialize($request->hotel_features);
        $hotel->hotel_contact=$request->hotel_contact;
        $hotel->hotel_email=$request->hotel_email;
        $hotel->hotel_website=$request->hotel_website;
        $hotel->hotel_desc=$request->hotel_desc;
        $hotel->additional_comment=$request->additional_comment;
        $hotel->hotel_location=$request->hotel_location;
        $hotel->tourist_tax=$request->tourist_tax;
        $hotel->place_payment_tax=$request->place_payment_tax;
        $hotel->hotel_vac_apartment=$request->hotel_vac_apartment;
        $hotel->infant_price=$request->infant_price;
        $hotel->infant_price_currency=$request->infant_price_currency;
        $hotel->hotel_card=$request->hotel_card;
        $hotel->hotel_include_local_tax=$request->hotel_include_local_tax;
        $hotel->hotel_instruction_text=$request->hotel_instruction_text;
         /*if(!empty($hotel->hotel_location)){
            $location_code=Location::find($hotel->hotel_location)->loc_short_code;
            if(empty($location_code)){
              $location_code='AAAA';
            }
            $hotel->hotel_code=sprintf($location_code.'%04d', $id);
        }*/
        $hotel->save();
        if($request->go_to_next_page==0){
            set_flash_msg('flash_success','Hotel Updated Successsfully.');
            return redirect('admin/hotel/'.$id.'/edit');
        }else{
            set_flash_msg('flash_success','Hotel Updated Successsfully.Please add his gallary');
            return redirect('admin/hotel/gallery/'.$hotel->id);
        }        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = hotel::find($id);
        $hotel->delete();
        set_flash_msg('flash_success','Hotel Privated Successsfully.');
        return redirect('admin/hotel');
    }
    public function destroy_image($id) {
      $hotel_image = hotel_image::find($id);
      rami_get_file_delete($hotel_image->image);
      $hotel_image->delete();
      set_flash_msg('flash_success', 'Hotel Image Deleted Successsfully.');
      return redirect('admin/hotel/gallery/' . $hotel_image->hotel_id);
    }
    public function gallery($id){
      $data['hotel']=hotel_image::where(['hotel_id'=>$id])->orderBy('sequence','DESC')->get();
      $data['hotel_id']=$id;
      $data['page_title']='Edit hotel';
      $data['assets_admin']=url('assets/admin');
      return view('admin.hotel.gallery',$data);
     }
    public function edit_image($id) {
      $data['hotel_image'] = hotel_image::find($id);
      $data['page_title'] = 'Edit hotel Image';
      $data['assets_admin'] = url('assets/admin');
      return view('admin.hotel.edit_hotel_image', $data);
    }
  public function update_image(Request $request, $id) {
      $hotel_image = hotel_image::find($id);
      $messages = [
      ];
      $this->validate($request, [
        'title' => 'required',
        'sequence' => 'required',
        'hotel_image' => 'image|max:2048',
      ], $messages);
      $hotel_image->title = $request->title;
      $hotel_image->sequence = $request->sequence;
      $hotel_image->save();
      if ($hotel_image->id) {
        if ($request->file('hotel_image')) {
          $car_img = rami_file_uploading($request->file('hotel_image'), 'hotel', $hotel_image->id, '');
          $hotel_image->image = $car_img;
          $hotel_image->save();
        }
      }
      set_flash_msg('flash_success', 'Hotel Image Updated Successsfully.');
      return redirect('admin/hotel/gallery/' . $hotel_image->hotel_id);
    }
    public function add_image(Request $request, $id) {
        $hotel=hotel::find($id);
        //$this->checking_user_owenership($data['listing']->user_id);
        $validator = Validator::make($request->all(), [
            'hotel_image' => 'required|image|max:2048',
        ]);
        if ($validator) {
            if(empty($hotel)){
                return response()->json(['status' => 'fail'], 400);
            }
            $image = new hotel_image;
            $image->hotel_id = $id;
            $image->title = $hotel->hotel_name;
            $image->save();
            $file = rami_file_uploading($request->file('list_image'), 'hotel', $image->id, '');
            $image->image = $file;
            $image->save();
            return response()->json(['status' => 'success'], 200);
        } else {
            return response()->json(['status' => 'fail'], 400);
        }
    }
    public function get_hotel_from_loc(Request $request) {
        $locs=get_location_all_child_location($request->loc_id); 
        $locs[]=$request->loc_id;
        $hotel = hotel::whereIn('hotel_location',  $locs)->get(['id', 'hotel_code']);
        if (!empty($hotel)){
            return response()->json(array('hotel' => $hotel, 'status' => 'success'), 200);
        } else {
            return response()->json(array('msg' => 'No Record Found', 'status' => 'error'), 200);
        }
    }
    public function get_hotel_room(Request $request) {
        $room = room::where([['room_hotel', $request->hotel_id]])->get(['id', 'room_title']);
        if (!empty($room)) {
            return response()->json(array('room' => $room, 'status' => 'success'), 200);
        } else {
            return response()->json(array('msg' => 'No Record Found', 'status' => 'error'), 200);
        }
    }
    public function trash_hotel(){
        $data['page_title']='All Trash Hotel';
        $data['trash_hotel']=hotel::onlyTrashed()->get();
        $data['all_count']=hotel::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');        
        return view('admin.hotel.all_trashed_hotel',$data);     
    }
    public function restore_trash_hotel(){
        $hotel=hotel::onlyTrashed()->restore();
        if(!empty($hotel)){
          set_flash_msg('flash_success','Trash hotel Restore Successsfully.');
            return redirect('admin/hotel');  
        }else{
           set_flash_msg('flash_error','Trash hotel not Found for Restore.');
           return redirect('admin/hotel/trash');
        }
    }
    public function restore_single_hotel($id){        
        $hotel=hotel::onlyTrashed()->where(['id'=>$id])->restore();
        if(!empty($hotel)){
          set_flash_msg('flash_success','Trash hotel Restore Successsfully.');
            return redirect('admin/hotel');  
        }else{
           set_flash_msg('flash_error','Trash hotel not Found for Restore.');
           return redirect('admin/hotel/trash');
        }
    }
    public function force_delete_hotel($id){
        $hotel= hotel::onlyTrashed()->where(['id'=>$id]);
        $hotel->forceDelete();
        set_flash_msg('flash_success','hotel deleted Successfully.');
        return redirect('admin/hotel/trash');
    }
    public function force_delete_all(){
        hotel::onlyTrashed()->forceDelete();        
        set_flash_msg('flash_success','All hotel deleted successfully');
        return redirect('admin/hotel/trash');
    }
    public function add_hotel_meta_data($id)
    {
        $data['hotel']=hotel::find($id);
        if(empty($data['hotel'])){
            set_flash_msg('flash_error','hotel not found.');
            return redirect('admin/hotel');
        }
        $data['page_title']='Add hotel meta data';        
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel.add_hotel_meta_data',$data);
    }
    public function save_hotel_meta_data(Request $request,$id)
    {
        $hotel=hotel::find($id);
        $hotel->hotel_title_text=$request->hotel_title_text;
        $hotel->hotel_header_custom_code=$request->hotel_header_custom_code;
        $hotel->hotel_footer_custom_code=$request->hotel_footer_custom_code;
        $hotel->slug=$request->slug;
        $hotel->save();
        set_flash_msg('flash_success','hotel Meta data updated successfully');
        return redirect('admin/hotel-meta/'.$id);
    }
}