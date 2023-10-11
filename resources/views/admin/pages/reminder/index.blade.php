@extends('admin.layouts.app')


@section('title','Reminder')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Reminder</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Reminder</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <reminder></reminder>

</div>
@endsection
