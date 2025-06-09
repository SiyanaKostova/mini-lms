<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('q');

        $courses = Course::with('user')
            ->where('title', 'like', "%{$query}%")
            ->orWhereHas('lectures', function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%");
            })
            ->latest()
            ->get();

        return view('courses.index', compact('courses'));
    }
}
