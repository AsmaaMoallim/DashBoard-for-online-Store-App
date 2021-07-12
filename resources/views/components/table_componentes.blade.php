@extends('adminLayout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$pagename ?? ""}}</h1>
                    </div><!-- /.col -->
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-left ">--}}
                    {{--                            <li class=" ml-3">--}}
                    {{--                                <button type="button" class="btn btn-primary float-right">--}}
                    {{--                                    <i class="fa fa-plus"></i>  إضافة مدير </button>--}}
                    {{--                            </li>--}}

                    {{--                            <li>--}}
                    {{--                                <button type="button" class="btn btn-primary float-right">سجل عمليات المديرين </button>--}}
                    {{--                            </li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div> <!-- /.col -->--}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">



    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        @if($addNew)

                            <div style="float:right!important; margin-left:2%">

                                <a class="btn btn-block btn-info"
                                   href="{{ url('/'.$tables .'/'. $formPage . '/insertData') }}">
                                    <i class="fa ">
                                    </i>
                                    {{$addNew}}
                                </a>
                            </div>
                        @endif

                        @if($showRecords)

                            <div style="float:right!important;">

                                <a class="btn btn-block btn-info"
                                   href="{{ url('/'.$tables .'/'. $recordPage . '/display') }}">
                                    <i class="fa ">
                                    </i>
                                    {{$showRecords}}
                                </a>
                            </div>
                        @endif

                        <div style="align-items:flex-start; float:left!important;">

                            <div class="input-group input-group-sm" style="width:400px;">

                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">


                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table id="tableprofider" class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                @for( $i = 0 ; $i<=10 ; $i++)


                                    @if(isset($columns[$i]) && $columns[$i]!='fakeId')
                                        <th>{{$columns[$i]}}</th>
                                    @endif

                                @endfor

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach( $rows as $rows)

                                        @for( $i = 0 ; $i<=10; $i++)

                                        @if(isset($columns[$i]) && $columns[$i] == "الصورة/رابط الفيديو")
                                            <td>  <img src="Storage::url(/storage/app/{{$columns[$i]}}"/></td>


                                        @elseif(isset($columns[$i]) && $columns[$i]!='fakeId')
                                                <?php $val = (string)$columns[$i] ?>
                                                    <td> {{$rows->$val}}</td>
                                        @endif
                                        @endfor

                                        <td class="project-actions text-right">
                                            @if(isset($rows->state))
                                                @if($rows->state)
                                                    <a class="btn btn-success btn-sm"
                                                       href="{{ url('/'.$tables .'/'. $rows->fakeId . '/enableordisable') }}">
                                                        <i class="fa ">
                                                        </i>
                                                        تعطيل
                                                    </a>
                                                @elseif(!$rows->state)
                                                    <a class="btn btn-primary btn-sm"
                                                       href="{{ url('/'.$tables .'/'. $rows->fakeId . '/enableordisable') }}">
                                                        <i class="fa ">
                                                        </i>
                                                        تفعيل
                                                    </a>
                                                @endif
                                            @endif
                                            <a class="btn btn-info btn-sm"
                                               href="{{ url('/'.$tables .'/'. $rows->fakeId . '/update') }}">
                                                <i class="fa fa-pencil">

                                                </i>
                                                تعديل
                                            </a>
                                            <a class="btn btn-danger btn-sm deletee"
                                               href="{{ url('/'.$tables .'/'. $rows->fakeId . '/delete') }}">
                                                <i class="fa fa-trash">
                                                </i>
                                                حذف
                                            </a>
                                        </td>


                            </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
        </section>
@endsection

