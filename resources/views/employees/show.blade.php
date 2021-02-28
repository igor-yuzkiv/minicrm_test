@extends('layouts.app')

@section("content")

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-body">
                    <a class="btn btn-outline-success" href="{{route('employees.create')}}"><i class="fa fa-plus"></i> {{__("Create")}}</a>
                    <a class="btn btn-outline-warning" href="{{route('employees.edit', $employee)}}"><i class="fa fa-pen"></i> {{__("Edit")}} </a>
                    <button class="btn btn-outline-danger" id="destroy_btn" ><i class="fa fa-trash"></i> {{__("Destroy")}} </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 offset-1">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> {{__("Edit Employee")}} - {{$employee->first_name}} {{$employee->last_name}}</h3>
                </div>
                <div class="card-body">
                    @include('employees.partials.form', ['method' => "PUT", 'action' => route('employees.update', $employee), 'value' => $employee, 'read_only' => true])
                </div>
            </div>

        </div>
    </div>


    <form id="destrouyForm" method="POST" action="{{route("employees.destroy", $employee)}}">
        @method("DELETE")
        @csrf
    </form>
@endsection

@section("js")
    @parent
    <script>

        $("#destroy_btn").on('click', () => {
            if (confirm('{!! __("Are you sure you want to delete this employee?") !!}')) {
                $("#destrouyForm").submit();
            }
        })

    </script>
@endsection
