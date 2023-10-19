<!-- admin.audit_logs.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Audit Logs</h1>

    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Action</th>
                <th>Category</th>
                <th>Question</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($auditLogs as $log)
                <tr>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->category_id }}</td>
                    <td>{{ $log->question_id }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
