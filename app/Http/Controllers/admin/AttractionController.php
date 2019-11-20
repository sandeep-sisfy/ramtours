<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\attraction;
use App\model\Location;
use App\Rules\attr_name_dup; 
class AttractionController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Attraction';
        $data['attractions']=attraction::all();
         $data['location_name']='';
        if(!empty($data['attractions']->first()->location->loc_name)){
           $data['location_name']=$data['attractions']->first()->location->loc_name; 
        }       
        $data['all_count']=attraction::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.attraction.all_attraction',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Attraction';
        $data['locations']=Location::where('loc_par',0)->get();
        $data['assets_admin']=url('assets/admin');
        return view('admin.attraction.add_attraction',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attraction=new attraction;
        $messages = [
        ];
        $this->validate($request, [
            'attraction_title' => ['required', new attr_name_dup($request->attraction_location, '', '')],
            'attraction_location'=>'required',
            'attraction_distance'=>'required',
            'attraction_sequence'=>'required',
            /*
            'attraction_lat' => 'required',
            'attraction_lng' => 'required',   */        
        ], $messages);
        $attraction->attraction_title=$request->attraction_title;
        $attraction->attraction_location=$request->attraction_location;
        $attraction->attraction_distance=$request->attraction_distance;
        $attraction->attraction_sequence=$request->attraction_sequence;
        $attraction->save();
        set_flash_msg('flash_success','Attraction Inserted Successsfully.');
        return redirect('admin/attraction');
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
        $data['attraction']=attraction::find($id);
        $data['page_title']='Edit Attraction';
        $data['locations']=Location::where('loc_par',0)->get();
        $data['assets_admin']=url('assets/admin');
        return view('admin.attraction.edit_attraction',$data);
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
        $attraction=attraction::find($id);
        $messages = [          
        ];
        $this->validate($request, [
             'attraction_title' =>  ['required', new attr_name_dup($request->attraction_location,$attraction->attraction_location, $attraction->attraction_title)],
            'attraction_location'=>'required',
            'attraction_distance'=>'required',
            'attraction_sequence'=>'required',
            /*
            'attraction_lat' => 'required',
            'attraction_lng' => 'required',   */        
        ], $messages);    
        $attraction->attraction_title=$request->attraction_title;
        $attraction->attraction_location=$request->attraction_location;
        $attraction->attraction_distance=$request->attraction_distance;
        $attraction->attraction_sequence=$request->attraction_sequence;
        $attraction->save();      
        set_flash_msg('flash_success','Attraction Updated Successsfully.');
        return redirect('admin/attraction');
    }
    /**
     * Remove the specified resource from storage.
     *
     * param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attraction = attraction::find($id);
        $attraction->delete();
        set_flash_msg('flash_success','Attraction Deleted Successsfully.');
        return redirect('admin/attraction');
    }
}

