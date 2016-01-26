<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	//returns a stdClass object with a given department's summary containing it's
	//departmanger, total depart salary, # of employees, average employee salary
	public static function departmentSummary($deptNo){

		$summary = new \stdClass();
		$summary->dept_no = $deptNo;

		$summary->dept_name = DB::table('departments')->where('dept_no', '=' ,$deptNo)->first()->dept_name;

		$departmentManager = Department::departmentManager($deptNo);

		//add dept manager
		$summary->manager_first_name = $departmentManager->first_name;
		$summary->manager_last_name = $departmentManager->last_name;

		//add total dept salaries
		$summary->totalSalary = Department::totalDepartmentSalary($deptNo);

		//add # of employees
		$summary->numEmployees = Department::numDepartmentEmployees($deptNo);

		//add avg employee salary
		$summary->averageSalary = Department::averageSalary($deptNo);

		return $summary;
	}

	public static function departmentManager($deptNo){
		return DB::table('employees')->join('dept_manager', 'dept_manager.emp_no', '=', 'employees.emp_no')
									 ->select('employees.first_name', 'employees.last_name')
									 ->where('dept_manager.dept_no', '=', $deptNo)
									 ->where('dept_manager.to_date', '=', '9999-01-01')
									 ->first();
	}

	public static function totalDepartmentSalary($deptNo){
		return DB::table('dept_emp')->join('employees', 'dept_emp.emp_no', '=', 'employees.emp_no')
									->join('salaries', 'employees.emp_no', '=', 'salaries.emp_no')
									->where('dept_emp.to_date', '=', '9999-01-01')
									->where('salaries.to_date', '=', '9999-01-01')
									->where('dept_no', '=', $deptNo)
									->sum('salaries.salary');
	}

	public static function numDepartmentEmployees($deptNo){
		return DB::table('dept_emp')->join('employees', 'dept_emp.emp_no', '=', 'employees.emp_no')
									->where('dept_emp.to_date', '=', '9999-01-01')
									->where('dept_no', '=', $deptNo)
									->count('dept_emp.dept_no');
	}

	public static function averageSalary($deptNo){
		return DB::table('salaries')->join('dept_emp', 'salaries.emp_no', '=', 'dept_emp.emp_no')
									->where('dept_no', '=', $deptNo)
									->avg('salary');		
	}

	public static function departmentEmployees($deptNo){
		return DB::table('employees')->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
									->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
									->select('first_name', 'last_name', 'hire_date', 'dept_emp.to_date', 'salary', 'dept_no')
									->where('salaries.to_date', '=', '9999-01-01')
									->where('dept_emp.to_date', '=', '9999-01-01')
									->where('dept_no', '=', $deptNo)->get();
	}
}
