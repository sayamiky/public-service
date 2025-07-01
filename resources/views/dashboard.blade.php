{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Public Service</a>
            <div class="dropdown ms-auto">
                <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                    <li>
                        {{-- <form method="POST" action="{{ route('logout') }}">
                            @csrf --}}
                        <button class="dropdown-item" type="submit">Logout</button>
                        {{-- </form> --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Menu -->
            <nav class="col-md-2 d-none d-md-block bg-white sidebar border-end vh-100">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item mb-2">
                                <a class="nav-link" href="{{ route('categories.show', $category->id) }}">
                                    <i class="bi bi-tag"></i> {{ $category->name }}
                                </a>
                                <ul class="nav flex-column ms-3">
                                    @foreach ($category->services as $service)
                                        <li class="nav-item mb-1">
                                            <a class="nav-link" href="{{ route('services.show', $service->id) }}">
                                                <i class="bi bi-chevron-right"></i> {{ $service->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="{{ route('profile') }}">
                                <i class="bi bi-person"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            {{-- <form method="POST" action="{{ route('logout') }}">
                                @csrf --}}
                            <button class="nav-link btn btn-link text-start" type="submit">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                            {{-- </form> --}}
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <h2>Welcome, {{ Auth::user()->name }}!</h2>
                <div class="alert alert-success mt-3">
                    You're logged in!
                </div>
                <!-- Add your dashboard content here -->
            </main>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CDN (optional for icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>

</html>
