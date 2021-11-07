@extends('layout')

@section('title', '⌂')

@section('content')
<iframe id="iframe" style="display: none;"></iframe>
<form action="{{ route('auth.activation') }}" method="post" enctype="application/x-www-form-urlencoded" target="iframe" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;" novalidate>
    @csrf

    <button type="submit">Notif</button>
</form>
@endsection

@push('css')<link rel="stylesheet" type="text/css" href="#" />@endpush
@push('prejs')<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.2/echo.iife.min.js"></script>@endpush
@push('prejs')<script type="text/javascript" src="{{ env('LARAVEL_ECHO_SERVER_HOST', env('APP_HOST')) }}:{{ env('LARAVEL_ECHO_SERVER_PORT') }}/socket.io/socket.io.js"></script>@endpush
@push('postjs')
<script type="text/javascript">

window.var =
{
    host: '{{ env("LARAVEL_ECHO_SERVER_HOST", env("APP_HOST")) }}',
    port: '{{ env("LARAVEL_ECHO_SERVER_PORT") }}',

    socketkey: '9461a9c696592420e87a507621f80803',
    csrf: '{{ csrf_token() }}',
};

window.socket = new Echo(
{
    broadcaster: 'socket.io',
    host: window.var.host + ':' + window.var.port,
    authEndpoint: '/broadcasting/auth',

    key : window.var.socketkey, csrfToken : window.var.csrf,

    namespace: 'App.Events',
});

socket.private('user.?').listen('user.activated', function (event) {

    console.log(event);
});

socket.private('auth.{{ auth()->user()->id }}').notification(function (notification) {

    var { id, type, } = notification;

    var { data, } = notification.data;

    console.log(type === 'auth.activation');
});

</script>
@endpush