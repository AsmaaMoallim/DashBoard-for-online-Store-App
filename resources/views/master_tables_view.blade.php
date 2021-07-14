@extends('adminLayout')

@section('content')


    <x-table_componentes
        :pagename="$pagename"  :displayDetailes="$displayDetailes ?? ''"
        :rows="$rows" :columns="$columns" :tables="$tables"
        :addNew="$addNew  ?? ''" :showRecords="$showRecords ?? ''"
        :formPage="$formPage ?? ''" :recordPage="$recordPage ?? ''"></x-table_componentes>

@endsection
