<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function index()
    {
        # code...
        $nv = User::where('position', '>', 0)->get();
        return view('view_admin.nhanvien.nhanvien',['nhanvien' => $nv]);
    }
    public function nhanvien()
    {
        # code...
        return view('view_admin.nhanvien.nhanvien');
    }
    public function themnhanvien()
    {
        # code...
        return view('view_admin.nhanvien.themnhanvien');
    }
    public function postthemnhanvien(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email|min:10',
            'phone' => 'required|unique:users,phone|min:10|max:10',
            'quequan' => 'required|min:5',
            'position' => 'required',
        ],
        [
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.min' => 'Nhập cả họ và tên',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'email.min' => 'Nhập email lớn hơn 10 ký tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.min' => 'Nhập số điện thoại cho đúng',
            'phone.max' => 'Nhập số điện thoại cho đúng',
            'quequan.required' => 'Bạn chưa nhập nơi hiện tại đang ở',
            'quequan.min' => 'Có thành phố nào ít hơn 5 ký hả',
            'position.required' => 'Bạn chưa chọn chức vụ',
        ]
    );
    if ($request->position == 1 || $request->position == 2) {
        # code...
        $this->validate($request,
        [
            'password' => 'required|min:3|max:30'
        ],
        [
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Nhập mật khẩu lớn hơn 3 ký tự',
            'password.max' => 'Nhập mật khẩu ít hơn 30 ký tự',
        ]
    );
    }
        # code...
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->quequan;
        $user->position = $request->position;
        if ($request->hasFile('file')) {
            # code...
            $file = $request->file('file');
            $fileType = $file->getClientOriginalExtension('file');
            if ($fileType == 'jpg' || $fileType == 'png' || $fileType == 'gif' || $fileType == 'jpeg') {
                # code...
                $filename = $file->getClientOriginalName('file');

                $Hinh =  Str::random(5)."-".$filename;

                while (file_exists('admin_assets/upload/'.$Hinh)) {
                    # code...
                    $Hinh =  Str::random(5)."-".$filename;

                }
                $file->move('admin_assets/upload/', $Hinh);

                $user->url_img = $Hinh;
            }else{
                return redirect('quanly/them-nhan-vien')->with('thongbaoimg', 'Không phải định dạng file ảnh, vui lòng chọn file có đuôi PNG, JPG, JPEG, GIF');

            }


        }else{
            $user->url_img = '';
        }
        if ($request->position == 1 || $request->position == 2) {
            # code...
            $user->password = bcrypt($request->password);
        }
        else{
            $user->password = '';
        }

        $user->save();

        return redirect('quanly/danh-sach-nhan-vien')->with('addnv', 'Thêm nhân viên '.$user->name.' thành công');
    }
    public function suanhanvien($id)
    {
        # code...
        $user = User::find($id);
        return view('view_admin.nhanvien.suanhanvien', ['user' => $user]);
    }
    public function postsuanhanvien(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->address = $request->quequan;

        $this->validate($request,
        [
            'name' => 'required|min:5',
            'quequan' => 'required|min:5',

        ],
        [
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.min' => 'Nhập cả họ và tên',
            'quequan.required' => 'Bạn chưa nhập nơi hiện tại đang ở',
            'quequan.min' => 'Có thành phố nào ít hơn 5 ký hả',
        ]
        );

        if ($request->position == 1 || $request->position == 2) {
            # code...
            $this->validate($request,
            [
                'password' => 'required|min:3|max:30'
            ],
            [
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Nhập mật khẩu lớn hơn 3 ký tự',
                'password.max' => 'Nhập mật khẩu ít hơn 30 ký tự',
            ]
        );
             $user->password = bcrypt($request->password);

        } else{
            $user->password = '';
        };

            $user->position = $request->position;
            if ($request->hasFile('file')) {
                # code...
                $file = $request->file('file');
                $fileType = $file->getClientOriginalExtension('file');
                if ($fileType == 'jpg' || $fileType == 'png' || $fileType == 'gif' || $fileType == 'jpeg') {
                    # code...
                    $filename = $file->getClientOriginalName('file');

                    $Hinh =  Str::random(5)."-".$filename;

                    while (file_exists('admin_assets/upload/'.$Hinh)) {
                        # code...
                        $Hinh =  Str::random(5)."-".$filename;

                    }
                    $file->move('admin_assets/upload/', $Hinh);

                    $user->url_img = $Hinh;
                }else{
                    return redirect('quanly/them-nhan-vien')->with('thongbaoimg', 'Không phải định dạng file ảnh, vui lòng chọn file có đuôi PNG, JPG, JPEG, GIF');

                }


            };

            $user->save();

            return redirect('quanly/danh-sach-nhan-vien')->with('edit-nhanvien', 'Sửa nhân viên '.$user->name.' thành công');
    }
    public function suaquanly($id)
    {
        # code...
        $user = User::find($id);
        return view('view_admin.nhanvien.suaquanly', ['user' => $user]);
    }
    public function postsuaquanly(Request $request, $id)
    {
        # code...
        $user = User::find($id);
        $user->name = $request->name;
        $user->address = $request->quequan;

        $this->validate($request,
        [
            'name' => 'required|min:5',
            'quequan' => 'required|min:5',

        ],
        [
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.min' => 'Nhập cả họ và tên',
            'quequan.required' => 'Bạn chưa nhập nơi hiện tại đang ở',
            'quequan.min' => 'Có thành phố nào ít hơn 5 ký hả',
        ]
        );

        if ($request->hasFile('file')) {
            # code...
            $file = $request->file('file');
            $fileType = $file->getClientOriginalExtension('file');
            if ($fileType == 'jpg' || $fileType == 'png' || $fileType == 'gif' || $fileType == 'jpeg') {
                # code...
                $filename = $file->getClientOriginalName('file');

                $Hinh =  Str::random(5)."-".$filename;

                while (file_exists('admin_assets/upload/'.$Hinh)) {
                    # code...
                    $Hinh =  Str::random(5)."-".$filename;

                }
                $file->move('admin_assets/upload/', $Hinh);

                $user->url_img = $Hinh;
            }else{
                return redirect('quanly/them-quan-ly')->with('thongbaoimg', 'Không phải định dạng file ảnh, vui lòng chọn file có đuôi PNG, JPG, JPEG, GIF');

            }


        };

        if ($request->mu == 'on') {
            # code...
            $this->validate($request,
                [
                    'passwordold' => 'required',
                    'passwordnew' => 'required|min:3|max:100',
                    'repasswordnew' => 'required',

                ],
                [
                    'passwordold.required' => 'Nhập mật khẩu cũ đi',
                    'passwordnew.required' => 'Bạn chưa nhập mật khẩu mới',
                    'repasswordnew.required' => 'Bạn chưa nhập lại mật khẩu',
                    'passwordnew.min' => 'Nhập mật khẩu mới lớn hơn 3 ký tự',
                    'passwordnew.max' => 'Nhập lại mật khẩu mới nhỏ hơn 100 ký tự'

                ]
            );
            if (Hash::check($request->passwordold, $user->password)) {
                # code...
                if ($request->passwordnew == $request->repasswordnew) {
                    # code...
                    $user->password = bcrypt($request->repasswordnew);

                }
                else {
                return redirect('quanly/sua-quan-ly/'.$id)->with('editpass', 'Nhập lại mật khẩu không khớp');

                }
            }else{
                return redirect('quanly/sua-quan-ly/'.$id)->with('checkpass', 'Mật khẩu cũ không khớp');
            }
        }
        $user->save();
        return redirect('quanly/danh-sach-nhan-vien')->with('edit-nhanvien', 'Sửa quản lý '.$user->name.' thành công');
    }

    public function xoanhanvien($id)
    {
        # code...
        $xoaUser = User::find($id);
        $xoaUser->delete();
        return redirect('quanly/danh-sach-nhan-vien')->with('delete-nhanvien', 'Xóa nhân viên '.$xoaUser->name.' thành công');
    }


    public function login()
    {
        if (Auth::check() && (Auth::user()->position == 1 || Auth::user()->position == 2)) {

            return redirect('admin');
        }else{
            return view('view_admin.login');
        }

    }

    public function adminLogin(Request $request)
    {
      # code...
      $this->validate($request ,
            [
                'password' => 'min:3|max:100'
            ],

            [
                'password.min' => 'Nhập mật khẩu hơn 3 ký tự',
                'password.max' => 'Nhập mật khẩu ít hơn 100 ký tự'
            ]
        );

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password], $request->has('remember'))) {
            # code...
            return redirect('quanly');
        }else{
            return redirect('quanly/login')->with('errorno', 'Sai email, số điện thoại hoặc mật khẩu');
        }
    }
    public function logout()
    {
        # code...
        Auth::logout();
        return redirect('quanly/login');
    }
}
