@extends('warden.layouts.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <ol class="d-flex breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="/warden/home">Home</a></li>
            <li class="breadcrumb-item text-capitalize"><a href="">hostel</a></li>
            <li class="breadcrumb-item text-capitalizeactive" aria-current="page"><a href="{{route('warden.appeal_list')}}">Students</a></li>
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
                                        <h4>Students Appeal List</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-bordered border-primary">
                                    <thead>
                                    <tr>
                                        <th style="width: 20%">Student ID</th>
                                        <th style="width: 20%">Requested Hosel</th>
                                        <th style="width: 20%">Beds</th>
                                        <th style="width: 20%">Requesed room</th>
                                        <th style="width: 20%">Appeal reason</th>
                                        <th style="width: 20%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($appeal as $student)
                                        <tr>
                                            <td>{{$student['student_id'] }}</td>
                                            <td>{{$student['e_hostel']}}</td>
                                            <td>{{$student['e_bed']}}</td>
                                            <td>{{$student['e_room'] }}</td>
                                            <td>{{$student['apply_reason'] }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{url('approved',$student['id'])}}"> Approve</a>
                                                <a class="btn btn-sm btn-danger" href="{{url('reject',$student['id'])}}"> Reject</a>
                                            </td>
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
</section>
@endsection


