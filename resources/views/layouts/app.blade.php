<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learner Progress App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Learner Progress</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <small>&copy; {{ date('Y') }} Learner Progress Dashboard</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
