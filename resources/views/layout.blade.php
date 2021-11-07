<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{{ \Illuminate\Support\Str::ucfirst(config('app.name')) }} - @yield('title')</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
@stack('css')
<style type="text/css">

body
{
    display: grid;

    grid-template-areas: "head head"
                         "sidebar content"
                         "foot foot";

    grid-template-columns: 30% auto;
    grid-template-rows: 48px 380px 120px;

    grid-gap: 8px;
}

body > *
{
    padding: 8px;
}

form > *
{
    margin: 2px;
}

</style>
@stack('prejs')
</head>

<body style="color: #FFFFFF;">

<header style="background-color: #F0F0F0; grid-area: head;"></header>
<aside style="background-color: #F0F0F0; grid-area: sidebar;"></aside>
<main style="background-color: #F0F0F0; grid-area: content;">@yield('content')</main>
<footer style="background-color: #F0F0F0; color: #000000; grid-area: foot;">{{ '@' . today()->year }}</footer>

@stack('postjs')
</body>
</html>