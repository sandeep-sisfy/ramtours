<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hotel_type;

class HotelTypeController extends Controller
{ 
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Hotel Type';
        $data['hotels']=hotel_type::all();
        $data['all_count']=hotel_type::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_type.all_hotel_type',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Hotel Type';
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_type.add_hotel_type',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel=new hotel_type;
        $messages = [   
        ];
        $this->validate($request, [
            'hotel_type' => 'required',            
        ], $messages); 
        $hotel->hotel_type=$request->hotel_type;
        $hotel->save();        
        set_flash_msg('flash_success','Hotel Type Inserted Successsfully.');
        return redirect('admin/hotel-type');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['hotel']=hotel_type::find($id);
        $data['page_title']='Edit Hotel Type';
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_type.edit_hotel_type',$data);
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
        $hotel=hotel_type::find($id);
        $messages = [  
        ];
        $this->validate($request, [
            'hotel_type' => 'required',            
        ], $messages);      
        $hotel->hotel_type=$request->hotel_type;
        $hotel->save();       
        set_flash_msg('flash_success','Hotel Type Updated Successsfully.');
        return redirect('admin/hotel-type/'.$id.'/edit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = hotel_type::find($id);
        $hotel->delete();
        set_flash_msg('flash_success','Hotel Type Deleted Successsfully.');
        return redirect('admin/hotel-type');
    }
}