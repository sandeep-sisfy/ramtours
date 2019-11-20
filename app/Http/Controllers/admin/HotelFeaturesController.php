<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hotel_feature;

class HotelFeaturesController extends Controller
{
   
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Hotel Features';
        $data['features']=hotel_feature::all();
        $data['all_count']=hotel_feature::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_features.all_hotel_features',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Hotel Feature';
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_features.add_hotel_features',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feature=new hotel_feature;
        $messages = [
        ];
        $this->validate($request, [
            'hotel_feature' => 'required',            
        ], $messages);            
        $feature->hotel_feature=$request->hotel_feature;
        $feature->save();        
        set_flash_msg('flash_success','Hotel Feature Inserted Successsfully.');
        return redirect('admin/hotel-features');
    }    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['feature']=hotel_feature::find($id);
        $data['page_title']='Edit Hotel Feature ';
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_features.edit_hotel_features',$data);
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
        $feature=hotel_feature::find($id);
        $messages = [              
        ];
        $this->validate($request, [
            'hotel_feature' => 'required',            
        ], $messages);      
        $feature->hotel_feature=$request->hotel_feature;
        $feature->save();       
        set_flash_msg('flash_success','Hotel Feature Updated Successsfully.');
        return redirect('admin/hotel-features/'.$id.'/edit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = hotel_feature::find($id);
        $feature->delete();
        set_flash_msg('flash_success','Hotel Feature Deleted Successsfully.');
        return redirect('admin/hotel-features');
    }
}