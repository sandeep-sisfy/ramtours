<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\model\user;
use App\Rules\userPwdVerify;
use App\model\flight_schedule;
use App\model\car;
use App\model\hotel;
use App\model\package;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
	public function __construct() {
		rami_setup_backend_language();
		$this->middleware('CheckRole');
	}
	public function index() {
		$data['page_title'] = 'Dashboard';
		$data['all_flights_sche'] = flight_schedule::all()->count();
		$data['all_cars'] = car::all()->count();
		$data['all_hotels'] = hotel::all()->count();
		$data['all_packages'] = package::all()->count();
		$data['assets_admin'] = url('assets/admin');
		return view('admin.dashboard', $data);
	}

	public function dashboard() {
		$data['page_title'] = 'Dashboard';
		$data['assets_admin'] = url('assets/admin');
		return view('admin.dashboard', $data);

	}

	public function profile() {
		$id = auth::user()->id;
		$data['profile'] = user::find($id);
		$data['page_title'] = 'Profile';
		$data['assets_admin'] = url('assets/admin');
		return view('admin.profile.profile', $data);
	}

	public function updateprofile(Request $request) {
		$id = auth::user()->id;
		$user = user::find($id);
		$messages = [
			'fname.required' => 'Please enter First Name.',
			'lname.required' => 'Please enter Last Name.',
			'email.required' => 'Please enter email.',
			'contact.required' => 'Please enter Contact Number.',
		];
		$this->validate($request, [
			'fname' => 'required|max:100',
			'lname' => 'required|max:100',
			'email' => 'required|string|email|max:255',
			'contact' => 'required|digits:10|min:10|numeric',
		], $messages);
		$user->fname = $request->fname;
		$user->lname = $request->lname;
		$user->email = $request->email;
		$user->contact = $request->contact;
		$user->gender = $request->gender;
		$user->address = $request->address;
		$user->city = $request->city;
		$user->pincode = $request->pincode;
		$user->country = $request->country;
		$user->about_user = $request->about_user;
		$user->dob = $request->dob;
		$user->save();
		if ($user->id) {
			if (!empty($request->file('image'))) {
				$user_image = rami_file_uploading($request->file('image'), 'user', $user->id, $user->image);
				$user->image = $user_image;
				$user->save();
			}
		}
		set_flash_msg('flash_success', 'Profile Update Successsfully.');
		return redirect('admin/profile');
	}

	public function change_pwd() {
		$id = auth::user()->id;
		$data['profile'] = user::find($id);
		$data['page_title'] = 'Change Password';
		$data['assets_admin'] = url('assets/admin');
		return view('admin.profile.change_pwd', $data);
	}

	public function save_change_pwd(Request $request) {
		$id = auth::user()->id;
		$user = user::find($id);
		$messages = [
			'old_pwd.required' => 'Please enter Old Password.',
			'new_pwd.required' => 'Please enter New Password.',
			'new_pwd.confirmed' => 'New password should be match with confirmed password.',
			'confirmed_new_pwd.required' => 'Please enter Confirm Password.',
		];
		$this->validate($request, [
			'old_pwd' => ['required', new userPwdVerify],
			'new_pwd' => 'required|min:6|confirmed',
			'new_pwd_confirmation' => 'required',
		], $messages);
		$user->password = Hash::make($request->new_pwd);
		$user->save();
		set_flash_msg('flash_success', 'Password Update Successsfully.');
		return redirect('admin/changepwd');
	}
}
