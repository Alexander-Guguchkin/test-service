<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('test-cases.index') }}">Test Service</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('test-cases.index') }}">Тест-кейсы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('features.index') }}">Функционал</a>
                </li>
                @auth
                    <li class="nav-item d-flex align-items-center">
                        <span class="nav-link fw-semibold">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger ms-2">Выйти</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
