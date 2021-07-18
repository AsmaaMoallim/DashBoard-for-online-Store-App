@extends('adminLayout')

@section('content')


       <x-table_componentes
           :pagename="$pagename" :displayDetailes="$displayDetailes ?? ''"
           :placeHolder="$placeHolder ?? ''" :key="$key ?? ''"
           :rows="$rows ?? ''" :columns="$columns ?? ''" :tables="$tables ?? ''"
           :addNew="$addNew  ?? ''" :showRecords="$showRecords ?? ''"
           :formPage="$formPage ?? ''" :recordPage="$recordPage ?? ''"
           :noUpdateBtn="$noUpdateBtn ?? ''" :noDeleteBtn="$noDeleteBtn ?? ''"


           :rows2="$rows2 ?? ''" :columns2="$columns2 ?? ''" :tables2="$tables2 ?? ''"
           :addNew2="$addNew2  ?? ''" :showRecords2="$showRecords2 ?? ''"
           :formPage2="$formPage2 ?? ''" :recordPage2="$recordPage2 ?? ''" :key2="$key2 ?? ''"
       ></x-table_componentes>

@endsection
