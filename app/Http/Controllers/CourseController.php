<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class CourseController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $courses = Course::with('user')->latest()->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $course = Course::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'slug' => Str::slug($validated['title']) . '-' . Str::random(6),
        ]);

        return redirect()->route('courses.show', $course->slug);
    }

    public function show(Course $course)
    {
        $course->load(['user', 'lectures']);
        return view('courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
}
