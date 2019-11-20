<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\card;

class CardController extends Controller
{
    public function __construct()
    {
        rami_setup_backend_language();
        $this->middleware('CheckRole');
    }
    public function index()
    {
        $data['cards']=card::all();
        $data['page_title']='All Cards';
        $data['all_count']=card::all()->count();
        $data['trash_count']=card::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.card.all_card',$data);
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['page_title']='Add Card';
        $data['price_currency']=0;
        $data['assets_admin']=url('assets/admin');
        return view('admin.card.add_card',$data);
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card=new card;
        $messages = [
        ];
        $this->validate($request, [
            'card_title' =>  'required',
            // 'price' => 'required',
            // 'price_currency' => 'required',           
            'card_img'  => 'required|image|max:2048',
            // 'max_people' => 'required',
            'link' => 'required|url',
        ], $messages);            
        $card->card_title=$request->card_title;
        $card->card_desc=$request->card_desc;
        $card->price=$request->price;
        $card->price_currency=$request->price_currency;
        $card->max_people=$request->max_people;
        $card->link=$request->link;
        $card->save();
        if($card->id){
          if($request->file('card_img')){
            $card_img=rami_file_uploading($request->file('card_img'), 'card', $card->id, '');
            $card->image=$card_img;
            $card->save();
          }          
        }
        set_flash_msg('flash_success','Card Inserted Successsfully.');
        return redirect('admin/card');
    }
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['card']=card::find($id);
        $data['price_currency']=$data['card']->price_currency;
        $data['page_title']='Edit Card';
        $data['assets_admin']=url('assets/admin');
        return view('admin.card.edit_card',$data);
    }    
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $card=card::find($id);
        $messages = [
        ];
        $this->validate($request, [
          'card_title' =>  'required',
          // 'price' => 'required',
          // 'price_currency' => 'required',           
          'card_img'  => 'image|max:2048',
          // 'max_people' => 'required',
          'link' => 'required|url',
        ], $messages);
        $card->card_title=$request->card_title;
        $card->card_desc=$request->card_desc;
        $card->price=$request->price;
        $card->price_currency=$request->price_currency;
        $card->max_people=$request->max_people;
        $card->link=$request->link;
        $card->save();  
        if($card->id){
          if($request->file('card_img')){
            $card_img=rami_file_uploading($request->file('card_img'), 'card', $card->id, $card->image);
            $card->image=$card_img;
            $card->save();
          }          
        }
        set_flash_msg('flash_success','Card Updated Successsfully.');
        return redirect('admin/card');
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = card::find($id);
        $card->delete();
        set_flash_msg('flash_success','Card Deleted Successsfully.');
        return redirect('admin/card');
    }
    public function trash_card(){
        $data['page_title']='All Cards';
        $data['trash_card']=card::onlyTrashed()->get();
        $data['all_count']=card::onlyTrashed()->count();
        $data['assets_admin']=url('assets/admin');
        return view('admin.card.all_trashed_card',$data);
    }
    public function restore_trash_card(){
        $card=card::onlyTrashed()->restore();
        if(!empty($card)){
          set_flash_msg('flash_success','Trash Card Restore Successsfully.');
            return redirect('admin/card');  
        }else{
           set_flash_msg('flash_error','Trash Card not Found for Restore.');
           return redirect('admin/card/trash');
        }
    }
    public function restore_single_card($id){        
        $card=card::onlyTrashed()->where(['id'=>$id])->restore();
        if(!empty($card)){
          set_flash_msg('flash_success','Trash card Restore Successsfully.');
            return redirect('admin/card');  
        }else{
           set_flash_msg('flash_error','Trash card not Found for Restore.');
           return redirect('admin/card/trash');
        }
    }
    public function force_delete_card($id){
        $card= card::onlyTrashed()->where(['id'=>$id]);
        $card->forceDelete();
        set_flash_msg('flash_success','Car deleted Successfully.');
        return redirect('admin/card/trash');
    }
    public function force_delete_all(){
        card::onlyTrashed()->forceDelete();        
        set_flash_msg('flash_success','All car deleted successfully');
        return redirect('admin/card/trash');
    }
}