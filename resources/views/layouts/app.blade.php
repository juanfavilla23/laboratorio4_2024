<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Gestión Escolar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Gestión Escolar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subjects.index') }}">Materias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('commissions.index') }}">Comisiones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('professors.index') }}">Profesores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('course_students.index') }}">Inscripciones de Estudiantes</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <footer class="footer bg-light mt-auto py-3">
        <div class="container">
            <span class="text-muted">© 2024 Gestión Escolar. Todos los derechos reservados.</span>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
