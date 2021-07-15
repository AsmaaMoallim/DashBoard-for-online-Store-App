@extends('adminLayout')

<style>
    .row {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .box {
        height: 20px;
        width: 20px;
        border: 1px solid black;
        margin-right: 5px;
        margin-top: 2%;
        float: right;
        text-align: center;
        cursor: pointer;
    }

    .delete {
        display: none;
    }

    .box:hover + .delete {
        display: block;
    }

</style>
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

                                {{-- search --}}

                                <form action="{{ route($tables.'.search') }}" method="get">
                                    @csrf

                                    <div style="align-items:flex-start; float:left!important;">

                                        <div class="input-group input-group-sm" style="width:400px;">


                                            <input name="search" type="text" class="form-control float-right"


                                                   @if($tables. "/search"==request()->path())
                                                   placeholder="{{$placeHolder? $placeHolder : 'Search'}}"
                                                   required

                                                   @else
                                                   placeholder="Search"
                                                   required
                                                @endif
                                            >
                                            <div class="input-group-append">


                                                <button type="submit" name="btnSearch" class="btn btn-default">
                                                    <i class="fa fa-search"></i>

                                                </button>
                                                <a name="btnCancel" href="{{ url('/'.$tables) }}"
                                                   onclick="window.location='{{ url('/'.$tables ) }}"
                                                   class="btn btn-default">
                                                    <i class="fa fa-close"></i>

                                                </a>


                                            </div>


                                        </div>

                                    </div>
                                </form>
                                {{-- search --}}
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

                                                    <td><img src="Storage::url(/storage/app/{{$columns[$i]}}"/></td>

                                                @elseif(isset($columns[$i]) && $columns[$i] == "الألوان")
                                                    <?php $val = (string)$columns[$i] ?>
                                                    <?php $color = (string)$rows->$val ?>

                                                    <td>
                                                        {{--                                                        @foreach($columns as $columns)--}}
                                                        <div class='box'
                                                             style="background-color:{{$color}} !important;">
                                                            hh
                                                        </div>
                                                        {{--                                                        @endforeach--}}
                                                    </td>

                                                @elseif(isset($columns[$i]) && $columns[$i]!='fakeId')
                                                    <?php $val = (string)$columns[$i] ?>
                                                    {{--                                                    @if(str_contains($rows->$val, "#"))--}}
                                                    {{--                                                    @dd($rows->$val)--}}

                                                    {{--                                                        <td>--}}

                                                    {{--                                                            <div class='box'--}}
                                                    {{--                                                                  style="background-color:red !important;">--}}
                                                    {{--hh--}}
                                                    {{--                                                            </div>--}}

                                                    {{--                                                        </td>--}}

                                                    {{--                                                    @else--}}
                                                    @if($key)
                                                        @if(str_contains(strtolower($rows->$val), strtolower($key)) && isset($_GET['btnSearch']))
                                                            <td style="background-color: yellow ">{{$rows->$val}}</td>
                                                        @else
                                                            <td>{{$rows->$val}}</td>
                                                        @endif
                                                    @else
                                                        <td>{{$rows->$val}}</td>
                                                    @endif
                                                    {{--                                                    @endif--}}

                                                @endif
                                            @endfor

                                            <td class="project-actions text-right">
                                                @if($displayDetailes)
                                                    <a class="btn btn-default btn-sm"
                                                       href="{{ url('/'.$tables .'/'. $rows->fakeId . '/displayDetailes') }}">
                                                        <i class="fa ">
                                                        </i>
                                                        عرض التفاصيل
                                                    </a>
                                                @endif
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

                                                    @if(!$noUpdateBtn)

                                                    <a class="btn btn-info btn-sm"
                                                   href="{{ url('/'.$tables .'/'. $rows->fakeId . '/update') }}">
                                                    <i class="fa fa-pencil">

                                                    </i>
                                                    تعديل
                                                </a>
                                                    @endif

                                                @if(!$noDeleteBtn)

                                                        <a class="btn btn-danger btn-sm deletee"
                                                   href="{{ url('/'.$tables .'/'. $rows->fakeId . '/delete') }}">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                    حذف
                                                </a>
                                            </td>
                                                @endif


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

