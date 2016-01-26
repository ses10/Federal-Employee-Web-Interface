@extends('index')

@section('title')
    {{ $employees[0]->dept_no }} Employees
@stop

@section('content')
<h1>{{ $employees[0]->dept_no }} Employees</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-md-2">First Name</td>
            <th class="col-md-2">Last Name</td>
            <th class="col-md-2">Hire Date</td>
            <th class="col-md-2">End Date</td>
            <th class="col-md-2">Salary</td>
        </tr>
    </thead>

    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td class="col-md-2">{{ $employee->first_name }}</td>
            <td class="col-md-2">{{ $employee->last_name }}</td>
            <td class="col-md-2">{{ $employee->hire_date }}</td>
            <td class="col-md-2">{{ $employee->to_date }}</td>
            <td class="col-md-2">${{ number_format($employee->salary) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop

