<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Ticketerie</title>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row">
            <!-- Menu latéral -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-primary bg-sidebar ">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-house-door"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">
                                <i class="bi bi-person"></i>
                                Événements
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('participants.index') }}">
                                <i class="bi bi-calendar-event"></i>
                                Utilisateurs
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <!-- Zone principale du contenu -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                @yield ('content')

            </main>
        </div>
    </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
</body>

</html>
