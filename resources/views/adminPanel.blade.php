@extends('layouts.app')

@section('content')


<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>


<button onclick="window.location='/skupine'" class="btn btn-primary"> Skupine </button>
<button onclick="window.location='/oblike'" class="btn btn-primary"> Oblike </button>
<button onclick="window.location='/okusi'" class="btn btn-primary"> Okusi </button>
<button onclick="window.location='/prelivi'" class="btn btn-primary"> Prelivi </button>
<button onclick="window.location='/dekori'" class="btn btn-primary"> Okrasi </button>


@endsection

