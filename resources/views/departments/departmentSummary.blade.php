@extends('index')

@section('title')
    {{$department->dept_name}} Department Summary
@stop

@section('content')
<h1>{{$department->dept_name}} Department Summary</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-md-2">Department No:</td>
            <th class="col-md-2">Manager</td>
            <th class="col-md-2"># Employees</td>
            <th class="col-md-2">Total Salary</td>
            <th class="col-md-2">Avg Employee Salary</td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td class="col-md-2">{{ $department->dept_no }}</td>
            <td class="col-md-2">{{ $department->manager_first_name }} {{ $department->manager_last_name }} </td>
            <td class="col-md-2">{{ number_format($department->numEmployees) }}</td>
            <td class="col-md-2">${{ number_format($department->totalSalary) }}</td>
            <td class="col-md-2">${{ number_format($department->averageSalary) }}</td>
        </tr>
    </tbody>
</table>

<a class="btn btn-default" href="{{ url('/departments/employees', $department->dept_no) }}" role="button">Employees</a>

@stop

