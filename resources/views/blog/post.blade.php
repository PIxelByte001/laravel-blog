<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a blog post</h1>

    <form action="{{ url('publish') }}" method="post">
        @csrf

        <input type="text" name="title">
        <input type="text" name="content">

        <button type="submit">Submit</button>
    </form>
</body>
</html>