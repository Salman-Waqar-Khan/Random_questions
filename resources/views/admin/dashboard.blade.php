@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Admin Dashboard</h1>
                <p>Welcome to the admin panel. You can manage categories and questions here.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <a href="{{ route('admin.categories') }}" class="btn btn-primary">Manage Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Questions</div>
                    <div class="card-body">
                        <a href="{{ route('admin.questions') }}" class="btn btn-primary">Manage Questions</a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.questions.index') }}">Admin Questions</a>                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
