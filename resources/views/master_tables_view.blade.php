@extends('adminLayout')

@section('content')

    <x-table_componentes :rows="$rows" :columns="$columns" :tables="$tables"></x-table_componentes>

@endsection
