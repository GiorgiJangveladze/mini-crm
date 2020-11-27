@extends('client.layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card-wrapper">
            <div class="card-employee-container centered-flex">
                <img src="{{asset('storage/employee_images/'.$employee->image)}}">
                <div class="card-employee-detail info-body">
                    <h4>Employee: {{$employee->first_name.' '.$employee->last_name}}</h4>
                    <p><spna>Email:</span> {{$employee->email}}</p>
                    <p><spna>Phone:</span> {{$employee->phone}}</p>
                </div>
            </div>
            <div class="card-company-contrainer centered-flex" >
                <img src="{{asset('storage/company_logos/medium_'.$employee->company->logo)}}">
                <div class="card-employee-detail info-body">
                    <h4>Company: {{$employee->company->name}}</h4>
                    <p><spna>Email:</span> {{$employee->company->email}}</p>
                    <p><spna>Website:</span> <a href=""> {{$employee->company->website}}<a></p>
                    <div class="centered-btn">
                    </div>
                </div>
            </div>

            <div class="buttons-bar">
                <button  class="btn btn-success" onclick="location.href = '{{ route('company.inner', [$employee->company->id, $employee->company->slug ]) }}}';" >Back</button>
                <button class="btn btn-success" onclick="location.href = '{{url(route('home'))}}';">Company list</button>
            </div>
      </div>
  </div>
</div>
@endsection