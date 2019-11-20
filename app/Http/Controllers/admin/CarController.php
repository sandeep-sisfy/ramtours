<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\car;
use App\model\car_price;
use App\model\car_suplier;
use App\model\Location;
use App\model\car_feature;
use App\model\flight_schedule;
use App\Rules\ramiDatePrice;
use App\Rules\dateSlotRangeChecking; 
use App\Rules\car_loc_dup;

class CarController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['cars']=car::all();
        $data['page_title']='All Cars';
        $data['all_count']=car::all()->count();
        $data['trash_count']=car::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.car.all_car',$data);
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['page_title']='Add Car';
        if(!empty($request->car_suplier)){
           $data['car_suplier_selected']=$request->car_suplier;
        }else{
            $data['car_suplier_selected']='';
        }
        $data['main_locations']=Location::where(['loc_par'=>0])->get();
        $data['car_supliers']=car_suplier::all();
        $data['car_features']=car_feature::all();
        $data['profit_currency']=0;
        $data['assets_admin']=url('assets/admin');
        return view('admin.car.add_car',$data);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car=new car;
        $messages = [

        ];
        $this->validate($request, [
            'car_title' =>  ['required', new car_loc_dup($request->location, '', '')],
            'car_suplier' => 'required',
            'location' => 'required',
            'max_people' => 'required',
            'car_profit' => 'required',
            'profit_currency' => 'required',           
            'car_img'  => 'image|max:2048',
        ], $messages);            
        $car->car_title=$request->car_title;
        $car->car_desc=$request->car_desc;
        $car->car_suplier=$request->car_suplier;
        $car->max_people=$request->max_people;
        $car->location=$request->location;
        $car->car_profit=$request->car_profit;
        $car->profit_currency=$request->profit_currency;
        $car->car_features=serialize($request->car_features);
        $car->show_on_front=0;
        $car->status=0;
        $car->save();  
        if($car->id){
            if($request->file('car_img')){
                $car_img=rami_file_uploading($request->file('car_img'), 'car', $car->id, '');
                $car->image=$car_img;
                $car->save();
            }          
        }
        if($request->go_to_next_page==0){
            set_flash_msg('flash_success','Car Inserted Successsfully.');
            return redirect('admin/car');
        }else{
           set_flash_msg('flash_success','Car Inserted Successsfully.Please add prices for this car.');
           return redirect('admin/car/'.$car->id.'/car_prices/create'); 
        }
    }
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['car']=car::find($id);
        $data['main_locations']=Location::where(['loc_par'=>0])->get();
        $data['car_supliers']=car_suplier::all();
        $data['car_features']=car_feature::all();
        if(!empty($request->car_suplier)){
           $data['car_suplier_selected']=$request->car_suplier;
        }else{
            $data['car_suplier_selected']='';
        }
        $data['profit_currency']=$data['car']->profit_currency;
        $data['page_title']='Edit Car';
        $data['assets_admin']=url('assets/admin');
        return view('admin.car.edit_car',$data);
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $car=car::find($id);
       $messages = [
        ];
        $this->validate($request, [
            'car_title' =>  ['required', new car_loc_dup($request->location, $car->location, $car->car_title)],
            'car_suplier' => 'required',
            'location' => 'required',
            'max_people' => 'required',          
            'car_img'  => 'image|max:2048',
            'car_profit' => 'required',
            'profit_currency' => 'required', 
        ], $messages);
        $car->car_title=$request->car_title;
        $car->car_desc=$request->car_desc;
        $car->car_suplier=$request->car_suplier;
        $car->location=$request->location;
        $car->car_profit=$request->car_profit;
        $car->profit_currency=$request->profit_currency;
        $car->car_features=serialize($request->car_features);
        $car->max_people=$request->max_people;
        $car->show_on_front=0;
        $car->status=0;
        $car->save();
        if($car->id){
            if($request->file('car_img')){
                $car_img=rami_file_uploading($request->file('car_img'), 'car', $car->id, '');
                $car->image=$car_img;
                $car->save();
            }
        }
        if($request->go_to_next_page==0){
            set_flash_msg('flash_success','Car updated Successsfully.');
            return redirect('admin/car');
        }else{
           set_flash_msg('flash_success','Car Updated Successsfully.Please add prices for this car.');
           return redirect('admin/car/'.$car->id.'/car_prices/create'); 
        }
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = car::find($id);
        $car->delete();
        set_flash_msg('flash_success','Car Deleted Successsfully.');
        return redirect('admin/car');
    }
    public function get_car_from_car_suplier(Request $request) {
        $car = car::where([['car_suplier', $request->car_supp_id]])->get(['id', 'car_title']);
        if (!empty($car)){
            return response()->json(array('car' => $car, 'status' => 'success'), 200);
        } else {
            return response()->json(array('msg' => 'No Record Found', 'status' => 'error'), 200);
        }
    }
     public function get_car_from_flight_sche_id(Request $request){
        $loc=[];
        if(empty($request->flight_sche_ids)){
        	 return response()->json(array('msg' => 'No flight Selected', 'status' => 'error'), 200);
        }
        foreach ($request->flight_sche_ids as $flight_sche_id){
            $flght= flight_schedule::find($flight_sche_id);
            if(!empty($flght->flight_name)){
                $loc[]=$flght->flight_name->flight_desti;
            }
        }
        $car = car::whereIn('location', $loc)->get(['id', 'car_title']);
        if (!empty($car)){
            return response()->json(array('car' => $car, 'status' => 'success'), 200);
        } else {
            return response()->json(array('msg' => 'No Record Found', 'status' => 'error'), 200);
        }
    }
    public function get_car_from_loc(Request $request) {        
        $car = car::where([['location', $request->car_loc]])->get(['id', 'car_title']);
        if (!empty($car)){
            return response()->json(array('car' => $car, 'status' => 'success'), 200);
        } else {
            return response()->json(array('msg' => 'No Record Found', 'status' => 'error'), 200);
        }
    }
    public function car_prices($car_id){
        $data['car_prices']=car_price::where(['car_id'=>$car_id])->get();
        $car=car::find(['id'=>$car_id])->first();
        $data['car_name']=$car->car_title;        
        if(!empty($data['car_prices'])){
          $data['all_count']=car_price::where(['car_id'=>$car_id])->get()->count();
          $data['page_title']='Car Prices';
          $data['car_id']=$car_id;
          $data['assets_admin']=url('assets/admin');
          return view('admin.car.car_price',$data);
        }else{
          $data['page_title']='Add Car Price';
          $data['assets_admin']=url('assets/admin');
          return redirect('admin/car/'.$request->car_id.'/car_prices/create');
        }
        
    }
    public function car_price_create($car_id){
        $car=car::find(['id'=>$car_id])->first();
        $data['max_people']=$car['max_people'];
        if(empty($data['max_people'])){
            set_flash_msg('flash_error','Max People  details required before adding car price.Please update car details with max people.');
            return redirect('admin/car/'.$car_id.'/edit');
        }
        $data['car_price']=car_price::where(['car_id'=>$car_id])->get();
        $data['form_url']=url('admin/car/'.$car_id.'/car_prices');          
        $data['car_id']=$car_id;
        $data['page_title']='Add Car Price';
        $data['assets_admin']=url('assets/admin');
        return view('admin.car.add_car_price',$data);
    }

    public function car_price_store(Request $request){
        $car=car::find($request->car_id);
        if(empty($car)){
            set_flash_msg('flash_success','Car did not found.');
            return redirect('admin/car');
        }
        $car_price=new car_price;
        $messages = [
        ];
        $valid_array=array(
            'price_start_date' => ['required','date','date_format:Y-m-d','after:yesterday','before:price_end_date',new ramiDatePrice('car_prices',$car_price->car_id, 'car_id',''),new dateSlotRangeChecking('car_prices',$car_price->car_id, 'car_id',$request->price_start_date,$request->price_end_date,'')],
            'price_end_date' => ['required','date','date_format:Y-m-d','after:yesterday','after:price_start_date',new ramiDatePrice('car_prices',$car_price->car_id, 'car_id',''),new dateSlotRangeChecking('car_prices',$car_price->car_id, 'car_id',$request->price_start_date,$request->price_end_date,'')],
            'price_currency' => 'required',
        );
        if(!empty($car->max_people)){
            for($i=1;$i<=$car->max_people;$i++){
            $price_var='price_for_'.$i;
                $valid_array[$price_var]='required';
                          
            }
        }           
        $this->validate($request,$valid_array,$messages); 
        $car_price->price_start_date=$request->price_start_date;
        $car_price->price_end_date=$request->price_end_date;
        for($i=1;$i<=9;$i++){
            $price_var='price_for_'.$i;
            if(empty($request->{$price_var})){
                 $car_price->{$price_var}=0;
            }else{
                $car_price->{$price_var}=$request->{$price_var};
            }
        }        
        $car_price->price_currency=$request->price_currency;
        $car_price->car_id=$request->car_id;
        $car_price->save();
           set_flash_msg('flash_success','Car Price Inserted Successsfully.');
           return redirect('admin/car/'.$request->car_id.'/car_prices');        
    }
    public function car_price_edit($price_id){
        $data['car_price']=car_price::find($price_id);
        $data['form_url']=url('admin/car_prices'); 
        $data['car_id']=$data['car_price']->car_id;
        $car=car::find(['id'=>$data['car_id']])->first();
        $data['max_people']=$car['max_people'];
        if(empty($data['max_people'])){
            set_flash_msg('flash_error','Max People  details required before adding car price.Please update car details with max people.');
            return redirect('admin/car/'.$car_id.'/edit');
        }
        $data['price_id']=$data['car_price']->id;
        $data['page_title']='Car Price Edit';
        $data['assets_admin']=url('assets/admin');
        return view('admin.car.edit_car_price',$data);
    }    
    public function car_price_update(Request $request,$price_id){     
        $car_price=car_price::find($price_id);
        $messages = [
        ];
        $this->validate($request, [
            'price_start_date' => 'required',
            'price_end_date' =>  'required',
            'price_currency' => 'required',
        ], $messages);
        $car_price->price_start_date=$request->price_start_date;
        $car_price->price_end_date=$request->price_end_date;
        for($i=1;$i<=9;$i++){
            $price_var='price_for_'.$i;
            if(empty($request->{$price_var})){
                $car_price->{$price_var}=0;
            }else{
                $car_price->{$price_var}=$request->{$price_var};
            }
        }
        $car_price->price_currency=$request->price_currency;
        $car_price->save();
        set_flash_msg('flash_success','car Price updated Successsfully.');
        return redirect('admin/car/'.$request->car_id.'/car_prices');        
    }
    public function car_price_delete($price_id){
        $car_price = car_price::find($price_id);
        $car_id=$car_price['car_id'];
        $car_price->delete();
        set_flash_msg('flash_success','Car price Deleted Successsfully.');
        return redirect('admin/car/'.$car_id.'/car_prices');
    }
     public function trash_car(){
        $data['page_title']='All Cars';
        $data['trash_car']=car::onlyTrashed()->get();
        $data['all_count']=car::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.car.all_trashed_car',$data);
    }
    public function restore_trash_car(){
        $car=car::onlyTrashed()->restore();
        if(!empty($car)){
          set_flash_msg('flash_success','Trash Car Restore Successsfully.');
            return redirect('admin/car');  
        }else{
           set_flash_msg('flash_error','Trash Car not Found for Restore.');
           return redirect('admin/car/trash');
        }
    }
    public function restore_single_car($id){        
        $car=car::onlyTrashed()->where(['id'=>$id])->restore();
        if(!empty($car)){
          set_flash_msg('flash_success','Trash car Restore Successsfully.');
            return redirect('admin/car');  
        }else{
           set_flash_msg('flash_error','Trash car not Found for Restore.');
           return redirect('admin/car/trash');
        }
    }
    public function force_delete_car($id){
        $car= car::onlyTrashed()->where(['id'=>$id]);
        $car->forceDelete();
        set_flash_msg('flash_success','Car deleted Successfully.');
        return redirect('admin/car/trash');
    }
    public function force_delete_all(){
        car::onlyTrashed()->forceDelete();        
        set_flash_msg('flash_success','All car deleted successfully');
        return redirect('admin/car/trash');
    }
}