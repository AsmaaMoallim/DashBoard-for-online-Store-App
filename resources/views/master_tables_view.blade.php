@extends('adminLayout')

@section('content')
{{--    <div class="content-wrapper">--}}
{{--        <div class="content-header">--}}
{{--        </div>--}}
{{--        <div class="col-lg-6 pr-xl-5">--}}
{{--            <div class=" card card-dark " style="background-color: silver ">--}}

    <x-table_componentes
        :pagename="$pagename" :displayDetailes="$displayDetailes ?? ''"
        :placeHolder="$placeHolder ?? ''" :key="$key ?? ''"
        :rows="$rows" :columns="$columns" :tables="$tables"
        :addNew="$addNew  ?? ''" :showRecords="$showRecords ?? ''"
        :formPage="$formPage ?? ''" :recordPage="$recordPage ?? ''"
        :noUpdateBtn="$noUpdateBtn ?? ''" :noDeleteBtn="$noDeleteBtn ?? ''"
    ></x-table_componentes>


{{--<div class="panel-body">--}}
{{--    <div class="table-responsive">--}}
{{--        <table class="table table-bordered table-striped">--}}
{{--            <tr>--}}
{{--                <th width="30%">Image</th>--}}
{{--                <th width="70%">Name</th>--}}
{{--            </tr>--}}
{{--            @foreach($rows as $row)--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <img src="store_image/fetch_image/{{ $row->medl_id }}"  class="img-thumbnail" width="75" />--}}
{{--                    </td>--}}
{{--                    <td>{{ $row->medl_name }}</td>--}}
{{--                </tr>--}}
{{--                {!! $rows->links() !!}--}}

{{--            @endforeach--}}
{{--        </table>--}}
{{--    </div>--}}
{{--</div>--}}
{{--            </div>--}}
{{--        </div>--}}

@endsection
