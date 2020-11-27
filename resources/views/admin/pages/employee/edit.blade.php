@extends('admin.layouts.app')

@section('content_header')
  <div>
     <ol class="breadcrumb">
        <li><a href="{{route('employee.index')}}">Employee list</a></li>
        <li class="active">Employee edit</li>
    </ol>
  </div>
  <h1>Employee edit</h1>
@endsection

@section('content') 
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form role="form" id="resume-form" method="post" action="{{route('employee.update', $employee->id)}}"  enctype="multipart/form-data" >
            @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name">First Name * </label>
                        <input type="text" class="form-control" required name="first_name" value="@if(old('first_name')){{old('first_name')}}@else{{$employee->first_name}}@endif" placeholder="Enter first name">
                        @error('first_name')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last name * </label>
                        <input type="text" class="form-control" required name="last_name" value="@if(old('last_name')){{old('last_name')}}@else{{$employee->last_name}}@endif" placeholder="Enter last name">
                        @error('last_name')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email * </label>
                        <input type="email" class="form-control" required name="email" value="@if(old('email')){{old('email')}}@else{{$employee->email}}@endif" placeholder="Enter email">
                        @error('email')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone * </label>
                        <input type="phone" class="form-control" required name="phone" value="@if(old('phone')){{old('phone')}}@else{{$employee->phone}}@endif" placeholder="Enter phone">
                        @error('phone')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="from-group">
                        <label for="company_id">Company * </label>
                        <select class="select2" id="company_id" required name="company_id">
                            @foreach($companies as $company)
                            <option value="{{$company->id}}" @if(old('company_id') && old('company_id') == $company->id ) selected @elseif($employee->company_id == $company->id ) selected  @endif >{{ $company->name }}</option>
                            @endForeach
                        </select>
                        @error('company_id')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group"> 
                        <label for="image">Image * </label>
                        <input type="file" name="image" id="image">
                        <p class="help-block">Image required format (JPG, JPEG, PNG).</p>
                        @error('image')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                        @if($employee->image) 
                            <img id="img-preview" src="{{asset('storage/employee_images/min_'.$employee->image)}}" width="100px" height="100px">
                        @endif
                    </div>         

                </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({ width: '100%' });
        $("#image").change(function() {
            readURL(this);
        });
    });
</script>
@endsection