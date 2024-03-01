<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\details;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addStudent extends Controller
{

    public function addStudent(Request $request , addStudentToCsDepartment $acs, addStudentToEeDepartment $aee, addStudentTomthDepartment $amth){



        $request->validate([
            'dynamic_student*name'=>'required',
            'dynamic_student*email'=>'required|email|unique:users',
        ]);

        $role=Auth::user()->roles->pluck('name')->first();

        switch ($role) {
            case 'hod_cs':
                $departmentId = $acs->assign(3);
                break;
            case 'hod_eed':
                $departmentId = $aee->assign(1);
                break;
            case 'hod_mth':
                $departmentId = $amth->assign(2);
                break;
        }

    }
}


interface assignDepartment{
    public function assign($departmentId);
}


class addStudentToCsDepartment implements assignDepartment{
    private $data;

    public function __construct(Request $request)
    {
        $this->data=$request->dynamic_student;

    }

    public function assign($departmentId)
    {
$stu=$this->data;

foreach($stu as $st){

       $user= User::create([
            'name'=>$st['name'],
            'email'=>$st['email'],
            'password'=>bcrypt('password'),
            'departments_id'=>$departmentId,
            ]);
        $user->assignRole('student');

        details::create([
            'user_id'=>$user->id,
            'age'=>$st['age'],
            'phone'=>$st['phone'],
            'city'=>$st['city'],
            'state'=>$st['state'],
            'cnic'=>$st['cnic'],

        ]);


    }
}
}



class addStudentToEeDepartment implements assignDepartment{

    private $data;

    public function __construct(Request $request)
    {
        $this->data=$request->dynamic_student;

    }


public function assign($departmentId)
{

    $stu=$this->data;

foreach($stu as $st){
   $user= User::create([
        'name'=>$st['name'],
        'email'=>$st['email'],
        'password'=>bcrypt('password'),
        'departments_id'=>$departmentId,
        ]);


        $user->assignRole('student');
        details::create([
            'user_id'=>$user->id,
            'age'=>$st['age'],
            'phone'=>$st['phone'],
            'city'=>$st['city'],
            'state'=>$st['state'],
            'cnic'=>$st['cnic'],

        ]);
    }


}

}


class addStudentTomthDepartment implements assignDepartment{
    private array $data;

    public function __construct(Request $request)
    {

        $this->data=$request->dynamic_student;


    }

    public function assign($departmentId)
    {
$stu=$this->data;

foreach($stu as $st){
     $user= User::create([
      'name'=>$st['name'],
      'email'=>$st['email'],
      'password'=>bcrypt('password'),
      'departments_id'=>$departmentId,
      ]);
      $user->assignRole('student');

      details::create([
        'user_id'=>$user->id,
        'age'=>$st['age'],
        'phone'=>$st['phone'],
        'city'=>$st['city'],
        'state'=>$st['state'],
        'cnic'=>$st['cnic'],

    ]);
    }
    }

















    }
