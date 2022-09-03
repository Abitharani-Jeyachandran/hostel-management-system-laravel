@extends('student.layouts.main')
@section('content')
<style>
    .icon-password {
    position: absolute;
    top: 0px;
    margin-top: 10px;
    right: 10px;
}
.pos-relative {
    position: relative;
}
</style>

<div class="content-header">
    <div class="container-fluid">
        <ol class="d-flex breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="/student/home">Home</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">Profile</li>
        </ol>
    </div>
</div>
<section class="content">
    {{-- <div class="container-fluid"> --}}
<div class="container-fluid">
    <div class="container">
        <main class="mx-auto m-4">
        <h3 class="page-heading rounded">{{ auth()->user()->name }} </h3>
        <div class="row" id="filter-panel">
            <div class="col-12">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    {{-- <form action="{{route('student.profile.details_update',$user->id)}}" method="post">
                        @csrf
                        @method('PUT') --}}
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3 text-left">
                                    <label for="current_password" class="form-label">First Name <strong style="color:red">*</strong></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$user->firstname) }}" disabled>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3 text-left">
                                    <label for="current_password" class="form-label">Last Name <strong style="color:red">*</strong></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$user->lastname) }}" disabled>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3 text-left">
                                    <label for="current_password" class="form-label">Email </label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$user->email) }}" disabled>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3 text-left">
                                    <label for="current_password" class="form-label">Enrollment Number </label>
                                    <input type="text" class="form-control @error('enrollment_number') is-invalid @enderror" id="enrollment_number" name="enrollment_number"  value="{{ old('enrollment_number',$user->enrollment_number) }}" disabled>
                                    @error('enrollment_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row border-top-1 m-0 pt-4 mt-2">
                            <div class="col-12 col-md-3 offset-md-3 d-flex">
                                <button type="button" class="btn btn-light w-100 mx-1" onclick="window.location.replace(`{{ route('student.home') }}`)">Back</button>
                                <button type="submit" class="btn btn-primary w-100 mx-1" >Update</button>
                            </div>
                        </div> --}}

                    {{-- </form> --}}
                </div>
            </div>
        </div>

        <div class="row" id="filter-panel">
            <div class="col-12">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <form action="{{route('student.profile.update',$user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="mb-3 text-left">
                                    <label for="current_password" class="form-label">Current Password <strong style="color:red">*</strong></label>
                                    <div class="pos-relative">
                                        <input class="form-control" placeholder="Current Password" type="password" name="current_password" id="current_password" required/>
                                        <span toggle="#current_password" class="fa fa-fw fa-eye c-toggle-password icon-password"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3 text-left">
                                    <label for="password" class="form-label">New Password <strong style="color:red">*</strong></label>
                                    <div class="pos-relative">
                                        <input class="form-control" placeholder="New Password" type="password" name="password" id="password" required/>
                                        <span toggle="#password" class="fa fa-fw fa-eye p-toggle-password icon-password"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3 text-left">
                                    <label for="confirm_password" class="form-label">Confirm Password <strong style="color:red">*</strong></label>
                                    <div class="pos-relative">
                                        <input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" id="confirm_password" required/>
                                        <span toggle="#confirm_password" class="fa fa-fw fa-eye r-toggle-password icon-password"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top-1 m-0 pt-4 mt-2">
                            <div class="col-12 col-md-3 offset-md-3 d-flex">
                                <button type="button" class="btn btn-light w-100 mx-1" onclick="window.location.replace(`{{ route('student.home') }}`)">Back</button>
                                <button type="submit" class="btn btn-primary w-100 mx-1" >Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </main>
    </div>
</div>
</section>
@endsection

@push('scripts')
<script>
$("body").on('click', '.c-toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#current_password");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
$("body").on('click', '.p-toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
$("body").on('click', '.r-toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#confirm_password");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
</script>
@endpush
