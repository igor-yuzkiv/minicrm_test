@extends("layouts.app")


@section("content")
    <div class="row">
        <div class="col-sm-8 offset-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        {{__("Create company")}}
                    </h3>
                </div>
                <div class="card-body">
                    @include('companies.partials.form', ['action' => route('companies.store'), 'method' => "POST"])
                </div>
            </div>

        </div>
    </div>
@endsection
