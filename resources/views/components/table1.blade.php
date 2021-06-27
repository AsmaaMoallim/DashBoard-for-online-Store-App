@extends('adminLayout')

@section('content')


    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-bottom: 2%"></h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
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
                        <?php  $x = 0;  $arrays = array(); $arrays[$x] = 0   ?>
                        <table id="tableprofider" class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                @for( $i = 0 ; $i<=10 ; $i++)

                                    @if(isset($columns[$i]) && $columns[$i]!='fakeID')
                                        <th>{{$columns[$i]}}</th> @endif

                                @endfor

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach( $rows as $rows)
                                    @for( $i = 0 ; $i<=10; $i++)

                                        @for( $i = 0 ; $i<=10; $i++)
                                            @if(isset($columns[$i]) && $columns[$i]!='fakeID')

                                                <?php $val = (string)$columns[$i] ?>
                                                @if($val)
                                                    <td> {{$rows->$val}}</td> @endif

                                            @endif

                                        @endfor

                                        {{--                                    <td> {{ $h->$val }}</td>--}}
                                        {{--                                <td>{{ $h->$val}}</td>--}}
                                        <td class="project-actions text-right">
                                            @if($rows->state)
                                                <a class="btn btn-primary btn-sm" href="{{ url('/maneger/' . $rows->fakeID . '/update') }}">
                                                    <i class="fa ">
                                                    </i>
                                                    تعطيل
                                                </a>
                                            @elseif(!$rows->state)
                                                <a class="btn btn-success btn-sm" href="{{ url('/maneger/' . $rows->fakeID . '/update') }}">
                                                    <i class="fa ">
                                                    </i>
                                                    تفعيل
                                                </a>
                                            @endif
                                            <a class="btn btn-info btn-sm" href="#">
                                                <i class="fa fa-pencil">

                                                </i>
                                                تعديل
                                            </a>
                                            <a class="btn btn-danger btn-sm deletee" href="{{ url('/maneger/' . $rows->fakeID . '/delete') }}">

{{--                                            <a class="btn btn-danger btn-sm deletee" href="{{ route('row.destroy') }}">--}}
                                                <i class="fa fa-trash">
                                                </i>
                                                حذف
                                            </a>

                                        <?php  $arrays[$x] = $x++    ?>


                            </tr>
                            @endfor
                            {{--                            @dd( $arrays[$x++])--}}

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

{{--<script>--}}

{{--    let keys = document.querySelector('.table');--}}
{{--    keys.addEventListener('click', (e)=> {--}}
{{--        let target = e.target;--}}

{{--        function hand() {--}}
{{--            console.log(arguments[0].target().id)--}}
{{--        }--}}
{{--    },--}}
{{--    $(document).ready(function () {--}}
{{--        hand();--}}
{{--    });--}}

{{--</script>--}}
{{--<script>--}}
{{--    let keys = document.querySelector('.table');--}}
{{--    keys.addEventListener('click', (e)=>{--}}
{{--        let target = e.target;--}}
{{--        if(target.classList.contains('deletee')){--}}

{{--            console.log(target.id);--}}
{{--        }--}}

{{--    })--}}
{{--</script>--}}
