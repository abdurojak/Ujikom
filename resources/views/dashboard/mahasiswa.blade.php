@extends('../themes/' . $activeTheme . '/' . $activeLayout)

@section('subhead')
    <title>Accordion - Midone - Tailwind Admin Dashboard Template</title>
@endsection

@section('subcontent')
    <h1>Selamat datang, Mahasiswa!</h1>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
