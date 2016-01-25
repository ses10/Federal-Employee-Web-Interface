<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{


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
}
