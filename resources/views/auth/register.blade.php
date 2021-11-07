@extends('layout')

@section('title', __('title.register'))

@section('content')
<form action="{{ route('register') }}" method="post" enctype="application/x-www-form-urlencoded" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;" novalidate>
    @csrf

    <input name="{{ config('fortify.username') }}" type="text" autocomplete="off" placeholder="Username" value="{{ old(config('fortify.username')) }}" />
    @error(config('fortify.username'))<div style="color: #8B0000;">{{ $message }}</div>@enderror
    <input name="{{ config('fortify.email') }}" type="email" autocomplete="off" placeholder="Email" value="{{ old(config('fortify.email')) }}" />
    @error(config('fortify.email'))<div style="color: #8B0000;">{{ $message }}</div>@enderror
    <input name="password" type="password" autocomplete="off" placeholder="Password" />
    @error('password')<div style="color: #8B0000;">{{ $message }}</div>@enderror
    <input name="password_confirmation" type="password" autocomplete="off" placeholder="Password Confirmation" />
    @error('password_confirmation')<div style="color: #8B0000;">{{ $message }}</div>@enderror
    <button type="submit">Login</button>
</form>
@endsection

@push('css')<link rel="stylesheet" type="text/css" href="#" />@endpush
@push('prejs')<script type="text/javascript" src="#"></script>@endpush
@push('postjs')<script type="text/javascript" src="#"></script>@endpush