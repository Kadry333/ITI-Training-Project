<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $borrowedBooks = auth()->user()->posts()->whereNotNull('borrowed_at')->get();
        $allBooks = Post::all(); // Fetch all books for display
        
        return view('student.dashboard', compact('borrowedBooks', 'allBooks'));
    }


    public function borrowBook($id)
    {
        $post = Post::findOrFail($id);

        // Check if the book is already borrowed
        if ($post->borrowed_at) {
            return redirect()->back()->with('error', 'This book is already borrowed.');
        }

        // Update the post to reflect that it has been borrowed
        $post->borrowed_at = now();
        $post->return_date = null;
        $post->user_id = auth()->id(); // Assign the user ID of the student borrowing the book
        $post->save();

        return redirect()->route('student.dashboard')->with('success', 'Book borrowed successfully.');
    }
    public function returnBook($id)
    {
        $post = Post::findOrFail($id);
        
        // Ensure the book is borrowed before returning
        if (!$post->borrowed_at) {
            return redirect()->back()->with('error', 'This book was not borrowed.');
        }
    
        // Update the post to reflect that it has been returned
        $post->borrowed_at = null;
        $post->return_date = now();
        $post->user_id = null; // Remove the user ID of the student
        $post->save();
    
        return redirect()->route('about')->with('success', 'Book returned successfully.');
    }
    
}
