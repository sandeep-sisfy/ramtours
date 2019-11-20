<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\model\setting;

use App\model\Location;

use App\model\homepage_setting;

use Illuminate\Http\Request;


class SettingController extends Controller {

    public function __construct() {

        rami_setup_backend_language();

        $this->middleware('CheckRole');

    }

    public function index() {



    }

    public function language_setting() {

        $data['page_title'] = 'Language Settings';

        $data['assets_admin'] = url('assets/admin');

        return view('admin.setting.language_setting', $data);

    }

    public function save_language_setting(Request $request) {

        $this->validate($request, [

            'backend_lang' => 'required',

        ]);

        if ($request->backend_lang) {

            setting::save_rami_setting('backend_lang', $request->backend_lang);

            setting::save_rami_setting('backend_lang_direction', rami_get_langauage_dir($request->backend_lang));

        }

        set_flash_msg('flash_success', 'Setting saved Successfully.');

        return redirect('admin/setting/language_setting');

    }

    public function currency_rate() {

        $data['page_title'] = 'Currency Settings';

        $data['assets_admin'] = url('assets/admin');

        return view('admin.setting.currency_conversion_rate', $data);

    }

    public function save_currency_rate(Request $request) {

        $this->validate($request, [

            'euro_to_shekel' => 'required',

            'dollar_to_shekel' => 'required',

            'swiss_frank_to_shekel' => 'required',

        ]);

        setting::save_rami_setting('euro_to_shekel', $request->euro_to_shekel);

        setting::save_rami_setting('dollar_to_shekel', $request->dollar_to_shekel);

        setting::save_rami_setting('swiss_frank_to_shekel', $request->swiss_frank_to_shekel);

        set_flash_msg('flash_success', 'currency rate saved Successfully.');

        return redirect('admin/setting/currency_rate');

    }

    public function homepage_settings() {

        $data['homepage_settings']=homepage_setting::all();

        $data['all_count']=homepage_setting::all()->count();

        $data['page_title'] = 'All HomePage Settings';

        $data['assets_admin'] = url('assets/admin');

        return view('admin.setting.homepage.all_homepage_setting', $data);

    }

    public function create_homepage_settings() {

        $data['page_title'] = 'HomePage Settings';

        $data['all_locations'] = Location::all();

        $data['assets_admin'] = url('assets/admin');

        return view('admin.setting.homepage.add_homepage_setting', $data);

    }

    public function save_homepage_settings(Request $request)

    {   

        $home_page= new homepage_setting;

        $this->validate($request, [

            /*'home_page_title' => 'required',*/

            'show_by_month' => 'required',

            'pkg_location'=> 'required',

            'package_type' => 'required',

            'no_of_package_show' => 'required',

            'show_in_sequence' => 'required',

            'skip_dates' => 'required',

        ]);     

        $home_page->home_page_title=$request->home_page_title;

        $home_page->menu_title=$request->menu_title;

        $home_page->pkg_location=serialize($request->pkg_location);

        $home_page->show_by_month=$request->show_by_month;

        $home_page->package_type=$request->package_type;

        $home_page->no_of_package_show=$request->no_of_package_show;

        $home_page->show_in_sequence=$request->show_in_sequence;

        $home_page->skip_dates=$request->skip_dates;            

        $home_page->save();

        set_flash_msg('flash_success', 'Home Page Setting saved Successfully.');

        return redirect('admin/setting/homepage');

    }

    public function edit_homepage_setting($id) {

        $data['homepage']=homepage_setting::find($id);        

        $data['all_locations'] = Location::all();

        $data['page_title'] = 'Edit HomePage Settings';

        $data['assets_admin'] = url('assets/admin');

        return view('admin.setting.homepage.edit_homepage_setting', $data);

    }

    public function update_homepage_setting(Request $request,$id)

    {   

        $home_page= homepage_setting::find($id);

        $this->validate($request, [

            /*'home_page_title' => 'required',*/

            'show_by_month' => 'required',

            'pkg_location'=> 'required',

            'package_type' => 'required',

            'no_of_package_show' => 'required',

            'show_in_sequence' => 'required',

            'skip_dates' => 'required',

        ]);

        $home_page->home_page_title=$request->home_page_title;

        $home_page->menu_title=$request->menu_title;

        $home_page->pkg_location=serialize($request->pkg_location);

        $home_page->show_by_month=$request->show_by_month;

        $home_page->package_type=$request->package_type;

        $home_page->no_of_package_show=$request->no_of_package_show;

        $home_page->show_in_sequence=$request->show_in_sequence;  

        $home_page->skip_dates=$request->skip_dates;

        $home_page->save();

        set_flash_msg('flash_success', 'Home Page Setting Update Successfully.');

        return redirect('admin/setting/homepage');

    }

    public function homepage_setting_destroy($id)

    {

        $homepage = homepage_setting::find($id);

        $homepage->delete();

        set_flash_msg('flash_success','Setting Deleted Successsfully.');

        return redirect('admin/setting/homepage');

    }

    public function notification()

    {

        $data['page_title']='Notification Settings';

        $data['assets_admin']=url('assets/admin');

        return view('admin.setting.user_notification',$data);

    }

    public function save_notification(Request $request)

    {   

        $this->validate($request,[

            'email'=>'required|email',

            'noti_number'=>'numeric',

        ]);

        if($request->email){

            setting::save_rami_setting('notification_email_id', $request->email);

        }

        if($request->noti_number){

            setting::save_rami_setting('notification_mobile_number', $request->noti_number);

         }

        set_flash_msg('flash_success','Setting saved Successsfully.');

        return redirect('admin/setting/notification');

    }
    public function create_homepage_meta_settings()
    {
        $data['page_title']='Add Homepage Meta Data';
        $data['assets_admin']=url('assets/admin');
        return view('admin.setting.homepage.add_homepage_meta_data',$data);
    }
    public function save_homepage_meta_settings(Request $request)
    {
        //dd($request);
        setting::save_rami_setting('homepage_title_text', $request->homepage_title_text);
        setting::save_rami_setting('homepage_header_custom_code', $request->homepage_header_custom_code);
        setting::save_rami_setting('homepage_footer_custom_code', $request->homepage_footer_custom_code);
        set_flash_msg('flash_success', 'Home page meta Setting saved Successfully.');
        return redirect('admin/setting/homepage_meta');
    }

}