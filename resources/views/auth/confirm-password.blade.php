@extends('layout')

@section('title', __('title.confirm-password'))

@section('content')
<form action="{{ route('password.confirm') }}" method="post" enctype="application/x-www-form-urlencoded" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;" novalidate>
    @csrf

    <input name="password" type="password" autocomplete="off" placeholder="Password" />
    @error('password')<div style="color: #8B0000;">{{ $message }}</div>@enderror
    <button type="submit">Confirmation</button>
</form>
@endsection

@push('css')<link rel="stylesheet" type="text/css" href="#" />@endpush
@push('prejs')<script type="text/javascript" src="#"></script>@endpush
@push('postjs')<script type="text/javascript" src="#"></script>@endpush