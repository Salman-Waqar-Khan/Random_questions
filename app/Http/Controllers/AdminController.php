<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;


class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }


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


    public function questions()
    {
        $categories = Category::all();
        $questions = Question::all();

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
        $question->category_id = $request->input('category_id');
        $question->save();

        return redirect()->route('admin.questions')->with('success', 'Question added successfully');
    }



}
