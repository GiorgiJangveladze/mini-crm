@extends('admin.layouts.app')

@section('content_header')
  <br>
  <div class="br-section-label">
    <button type="button" class="btn btn-info" onclick="location.href = '{{route('company.create')}}';">
      create
    </button>
  </div>
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12">
    <div class="box">
      <div class="box-body">
          <h3>Company list</h3>
          <table id="company-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr id="tr-{{$company->id}}">
                    <td><b>#{{ $company->id }}</b></td>
                    <td>{{ $company->slug }}</td>
                    <td><img src="{{asset('storage/company_logos/min_'.$company->logo)}}" width="100px" height="100px"></td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>
                      <button class="btn btn-primary btn-icon"  onclick="location.href = '{{ route('company.edit', $company->id) }}';"><div><i class="icon ion-compose"></i></div></button>
                      <button href="javascript:;" onclick="removeItemHandle('tr-{{$company->id}}',`{{ route('company.delete', $company->id) }}`)"  class="btn btn-danger btn-icon delete-section">
                        <div><i class="icon ion-trash-b"></i></div>
                      </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 d-flex justify-content-center pt-4" class="li: { list-style: none; }">
          {{ $companies->links() }}
        </div>
    </div>
  </div>
</div>
@endsection