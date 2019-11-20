<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\model\Location;
use App\model\location_display_setting;
use App\model\location_page_content;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Location';
        $data['locations']=Location::all();
        $data['all_count']=Location::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.location.all_locations',$data);
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main_locations']=Location::where(['loc_par'=>0])->get();
        $data['page_title']='Add Location';
        $data['loc_par']='';
        $data['assets_admin']=url('assets/admin');
        return view('admin.location.add_location',$data);
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loc=new Location;
        $messages = [
            'loc_name.required' =>'Please enter Location Name.',
            'loc_des.required'=>'Please enter Location Discription.'
        ];
        $valid_array=array(
                    'loc_name' => 'required|unique:locations|max:100',
                    'location_map'  => 'image|max:2048',
                    'loc_short_code'=>'required|max:4|unique:locations'
                    );       
        if($request->sub_location==1){
                 $valid_array['main_location']='required';  
        }
        $this->validate($request,$valid_array,$messages);
        $loc->loc_name=$request->loc_name;
        $loc->loc_des=$request->loc_des;
        $loc->loc_lat=$request->lat;
        $loc->loc_lng=$request->lng;
        $loc->loc_par=$request->main_location;
        $loc->loc_short_code=$request->loc_short_code;
        if(empty($loc->loc_par)){
          $loc->loc_par=0;  
        }       
        $loc->save();
        if($loc->id){
            if($request->file('location_map')){
                $loc_img=rami_file_uploading($request->file('location_map'), 'location', $loc->id, '');
                $loc->loc_map=$loc_img;
                $loc->save();
            }
        }
        set_flash_msg('flash_success','Location Inserted Successsfully.');
        return redirect('admin/location');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['location']=Location::find($id);
        $data['local_main_check']='';
        $data['loc_par']='';
        if($data['location']->loc_par!=0){
          $data['local_main_check']='checked="true"';
          $data['loc_par']=$data['location']->loc_par;
        }
        $data['main_locations']=Location::where(['loc_par'=>0])->get();
        $data['page_title']='Edit Location';
        $data['assets_admin']=url('assets/admin');
        return view('admin.location.edit_location',$data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loc=Location::find($id);
        $messages = [
            'loc_name.required' =>'Please enter Location Name.',
            'loc_des.required'=>'Please enter Location Discription.'
        ]; 
        $valid_array=array(
                    'loc_name' => 'required|max:100',
                    'location_map'  => 'image|max:2048',
                    'loc_short_code'=>'required|max:4'
                    );       
        if($request->sub_location==1){
                 $valid_array['main_location']='required';  
        }
        $this->validate($request,$valid_array,$messages);
        $loc->loc_name=$request->loc_name;
        $loc->loc_des=$request->loc_des;
        $loc->loc_lat=$request->lat;
        $loc->loc_lng=$request->lng;
        $loc->loc_short_code=$request->loc_short_code;
        $loc->loc_par=$request->main_location;
        if(empty($loc->loc_par)){
          $loc->loc_par=0;  
        } 
        $loc->save();
        if($loc->id){
            if($request->file('location_map')){
                if(!empty($loc->loc_map)){
                    rami_get_file_delete($loc->loc_map);
                }
                $loc_img=rami_file_uploading($request->file('location_map'), 'location', $loc->id, '');
                $loc->loc_map=$loc_img;
                $loc->save();
            }
        }
        set_flash_msg('flash_success','Location Updated Successsfully.');
        return redirect('admin/location');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loc = Location::find($id);
        $loc->delete();
        location::del_child_locatons($id);
        set_flash_msg('flash_success','location Deleted Successsfully.');
        return redirect('admin/location');
    }
    public function loc_pkg_setting($loc_id,$pkg_type)
    {      
        $data['loc_id']=$loc_id;
        $data['pkg_type']=$pkg_type;
        $data['page_title']='Location Package Settings';
        $data['assets_admin']=url('assets/admin');
        $data['all_count']=location_display_setting::where([['loc_id',$data['loc_id']],['pkg_type',$data['pkg_type']]])->get()->count();
        $data['all_pkg_settings']=location_display_setting::where([['loc_id',$data['loc_id']],['pkg_type',$data['pkg_type']]])->get();
        return view('admin/location/all_loc_pkg_dis_setting',$data);
    }
    public function loc_pkg_setting_create($loc_id,$pkg_type)
    {     
        $data['loc_id']=$loc_id;
        $data['pkg_type']=$pkg_type;
        $data['form_url']=url('admin/location/'.$loc_id.'/package-setting/'.$pkg_type);
        $data['page_title']='Add Setting';
        $data['all_locations']=Location::all();
        $data['assets_admin']=url('assets/admin');
        return view('admin/location/add_loc_pkg_dis_setting',$data);
    }
    public function store_loc_pkg_setting(Request $request,$loc_id,$pkg_type)
    {
        $loc_pkg_setting = new location_display_setting;
        $loc_pkg_setting->loc_id=$request->loc_id;
        $loc_pkg_setting->pkg_type=$request->pkg_type;
        $loc_pkg_setting->title=$request->title;
        $loc_pkg_setting->month=$request->month;
        $loc_pkg_setting->no_of_package_show=$request->no_of_package_show;
        $loc_pkg_setting->sequence=$request->sequence;
        $loc_pkg_setting->skip_date=$request->skip_date;
        $loc_pkg_setting->save();      
        set_flash_msg('flash_success','Setting Inserted Successsfully.');
        return redirect('admin/location/'.$loc_id.'/package-setting/'.$pkg_type);
    }
    public function loc_pkg_setting_edit($pkg_type,$set_id)
    {
        $data['loc_pkg_setting']=location_display_setting::find($set_id);
        $data['form_url']=url('admin/package-setting/'.$data['loc_pkg_setting']->pkg_type.'/update/'.$set_id);
        $data['page_title']='edit Setting';
        $data['assets_admin']=url('assets/admin');
        return view('admin/location/edit_loc_pkg_dis_setting',$data);
    }
    
    public function update_loc_pkg_setting(Request $request,$pkg_type,$set_id)
    {
        $loc_pkg_setting = location_display_setting::find($set_id);      
        $loc_pkg_setting->title=$request->title;
        $loc_pkg_setting->month=$request->month;
        $loc_pkg_setting->no_of_package_show=$request->no_of_package_show;
        $loc_pkg_setting->sequence=$request->sequence;
        $loc_pkg_setting->skip_date=$request->skip_date;
        $loc_pkg_setting->save();
        set_flash_msg('flash_success','Setting updated Successsfully.');
        return redirect('admin/location/'.$loc_pkg_setting->loc_id.'/package-setting/'.$pkg_type);
    }
    public function delete_pkg_setting($id)
    {
        $loc_pkg_setting = location_display_setting::find($id); 
        $loc_pkg_setting->delete();
        set_flash_msg('flash_success','location package setting Deleted Successsfully.');
        return redirect('admin/location/'.$loc_pkg_setting->loc_id.'/package-setting/'.$loc_pkg_setting->pkg_type);
    }    
    public function add_loc_page_content($loc_id,$pkg_type)
    {
        $data['page_content']=location_page_content::where([['loc_id',$loc_id],['pkg_type',$pkg_type]])->get()->first();
        $data['loc_id']=$loc_id;
        $data['pkg_type']=$pkg_type;
        $data['page_title']='Add Page Content';        
        $data['assets_admin']=url('assets/admin');
        return view('admin.location.add_loc_page_content',$data);
    }
    public function save_loc_page_content(Request $request,$loc_id,$pkg_type)
    {
        $location_page_content=location_page_content::where([['loc_id',$loc_id],['pkg_type',$pkg_type]])->get()->first();
        if(!empty($location_page_content)){
            $location_page_content=location_page_content::where([['loc_id',$loc_id],['pkg_type',$pkg_type]])->get()->first();
        }else{
            $location_page_content=new location_page_content;
        }
        $location_page_content->loc_id=$request->loc_id;
        $location_page_content->pkg_type=$request->pkg_type;
        $location_page_content->page_title=$request->page_title;
        $location_page_content->page_disc=$request->page_disc;
        $location_page_content->save();
        set_flash_msg('flash_success','location Page Content updated successfully');
        return redirect('admin/location/'.$loc_id.'/package-setting/'.$pkg_type);
    }
    public function add_location_hotel_meta_data($id)
    {
        $data['location']=location::find($id);
        if(empty($data['location'])){
            set_flash_msg('flash_error','location not found.');
            return redirect('admin/location');
        }
        $data['page_title']='Add location Hotel Meta data';
        $data['assets_admin']=url('assets/admin');
        return view('admin.location.add_location_hotel_meta_data',$data);
    }
    public function save_location_hotel_meta_data(Request $request,$id)
    {
        $location=location::find($id);
        $location->loc_hotel_slug=$request->loc_hotel_slug;
        $location->loc_hotel_title_text=$request->loc_hotel_title_text;
        $location->loc_hotel_header_custom_code=$request->loc_hotel_header_custom_code;
        $location->loc_hotel_footer_custom_code=$request->loc_hotel_footer_custom_code;
        $location->save();
        set_flash_msg('flash_success','location Hotel Meta data updated successfully');
        return redirect('admin/location/hotelmeta/'.$id);
    }
    public function add_location_flight_meta_data($id)
    {
        $data['location']=location::find($id);
        if(empty($data['location'])){
            set_flash_msg('flash_error','location not found.');
            return redirect('admin/location');
        }
        $data['page_title']='Add location flight Meta data';
        $data['assets_admin']=url('assets/admin');
        return view('admin.location.add_location_flight_meta_data',$data);
    }
    public function save_location_flight_meta_data(Request $request,$id)
    {
        $location=location::find($id);
        $location->loc_flight_slug=$request->loc_flight_slug;
        $location->loc_flight_title_text=$request->loc_flight_title_text;
        $location->loc_flight_header_custom_code=$request->loc_flight_header_custom_code;
        $location->loc_flight_footer_custom_code=$request->loc_flight_footer_custom_code;
        $location->save();
        set_flash_msg('flash_success','location Flight Meta data updated successfully');
        return redirect('admin/location/flightmeta/'.$id);
    }
    public function add_location_package_meta_data($id)
    {
        $data['location']=location::find($id);
        if(empty($data['location'])){
            set_flash_msg('flash_error','location not found.');
            return redirect('admin/location');
        }
        $data['page_title']='Add location flight Meta data';
        $data['assets_admin']=url('assets/admin');
        return view('admin.location.add_location_package_meta_data',$data);
    }
    public function save_location_package_meta_data(Request $request,$id)
    {
        $location=location::find($id);
        $location->loc_package_slug=$request->loc_package_slug;
        $location->loc_package_title_text=$request->loc_package_title_text;
        $location->loc_package_header_custom_code=$request->loc_package_header_custom_code;
        $location->loc_package_footer_custom_code=$request->loc_package_footer_custom_code;
        $location->save();
        set_flash_msg('flash_success','location Package Meta data updated successfully');
        return redirect('admin/location/packagemeta/'.$id);
    }

}