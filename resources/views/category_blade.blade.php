{{-- @extends('layouts.app')

@section('content')
<section id="hero" class="position-relative overflow-hidden py-4 pb-4">
    <div class="container py-5 mt-5">
        <div class="row align-items-center justify-content-center py-5 mt-5">
            <div class="col-md-5 offset-md-1">
                <h1>Category Selection</h1>
                <form id="categoryForm" action="{{ route('getQuestionsPage') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for "category" class="form-label">Choose a Category:</label>
                        <select name="category_id" id="category" class="form-select" aria-label="Choose a Category">
                            <option selected disabled>Choose a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
                <div style="margin-top: 10px;"></div>

                @if (!empty($questions))
                    <h2>Your Questions</h2>
                    @if ($noMoreQuestions)
                        <p>No more questions available for this category.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->content }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('downloadPdf', ['category_id' => $category_id]) }}" method="post">
                            @csrf
                            @foreach ($questions as $question)
                                <input type="hidden" name="questionIds[]" value="{{ $question->id }}">
                            @endforeach
                            <button type="submit" class="btn btn-primary">Download Questions as PDF</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection



 --}}


{{--  @extends('layouts.app')

@section('content')
<section id="hero" class="position-relative overflow-hidden py-4 pb-4">
    <div class="container py-5 mt-5">
        <div class="row align-items-center justify-content-center py-5 mt-5">
            <div class="col-md-5 offset-md-1">
                <h1>Category Selection</h1>
                <form id="categoryForm" action="{{ route('getQuestionsPage') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for "category" class="form-label">Choose a Category:</label>
                        <select name="category_id" id="category" class="form-select" aria-label="Choose a Category">
                            <option selected disabled>Choose a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
                <div style="margin-top: 10px;"></div>

                @if (!empty($questions))
                    <h2>Your Questions</h2>
                    @if ($noMoreQuestions)
                        <p>No more questions available for this category.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->content }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('downloadPdf', ['category_id' => $category_id]) }}" method="post">
                            @csrf
                            @foreach ($questions as $question)
                                <input type="hidden" name="questionIds[]" value="{{ $question->id }}">
                            @endforeach
                            <a href="{{ route('category') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Download Questions as PDF</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection --}}

@extends('layouts.app')

@section('content')
<section id="hero" class="position-relative overflow-hidden py-4 pb-4">
    <div class="container py-5 mt-5">
        <div class="row align-items-center justify-content-center py-5 mt-5">
            <div class="col-md-5 offset-md-1 bg-light"> <!-- Add the bg-light class for grey background -->
                <h1>Category Selection</h1>
                <form id="categoryForm" action="{{ route('getQuestionsPage') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for "category" class="form-label">Choose a Category:</label>
                        <select name="category_id" id="category" class="form-select" aria-label="Choose a Category">
                            <option selected disabled>Choose a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
                <div style="margin-top: 10px;"></div>

                @if (!empty($questions))
                    <h2>Your Questions</h2>
                    @if ($noMoreQuestions)
                        <p>No more questions available for this category.</p>
                        <form action="{{ route('category') }}" method="get">
                            <button type="submit" class="btn btn-secondary">Back</button>
                        </form>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->content }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('downloadPdf', ['category_id' => $category_id]) }}" method="post">
                            @csrf
                            @foreach ($questions as $question)
                                <input type="hidden" name="questionIds[]" value="{{ $question->id }}">
                            @endforeach
                            <a href="{{ route('category') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Download Questions as PDF</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection



