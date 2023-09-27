<style>
    #logincss {
        color: rgb(247, 68, 78);

    }

    .log {
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<header class="header_section">
    <div class="container d-flex justify-content-between">
        <nav class="navbar navbar-expand-lg custom_nav-container flex ">
            <a class="navbar-brand" href=""><img width="70" src="images/LOGO.svg" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show_cart') }}">Cart</a>
                    </li>
                    <!-- start serch bar-->
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    <!-- end search bar-->

                </ul>
            </div>
        </nav>

        <div class="d-flex justify-content-end align-content-center mt-1">
            @if (Route::has('login'))
                @auth
                    <!-- start login btn-->
                    <span class="nav-item">
                        <x-app-layout>

                        </x-app-layout>
                    </span>
                @else
                    <span class="nav-item">

                        <a class="fas fa-user-plus" href="{{ route('login') }}" id="logincss"> <span
                                class="log">Login</span> </a>
                    </span>
                    <!-- end login btn-->

                    <!-- start register btn-->
                    <span class="nav-item">
                        <a class="fas fa-sign-in-alt" href="{{ route('register') }} " id="logincss"> <span
                                class="log">Register</span> </a>
                    </span>
                    <!-- end register btn-->
                @endauth
            @endif
        </div>
    </div>
</header>
