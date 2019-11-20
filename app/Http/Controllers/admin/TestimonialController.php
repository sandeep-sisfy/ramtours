<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\testimonial;

class TestimonialController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Testimonial';
        $data['testimonials']=testimonial::all();
        $data['all_count']=testimonial::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.testimonial.all_testimonial',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Testimonial';
        $data['assets_admin']=url('assets/admin');
        return view('admin.testimonial.add_testimonial',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $testimonial=new testimonial;
        $messages = [            
        ];
        $this->validate($request, [            
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'remark'=>'required',
        ], $messages);/*         
        $testimonial->user_id=$request->user_id;*/
        $testimonial->title=$request->title;
        $testimonial->first_name=$request->first_name;
        $testimonial->last_name=$request->last_name;
        $testimonial->email=$request->email;
        $testimonial->remark=$request->remark;
        $testimonial->testimonial_date=$request->testimonial_date;
        $testimonial->status=$request->status;
        $testimonial->save();
        set_flash_msg('flash_success','Testimonial Inserted Successfully.');
        return redirect('admin/testimonial');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['testimonial']=testimonial::find($id);
        $data['page_title']='Edit Testimonial';
        $data['assets_admin']=url('assets/admin');
        return view('admin.testimonial.edit_testimonial',$data);
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
        $testimonial=testimonial::find($id);
        $messages = [            
        ];
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'remark'=>'required',
        ],$messages);
        /*$testimonial->user_id=$request->user_id;*/
        $testimonial->title=$request->title;
        $testimonial->first_name=$request->first_name;
        $testimonial->last_name=$request->last_name;
        $testimonial->email=$request->email;
        $testimonial->remark=$request->remark;
        $testimonial->testimonial_date=$request->testimonial_date;
        $testimonial->status=$request->status;
        $testimonial->save();      
        set_flash_msg('flash_success',' Testimonial Updated Successsfully.');
        return redirect('admin/testimonial/'.$id.'/edit');
    }
    /*
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $testimonial = testimonial::find($id);
        $testimonial->delete();
        set_flash_msg('flash_success','Testimonial Deleted Successsfully.');
        return redirect('admin/testimonial');
    }
}