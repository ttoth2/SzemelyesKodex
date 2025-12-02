<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do App</title>
</head>
<body>
    <h1>Todo List</h1>

    <ul>

        @foreach ($posts as $post)
            <li>

                {{ $post->content }}
                @if ($post->is_completed)
                    <span>(Done)</span>
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>