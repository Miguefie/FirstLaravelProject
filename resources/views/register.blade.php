<!--
 * Created by PhpStorm.
 * User: miguelfialho
 * Date: 20/06/18
 * Time: 09:10
 -->

@extends('layouts.app')

@section('content')

<link href="{{asset('/css/login.css')}}" rel="stylesheet" />
<script src='https://www.google.com/recaptcha/api.js'></script>


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
					<span class="login100-form-title">
						Criar Conta
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Nome Inválido">
                    <input class="input100" type="text" name="name" placeholder="Nome">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Utilizador Inválido">
                    <input class="input100" type="text" name="username" placeholder="Utilizador">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password é necessária">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Email Inválido">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="g-recaptcha" data-sitekey="6LcQaUAUAAAAAG2Z6n5SXQKmD5pDdPEzINuErm_7"></div>

                @if($errors->has('error1'))
                    @foreach ($errors->all() as $error)
                        <div class="alert bg-red alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif



                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Criar Conta
                    </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ route('login') }}">
                        Já Têm Conta? Faça Login
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })

    window.onload = function() {
        var $recaptcha = document.querySelector('#g-recaptcha-response');

        if($recaptcha) {
            $recaptcha.setAttribute("required", "required");
        }
    };
</script>
@endsection




