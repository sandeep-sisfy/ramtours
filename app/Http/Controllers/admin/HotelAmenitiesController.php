<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hotel_amenity;

class HotelAmenitiesController extends Controller
{
    
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Hotel Amenity';
        $data['amenities']=hotel_amenity::all();
        $data['all_count']=hotel_amenity::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_amenities.all_hotel_amenities',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Hotel Amenity';
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_amenities.add_hotel_amenities',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $amenity=new hotel_amenity;
        $messages = [
               
        ];
        $this->validate($request, [
            'hotel_amenities' => 'required',            
        ], $messages);            
        $amenity->hotel_amenities=$request->hotel_amenities;
        $amenity->save();        
        set_flash_msg('flash_success','Hotel Amenity Inserted Successsfully.');
        return redirect('admin/hotel-amenities');
    }   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['amenity']=hotel_amenity::find($id);
        $data['page_title']='Edit Hotel Amenity';
        $data['assets_admin']=url('assets/admin');
        return view('admin.hotel_amenities.edit_hotel_amenities',$data);
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
        $amenity=hotel_amenity::find($id);
        $messages = [              
        ];
        $this->validate($request, [
            'hotel_amenities' => 'required',            
        ], $messages);         
        $amenity->hotel_amenities=$request->hotel_amenities;
        $amenity->save();       
        set_flash_msg('flash_success','Hotel Amenity Updated Successsfully.');
        return redirect('admin/hotel-amenities/'.$id.'/edit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenity = hotel_amenity::find($id);
        $amenity->delete();
        set_flash_msg('flash_success','Hotel Amenity Deleted Successsfully.');
        return redirect('admin/hotel-amenities');
    }
}