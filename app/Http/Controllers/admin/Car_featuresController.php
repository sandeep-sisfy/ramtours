<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\car_feature;

class Car_featuresController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Car Features';
        $data['features']=car_feature::all();
        $data['all_count']=car_feature::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.car_features.all_car_features',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add car Feature';
        $data['assets_admin']=url('assets/admin');
        return view('admin.car_features.add_car_features',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feature=new car_feature;
        $messages = [            
        ];
        $this->validate($request, [
            'car_feature' => 'required',            
        ], $messages);             
        $feature->car_feature=$request->car_feature;
        $feature->save();        
        set_flash_msg('flash_success','Car Feature Inserted Successsfully.');
        return redirect('admin/car-features');
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
        $data['feature']=car_feature::find($id);
        $data['page_title']='Edit Car Feature ';
        $data['assets_admin']=url('assets/admin');
        return view('admin.car_features.edit_car_features',$data);
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
        $feature=car_feature::find($id);
        $messages = [            
        ];
        $this->validate($request, [
            'car_feature' => 'required',            
        ], $messages);      
        $feature->car_feature=$request->car_feature;
        $feature->save();       
        set_flash_msg('flash_success','Car Feature Updated Successsfully.');
        return redirect('admin/car-features/');
    }
    /**
    * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = car_feature::find($id);
        $feature->delete();
        set_flash_msg('flash_success','car Feature Deleted Successsfully.');
        return redirect('admin/car-features');
    }
}
