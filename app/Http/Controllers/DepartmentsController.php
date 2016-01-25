<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    public function departments(){

    	//query db for all departments
    	$departments = Department::all();

    	return view('departments.departments')->with('departments', $departments);
    }

    public function departmentSummary($deptNo){

    	$department = Department::departmentSummary($deptNo);

    	return view('departments.departmentSummary')->with('department', $department);
    }
}
