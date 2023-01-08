<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h2>Caffe <em>Coklat</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item {{ ($title === 'Home' ? 'active' : '' ) }}">
                        <a class="nav-link" href="/">Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Products' ? 'active' : '' ) }}" href="/product">Our
                            Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'About Us' ? 'active' : '' ) }}" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Contact' ? 'active' : '' ) }}" href="/contact">Contact
                            Us</a>
                    </li>
                    @if (auth()->user()->level == 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard Admin</a></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <a>Logout</a>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent">
                                <a class="nav-link">Logout</a>
                            </button>
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>