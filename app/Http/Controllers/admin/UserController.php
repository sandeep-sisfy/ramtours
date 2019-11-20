<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\model\user;
use App\Rules\updateUnique;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }   
    public function index()
    {
        $data['page_title']='All Users';
        $data['users']=user::all();
        $data['assets_admin']=url('assets/admin');
        return view('admin.user.all_user',$data);
    }
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Enter User Info';
        $data['users']=user::all();
        $data['assets_admin']=url('assets/admin');
        return view('admin.user.add_user',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new user;
        $messages = [
            'fname.required' =>'Please enter First Name.',
            'lname.required'=>'Please enter Last Name.',
            'email.required'=>'Please enter email.',
            'contact.required'=>'Please enter Contact Number.'
        ];
         $this->validate($request, [
           'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|digits:10|min:10|numeric',
            'image'  =>  'required|image|max:2048'
        ], $messages);
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->email=$request->email;
        $user->contact=$request->contact;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->city=$request->city;
        $user->pincode=$request->pincode;
        $user->country=$request->country;
        $user->about_user=$request->about_user;
        $user->user_status=$request->user_status;
        $user->password='123456';
        $user->save();
        if($user->id){
            if($request->image){
               $user_image= city_file_uploading($request->file('image'),'user',$user->id,'');
                $user->image=$user_image;
                $user->save();
            }
        }
        set_flash_msg('flash_success','User Inserted Successsfully.');
        return redirect('admin/user');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user']=user::find($id);
        $data['page_title']='Edit User';
        $data['assets_admin']=url('assets/admin');
        return view('admin.user.edit_user',$data);
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
        $user=user::find($id);
        $messages = [
            'fname.required' =>'Please enter First Name.',
            'lname.required' =>'Please enter Last Name.',
            'email.required' =>'Please enter email.',
            'contact.required'=>'Please enter Contact Number.',
            'image.image'=>'file upload type must be image.'
        ];
        $this->validate($request, [
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email' => ['email','max:255','string', new updateUnique('users',$user->email,'E-Mail')],
            'contact' =>'required|digits:10|min:10|numeric',
            'image'  =>  'image|max:2048'
        ], $messages);
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->email=$request->email;
        $user->contact=$request->contact;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->city=$request->city;
        $user->pincode=$request->pincode;
        $user->country=$request->country;
        $user->about_user=$request->about_user;
        $user->user_status=$request->user_status;
        $user->save();
        if($user->id){
            if($request->file('image')){
               $user_image= city_file_uploading($request->file('image'),'user',$user->id,$user->image);
               $user->image=$user_image;
               $user->save();
            }
        }
        set_flash_msg('flash_success','User Update Successsfully.');
        return redirect('admin/user');
    }
   /**
    * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        set_flash_msg('flash_success','User Deleted Successsfully.');
        return redirect('admin/user');
    }
}