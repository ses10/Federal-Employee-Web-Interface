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
}
