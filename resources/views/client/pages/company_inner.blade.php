@extends('client.layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>{{$company->name}} Company employees list : </h3>
      @if(count($employees))
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="w-25" scope="col">Image</th>
                <th class="w-25" scope="col">First Name</th>
                <th class="w-25" scope="col">Last Name</th>
                <th class="w-25" scope="col">Email</th>
                <th class="w-25" scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
            <tr>
                <td><img src="{{asset('storage/employee_images/min_'.$employee->image)}}" width="50px" height="50px"></td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>
                <td style="text-align:center;"><button class="btn btn-primary btn-icon"  onclick="location.href = '{{ route('employee.inner', [$employee->id, $employee->slug ]) }}';"><div>Detail</div></button></td>
            </tr> 
            @endforeach
            </tbody>
        </table>
        </div>
        <div class="col-12 d-flex justify-content-center pt-4" class="li: { list-style: none; }">
        {{ $employees->links() }}
        </div>
    @endif
  </div>
</div>
@endsection