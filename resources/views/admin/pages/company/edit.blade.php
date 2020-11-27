@extends('admin.layouts.app')

@section('content_header')
  <div>
     <ol class="breadcrumb">
        <li><a href="{{route('company.index')}}">Company list</a></li>
        <li class="active">Company edit</li>
    </ol>
  </div>
  <h1>Company edit</h1>
@endsection

@section('content') 
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form role="form" id="resume-form" method="post" action="{{route('company.update', $company->id)}}"  enctype="multipart/form-data" >
            @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name * </label>
                        <input type="text" class="form-control" required name="name" value="@if(old('name')){{old('name')}}@else{{$company->name}}@endif" placeholder="Enter name">
                        @error('name')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email * </label>
                        <input type="email" class="form-control" required name="email" value="@if(old('email')){{old('email')}}@else{{$company->email}}@endif" placeholder="Enter email">
                        @error('email')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Website * </label>
                        <input type="link" class="form-control" required name="website" value="@if(old('website')){{old('website')}}@else{{$company->website}}@endif" placeholder="Enter website">
                        @error('website')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group"> 
                        <label for="logo">Logo * </label>
                        <input type="file" name="logo" id="logo">
                        <p class="help-block">Logo required format (JPG, JPEG, PNG).</p>
                        @error('logo')
                            <span class="help-error-block">{{ $message }}</span>
                        @enderror
                        @if($company->logo) 
                            <img id="img-preview" src="{{asset('storage/company_logos/min_'.$company->logo)}}" width="100px" height="100px">
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
        $("#logo").change(function() {
            readURL(this);
        });
    });
</script>
@endsection