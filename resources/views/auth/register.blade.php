<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/register.css">
    <script src="/js/script.js"> </script>
    <title> Bluket </title>
</head>
<body>

    <header>
        <nav>

            <a class="logo" href="/"> BLUKET </a>

            <form action="/products" method="GET">
                <input type="text" class="search" id="search" name="search" placeholder=" Search your product here!">
            </form>

            <ul class="nav-list">
            <ul class="nav-list">
                @guest
                    <li> <a class="menu" href="/login"> Login </a> </li>
                    <li> <a class="menu" href="/register"> Register </a> </li>
                @endguest

                @auth
                    <li> <a class="menu" href="/profile"> Profile </a> </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="menu" onclick="event.preventDefault();this.closest('form').submit();"> Sair </a>
                        </form> 
                    </li>
                    @if(($user->id) == 1)
                        <li> <a class="menu" href="/product/create"> Create </a> </li>
                    @else
                    
                    @endif               
                @endauth
            </ul>
            </ul>

            <div onclick="show()" class="mobile_menu">
                <div class="line1"> </div>
                <div class="line2"> </div>
                <div class="line3"> </div>
            </div>

        </nav>
    </header>

    <section>
        <form class="form-register" method="POST" action="{{ route('register') }}">
            @csrf

            <p class="register-title"> BLUKET </p>

            <div class="adjust-register">
                <input class="name-input" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Write here your name."/>
            </div>

            <div class="adjust-register">
                <input class="email-input" id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Write here your email."/>
            </div>

            <div class="adjust-register">
                <input class="password-input" id="password" type="password" name="password" required autocomplete="new-password" placeholder="Write here your password."/>
            </div>

            <div class="adjust-register">
                <input class="confirm-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm here your password."/>
            </div>

                <button class="button-register">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </section>
    </body>
</html>