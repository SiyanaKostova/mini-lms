<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function create(Course $course)
    {
        return view('lectures.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'youtube_url' => 'required|url',
        ]);

        $course->lectures()->create($validated);

        return redirect()->route('courses.show', $course)->with('success', 'Lecture added.');
    }
}
