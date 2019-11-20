<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\room_type;

class RoomTypeController extends Controller
{
    
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {

        $data['page_title']='All Room Type';
        $data['rooms']=room_type::all();
        $data['all_count']=room_type::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.room_type.all_room_type',$data);
    }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Room Type';
        $data['assets_admin']=url('assets/admin');
        return view('admin.room_type.add_room_type',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room=new room_type;
        $messages = [
          
        ];
        $this->validate($request, [
            'room_type' => 'required',            
        ], $messages);            
        $room->room_type=$request->room_type;
        $room->save();        
        set_flash_msg('flash_success','Room Type Inserted Successsfully.');
        return redirect('admin/room-type');
    }
    /**
    * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['room']=room_type::find($id);
        $data['page_title']='Edit Room Type';
        $data['assets_admin']=url('assets/admin');
        return view('admin.room_type.edit_room_type',$data);
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
        $room=room_type::find($id);
        $messages = [
            /*'flight_title.required' =>'Please enter Flight Name Here.',  */          
        ];
        $this->validate($request, [
            'room_type' => 'required',            
        ], $messages);      
        $room->room_type=$request->room_type;
        $room->save();       
        set_flash_msg('flash_success','Room Type Updated Successsfully.');
        return redirect('admin/room-type/'.$id.'/edit');
    }
    /**
    * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = room_type::find($id);
        $room->delete();
        set_flash_msg('flash_success','Room Type Deleted Successsfully.');
        return redirect('admin/room-type');
    }
}