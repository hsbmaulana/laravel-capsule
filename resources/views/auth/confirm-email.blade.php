@extends('layout')

@section('title', __('title.confirm-email'))

@section('content')
<div style="color: #8B0000;">{{ __('auth.checked', [ 'email' => auth()->user()->{config('fortify.email')}, ]) }}</div>
@endsection

@push('css')<link rel="stylesheet" type="text/css" href="#" />@endpush
@push('prejs')<script type="text/javascript" src="#"></script>@endpush
@push('postjs')<script type="text/javascript" src="#"></script>@endpush