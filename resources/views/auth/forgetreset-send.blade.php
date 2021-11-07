@extends('layout')

@section('title', __('title.reset'))

@section('content')
<form action="{{ route('password.email') }}" method="post" enctype="application/x-www-form-urlencoded" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;" novalidate>
    @csrf

    <input name="{{ config('fortify.email') }}" type="email" autocomplete="off" placeholder="Email" />
    @error(config('fortify.email'))<div style="color: #8B0000;">{{ $message }}</div>@enderror
    <button type="submit">&#x1F4E7;</button>
    @if (session()->has('status'))<div style="color: #8B0000;">{{ session('status') }}</div>@endif
</form>
@endsection

@push('css')<link rel="stylesheet" type="text/css" href="#" />@endpush
@push('prejs')<script type="text/javascript" src="#"></script>@endpush
@push('postjs')<script type="text/javascript" src="#"></script>@endpush