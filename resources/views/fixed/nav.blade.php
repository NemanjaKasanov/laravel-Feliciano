<div class="py-1 bg-black top">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+ 1-978-123-4567</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">feliciano_restaurant@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                        <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>9:00AM - 11:00PM</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Feliciano</a>
        @if(session()->has('user'))
            <span> | {{ session()->get('user')->name }} {{ session()->get('user')->last_name }}</span>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    @foreach($navs as $nav)
                        <li class="nav-item"><a href="{{ route($nav->href) }}" class="nav-link">{{ $nav->name }}</a></li>
                    @endforeach

                    @if(session()->has('user'))
                        <li class="nav-item cta">
                                @csrf
                                <a href="{{ route("order") }}" class="nav-link">Your Order (<span id="orderItemsNumber">0</span>)</a>
                        </li>
                    @else
                        <li class="nav-item cta"><a href="#" class="nav-link disabled">Feliciano</a></li>
                    @endif
                </ul>
        </div>
    </div>
</nav>
