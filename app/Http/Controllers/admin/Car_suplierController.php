<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\car_suplier;

class Car_suplierController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Car Supplier';
        $data['cars']=car_suplier::all();
        $data['all_count']=car_suplier::all()->count();
        $data['trash_count']=car_suplier::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.car_suplier.all_car_suplier',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Car Supplier';
        $data['assets_admin']=url('assets/admin');
        return view('admin.car_suplier.add_car_suplier',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car=new car_suplier;
        $messages = [            
        ];
        $this->validate($request, [
            'car_suplier_name' => 'required|unique:car_supliers',
            'car_suplier_email' => 'required',
            'car_suplier_cont_1' => 'required',         
            'car_suplier_logo'  => 'image|max:2048',
        ], $messages);            
        $car->car_suplier_name=$request->car_suplier_name;
        $car->car_suplier_disc=$request->car_suplier_disc;
        $car->car_suplier_email=$request->car_suplier_email;
        $car->car_suplier_cont_1=$request->car_suplier_cont_1;
        $car->car_suplier_cont_2=$request->car_suplier_cont_2;
        $car->car_suplier_website=$request->car_suplier_website;
        $car->car_suplier_fax=$request->car_suplier_fax;
        $car->save();
        if($car->id){
            if($request->file('car_suplier_logo')){
                $car_suplier_logo=rami_file_uploading($request->file('car_suplier_logo'), 'car', $car->id, '');
                $car->car_suplier_logo=$car_suplier_logo;
                $car->save();
            }          
        }
        if($request->go_to_next_page==0){
            set_flash_msg('flash_success','Car Supplier Inserted Successfully.');
            return redirect('admin/car-suplier/');
        }else{
            set_flash_msg('flash_success','Car Supplier Inserted Successfully.Please Add Car for saved car-suplier.');
            return redirect('admin/car/create?car_suplier='.$car->id);
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
        $data['car']=car_suplier::find($id);
        $data['page_title']='Edit Car Supplier Details';
        $data['assets_admin']=url('assets/admin');
        return view('admin.car_suplier.edit_car_suplier',$data);
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
        $car=car_suplier::find($id);
        $messages = [            
        ];
        $this->validate($request, [
            'car_suplier_name' => 'required',
            'car_suplier_email' => 'required',
            'car_suplier_cont_1' => 'required',        
            'car_suplier_logo'  => 'image|max:2048',
        ], $messages);          
        $car->car_suplier_name=$request->car_suplier_name;
        $car->car_suplier_disc=$request->car_suplier_disc;
        $car->car_suplier_email=$request->car_suplier_email;
        $car->car_suplier_cont_1=$request->car_suplier_cont_1;
        $car->car_suplier_cont_2=$request->car_suplier_cont_2;
        $car->car_suplier_website=$request->car_suplier_website;
        $car->car_suplier_fax=$request->car_suplier_fax;
        $car->save();
        if($car->id){
            if($request->file('car_suplier_logo')){
                $car_suplier_logo=rami_file_uploading($request->file('car_suplier_logo'), 'car', $car->id, '');
                $car->car_suplier_logo=$car_suplier_logo;
                $car->save();
            }          
        }
        if($request->go_to_next_page==0){
            set_flash_msg('flash_success','Car Supplier Inserted Successfully.');
            return redirect('admin/car-suplier/');
        }else{
            set_flash_msg('flash_success','Car Supplier updated Successfully.Please add Car for updated car-suplier.');
            return redirect('admin/car/create?car_suplier='.$car->id);
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
        $car = car_suplier::find($id);
        $car->delete();
        rami_get_file_delete($car->car_suplier_logo);
        set_flash_msg('flash_success','Car Suplier details Deleted Successsfully.');
        return redirect('admin/car-suplier');
    }
    public function trash_car_suplier(){
        $data['page_title']='All car suplier';
        $data['trash_car_suplier']=car_suplier::onlyTrashed()->get();
        $data['all_count']=car_suplier::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');        
        return view('admin.car_suplier.all_trashed_car_suplier',$data);     
    }
    public function restore_trash_car_suplier(){
        $car_suplier=car_suplier::onlyTrashed()->restore();
        if(!empty($car_suplier)){
          set_flash_msg('flash_success','Trash car suplier Restore Successsfully.');
            return redirect('admin/car-suplier');  
        }else{
           set_flash_msg('flash_error','Trash car suplier not Found for Restore.');
           return redirect('admin/car-suplier/trash');
        }
    }
    public function restore_single_car_suplier($id){        
        $car_suplier=car_suplier::onlyTrashed()->where(['id'=>$id])->restore();
        if(!empty($car_suplier)){
          set_flash_msg('flash_success','Trash car suplier Restore Successsfully.');
            return redirect('admin/car-suplier');  
        }else{
           set_flash_msg('flash_error','Trash car suplier not Found for Restore.');
           return redirect('admin/car-suplier/trash');
        }
    }
    public function force_delete_car_suplier($id){
        $car_suplier= car_suplier::onlyTrashed()->where(['id'=>$id]);
        $car_suplier->forceDelete();
        set_flash_msg('flash_success','car suplier deleted Successfully.');
        return redirect('admin/car-suplier/trash');
    }
    public function force_delete_all(){
        car_suplier::onlyTrashed()->forceDelete();        
        set_flash_msg('flash_success','All car suplier deleted successfully');
        return redirect('admin/car-suplier/trash');
    }
}