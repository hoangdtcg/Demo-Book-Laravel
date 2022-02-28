<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
</head>
<body>
<form action="{{route('category.store')}}" method="post">
        @csrf
{{--    {{csrf_token()}}--}}
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="content" placeholder="Content">
    <button>Create</button>
</form>
</body>
</html>
