@extends('client.layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="w-25" scope="col">Logo</th>
            <th class="w-25" scope="col">Name</th>
            <th class="w-25" scope="col">Employees Count</th>
            <th class="w-25" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($companies as $company)
          <tr>
            <td><img src="{{asset('storage/company_logos/min_'.$company->logo)}}" width="50px" height="50px"></td>
            <td>{{$company->name}}</td>
            <td>{{$company->employees_count}}</td>
            <td style="text-align:center;"><button class="btn btn-primary btn-icon"  onclick="location.href = '{{ route('company.inner', [$company->id, $company->slug ]) }}';"><div>Detail</div></button></td>
          </tr> 
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-12 d-flex justify-content-center pt-4" class="li: { list-style: none; }">
      {{ $companies->links() }}
    </div>
  </div>
</div>
@endsection