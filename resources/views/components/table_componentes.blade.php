@extends('adminLayout')

@section('content')


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
                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')
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
@endsection

