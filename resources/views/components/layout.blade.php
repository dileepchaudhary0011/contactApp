<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{  url('contacts') }}">Contacts</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{  url('contacts/create') }}">Add New</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#"
                            onclick="event.preventDefault();this.closest('form').submit();">
                      Logout
                    </a>
                </form>
            </li>
        </ul>
    </div>
    {{-- <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form> --}}
    @yield('content')
</body>
</html>
