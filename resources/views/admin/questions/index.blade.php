

 @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Seen Questions by Users</h2>

    <table class="table" style="background-color: white; padding: 10px;margin-left: 50px; margin-top: 100px">
        <thead>
            <tr>
                <th>User</th>
                <th>Questions Seen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if($user->questions->isEmpty())
                            No questions seen
                        @else
                            <ul>
                                @foreach($user->questions as $question)
                                    <li>{{ $question->content }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-2">Back to Dashboard</a>
    </div>
</div>
@endsection
