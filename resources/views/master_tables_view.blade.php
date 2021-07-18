@extends('adminLayout')

@section('content')


       <x-table_componentes
           :pagename="$pagename" :displayDetailes="$displayDetailes ?? ''"
           :placeHolder="$placeHolder ?? ''" :key="$key ?? ''"
           :rows="$rows" :columns="$columns" :tables="$tables"
           :addNew="$addNew  ?? ''" :showRecords="$showRecords ?? ''"
           :formPage="$formPage ?? ''" :recordPage="$recordPage ?? ''"
           :noUpdateBtn="$noUpdateBtn ?? ''" :noDeleteBtn="$noDeleteBtn ?? ''"
       ></x-table_componentes>

@endsection
