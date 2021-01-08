<!DOCTYPE html>
<html lang="en">

<head>
    @include('users.head')
</head>

<body>
    @if (Request::is('users/create'))
        @include('users.create')
    @elseif (Request::is('users/edit/*'))
        @include('users.edit')
    @elseif (Request::is('users/list') || Request::is('users/remove/*'))
        @include('users.list')
    @endif
    @include('users.footer')
</body>

</html>
