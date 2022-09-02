<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Mark;
use App\Models\Student;
use http\Env\Response;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Student List';
        $data['navStudentActiveClass'] = 'active';
        $data['students'] = Student::paginate();
        return view('student.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students',
            'phone_number' => 'required|max:255',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->status = $request->status ?? 1;
        $student->save();

        return redirect()->back()->with('success', 'Student Created Successfully');
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Edit Student';
        $data['navStudentActiveClass'] = 'active';
        $data['student'] = Student::findOrFail($id);
        return view('student.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students,email,'.$id,
            'phone_number' => 'required|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->status = $request->status;
        $student->save();

        return redirect()->route('student.index')->with('success', 'Student Updated Successfully');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'Student Deleted Successfully');
    }

    public function addCourseMark($id)
    {
        $data['pageTitle'] = 'Add Course Mark';
        $data['navStudentActiveClass'] = 'active';
        $data['student'] = Student::findOrFail($id);
        $courseIds = CourseStudent::where('student_id', $id)->pluck('course_id')->toArray();
        $data['courses'] = Course::whereIn('id', $courseIds)->get();

        return view('student.add-course-mark')->with($data);
    }

    public function storeCourseMark(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'mark' => 'required'
        ]);

        $mark = Mark::whereCourseId($request->course_id)->whereStudentId($id)->first();
        if (!$mark){
            $mark = new Mark();
        }
        $mark->student_id = $id;
        $mark->course_id = $request->course_id;
        $mark->mark = $request->mark;
        $mark->save();

        return redirect()->route('student.index')->with('success', 'Mark created successfully');
    }

    public function getCourseMark(Request  $request)
    {
        $mark = Mark::whereCourseId($request->course_id)->whereStudentId($request->student_id)->first();
        if ($mark){
            return response()->json([
                'mark' => $mark->mark
            ]);
        }
        return response()->json([
            'mark' => ''
        ]);
    }


}
