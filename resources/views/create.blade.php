<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/create.css">
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
        <div class="create-container">
            <div>
                <p class="create-title"> Create </p>
                <p class="description"> Time to adicionate another product! </p>
            </div>
            <form class="product-submit" action="/product/create/insert" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="ajustador-create">
                    <input class="title" type="text" name="title" placeholder=" Product's name">
                </div>
                <div class="ajustador-create">
                    <input class="price" type="number" name="price" min="1" placeholder=" Product's price">
                </div>
                <div class="ajustador-create">
                    <input class="image" type="file" name="image">
                </div>
                <div class="ajustador-create">
                    <button type="submit"> Go </button>
                </div>
            </form>
        </div>
    </section>
    
</body>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>