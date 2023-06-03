<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dashboard.css">
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
            </ul>

            <div onclick="show()" class="mobile_menu">
                <div class="line1"> </div>
                <div class="line2"> </div>
                <div class="line3"> </div>
            </div>

        </nav>
    </header>

    <section>
        <p class="cart_title"> Thats your actual cart in Bluket, {{ $user->name }}... </p>
        <div class="container">
            @foreach ($products as $product)
                <div class="product">
                    <div class="adjustment">
                        <img class="product_img" src="/img/products/{{ $product->image }}">
                        <div class="product_subtitles">
                            <p class="product_title"> {{ $product->title }} </p>
                            <p class="product_price"> R$ {{ $product->price }} </p>
                        </div>
                    </div>

                    <div class="options">
                        <form action="/product/remove/{{ $product->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input class="excluir_button" type="submit" value="Remover">
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    
</body>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>