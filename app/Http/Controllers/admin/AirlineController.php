<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\model\airline;
use App\model\flight;
use App\model\flight_schedule;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All AirLine';
        $data['airlines']=airline::all();
        $data['trash_count']=airline::onlyTrashed()->count();
        $data['all_count']=airline::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.airline.all_airline_suplier',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['page_title']='Add Airline';
        $data['assets_admin']=url('assets/admin');
        return view('admin.airline.add_airline_suplier',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $airline=new airline;
        $messages = [
            'airl_title.required' =>'Please enter Airline Name Here.',            
            'airl_name_eng.required'=>'Please enter Airline Name in English.',
            'airl_logo_img.required'=>'Please upload Airline Logo here.'
        ];
        $this->validate($request, [
            'airl_title' => 'required|unique:airlines',
            'airl_name_eng' => 'required',            
            'airl_logo_img'  => 'image|max:2048',
        ], $messages);            
        $airline->airl_title=$request->airl_title;
        $airline->airl_cont_1=$request->airl_cont_1;
        $airline->airl_cont_2=$request->airl_cont_2;
        $airline->airl_email=$request->airl_email;
        $airline->airl_name_eng=$request->airl_name_eng;
        $airline->airl_disc=$request->airl_disc;
        $airline->save();
        if($airline->id){
            if($request->file('airl_logo_img')){
                $airl_logo_img=rami_file_uploading($request->file('airl_logo_img'), 'airline', $airline->id, '');
                $airline->airl_logo_img=$airl_logo_img;
                $airline->save();
            }          
        }
        if($request->go_to_next_page==0){
            set_flash_msg('flash_success','Airline Inserted Successsfully.');
            return redirect('admin/airline/');
        }else{
            set_flash_msg('flash_success','Airline Inserted Successsfully.Please Add Flight for saved Airline.');
            return redirect('admin/flight/create?airline_id='.$airline->id);
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
        $data['airline']=airline::find($id);
        $data['page_title']='Edit Airline';
        $data['assets_admin']=url('assets/admin');
        return view('admin.airline.edit_airline_suplier',$data);
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
        $airline=airline::find($id);
        $messages = [
            'airl_title.required' =>'Please enter Airline Name Here.',            
            'airl_name_eng.required'=>'Please enter Airline Name in English.',
            'airl_logo_img.required'=>'Please upload Airline Logo here.'
        ];
        $this->validate($request, [
            'airl_title' => 'required',
            'airl_name_eng' => 'required',            
            'airl_logo_img'  => 'image|max:2048',
        ], $messages);            
        $airline->airl_title=$request->airl_title;
        $airline->airl_cont_1=$request->airl_cont_1;
        $airline->airl_cont_2=$request->airl_cont_2;
        $airline->airl_email=$request->airl_email;
        $airline->airl_name_eng=$request->airl_name_eng;
        $airline->airl_disc=$request->airl_disc;
        $airline->save();
        if($airline->id){
            if($request->file('airl_logo_img')){
                $airl_logo_img=rami_file_uploading($request->file('airl_logo_img'), 'airline', $airline->id, '');
                $airline->airl_logo_img=$airl_logo_img;
                $airline->save();
            }          
        }       
        if($request->go_to_next_page==0){
            set_flash_msg('flash_success','Airline Updated Successsfully.');
            return redirect('admin/airline/');
        }else{
            set_flash_msg('flash_success','Airline updated Successsfully.Please Add Flight for updated Airline.');
            return redirect('admin/flight/create?airline_id='.$airline->id);
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
        $airline = airline::find($id);
        $airline->delete();
        rami_get_file_delete($airline->airl_logo_img);
        set_flash_msg('flash_success','Airline Deleted Successsfully.');
        return redirect('admin/airline');
    }
    public function get_flight_from_airline(Request $request) {
        if(is_array( $request->airline_id)){
             $flight = flight::whereIn('flight_airline', $request->airline_id)->get(['id', 'flight_title']);
        }else{
            $flight = flight::where([['flight_airline', $request->airline_id]])->get(['id', 'flight_title']);
        }
        if (!empty($flight)) {
            return response()->json(array('flight' => $flight, 'status' => 'success'), 200);
        } else {
            return response()->json(array('msg' => 'No Record Found', 'status' => 'error'), 200);
        }
    }
    public function get_flight_sche_from_airline(Request $request) {
       if(!(is_array($request->airline_id))){
           $request->airline_id=[$request->airline_id];
       }
       $flight_schedule = flight_schedule::orWhereIn('airline_up', $request->airline_id)->orWhereIn('airline_down', $request->airline_id)->get(['id', 'flight_sche_title']);

        if (!empty($flight_schedule)) {
            return response()->json(array('flight_schedule' => $flight_schedule, 'status' => 'success'), 200);
        } else {
            return response()->json(array('msg' => 'No Record Found', 'status' => 'error'), 200);
        }
    }
    public function trash_airline(){
        $data['page_title']='All Trash Airline';
        $data['trash_airline']=airline::onlyTrashed()->get();
        $data['all_count']=airline::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');        
        return view('admin.airline.all_trashed_airline',$data);     
    }
    public function restore_trash_airline(){
        $airline=airline::onlyTrashed()->restore();
        if(!empty($airline)){
          set_flash_msg('flash_success','Trash Airline Restore Successsfully.');
            return redirect('admin/airline');  
        }else{
           set_flash_msg('flash_error','Trash Airline not Found for Restore.');
           return redirect('admin/airline/trash');
        }
    }
    public function restore_single_airline($id){
        $airline=airline::onlyTrashed()->where(['id'=>$id])->restore();
        if(!empty($airline)){
          set_flash_msg('flash_success','Trash Airline Restore Successsfully.');
            return redirect('admin/airline');  
        }else{
           set_flash_msg('flash_error','Trash Airline not Found for Restore.');
           return redirect('admin/airline/trash');
        }
    }
    public function force_delete_airline($id){
        $airline= airline::onlyTrashed()->where(['id'=>$id]);
        $airline->forceDelete();
        set_flash_msg('flash_success','Airline Deleted Successfully.');
        return redirect('admin/airline/trash');
    }
    public function force_delete_all(){
        airline::onlyTrashed()->forceDelete();        
        set_flash_msg('flash_success','All Airline deleted successfully');
        return redirect('admin/airline/trash');
    }
}