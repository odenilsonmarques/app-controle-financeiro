<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <header class="mb">
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{route('index')}}">
                    Montante
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{route('index')}}">Início</a>
                        </li> --}}
                        @if(Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('releases.dash')}}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('releases.index')}}">Lançamentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('releases.create')}}">Lançar</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <x-responsive-nav-link class="nav-link" :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Sair') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Criar conta</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </nav>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-sm-12 text-center">
                    <span>2ps.com <br> problemas precisam de solução</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- Esse script está vindo antes por causa da renderizacao do grafico --}}
    <script src="{{asset('assets/js/chart.umd.js')}}"></script>
    @yield('script')
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/scriptFormatCoin.js')}}"></script>
    
</body>
</html>