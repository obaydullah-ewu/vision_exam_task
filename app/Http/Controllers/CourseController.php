<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Course List';
        $data['navCourseActiveClass'] = 'active';
        $data['courses'] = Course::withCount('students')->paginate();
        return view('course.index')->with($data);
    }
}
