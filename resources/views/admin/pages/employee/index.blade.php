@extends('admin.layouts.app')

@section('content_header')
  <br>
  <div class="br-section-label">
    <button type="button" class="btn btn-info" onclick="location.href = '{{route('employee.create')}}';">
      create
    </button>
  </div>
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12">
    <div class="box">
      <div class="box-body">
          <h3>Employee list</h3>
          <table id="employee-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Logo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr id="tr-{{$employee->id}}">
                    <td><b>#{{ $employee->id }}</b></td>
                    <td>{{ $employee->slug }}</td>
                    <td><img src="{{asset('storage/employee_images/min_'.$employee->image)}}" width="100px" height="100px"></td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>
                      <button class="btn btn-primary btn-icon"  onclick="location.href = '{{ route('employee.edit', $employee->id) }}';"><div><i class="icon ion-compose"></i></div></button>
                      <button href="javascript:;" onclick="removeItemHandle('tr-{{$employee->id}}',`{{ route('employee.delete', $employee->id) }}`)"  class="btn btn-danger btn-icon delete-section">
                        <div><i class="icon ion-trash-b"></i></div>
                      </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection