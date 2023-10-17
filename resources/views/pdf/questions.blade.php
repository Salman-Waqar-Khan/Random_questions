<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
</head>
<body>
    <h1>Questions</h1>
    <ul>
        @foreach ($questions as $question)
            <li>{{ $question->content }}</li>
        @endforeach
    </ul>
</body>
</html>
