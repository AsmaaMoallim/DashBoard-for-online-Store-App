@extends('adminLayout')

@section('content')

    <x-table1 :rows="$rows" :columns="$columns"></x-table1>

@endsection
