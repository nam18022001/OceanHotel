<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\phong;
use App\Models\KhachHang;
use App\Models\build;
use Auth;
use App\Jobs\SendEmail;

class KHController extends Controller
{
    //
    public function FunctionName(Type $var = null)
    {
        # code...
    }
    public function khpage()
    {
        # code...
        $id = Auth::guard('loyal_customer')->user()->id;
        $build = build::where('id_khachhang', $id)->get();

        return view('view_page.khachhang.index', ['build' => $build]);

    }
    public function booking(Request $request, $id)
    {
        # code...
        // $buildfind = build::where('id_khachhang', $id);

        $booking = KhachHang::find($id);
        if ($booking->bookingon == 0) {
            # code...

        $booking->bookingon = 1;
        $booking->save();

        $phong = phong::where('id', $request->phong)->first();
        $phong->status = 1;
        $phong->save();

        $build = new build();
        $build->id_khachhang = $id;
        $build->id_phong = $request->phong;
        $build->date_book = $request->bookingdate;
        $build->check_out = $request->checkout;
        $build->status = 1;
        $build->save();


    }else {
        # code...
        return redirect('khach-hang')->with('booked', 'Bạn đã đặt phòng');
    }
    // return  0;
    return redirect('khach-hang');
    }
    public function registering()
    {
        # code...
        if (Auth::guard('loyal_customer')->check()) {
            # code...
            return redirect('/');
        }else{
        return view('layout_page.register');
        }
    }
    public function postregistering(Request $request)
    {
        # code...
        $this->validate($request,
        [
            'name' => 'min:5|max:100',
            'phone' => 'unique:khachhang,phone|min:10|max:10',
            'email' => 'unique:khachhang,email|min:10|max:255',
            'identity' => 'unique:khachhang,Identity|min:9|max:12',
            'address' => 'min:5|max:255',
            'password' => 'min:3|max:50',

        ],
        [
            'name.min' => 'Vui lòng nhập tên trên 5 chữ',
            'name.max' => 'Vui lòng nhập tên dưới 100 chữ',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.min' => 'Vui lòng nhập đúng số điện thoại',
            'phone.max' => 'Vui lòng nhập đúng số điện thoại',
            'identity.unique' => 'Thẻ căn cước hoặc chứng minh nhân dân đã tồn tại',
            'identity.min' => 'Vui lòng nhập đúng số chứng minh nhân dân hoặc thẻ căn cước',
            'identity.max' => 'Vui lòng nhập đúng số chứng minh nhân dân hoặc thẻ căn cước',
            'email.unique' => 'Email đã tồn tại',
            'email.min' => 'Vui lòng nhập đúng địa chỉ email',
            'email.max' => 'Vui lòng nhập đúng địa chỉ email',
            'password.min' => 'Vui lòng nhập mật khẩu trên 3 ký tự',
            'password.max' => 'Vui lòng nhập mật khẩu dưới 50 ký tự',
        ]
        );

        $newKH = new KhachHang();
        $newKH->name = $request->name;
        $newKH->phone = $request->phone;
        $newKH->email = $request->email;
        $newKH->address = $request->address;
        $newKH->Identity = $request->identity;
        if ($request->password == $request->repassword) {
            # code...
        $newKH->password = bcrypt($request->repassword);
        }else{
            return redirect()->back()->with('erropass', 'Nhập lại mật khẩu không khớp');
        }
        $newKH->save();
        return redirect('login')->with('successregis', 'Bạn đã đăng ký thành công, hãy đăng nhập để tiếp tục khám phá');
    }
    public function login()
    {
        # code...
        if (Auth::guard('loyal_customer')->check()) {
            # code...
            return redirect('/');
        }else{
        return view('layout_page.login');
        }
    }
    public function postlogin(Request $request)
    {
        # code...
        $this->validate($request ,
        [
            'pass' => 'min:3|max:100'
        ],

        [
            'pass.min' => 'Nhập mật khẩu hơn 3 ký tự',
            'pass.max' => 'Nhập mật khẩu ít hơn 100 ký tự'
        ]
    );

        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không

        if (Auth::guard('loyal_customer')->attempt(['email' => $request->email, 'password' => $request->pass,], $request->has('remember'))) {

            return redirect('/');
        } else {
            return redirect('login')->with('loi-login', 'Sai email hoặc mật khẩu');
        }
    }
    public function logout()
    {
        # code...

        Auth::guard('loyal_customer')->logout();
        return redirect('/');
    }
}
