<div class="col-md-3">
    <div class="card">
        <div class="card-header">{{ __('Menu') }}</div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page">
                        <i class="bi bi-house me-2"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cards.listar') }}" class="nav-link {{ request()->routeIs('cards.*') ? 'active' : '' }}" aria-current="page">
                        <i class="bi bi-credit-card me-2"></i>
                        Cards
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>