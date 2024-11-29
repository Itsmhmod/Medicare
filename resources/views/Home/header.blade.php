<div class="header">
    <a href="#home" class="logo"><i class="fas fa-heartbeat"></i> medicare.</a>
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#services">services</a>
        <a href="#about">about</a>
        <a href="#doctors">doctors</a>
        <a href="#book">book</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
        {{-- @if (!Auth::guard('doctor')) --}}
        {{-- <a href="/doctor/login"
            style="border: 1px solid black; padding:4px;border-radius: 5px;background-color: #16a085;color: white">Login</a> --}}
        {{-- @else --}}
        {{-- <a href="/dashboardDoctor" --}}
        {{-- style="border: 1px solid black; padding:4px;border-radius: 5px;background-color: #16a085;color: white">Dashboard</a> --}}
        {{-- @endif --}}

        @if (!Auth::guard('doctor')->check())
            <a href="/doctor/login"
                style="border: 1px solid black; padding:4px; border-radius: 5px; background-color: #16a085; color: white;">
                Login
            </a>
        @else
            <a href="/dashboardDoctor"
                style="border: 1px solid black; padding:4px; border-radius: 5px; background-color: #16a085; color: white;">
                Dashboard
            </a>
        @endif
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</div>
