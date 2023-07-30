<!DOCTYPE html>
<html>
<head>
    <title>New Posts</title>
</head>
<body>
<h1>New Posts</h1>
<ul>
@foreach ($posts as $post)
    <li>{{ $post->title }}</li>
@endforeach
</ul>
</body>
</html>
