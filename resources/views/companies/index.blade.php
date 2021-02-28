@extends("layouts.dataTable", ['card_title' => __("Companies")])
@section("before_table")
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-success">
                <div class="card-body">
                    <a class="btn btn-outline-success" href="{{route('companies.create')}}"><i class="fa fa-plus"></i> {{__("Create")}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('table')
    <thead>
        <tr>
            <th>{{__("Company Name")}}</th>
            <th>{{__("Email")}}</th>
            <th>{{__("Website URL")}}</th>
            <th>{{__("Created At")}}</th>
            <th>{{__("Updated At")}}</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>
                    @if ($company->website_url != null)
                        <a href="{{$company->website_url}}" target="_blank"> {{__("link")}} </a>
                    @else
                        -
                    @endif
                </td>
                <td>{{$company->created_at}}</td>
                <td>{{$company->updated_at}}</td>
                <td>
                    <a class="btn btn-outline-info" href="{{route("companies.show", $company)}}"><i class="fa fa-info"></i></a>
                </td>
                <td>
                    <a class="btn btn-outline-success" href="{{route("companies.edit", $company)}}"><i class="fa fa-pen"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>{{__("Company Name")}}</th>
            <th>{{__("Email")}}</th>
            <th>{{__("Website URL")}}</th>
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
            {{ $companies->links() }}
        </div>
    </div>
@endsection
