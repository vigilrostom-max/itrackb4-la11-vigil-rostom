<nav class="bg-light border-bottom">
    <div class="container nav nav-pills">
        <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">Product
            List</a>
        <a class="nav-link" href="{{ route('products.featured') }}">Featured
            Product</a>
        <a class="nav-link" href="{{ route('products.show', 1) }}">First
            Product</a>
    </div>
</nav>
