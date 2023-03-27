<div class="row g-0 h-100">
    <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarNavDropdown">
        @if (Auth::user()->role == 'admin')
            <a href="/dashboard" @if (request()->route()->uri == 'dashboard')  class='active' @endif>Dashboard</a>
            <a href="/user" @if (request()->route()->uri == 'user')  class='active' @endif>Users</a>
            <a href="/book" @if (request()->route()->uri == 'book')  class='active' @endif>Books</a>
            <a href="/category" @if (request()->route()->uri == 'category')  class='active' @endif>Categories</a>
            <a href="/rentbooks" @if (request()->route()->uri == 'rentbooks')  class='active' @endif>Rent Logs</a>                
            @else
            <a href="/home" @if (request()->route()->uri == 'home')  class='active' @endif>Home</a>
            <a href="/rentlogs" @if (request()->route()->uri == 'rentlogs')  class='active' @endif>Rent Logs</a>
            <a href="/list" @if (request()->route()->uri == 'list')  class='active' @endif>List to Read</a>
        @endif
    </div>