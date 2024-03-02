<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use App\Models\details;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class faculty extends Controller
{


    public function addFaculty(Request $request,addFacultyToCsDepartment $afcs, addFacultyToEedDepartment $afed, addFacultyToMthDepartment $afmd){
        $request->validate([
            'dynamic_faculty*name'=>'required',
            'dynamic_faculty*email'=>'required|email|unique:users',
        ]);

        $role=Auth::user()->roles->pluck('name')->first();

        switch ($role) {
            case 'hod_cs':
                $departmentId = $afcs->assign(3);
                break;
            case 'hod_eed':
                $departmentId = $afed->assign(1);
                break;
            case 'hod_mth':
                $departmentId = $afmd->assign(2);
                break;
        }


    }




}
interface assignDepartment{
    public function assign($departmentId);
}


class addFacultyToCsDepartment implements assignDepartment{
    private $data;

    public function __construct(Request $request)
    {
            $this->data=$request->dynamic_faculty;
    }

    public function assign($departmentId)
    {

        $faculty=$this->data;
        foreach($faculty as $st){

            $user= User::create([
                 'name'=>$st['name'],
                 'email'=>$st['email'],
                 'password'=>bcrypt('password'),
                 'departments_id'=>$departmentId,
                 ]);
             $user->assignRole('faculty');

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

class addFacultyToEedDepartment implements assignDepartment{
    private $data;

    public function __construct(Request $request)
    {
            $this->data=$request->dynamic_faculty;
    }
    public function assign($departmentId)
    {


        $faculty=$this->data;
        foreach($faculty as $st){

            $user= User::create([
                 'name'=>$st['name'],
                 'email'=>$st['email'],
                 'password'=>bcrypt('password'),
                 'departments_id'=>$departmentId,
                 ]);
             $user->assignRole('faculty');

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


class addFacultyToMthDepartment implements assignDepartment{
    private $data;

    public function __construct(Request $request)
    {
            $this->data=$request->dynamic_faculty;
    }

    public function assign($departmentId)
    {

        $faculty=$this->data;
        foreach($faculty as $st){

            $user= User::create([
                 'name'=>$st['name'],
                 'email'=>$st['email'],
                 'password'=>bcrypt('password'),
                 'departments_id'=>$departmentId,
                 ]);
             $user->assignRole('faculty');

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
