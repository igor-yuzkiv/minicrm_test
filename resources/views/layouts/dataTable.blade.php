@extends('layouts.app')
@section('plugins.Datatables', true)


@section('content')
    @yield('before_table')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$card_title ?? __("Data Table")}}</h3>
                </div>

                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover dataTable dtr-inline">
                        @yield('table')
                    </table>
                </div>
            </div>
        </div>
    </div>
    @yield('after_table')
@endsection


@section('js')
    @parent

    <script>
        $("#dataTable").dataTable({
            paging: false,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: false,
            autoWidth: false,
            responsive: true,
        });
    </script>

@endsection
