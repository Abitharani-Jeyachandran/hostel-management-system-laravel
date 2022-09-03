@extends('warden.layouts.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="d-flex breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="/warden/home">Home</a></li>
            <li class="breadcrumb-item text-capitalize"><a href="{{route('warden.students.index')}}">Users</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">Add User</li>
        </ol>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="container">
            <main class="mx-auto m-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>Add Students</h4>
                                    </div>
                                    <div>
                                        <a href="{{route('warden.students.index')}}" class="btn btn-sm btn-warning float-end">Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route('warden.students.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input  @error('csv_file') is-invalid @enderror" name="csv_file" accept=".csv"  id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        @error('csv_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" name="has_header" checked>
                                                <label class="custom-control-label" for="customCheck"><strong>File Contains Header Row ?</strong></label>
                                            </div>
                                        </div> --}}
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> save</button>
                                    </div>
                                </form>
                            </div>
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
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endpush
