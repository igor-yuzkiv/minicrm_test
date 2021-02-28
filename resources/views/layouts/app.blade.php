@extends("adminlte::page")

@section('plugins.Sweetalert2', true)

@includeWhen( boolval($errors->any()), 'layouts.alerts.error', ['status' => 'complete'])
@includeWhen( session()->has('message'), 'layouts.alerts.message', ['status' => 'complete'])
