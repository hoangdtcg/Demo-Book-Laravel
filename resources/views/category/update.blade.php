<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Category</title>
</head>
<body>
<form action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
{{--    {{csrf_token()}}--}}
{{--    Hidden method de update va delete--}}
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" placeholder="Name" value="{{ $category->name }}">
    <input type="text" name="content" placeholder="Content" value="{{ $category->content }}">
    <button>Update</button>
</form>
</body>
</html>
