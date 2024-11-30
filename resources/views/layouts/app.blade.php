<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Survey Management System') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS (optional) -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        nav.navbar {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-success, .btn-danger {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Survey Management System') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surveys.index') }}">Surveys</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('surveys.create') }}">Create Survey</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center mt-5 py-4 bg-light">
        <p class="mb-0">&copy; {{ date('Y') }} Survey Management System. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS (for dynamic functionality) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add HT Line Section
            document.querySelector('.add-ht-line').addEventListener('click', function () {
                const htLineSection = document.querySelector('#ht-line-section');
                const newSection = htLineSection.cloneNode(true);
                htLineSection.parentNode.insertBefore(newSection, htLineSection.nextSibling);
                newSection.querySelectorAll('input, select').forEach(input => input.value = '');
            });

            // Remove HT Line Section
            document.querySelectorAll('.remove-ht-line').forEach(button => {
                button.addEventListener('click', function () {
                    this.closest('.row').remove();
                });
            });

            // Add Transformer Section
            document.querySelector('.add-transformer').addEventListener('click', function () {
                const transformerSection = document.querySelector('#transformer-section');
                const newSection = transformerSection.cloneNode(true);
                transformerSection.parentNode.insertBefore(newSection, transformerSection.nextSibling);
                newSection.querySelectorAll('input, select').forEach(input => input.value = '');
            });

            // Remove Transformer Section
            document.querySelectorAll('.remove-transformer').forEach(button => {
                button.addEventListener('click', function () {
                    this.closest('.row').remove();
                });
            });

            // Add Connection Section
            document.querySelector('.add-connection').addEventListener('click', function () {
                const connectionSection = document.querySelector('#connection-section');
                const newSection = connectionSection.cloneNode(true);
                connectionSection.parentNode.insertBefore(newSection, connectionSection.nextSibling);
                newSection.querySelectorAll('input, select').forEach(input => input.value = '');
            });
        });
    </script>
</body>
</html>
