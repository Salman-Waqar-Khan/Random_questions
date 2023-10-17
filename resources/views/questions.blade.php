@extends('layouts.app')

@section('content')
    <section id="hero" class="position-relative overflow-hidden py-4">
        <div class="container py-5 mt-5">
            <div class="row align-items-center py-5 mt-5">
                <div class="col-md-5 offset-md-1">
                    <h1>Questions for Category: {{ $categoryId }}</h1>

                    @if ($noMoreQuestions)
                        <p>No more questions available for this category.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ $question->content }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <form method="post" action="{{ route('downloadPdf', $categoryId) }}">
                            @csrf
                            @foreach($questions as $question)
                                <input type="hidden" name="questionIds[]" value="{{ $question->id }}">
                            @endforeach
                            <button type="submit" class="btn btn-primary">Download Questions as PDF</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
