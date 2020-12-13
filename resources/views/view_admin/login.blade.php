<!doctype html>
<html lang="en">
  <head>
    <title>Đăng nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- free style --}}
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			user-select: none;
		}
		.bg-img{
			background: url('https://devforum.info/DEMO/LoginForm2/bg.jpg');
			height: 100vh;
			background-size: cover;
			background-position: center;
		}
		.bg-img:after{
			position: absolute;
			content: '';
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			background: rgba(0,0,0,0.7);
		}
		.content{
			position: absolute;
			top: 50%;
			left: 50%;
			z-index: 999;
			text-align: center;
			padding: 60px 32px;
			width: 370px;
			transform: translate(-50%,-50%);
			background: rgba(255,255,255,0.04);
			box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
		}
		.content header{
			color: white;
			font-size: 33px;
			font-weight: 600;
			margin: 0 0 35px 0;
			font-family: 'Montserrat',sans-serif;
		}
		.field{
			position: relative;
			height: 45px;
			width: 100%;
			display: flex;
			background: rgba(255,255,255,0.94);
		}
		.field span{
			color: #222;
			width: 40px;
			line-height: 45px;
		}
		.field input{
			height: 100%;
			width: 100%;
			background: transparent;
			border: none;
			outline: none;
			color: #222;
			font-size: 16px;
			font-family: 'Poppins',sans-serif;
		}
		.space{
			margin-top: 16px;
		}
		.show{
			position: absolute;
			right: 13px;
			font-size: 13px;
			font-weight: 700;
			color: #222;
			display: none;
			cursor: pointer;
			font-family: 'Montserrat',sans-serif;
		}
		.pass-key:valid ~ .show{
			display: block;
		}
		.pass{
			text-align: left;
			margin: 10px 0;
		}
		.pass a{
			color: white;
			text-decoration: none;
			font-family: 'Poppins',sans-serif;
		}
		.pass:hover a{
			text-decoration: underline;
		}
		.field input[type="submit"]{
			background: #3498db;
			border: 1px solid #2691d9;
			color: white;
			font-size: 18px;
			letter-spacing: 1px;
			font-weight: 600;
			cursor: pointer;
			font-family: 'Montserrat',sans-serif;
		}
		.field input[type="submit"]:hover{
			background: #2691d9;
		}
		.login{
			color: white;
			margin: 20px 0;
			font-family: 'Poppins',sans-serif;
		}
		.links{
			display: flex;
			cursor: pointer;
			color: white;
			margin: 0 0 20px 0;
		}
		.facebook,.instagram{
			width: 100%;
			height: 45px;
			line-height: 45px;
			margin-left: 10px;
		}
		.facebook{
			margin-left: 0;
			background: #4267B2;
			border: 1px solid #3e61a8;
		}
		.instagram{
			background: #E1306C;
			border: 1px solid #df2060;
		}
		.facebook:hover{
			background: #3e61a8;
		}
		.instagram:hover{
			background: #df2060;
		}
		.links i{
			font-size: 17px;
		}
		i span{
			margin-left: 8px;
			font-weight: 500;
			letter-spacing: 1px;
			font-size: 16px;
			font-family: 'Poppins',sans-serif;
		}
		.signup{
			font-size: 15px;
			color: white;
			font-family: 'Poppins',sans-serif;
		}
		.signup a{
			color: #3498db;
			text-decoration: none;
		}
		.signup a:hover{
			text-decoration: underline;
		}
    </style>
</head>
  <body>
    <div class="bg-img">

		<div class="content">
            @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @if (session('errorno'))
            <div class="alert alert-danger" role="alert">
                {{session('errorno')}}
            </div>
        @endif
        @if (session('loi'))
            <div class="alert alert-danger" role="alert">
                {{session('loi')}}
            </div>
        @endif
        @if (session('loia'))
            <div class="alert alert-danger" role="alert">
                {{session('loia')}}
            </div>
        @endif
			<header>Đăng nhập</header>
            <form action="{{url('quanly/login')}}" method="POST">
                {{ csrf_field() }}
				<div class="field">
					<span class="fa fa-user"></span>
					<input type="text" name="username" required placeholder="Nhập Email hoặc Số điện thoại">
				</div>
				<div class="field space">
					<span class="fa fa-lock"></span>
					<input type="password" name="password"  required class="pass-key" placeholder="Nhập mật khẩu">
					<span class="show"><i class="fas fa-eye"></i></span>
                </div>
                <div class="pass">
					<input type="checkbox" name="remember" id="remember">
                    <label style="color: #fff" for="remember">Lưu đăng nhập?</label>

				</div>
				<div class="pass">
					<a href="#">Quên mật khẩu?</a>
				</div>
				<div class="field">
					<input type="submit" value="Đăng nhập">
				</div>
			</form>
		</div>
    </div>
    {{-- free js --}}
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        /*Chèn Fontawesome dô nghen:  https://kit.fontawesome.com/a076d05399.js*/

		const pass_field = document.querySelector('.pass-key');
		const showBtn = document.querySelector('.fas');
		showBtn.addEventListener('click', function(){
			if(pass_field.type === "password"){
				pass_field.type = "text";
                showBtn.classList.remove('fa-eye');
				showBtn.classList.add('fa-eye-slash');

				showBtn.style.color = "#3498db";
			}else{
				pass_field.type = "password";
                showBtn.classList.remove('fa-eye-slash');
                showBtn.classList.add('fa-eye');
				showBtn.style.color = "#222";
			}
		});

    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
