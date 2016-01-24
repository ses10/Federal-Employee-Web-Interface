@extends('index')

@section('title')
    From departments
@stop

@section('content')
<h1>Departments</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-md-2">Department No:</td>
            <th class="col-md-9">Department Name</td>
            <th class="col-md-1"></td>
        </tr>
    </thead>

    <tbody>
    @foreach($departments as $department)
        <tr>
            <td class="col-md-2">{{ $department->dept_no }}</td>
            <td class="col-md-9">{{ $department->dept_name }}</td>
            <td class="col-md-1"> <a class="btn btn-default" href="#" role="button">Summary</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop

