@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Manage Questions</h1>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-2">Back to Dashboard</a>
                <form method="POST" action="{{ route('admin.storeQuestion') }}">
                    @csrf
                    <div class="form-group">
                        <label for="question_content">Question Content</label>
                        <input type="text" class="form-control" id="question_content" name="question_content" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h2>Existing Questions</h2>
                <ul>
                    @foreach($questions as $question)
                        <li>{{ $question->content }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
