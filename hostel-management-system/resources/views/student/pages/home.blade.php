@extends('student.layouts.main')
@section('content')
hello {{Auth::user()->firstname}}
@endsection

@push('scripts')
@endpush
