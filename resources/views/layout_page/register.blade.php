<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('page_register/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('page_register/css/style.css')}}">
</head>
<body>

    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký</h2>
                        <form method="POST" action="{{url('regis')}}" class="register-form" id="register-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $err)
                                        <div class="alert alert-danger">
                                            {{$err}}
                                        </div>
                                    @endforeach
                                @endif
                                @if (session('erropass'))
                                        <div class="alert alert-danger">
                                            {{session('erropass')}}
                                        </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Họ và tên" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Địa chỉ email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="tel" name="phone" id="phone" placeholder="Số điện thoại" required/>
                            </div>
                            <div class="form-group">
                                <label for="identity"><i class="zmdi zmdi-account-box-mail"></i></label>
                                <input type="text" name="identity" id="identity" placeholder="Chứng minh nhân dân hoặc thẻ căn cước" required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="address" id="address" placeholder="Quê Quán" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Mật khẩu" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repassword" id="re_pass" placeholder="Nhập lại mật khẩu" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Đồng ý với những gì bạn đã điền là đúng</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng kí"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="page_register/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login" class="signup-image-link">Đã có tài khoản</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('page_register/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('page_register/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
