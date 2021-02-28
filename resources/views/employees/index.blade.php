@extends("layouts.dataTable", ['card_title' => __("Employees")])
@section("before_table")
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-success">
                <div class="card-body">
                    <a class="btn btn-outline-success" href="{{route('employees.create')}}"><i class="fa fa-plus"></i> {{__("Create")}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('table')
    <thead>
    <tr>
        <th>{{__("First Name")}}</th>
        <th>{{__("Last Name")}}</th>
        <th>{{__("Company")}}</th>
        <th>{{__("Email")}}</th>
        <th>{{__("Phone")}}</th>
        <th>{{__("Created At")}}</th>
        <th>{{__("Updated At")}}</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>
                    <a href="{{route("companies.show", $employee->company)}}" target="_blank">{{$employee->company->name}}</a>
                </td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->created_at}}</td>
                <td>{{$employee->updated_at}}</td>
                <td>
                    <a class="btn btn-outline-info" href="{{route("employees.show", $employee)}}"><i class="fa fa-info"></i></a>
                </td>
                <td>
                    <a class="btn btn-outline-success" href="{{route("employees.edit", $employee)}}"><i class="fa fa-pen"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>{{__("First Name")}}</th>
        <th>{{__("Last Name")}}</th>
        <th>{{__("Company")}}</th>
        <th>{{__("Email")}}</th>
        <th>{{__("Phone")}}</th>
        <th>{{__("Created At")}}</th>
        <th>{{__("Updated At")}}</th>
        <th></th>
        <th></th>
    </tr>
    </tfoot>
@endsection
@section("after_table")
    <div class="row">
        <div class="col-sm-12">
            {{ $employees->links() }}
        </div>
    </div>
@endsection
