<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="bg-blue-100 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white flex flex-col">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-6">Doctor</h2>
                <ul class="space-y-3">
                    <li><a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-800"><i class="fas fa-chart-pie mr-2"></i> Dashboard</a></li>
                    <li><a href="{{ route('doctorappoinment', PatientsController::class) }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-800"><i class="fas fa-user-injured mr-2"></i> Appoinments</a></li>
            

                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Top Header -->
            <header class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">@yield('title')</h1>
                <div>
                    <span class="text-gray-600">Welcome, Admin</span>
                </div>
            </header>

            <!-- Stats Cards -->
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6" style="box-shadow: -7,0, 0px,-5px rgb(61, 53, 53)">
                @yield('stats')
            </section>

            <!-- Main Content Area -->
            <section>
                @yield('doctorcontent')
            </section>
        </main>
    </div>
</body>
</html>
