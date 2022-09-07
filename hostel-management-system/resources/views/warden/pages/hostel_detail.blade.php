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
                                        <h4>Hostel Details</h4>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Hostel Data</button>                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-bordered border-primary">
                                    <thead>
                                    <tr>
                                        <th style="width: 20%">No</th>
                                        <th style="width: 20%">Hostel name</th>
                                        <th style="width: 20%">Number of Rooms</th>
                                        {{-- <th style="width: 20%">Actions</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($hostel as $host)
                                        <tr>
                                            <td>{{$host['id'] }}</td>
                                            <td>{{$host['hostel_name'] }}</td>
                                            <td>{{$host['no_of_rooms'] }}</td>
                                            {{-- <td >
                                                <a class="btn btn-sm btn-success" href="{{route('warden.students.show',$student->id)}}"><i class="fas fa-eye"></i> Show</a>
                                                <a class="btn btn-sm btn-warning" href="{{route('warden.students..edit',$student->id)}}"><i class="fas fa-edit"></i> Edit</a>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


<!-- start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('hostel.store')}}"  method="POST">
        @csrf
        <div class="modal-body">

            <div class="form-group">
                <label for="hostelName">Hostel name</label>
                <select class="form-control" name="hostelName">
                @foreach ($hostel as $host)
                    <option value="{{$host->id}}">{{$host->hostel_name}}</option>
                @endforeach
                {{-- <input type="text" class="form-control" id='host' name="hostelName"  placeholder=""> --}}
            </div>

            <div class="form-group">
                <label for="totalRooms">Total Rooms</label>
                <input type="text" class="form-control" name="totalRoom" placeholder="Total Rooms">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end Modal -->
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
