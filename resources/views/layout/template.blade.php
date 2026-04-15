<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Management')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #0d6efd;
            color: white;
            transition: 0.3s;
            padding-top: 60px;
            z-index: 999;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Content shift */
        .content {
            transition: 0.3s;
        }

        .content.shift {
            margin-left: 250px;
        }

        .menu-btn {
            font-size: 22px;
            cursor: pointer;
            margin-right: 15px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
    <div class="d-flex justify-content-between align-items-center px-3 mb-3">
        <h5 class="m-0">Menu</h5>
        <span onclick="toggleSidebar()" style="cursor:pointer;">❌</span>
    </div>

    @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('categories.index') }}">📂 Categories</a>
        <a href="{{ route('items.index') }}">📦 Items</a>
        <a href="{{ route('users.index') }}">👤 Users</a>
    @endif

    @if(auth()->check() && auth()->user()->role === 'operator')
        <a href="{{ route('item.index') }}">📋 Staff Items</a>
        <a href="{{ route('lending.index') }}">📝 Lendings</a>
    @endif
</div>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="menu-btn text-white" onclick="toggleSidebar()">☰</span>
            <span class="navbar-brand mb-0 h1">Aplikasi Management</span>

            @if (auth()->check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-light btn-sm">Logout</button>
            </form>
            @endif
            
        </div>
    </nav>

    <!-- Content -->
    <div id="content" class="content container mt-4">
        @yield('content')
    </div>

    <!-- Script -->
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('shift');
        }
    </script>

</body>
</html>