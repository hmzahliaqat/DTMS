<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\courses;
use App\Models\attendances;
use App\Models\coursesuser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Helper\getRoleIdFromUserRole as pluckRole;

class main extends Controller
{
    //
    public $Id;
    public $departmentId;



    // fetch all user in department
    public function fetch()
    {
        try {
            $role = Auth::user()->roles->pluck('name')->first();
            $this->departmentId = pluckRole::getRole($role);


            $members = User::with('roles')->where('departments_id', $this->departmentId)
                ->where('id', '!=', Auth::id())
                ->get();

            return $members;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }
    //delete user
    public function delete($id)
    {
        try {
            $user =  User::find($id);
            if ($user) {
                $user->delete();
            }
        } catch (\Exception $e) {
            Log::error("An error occurred:" . $e->getMessage());
        }
    }


//create a new course
    public function createCourse(Request $request)
    {

        $request->validate([
            'courseName' => 'required',
            'instructor' => 'required',
        ]);

        try {
            $role = Auth::user()->roles->pluck('name')->first();

            $this->Id = pluckRole::getRole($role);

            courses::create([
                'courseName' => $request->courseName,
                'Instructor' => $request->instructor,
                'discription' => $request->discription,
                'courseCode' => $this->Id,
                'enrolledStudents' => 0,
                'courseStatus' => 1,
            ]);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }


   //get courses of their own department
    public function getCourses()
    {

        try {
            $role = Auth::user()->roles->pluck('name')->first();
            $this->Id = pluckRole::getRole($role);
            $courses = courses::where('courseCode', $this->Id)->get();

            return $courses;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

    //filter courses by search
    public function filteredCourses(Request $request)
    {

        try {
            $role = Auth::user()->roles->pluck('name')->first();
            $searchQuery = $request->searchQuery;
            $this->Id = pluckRole::getRole($role);

            $courses = courses::where('courseCode', $this->Id)->where('courseName', 'like', "%$searchQuery%")->get();
            return $courses;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

 // get users
    public function getUser()
    {
        try {
            $userId = Auth::id();
            $user = User::with('roles')->where('id', $userId)->first();

            return $user;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }


                                                       // hod dashboard
    public $stuCountId;
    public $couCountId;
  //get total student count enrolled in their department
    public function getStuCount()
    {

        try {
            $role = Auth::user()->roles->pluck('name')->first();

            $this->stuCountId = pluckRole::getRole($role);

            $studentRole = Role::where('name', 'student')->first();
            $user = User::Role($studentRole)->where('departments_id', $this->stuCountId)->get();
            $Cuser = $user->count();

            return $Cuser;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

//get total count of courses offered by thier department
    public function getCourseCount()
    {
        try {
            $role = Auth::user()->roles->pluck('name')->first();
            $this->couCountId = pluckRole::getRole($role);
            $user = courses::where('courseCode', $this->couCountId)->get();
            $Cuser = $user->count();
            return $Cuser;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }




    //get filtered data by search

    public function getFilteredMembers(Request $request)
    {
        try {
            $search = $request->searchQuery;
            $role = Auth::user()->roles->pluck('name')->first();
            $departmentId = pluckRole::getRole($role);
            $members = User::with('roles')->where('departments_id', $departmentId)
                ->where('id', '!=', Auth::id())->where('name', 'like', "%$search%")->get();
            return $members;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }


                                                      // faculty

    public $FID;
    //get courses which a faculty member is teaching
    public function getFCourse()
    {
        try {
            $role = Auth::user()->roles->pluck('name')->first();
            $FID = auth()->user()->departments_id;
            $Courses = courses::where(['courseCode' => $FID, 'instructor' => Auth::id()])->get();
            return $Courses;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

                                                           // student

     //get courses available for registration
    public function getCoursesForRegistration()
    {

        try {
            $role = Auth::user()->roles->pluck('name')->first();
            $FID = auth()->user()->departments_id;
            $courses = courses::where('courseCode', $FID)
                ->whereDoesntHave('students', function ($query) {
                    $query->where('id', Auth::id());
                })
                ->get();

            return $courses;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

 //register a course
    public function registerCourse($id)
    {
        try {
            coursesuser::create([
                'courses_id' => $id,
                'user_id' => Auth::id(),
            ]);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

//unregister a course
    public function unregisterCourse($id)
    {
        try {
            $userid = Auth::id();
            coursesuser::where(['courses_id' => $id, 'user_id' => $userid])->delete();
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

//get courses which a student had registered
    public function registeredCourses()
    {
        try {
            $id = Auth::id();
            $user = User::find($id);
            $registeredCourses = $user->courses;

            return $registeredCourses;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }


    //get student of each course
    public function getStu($id)
    {
        try {
            $course = courses::find($id);
            $stu = $course->students;

            return $stu;
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

//check attendance
// - A student can only check attendance of courses their are enrolled in
// - A faculty member can check attendance of students of enrolled in courses they are teaching
public function checkAttendance(Request $request)
    {
        $request->validate([
            'courseId' => 'required',
        ]);
        try {
            $attendanceRecord = attendances::where(['courses_id' => $request->courseId, 'user_id' => Auth::id()])->get();
            return response()->json($attendanceRecord);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }


//mark attendance
// - A faculty member can mark attendance of students of enrolled in courses they are teaching
    public function markAttendance(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'courseId' => 'required',
        ]);
        try {
            foreach ($request->students as $stu) {
                attendances::create([
                    'courses_id' => $request->courseId,
                    'date' => $request->date,
                    'user_id' => $stu['id'],
                    'attendance' => $stu['attendance'],
                ]);
            }
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }

// A faculty member can check attendance for all students in their courses based on course and date
    public function getAttendance(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'courseId' => 'required',
        ]);

        try {
            $attendanceRecord = attendances::where(['courses_id' => $request->courseId, 'date' => $request->date])
                ->join('users', 'users.id', 'attendances.user_id')->get();
            return response()->json($attendanceRecord);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }



}
