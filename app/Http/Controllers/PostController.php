<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function about()
    {
        $posts = Post::paginate(10); // Fetch all posts
        return view('about', compact('posts'));    
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); 
        return view('view', compact('post')); 
    }

    public function edit($id)
    {
        // Check if the user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('about')->with('error', 'Unauthorized access.');
        }
        
        $post = Post::findOrFail($id); 
        return view('edit', compact('post')); 
    }

    public function update(Request $request, $id)
    {
        // Check if the user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('about')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'created_by' => 'required|string|max:255',
            'created_at' => 'required|date',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->input('title'),
            'created_by' => $request->input('created_by'),
            'created_at' => $request->input('created_at'),
        ]);

        return redirect()->route('about')->with('success', 'Post updated successfully.');
    }

    public function delete($id)
    {
        // Check if the user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('about')->with('error', 'Unauthorized access.');
        }

        $post = Post::findOrFail($id); 
        $post->delete(); 

        return redirect()->route('about')->with('success', 'Post deleted successfully.');    
    }

    public function create()
    {
        return view('create');
    }

    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id(); 
        
        Post::create($validatedData);
        
        return redirect()->route('about')->with('success', 'Post created successfully.');
    }

    // Admin views

    public function borrowedBooks()
    {
        // Fetch all posts where 'borrowed_at' is not null (borrowed books)
        $borrowedBooks = Post::whereNotNull('borrowed_at')->get();

        if ($borrowedBooks->isEmpty()) {
            return view('admin.borrowedBooks')->with('message', 'No borrowed books found.');
        }

        return view('admin.borrowedBooks', compact('borrowedBooks'));
    }

    public function allBooks()
    {
        // Fetch all posts (books)
        $allBooks = Post::all();

        return view('admin.allBooks', compact('allBooks'));
    }

    public function allUsers()
    {
        // Fetch all users
        $allUsers = User::all();

        return view('admin.allUsers', compact('allUsers'));
    }

    public function searchStudent(Request $request)
    {
        $student = User::where('id', $request->input('student_id'))->first();

        if (!$student) {
            return view('admin.studentDetail')->with('message', 'No student found with this ID.');
        }

        return view('admin.studentDetail', compact('student'));
    }
}
