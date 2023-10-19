<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;


class AdminController extends Controller
{
    // Display the admin dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Display the categories management page
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    // Store a new category
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->input('category_name');
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category added successfully');
    }

    // Display the questions management page
    public function questions()
    {
        $categories = Category::all(); // Fetch the categories
        $questions = Question::all(); // Fetch the questions or adjust as needed

        return view('admin.questions', compact('categories', 'questions'));
    }


    // Store a new question
    public function storeQuestion(Request $request)
    {
        $request->validate([
            'question_content' => 'required|string|max:255',
        ]);

        $question = new Question();
        $question->content = $request->input('question_content');
        $question->category_id = $request->input('category_id'); // Adjust this according to your form
        $question->save();

        return redirect()->route('admin.questions')->with('success', 'Question added successfully');
    }


    public function viewAuditLogs()
        {
            $auditLogs = AuditLog::latest()->get();

            return view('admin.audit_logs', compact('auditLogs'));
        }
}
