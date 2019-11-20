<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\page;
use App\model\pagelink;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Pages';
        $data['pages'] = page::all();
        $data['all_count'] = page::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.page.all_page',$data);     
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Page';
        $data['assets_admin']=url('assets/admin');
        return view('admin.page.add_page',$data);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page=new page;
        $messages = [               
        ];
        $this->validate($request, [
            'page_title' => 'required',
            'page_disc' => 'required',        
            'show_in_header_menu' => 'required',
            'show_in_footer_menu' => 'required',
            'page_status' => 'required',
            'page_img'  => 'image|max:2048',
        ], $messages);            
        $page->page_title=$request->page_title;
        $page->page_disc=$request->page_disc;
        $page->menu_title=$request->menu_title; 
        $page->show_in_header_menu=$request->show_in_header_menu;
        $page->show_in_footer_menu=$request->show_in_footer_menu;
        $page->sequence=$request->sequence;
        $page->page_status=$request->page_status;               
        $page->save();  
        if($page->id){
            if($request->file('page_img')){
                $page_img=rami_file_uploading($request->file('page_img'), 'page', $page->id, '');
                $page->page_img=$page_img;
                $page->save();
            }          
        }        
        set_flash_msg('flash_success','Page Inserted Successfully.');
        return redirect('admin/page');
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page']=page::find($id);
        $data['page_title']='edit Page';
        $data['assets_admin']=url('assets/admin');
        return view('admin.page.edit_page',$data);
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page=page::find($id);
        $messages = [               
        ];
        $this->validate($request, [
            'page_title' => 'required',
            'page_disc' => 'required',       
            'show_in_header_menu' => 'required',
            'show_in_footer_menu' => 'required',       
            'page_status' => 'required',
            'page_img'  => 'image|max:2048',
        ], $messages);            
        $page->page_title=$request->page_title;
        $page->page_disc=$request->page_disc;
        $page->menu_title=$request->menu_title; 
        $page->show_in_header_menu=$request->show_in_header_menu;
        $page->show_in_footer_menu=$request->show_in_footer_menu;
        $page->sequence=$request->sequence;
        $page->having_right_link=$request->is_having_link;
        $page->page_status=$request->page_status;        
        $page->save(); 
        if($page->id){
            if($request->file('page_img')){
                $page_img=rami_file_uploading($request->file('page_img'), 'page', $page->id, '');
                $page->page_img=$page_img;
                $page->save();
            }          
        }             
        set_flash_msg('flash_success','Page Updated Successfully.');
        return redirect('admin/page');
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=page::find($id);
        $page->delete();
        set_flash_msg('flash_success','Page Deleted Successfully.');
        return redirect('admin/page');
    }
    public function page_links($page_id)
    {
        $data['page_title']='All Page Links';
        $data['page_id']=$page_id;
        $data['page_links'] = pagelink::where([['page_id',$page_id]])->get();
        $data['all_count'] = pagelink::where([['page_id',$page_id]])->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.page.otherpage_links',$data);     
    }
    public function create_link($page_id)
    {
        $data['page_id']=$page_id;
        $data['page_title']='Add OtherPage Link';
        $data['assets_admin']=url('assets/admin');
        return view('admin.page.add_otherpage_link',$data);
    }
    public function store_link(Request $request,$page_id)
    {
        $pagelink=new pagelink;
        $messages = [               
        ];
        $this->validate($request, [
            'pagelink_title' => 'required',
            'pagelink_url' => 'required',
        ], $messages);
        $pagelink->page_id=$page_id;          
        $pagelink->pagelink_title=$request->pagelink_title;
        $pagelink->pagelink_url=$request->pagelink_url;              
        $pagelink->save();
        set_flash_msg('flash_success','Other Page Link Created Successfully.');
        return redirect('admin/pagelink/'.$page_id);
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_link($pagelink_id)
    {
        $data['pagelink']=pagelink::find($pagelink_id);
        $data['page_id']=$data['pagelink']->page_id;
        $data['page_title']='Edit PageLink';
        $data['assets_admin']=url('assets/admin');
        return view('admin.page.edit_pagelink',$data);
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_link(Request $request,$page_id,$pagelink_id)
    {
        $pagelink=pagelink::find($pagelink_id);
        $messages = [               
        ];
        $this->validate($request, [
            'pagelink_title' => 'required',
            'pagelink_url' => 'required',
        ], $messages);
        $pagelink->page_id=$request->page_id;
        $pagelink->pagelink_title=$request->pagelink_title;
        $pagelink->pagelink_url=$request->pagelink_url;              
        $pagelink->save();
        set_flash_msg('flash_success','Pagelink details Updated Successfully.');
        return redirect('admin/pagelink/'.$pagelink->page_id);
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_link($pagelink_id)
    {
        $pagelink=pagelink::find($pagelink_id);
        $pagelink->delete();
        set_flash_msg('flash_success','Pagelink details Deleted Successfully.');
        return redirect('admin/pagelink/'.$pagelink->page_id);
    }
    public function add_page_meta_data($id)
    {
        $data['page']=page::find($id);
        if(empty($data['page'])){
            set_flash_msg('flash_error','Page not found.');
            return redirect('admin/page');
        }
        $data['page_title']='Add Page meta data';        
        $data['assets_admin']=url('assets/admin');
        return view('admin.page.add_page_meta_data',$data);
    }
    public function save_page_meta_data(Request $request,$id)
    {
        $page=page::find($id);
        $page->slug=$request->slug;
        $page->page_title_text=$request->page_title_text;
        $page->page_header_custom_code=$request->page_header_custom_code;
        $page->page_footer_custom_code=$request->page_footer_custom_code;
        $page->save();
        set_flash_msg('flash_success','Page meta data updated successfully');
        return redirect('admin/page-meta/'.$id);
    } 
}