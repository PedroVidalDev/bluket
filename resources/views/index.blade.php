<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
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
                @guest
                    <li> <a class="menu" href="/login"> Login </a> </li>
                    <li> <a class="menu" href="/register"> Register </a> </li>
                @endguest

                @auth
                    <li> <a class="menu" href="/profile"> Profile </a> </li>
                    <li> <a class="menu" href="/dashboard"> Carrinho </a> </li>
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

            <div onclick="show()" class="mobile_menu">
                <div class="line1"> </div>
                <div class="line2"> </div>
                <div class="line3"> </div>
            </div>

        </nav>

        <div class="lista-categorias">
            <div class="adjust-categoria">
                <p class="lista-categorias-title"> PC Case </p>
            </div>

            <div class="adjust-categoria">
                <p class="lista-categorias-title"> Keyboards </p>
            </div>

            <div class="adjust-categoria">
                <p class="lista-categorias-title"> Mouses </p>
            </div>

            <div class="adjust-categoria">
                <p class="lista-categorias-title"> Mousepad </p>
            </div>

            <div class="adjust-categoria">
                <p class="lista-categorias-title"> Chair </p>
            </div>

            <div class="adjust-categoria">
                <p class="lista-categorias-title"> Desk </p>
            </div>

            <div class="adjust-categoria">
                <p class="lista-categorias-title"> Headsets </p>
            </div>

            <div class="adjust-categoria">
                <p class="lista-categorias-title"> Gamepad </p>
            </div>
        </div>
    </header>

    <section>
        <div class="products-list">
            <div class="mouse-list">
                <p class="mouse-title"> Mouses </p>
                <div class="products-mouse-list"> 
                    @foreach($products_mouse as $mouse)
                        <a href="/products/show/{{ $mouse->id }}">
                            <div class="container-mouse">
                                <div class="div_image_mouse" style="background-image: url('img/products/{{ $mouse->image }}');"></div>
                                <p class="product-mouse-title"> {{ $mouse->title }} </p>
                                <p class="product-mouse-price"> $ {{ $mouse->price }} </p>
                                <button class="button_buy"> More </button>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="teclado-list">
                <p class="teclado-title"> Keyboards </p>
                <div class="products-teclado-list"> 
                    @foreach($products_keyboard as $keyboard)
                        <a href="/products/show/{{ $keyboard->id }}">
                            <div class="container-teclado">
                                <div class="div_image_teclado" style="background-image: url('img/products/{{ $keyboard->image }}');"></div>
                                <p class="product-teclado-title"> {{ $keyboard->title }} </p>
                                <p class="product-teclado-price"> {{ $keyboard->price }} </p>
                                <button class="button_buy"> More </button>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
        <br>
        <form action="#" method="GET">
            <input type="text" class="search" id="search" name="search" placeholder=" Search to see more products!">
        </form>
    </section>
    
</body>

</html>