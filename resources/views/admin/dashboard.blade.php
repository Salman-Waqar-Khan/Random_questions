@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3">Admin Dashboard</h1>
                <p class="mt-3 pl-2">Welcome to the admin panel.<br> You can manage categories and questions here.</p> <!-- Added mt-3 and pl-2 for top and left padding -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">Categories</div>
                    <div class="card-body pl-">
                        <a href="{{ route('admin.categories') }}" class="btn btn-primary">Manage Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">Questions</div>
                    <div class="card-body">
                        <a href="{{ route('admin.questions') }}" class="btn btn-primary">Manage Questions</a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.questions.index') }}">Admin Questions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
