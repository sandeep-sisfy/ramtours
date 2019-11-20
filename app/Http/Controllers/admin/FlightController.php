<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\flight;
use App\model\airline;
use App\model\Location;

class FlightController extends Controller
{ 
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
       $data['flights']=flight::all();
       $data['all_count']=flight::all()->count();
       $data['trash_count']=flight::onlyTrashed()->count();
       $data['page_title']='All Flights';
       $data['assets_admin']=url('assets/admin');
       return view('admin.flight.all_flight',$data);
    }
    /**
    * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['page_title']='Add Flight';
        $data['airlines']=airline::all();
        if(!empty($request->airline_id)){
            $data['selected_airlines']=$request->airline_id;
        }else{
            $data['selected_airlines']='';
        }
        $data['locations']=Location::where('loc_par',0)->get();
        $data['assets_admin']=url('assets/admin');
        return view('admin.flight.add_flight',$data);
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight=new flight;
        $messages = [
            'flight_title.required' =>'Please enter Flight Name Here.',
            'flight_number.required'=>'Please enter Flight Number.',
            'flight_airline.required'=>'Please Flight Airline.',
            'flight_source.required'=>'Please select flight source.',
            'flight_desti.required'=>'Please select flight destination.'
        ];
        $this->validate($request, [
            'flight_title' => 'required|unique:flights',
            'flight_number' => 'required',
            'flight_airline' => 'required',
            'flight_source' => 'required',            
            'flight_desti'  => 'required',
        ], $messages);            
        $flight->flight_title=$request->flight_title;
        $flight->flight_number=$request->flight_number;
        $flight->flight_airline=$request->flight_airline;
        $flight->flight_disc=$request->flight_disc;
        $flight->flight_source=$request->flight_source;
        $flight->flight_type=$request->flight_type;
        $flight->airport_name=$request->airport_name;
        $flight->flight_desti=$request->flight_desti;
        $flight->save();
        if($request->go_to_next_page==0){
           set_flash_msg('flash_success','Flight Inserted Successsfully.');
           return redirect('admin/flight'); 
        }else{
           set_flash_msg('flash_success','Flight Inserted Successsfully.Please add schedule for this flight.');
           return redirect('admin/flight-schedule/create?flight_id='.$flight->id); 
        }

    }
    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['flight']=flight::find($id);
        $data['page_title']='Edit Flight';
        if(!empty($request->airline_id)){
            $data['selected_airlines']=$request->airline_id;
        }else{
            $data['selected_airlines']='';
        }
        $data['airlines']=airline::all();
        $data['locations']=Location::where('loc_par',0)->get();
        $data['assets_admin']=url('assets/admin');
        return view('admin.flight.edit_flight',$data);
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
        $flight=flight::find($id);
        $messages = [
            'flight_title.required' =>'Please enter Flight Name Here.',
            'flight_number.required'=>'Please enter Flight Number.',
            'flight_airline.required'=>'Please Flight Airline.',
            'flight_source.required'=>'Please select flight source.',
            'flight_desti.required'=>'Please select flight destination.'
        ];
        $this->validate($request, [
            'flight_title' => 'required',
            'flight_number' => 'required',
            'flight_airline' => 'required',
            'flight_source' => 'required',            
            'flight_desti'  => 'required',
        ], $messages);            
        $flight->flight_title=$request->flight_title;
        $flight->flight_number=$request->flight_number;
        $flight->flight_airline=$request->flight_airline;
        $flight->flight_disc=$request->flight_disc;
        $flight->flight_source=$request->flight_source;
        $flight->flight_type=$request->flight_type;
        $flight->airport_name=$request->airport_name;
        $flight->flight_desti=$request->flight_desti;
        $flight->save(); 
        if($request->go_to_next_page==0){
           set_flash_msg('flash_success','Flight Updated Successsfully.');
           return redirect('admin/flight');
        }else{
           set_flash_msg('flash_success','Flight Updated Successsfully.Please add schedule for this flight.');
           return redirect('admin/flight-schedule/create?flight_id='.$flight->id); 
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
        $flight = flight::find($id);
        $flight->delete();
        set_flash_msg('flash_success','Airline Deleted Successsfully.');
        return redirect('admin/flight');
    }
    public function trash_flight(){
        $data['page_title']='All Trash flight';
        $data['trash_flight']=flight::onlyTrashed()->get();
        $data['all_count']=flight::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');        
        return view('admin.flight.all_trashed_flight',$data);     
    }
    public function restore_trash_flight(){
        $flight=flight::onlyTrashed()->restore();
        if(!empty($flight)){
            set_flash_msg('flash_success','Trash flight Restore Successsfully.');
            return redirect('admin/flight');  
        }else{
            set_flash_msg('flash_error','Trash flight not Found for Restore.');
            return redirect('admin/flight/trash');
        }
    }
    public function restore_single_flight($id){        
        $flight=flight::onlyTrashed()->where(['id'=>$id])->restore();
        if(!empty($flight)){
          set_flash_msg('flash_success','Trash flight Restore Successsfully.');
            return redirect('admin/flight');  
        }else{
           set_flash_msg('flash_error','Trash flight not Found for Restore.');
           return redirect('admin/flight/trash');
        }
    }
    public function force_delete_flight($id){
        $flight= flight::onlyTrashed()->where(['id'=>$id]);
        $flight->forceDelete();
        set_flash_msg('flash_success','flight Deleted Successfully.');
        return redirect('admin/flight/trash');
    }
    public function force_delete_all(){
        flight::onlyTrashed()->forceDelete();        
        set_flash_msg('flash_success','All flight deleted successfully');
        return redirect('admin/flight/trash');
    }
}