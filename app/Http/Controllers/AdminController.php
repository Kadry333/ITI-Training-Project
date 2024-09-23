<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function borrowedBooks()
    {
        $borrowedBooks = Post::whereNotNull('borrowed_at')->get();
        return view('admin.borrowedBooks', compact('borrowedBooks'));
    }

    public function allBooks()
    {
        $allBooks = Post::all();
        return view('admin.allBooks', compact('allBooks'));
    }

    public function allUsers()
    {
        $allUsers = User::all();
        return view('admin.allUsers', compact('allUsers'));
    }

    public function searchStudent(Request $request)
    {
        $studentId = $request->input('student_id');
        $student = User::where('id', $studentId)->first();
        return view('admin.studentDetail', compact('student'));
    }
}
