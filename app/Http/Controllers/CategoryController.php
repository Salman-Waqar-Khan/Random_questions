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
use App\Models\AuditLog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category_blade', compact('categories'));
    }


    public function getQuestionsPage(Request $request)
    {
        $categoryId = $request->input('category_id');

        if (auth()->check()) {
            $user = auth()->user();
            $questions = Question::where('category_id', $categoryId)
                ->whereDoesntHave('users', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->inRandomOrder()
                ->limit(1)
                ->where('used', false)
                ->get();

            if ($questions->isEmpty()) {
                $noMoreQuestions = true;
            } else {
                $noMoreQuestions = false;
                // marking the question as used
                $question = $questions->first();
                $question->used = true;
                $question->save();
                // attaching the question to the user
                $user->questions()->attach($question->id);
            }

            $category_id = $categoryId;

            $categories = Category::all();

            return view('category_blade', compact('categories', 'questions', 'noMoreQuestions', 'category_id'));
        }

        return redirect('/login');
    }


    public function selectQuestion(Request $request, $questionId)
    {
         // get question
        $question = Question::find($questionId);

        // Log used status
        Log::info("Question {$question->id} - Used: {$question->used}");

        // Mark as used
        $question->used = true;
        $question->save();

        Log::info("Question {$question->id} marked as used");

        // Attach to user
        $user = Auth::user();
        $user->questions()->attach($questionId);

        return redirect()->back();
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

            $pdf = new Dompdf();
            $pdf->loadHtml(view('questions_pdf', compact('questions')));

            $pdf->setPaper('A4', 'portrait');
            $pdf->render();

            return $pdf->stream('questions.pdf');
        }
}
