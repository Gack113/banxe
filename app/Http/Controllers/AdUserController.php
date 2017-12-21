<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Response;
use Session;
use App\User;
use Illuminate\Http\Request;

class AdUserController extends Controller
{

    public function  __construct(){
        $this->middleware('admin', ['except' => ['login', 'login_submit','logout','signup','signup_submit']]);
    }

    public function index(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function login(){
        return view('admin.login');
    }

    public function login_submit(Request $req){
        $this->validate($req,
        [
            
            'username'=>'required',
            'password'=>'required',
            // 'g-recaptcha-response' => 'required|captcha'
        ],
        [
            'username.required'=>'Vui lòng nhập tên tài khoản',
            'password.required'=>'Vui lòng nhập mật khẩu'
        ]);
        
        $credentials = array('username'=>$req->username,'password'=>$req->password);
        if(Auth::attempt($credentials))
            return redirect()->route('home');
        else
            return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản hoặc mật khẩu không đúng']);
    }

    public function signup(){
        return view('page.signup');
    }

    public function signup_submit(Request $req){
        $this->validate($req,
        [
            'username'=>'required|unique:users',
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
            'password_confirmation'=>'same:password'
            // 'g-recaptcha-response' => 'required|captcha'
        ],
        [
            'username.required'=>'Vui lòng nhập tên tài khoản',
            'username.unique'=>'Tên đăng nhập đã tồn tại',
            'name.required'=>'Vui lòng nhập tên hiển thị',
            'email.required'=>'Vui lòng nhập địa chỉ email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password_confirmation.confirmed'=>'Nhập lại mật khẩu không trùng'
            
        ]);
        $user = new User();
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->back()->with(['message'=>'Đăng ký thành công']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function add(){
        return view('admin.add-user');
    }

    public function add_submit(Request $req){
        $this->validate($req,
        [
            'name'=>'required',
            'username'=>'required|unique:users',
            'password'=>'required',
            'email'=>'required|unique:users'
        ],
        [
            'name.required'=>'Vui lòng nhập tên hiển thị',
            'username.required'=>'Vui lòng nhập tên tài khoản',
            'username.unique'=>'Tên tài khoản đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'email.required'=>'Vui lòng nhập email',
            'email.unique'=>'Email đã tồn tại'
        ]);
        
        $user = new User();
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);

        $user->save();

        return redirect()->back()->with(['message'=>'Thêm thành công']);
    }

    public function update(Request $req){
        $user = User::where('id',$req->id)->first();
        return view('admin.update_user',compact('user'));
    }

    public function update_submit(Request $req){
        $user = User::where('id',$req->id)->first();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('list-user')->with(['message'=>'Cập nhật thành công']);
    }

    public function delete(Request $req){
        $user = User::where('id',$req->id)->first();
        $user->delete();
        return redirect()->back()->with(['message'=>'Xóa thành công']);
    }

    public function profile(){
        return view('admin.profile');
    }

}
