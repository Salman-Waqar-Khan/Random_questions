<!DOCTYPE html>
<html>
<head>
    <!-- Add your CSS styles here if needed -->
</head>
<body>
    <div id="questionContainer">
        @foreach ($questions as $question)
            <div class="question">
                {{ $question->content }}
            </div>
        @endforeach
    </div>
</body>
</html>
