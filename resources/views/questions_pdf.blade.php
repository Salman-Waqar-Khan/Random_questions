

<!DOCTYPE html>
<html>
<head>
    <title>Questions PDF</title>
</head>
<body>
    <h1>Questions</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            @php $sl=0 @endphp
            @foreach ($questions as $question)
                <tr>
                    <td>{{ ++$sl }}</td>
                    <td>{{ $question->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
