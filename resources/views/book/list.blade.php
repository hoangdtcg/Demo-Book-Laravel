<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<a href="{{route('logout')}}">Logout</a>
<body>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Content</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->content}}</td>
                <td>{{$book->price}}</td>
                <td><a href="{{route('book.detail',$book->id)}}">Detail</a></td>
                <td><a onclick="return confirm('Are you sure you want to delete this book?')" href="{{route('book.destroy',$book->id)}}">Delete</a></td>

            </tr>
        @endforeach
        </tbody>

    </table>
</body>
</html>
