@extends('layout')

@section('title', __('title.login'))

@section('content')
<form action="{{ route('login') }}" method="post" enctype="application/x-www-form-urlencoded" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;" novalidate>
    @csrf

    <input name="{{ config('fortify.username') }}" type="text" autocomplete="off" placeholder="Username or Email" />
    <input name="password" type="password" autocomplete="off" placeholder="Password" />
    <input name="remember" type="checkbox">
    <button type="submit">Login</button>
    @if ($errors->any())<div style="color: #8B0000;">{{ __('auth.failed') }}</div>@endif
</form>
@endsection

@push('css')<link rel="stylesheet" type="text/css" href="#" />@endpush
@push('prejs')<script type="text/javascript" src="#"></script>@endpush
@push('postjs')<script type="text/javascript" src="#"></script>@endpush