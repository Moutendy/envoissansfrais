@extends('welcome')

@section('content')
<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item">
                <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox">
                {{ Auth::user()->name }}
            </a>
          <div id="class_iduser">
            {{ Auth::user()->id }}
          </div>

        </div>
        <div >
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-item">
                    menu
                </a>
                <div class="navbar-dropdown">
                    @if (!empty($role))
                    @if ($role->name == 'agencier')
                    <a class="navbar-item" href="{{ route('addpost') }}">
                        Add Post
                        </a>
                    @endif

                    @elseif(empty($role))

                    @endif

                    <a class="navbar-item" href="{{ route('profil') }}">
                    Profile
                    </a>
                    <a class="navbar-item" href="{{ route('transaction') }}">
                    Transaction
                    </a>
                    <a class="navbar-item" href="{{ route('transactionreceiver') }}">
                        Transaction Receiver
                    </a>
                    <a class="navbar-item" href="{{ route('userOfApplication') }}">
                            Utilisateurs
                    </a>
                    <hr class="navbar-divider">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="navbar-item">
                            {{ __('Log Out') }}
                    </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>
<div class="columns body-columns conteneur">

    <div class="column is-half is-offset-one-quarter" id="card-container">
    </div>
   </div>
</div>

<!-- The Modal -->

@endsection
