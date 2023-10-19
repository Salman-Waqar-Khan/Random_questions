<!-- admin/view_seen_questions.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Seen Questions by Users</h1>

    <table class="table">
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
</div>
