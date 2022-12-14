<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        @guest
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        @else
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        @endguest
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @auth
                <!-- Ticket categories -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{__('Ticket categories')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('ticket-categories.index')}}">
                            {{ __('List of ticket categories') }}
                        </a>
                        <a class="dropdown-item" href="{{route('ticket-categories.create')}}">
                            {{ __('Create new ticket category') }}
                        </a>
                        <a class="dropdown-item" href="{{route('ticket-categories.deleted')}}">
                            {{ __('Deleted ticket categories') }}
                        </a>
                    </div>
                </li>
                <!-- Ticket categories -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{__('Tickets')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('tickets.index')}}">
                            {{ __('List of tickets') }}
                        </a>
                        <a class="dropdown-item" href="{{route('tickets.create')}}">
                            {{ __('Create new ticket') }}
                        </a>
                        <a class="dropdown-item" href="{{route('tickets.deleted')}}">
                            {{ __('Deleted tickets') }}
                        </a>
                    </div>
                </li>
                <!-- Customers -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{__('Customers')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('customers.index')}}">
                            {{ __('List of customers') }}
                        </a>
                        <a class="dropdown-item" href="{{route('customers.create')}}">
                            {{ __('Create new customer') }}
                        </a>
                        <a class="dropdown-item" href="{{route('customers.deleted')}}">
                            {{ __('Deleted customers') }}
                        </a>
                    </div>
                </li>
                <!-- Contacts -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{__('Contacts')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('contacts.phones')}}">
                            {{ __('Phone contacts') }}
                        </a>
                        <a class="dropdown-item" href="{{route('contacts.emails')}}">
                            {{ __('Email contacts') }}
                        </a>
                        <a class="dropdown-item" href="{{route('contacts.create')}}">
                            {{ __('Add new contact') }}
                        </a>
                        <a class="dropdown-item" href="{{route('contacts.deleted')}}">
                            {{ __('Deleted contacts') }}
                        </a>
                    </div>
                </li>
                <!-- Tasks -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{__('Tasks')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('tasks.index')}}">
                            {{ __('Task list') }}
                        </a>
                        <a class="dropdown-item" href="{{route('tasks.create')}}">
                            {{ __('Add task') }}
                        </a>
                    </div>
                </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>