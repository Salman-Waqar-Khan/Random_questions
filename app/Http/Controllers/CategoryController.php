<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category_blade', compact('categories'));
    }

    public function getQuestionsPage($categoryId)

    {    // Fetch questions for the category
        $questions = Question::where('category_id', $categoryId)
            ->inRandomOrder()
            ->limit(2)
            ->get();
            $noMoreQuestions = false; // Assuming there are more questions to be shown

            return view('questions', compact('questions', 'categoryId', 'noMoreQuestions'));

        /* error_log('Category ID: ' . $categoryId);
        // Get used question IDs from the session
        $usedQuestionIds = Session::get('used_question_ids', []);
        error_log('Used Question IDs: ' . json_encode($usedQuestionIds));
        // Fetch unused questions for the category
        $questions = Question::where('category_id', $categoryId)
            ->whereNotIn('id', $usedQuestionIds) // Exclude used questions
            ->inRandomOrder()
            ->limit(2)
            ->get();

        // Mark the retrieved questions as used
        $usedQuestionIds = array_merge($usedQuestionIds, $questions->pluck('id')->toArray());
        Session::put('used_question_ids', $usedQuestionIds);
        error_log('Updated Used Question IDs: ' . json_encode($usedQuestionIds));
        // Check if there are any unused questions left
        $noMoreQuestions = Question::where('category_id', $categoryId)
            ->whereNotIn('id', $usedQuestionIds)
            ->count() === 0;
            error_log('No More Questions: ' . $noMoreQuestions);
        return view('questions', compact('questions', 'categoryId', 'noMoreQuestions')); */
      /*   // Get used question id from the session
        $usedQuestionIds = Session::get('used_question_ids', []);

        // fetch unused questions for the category
        $questions = Question::where('category_id', $categoryId)
            ->whereNotIn('id', $usedQuestionIds) // Exclude used questions
            ->inRandomOrder()
            ->limit(2)
            ->get();

        // marki the retrieved questions  used
        $usedQuestionIds = array_merge($usedQuestionIds, $questions->pluck('id')->toArray());
        Session::put('used_question_ids', $usedQuestionIds);

        // checking if there r any unused questions left
        $noMoreQuestions = Question::where('category_id', $categoryId)
            ->whereNotIn('id', $usedQuestionIds)
            ->count() === 0;

        return view('questions', compact('questions', 'categoryId', 'noMoreQuestions')); */
    }

    public function downloadPDF(Request $request, $categoryId)
    {
        $questionIds = $request->input('questionIds');

        if (empty($questionIds)) {
            return response()->json(['message' => 'No questions selected for PDF download'], 400);
        }

        $questions = Question::whereIn('id', $questionIds)->get();

        if ($questions->isEmpty()) {
            return response()->json(['message' => 'No questions available for PDF download'], 404);
        }

        $pdf = PDF::loadView('questions_pdf', compact('questions'));

        return $pdf->download('questions.pdf');
    }
}
