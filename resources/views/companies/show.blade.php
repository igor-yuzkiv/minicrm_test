@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-body">
                    <a class="btn btn-outline-success" href="{{route('companies.create')}}"><i class="fa fa-plus"></i> {{__("Create")}}</a>
                    <a class="btn btn-outline-warning" href="{{route('companies.edit', $company)}}"><i class="fa fa-pen"></i> {{__("Edit")}} </a>
                    <button class="btn btn-outline-danger" id="destroy_btn" ><i class="fa fa-trash"></i> {{__("Destroy")}} </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        {!! $company->name !!}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            @include('companies.partials.form', ['method' => 'PUT', 'action' => route('companies.update', $company), 'value' => $company, 'read_only' => true])
                        </div>
                        <div class="col-sm-4">
                            <strong>{{__("Logo")}}</strong>
                            <img src="{{$logo}}" style="width: 100%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        {{__("Employees")}}
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__("First Name")}}</th>
                            <th>{{__("Last Name")}}</th>
                            <th>{{__("Email")}}</th>
                            <th>{{__("Phone")}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if ($company->employees()->get()->isEmpty())
                                <tr>
                                    <td colspan="5" style="text-align: center" > {{__("This company has no employees ...")}} </td>
                                </tr>
                            @else
                                @php($employees = $company->employees()->get())
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->id}}</td>
                                        <td>{{$employee->first_name}}</td>
                                        <td>{{$employee->last_name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <th>
                                            <a href="{{route("employees.edit", $employee)}}"><i class="fa fa-pen"></i></a>
                                        </th>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <form id="destrouyForm" method="POST" action="{{route("companies.destroy", $company)}}">
        @method("DELETE")
        @csrf
    </form>

@endsection

@section("js")
    @parent
    <script>

        $("#destroy_btn").on('click', () => {
            if (confirm('{!! __("Are you sure you want to delete this company?") !!}')) {
                $("#destrouyForm").submit();
            }
        })

    </script>
@endsection
