<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\pkg_people;

class PkgPersonController extends Controller
{
    public function __construct()
   {
       rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Packages As per Person';
        $data['pkg_persons']=pkg_people::all();
        $data['all_count']=pkg_people::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.pkg_person.all_pkg_person',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Packages People';
        $data['assets_admin']=url('assets/admin');
        return view('admin.pkg_person.add_pkg_person',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pkg_person=new pkg_people;
        $messages = [
        ];
        $this->validate($request, [
            'pkg_title' => 'required|unique:pkg_peoples',
            'adults' => 'required',
            'pkg_desc' => 'required', 
        ], $messages);            
        $pkg_person->pkg_title=$request->pkg_title;
        $pkg_person->infants=0;
        $pkg_person->childs=$request->childs;
        if(empty($pkg_person->childs)){
            $pkg_person->childs=0;
        }        
        $pkg_person->adults=$request->adults;
        $pkg_person->pkg_desc=$request->pkg_desc;
        $pkg_person->pkg_status=1;
        $pkg_person->save();        
        set_flash_msg('flash_success','Package Inserted Successsfully.');
        return redirect('admin/package-person');
    }   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pkg_person']=pkg_people::find($id);
        $data['page_title']='Edit Package People.';
        $data['assets_admin']=url('assets/admin');
        return view('admin.pkg_person.edit_pkg_person',$data);
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
        //dd($request);
        $pkg_person=pkg_people::find($id);
        $messages = [
        ];
        $this->validate($request, [
            'pkg_title' => 'required',
            'adults' => 'required',
            'pkg_desc' => 'required',
        ], $messages);      
        $pkg_person->pkg_title=$request->pkg_title;
        $pkg_person->infants=0;
        $pkg_person->childs=$request->childs;
        if(empty($pkg_person->childs)){
            $pkg_person->childs=0;
        }            
        $pkg_person->adults=$request->adults;
        $pkg_person->pkg_desc=$request->pkg_desc;
        $pkg_person->pkg_status=1;
        $pkg_person->save();              
        set_flash_msg('flash_success','Package Updated Successsfully.');
        return redirect('admin/package-person/'.$id.'/edit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pkg_person = pkg_people::find($id);
        $pkg_person->delete();
        set_flash_msg('flash_success','Package Deleted Successsfully.');
        return redirect('admin/package-person');
    }
}