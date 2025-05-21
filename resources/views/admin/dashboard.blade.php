@extends('admin.layout.master')
@section('content')
<div class="text-center">
    <h3>Welcome to {{ Auth::user()->name }} IMS Admin Account</h3>
</div>


@endsection