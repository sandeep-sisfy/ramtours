<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\hotel_review;
use App\model\hotel;

class HotelReviewController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['page_title']='All Reviews';
        $data['reviews']=hotel_review::all();
        $data['all_count']=hotel_review::all()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.review.all_review',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Add Hotel Review';
        $data['hotels']=hotel::all();
        $data['assets_admin']=url('assets/admin');
        return view('admin.review.add_review',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel_review=new hotel_review;
        $messages = [            
        ];
        $this->validate($request, [
            'hotel_id' => 'required',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'email' => 'required',
            'rating' => 'required',
            'title_review'  => 'required',          
            'review'  => 'required',
        ], $messages);          
        $hotel_review->hotel_id=$request->hotel_id;
        $hotel_review->first_name=$request->first_name;
        $hotel_review->last_name=$request->last_name;
        $hotel_review->email=$request->email;
        $hotel_review->rating=$request->rating;
        $hotel_review->review_date=$request->review_date;
        $hotel_review->title_review=$request->title_review;
        $hotel_review->review=$request->review;
        $hotel_review->save();    
        set_flash_msg('flash_success','Hotel Review Inserted Successfully.');
        return redirect('admin/review');
    }    
    /**
     * show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['review']=hotel_review::find($id);
        $data['hotels']=hotel::all();
        $data['page_title']='Edit Hotel Review ';
        $data['assets_admin']=url('assets/admin');
        return view('admin.review.edit_reivew',$data);
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
        $hotel_review=hotel_review::find($id);
        $messages = [            
        ];
        $this->validate($request, [
            'hotel_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'rating' => 'required',
            'title_review'  => 'required',             
            'review'  => 'required',
        ], $messages);          
        $hotel_review->hotel_id=$request->hotel_id;
        $hotel_review->first_name=$request->first_name;
        $hotel_review->last_name=$request->last_name;
        $hotel_review->email=$request->email;
        $hotel_review->rating=$request->rating;
        $hotel_review->review_date=$request->review_date;
        $hotel_review->title_review=$request->title_review;
        $hotel_review->review=$request->review;
        $hotel_review->save();
        set_flash_msg('flash_success','Hotel Review Updated Successfully.');
        return redirect('admin/review/'.$id.'/edit');
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel_review = hotel_review::find($id);
        $hotel_review->delete();
        set_flash_msg('flash_success','Hotel Review Deleted Successfully.');
        return redirect('admin/review');
    }
}