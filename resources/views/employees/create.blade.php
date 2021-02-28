@extends('layouts.app')

@section("content")
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> {{__("Create Employee")}} </h3>
                </div>
                <div class="card-body">
                    @include('employees.partials.form', ['method' => "POST", 'action' => route('employees.store')])
                </div>
            </div>

        </div>
    </div>
@endsection
