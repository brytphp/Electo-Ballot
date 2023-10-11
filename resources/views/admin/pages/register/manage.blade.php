@extends('admin.layouts.app')


@section('title','Manage Register')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Register</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Voters</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <manage-register ref="register"></manage-register>

</div>
@endsection
