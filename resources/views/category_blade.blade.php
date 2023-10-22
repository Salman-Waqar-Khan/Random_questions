@extends('layouts.app')

@section('content')

<section id="hero" class="position-relative overflow-hidden py-4">
    <div class="container py-5 mt-5">
        <div class="row align-items-center justify-content-center py-5 mt-5"> <!-- Updated the row class -->
            <div class="col-md-5 offset-md-1">
                <h1>Category Selection</h1>
                <form id="categoryForm">
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="form-label">Choose a Category:</label>
                        <select id="category" class="form-select" aria-label="Choose a Category">
                            <option selected disabled>Choose a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" id="nextButton">Next</button>
                </form>
                <div style="margin-top: 10px;"></div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@endsection
