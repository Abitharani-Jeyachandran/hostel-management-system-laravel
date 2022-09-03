@extends('warden.layouts.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="d-flex breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="/warden/home">Home</a></li>
            <li class="breadcrumb-item text-capitalizeactive" aria-current="page"><a href="{{route('warden.students.index')}}">Students</a></li>
        </ol>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="container">
            <main class="mx-auto m-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>Students List</h4>
                                    </div>
                                    <div>
                                        <a href="{{route('warden.students.create')}}" class="btn btn-sm btn-primary float-end">Add Student</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-bordered border-primary">
                                    <thead>
                                    <tr>
                                        <th style="width: 20%">Enrollment Number</th>
                                        <th style="width: 20%">Email</th>
                                        <th style="width: 20%">First Name</th>
                                        <th style="width: 20%">Last Name</th>
                                        {{-- <th style="width: 20%">Actions</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $student)
                                        <tr>
                                            <td >{{$student->enrollment_number}}</td>
                                            <td>{{ $student->email }}</td>
                                            <td >{{$student->firstname}}</td>
                                            <td >{{$student->lastname}}</td>
                                            {{-- <td >
                                                <a class="btn btn-sm btn-success" href="{{route('warden.students.show',$student->id)}}"><i class="fas fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-warning" href="{{route('warden.students..edit',$student->id)}}"><i class="fas fa-edit"></i> Edit</a>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{$data->links('pagination::bootstrap-4')}}
                                </div>
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
    function deleteConfirmation(id){
        Swal.fire({
            title: 'Are you sure?',
            html: "You want to delete this record" ,
            icon:  'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
            $('#form-data-'+id).submit();
            }
        })
    }
</script>
@endpush
