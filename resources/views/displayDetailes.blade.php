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
    }


</style>
@section('content')



    @if(isset($id))

        @if("products/".$id ."/displayDetailes"==request()->path())
            <?php
            $prod_name = $currentValues->prod_name;
            $prod_price = $currentValues->prod_price;
            $prod_avil_amount = $currentValues->prod_avil_amount;
            $man_email = $currentValues->man_email;
            ?>



            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>{{$pagename ??''}}</h1>
                            </div>

                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">


                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">

                                        <div class="col-12">
                                            <a class="btn btn-danger deletee"
                                               style="float: left"
                                               href="{{ route('products.index') }}">
                                                الغاء
                                            </a>
                                            <h4> اسم المنتج: {{$prod_name}}</h4>
                                        </div>


                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong>القسم الفرعي</strong><br>
                                                @foreach($sections as $section)
                                                    @if(isset($id))
                                                        @if ($section->sub_id == $currentSections->sub_id)
                                                            {{$currentSections->sub_name}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </address>

                                            <address>
                                                <strong>الكمية المتوفرة حاليًا </strong><br>
                                                {{$prod_avil_amount}}
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong>المقاسات</strong><br>
                                                @foreach( $measures as $measure)
                                                    @foreach($currentMeasures as $currentMeasure)
                                                        @if($measure->mesu_id == $currentMeasure->mesu_id)
                                                            {{$measure->mesu_value}}     &nbsp;
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </address>
                                            <address>
                                                <strong> الألوان المتاحة </strong><br>
                                                @foreach($productProdAvilColor as $productProdAvilColor)
                                                    <div class='box'
                                                         style="background-color:{{$productProdAvilColor->prod_avil_color}}"
                                                    >

                                                    </div>

                                                @endforeach
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong> السعر </strong><br>
                                                {{$prod_price}}
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row invoice-info">
                                        <div class="col-lg-4 invoice-col">
                                            <address>
                                                <strong>صور المنتج : </strong><br>

                                            </address>

                                            <address>

                                                @foreach($rows as $rows)
                                                    <img
                                                        width="100"
                                                        height="100"
                                                        src="update/fetch_image/{{$rows->medl_id}}">
                                                @endforeach
                                            </address>
                                        </div>

                                    </div>

                                    {{--                            <!-- Table row -->--}}
                                    {{--                            <div class="row">--}}
                                    {{--                                <div class="col-12 table-responsive">--}}
                                    {{--                                    <table class="table table-striped">--}}
                                    {{--                                        <thead>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <th>تعداد</th>--}}
                                    {{--                                            <th>محصول</th>--}}
                                    {{--                                            <th>سریال #</th>--}}
                                    {{--                                            <th>توضیحات</th>--}}
                                    {{--                                            <th>قیمت کل</th>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        </thead>--}}
                                    {{--                                        <tbody>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>1</td>--}}
                                    {{--                                            <td>ندای وظیفه</td>--}}
                                    {{--                                            <td>455-981-221</td>--}}
                                    {{--                                            <td>بازی شوتر شخص اول</td>--}}
                                    {{--                                            <td>150000 تومان</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>1</td>--}}
                                    {{--                                            <td>تلویزیون هوشمند سامسونگ</td>--}}
                                    {{--                                            <td>247-925-726</td>--}}
                                    {{--                                            <td>لوازم خانگی</td>--}}
                                    {{--                                            <td>2,000,000 تومان</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>1</td>--}}
                                    {{--                                            <td>لباسشویی</td>--}}
                                    {{--                                            <td>735-845-642</td>--}}
                                    {{--                                            <td>--}}
                                    {{--                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ--}}
                                    {{--                                            </td>--}}
                                    {{--                                            <td>10,000 تومان</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>1</td>--}}
                                    {{--                                            <td>نجات سرباز رایان</td>--}}
                                    {{--                                            <td>422-568-642</td>--}}
                                    {{--                                            <td>لورم ایپسوم متن ساختگی</td>--}}
                                    {{--                                            <td>20,000 تومان</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        </tbody>--}}
                                    {{--                                    </table>--}}
                                    {{--                                </div>--}}
                                    {{--                                <!-- /.col -->--}}
                                    {{--                            </div>--}}
                                    {{--                            <!-- /.row -->--}}

                                    <div class="row mt-lg-5">

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">
                                                @if($currentValues->state)
                                                    <a class="btn btn-success "
                                                       href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/enableordisable') }}">
                                                        <i class="fa ">
                                                        </i>
                                                        تعطيل
                                                    </a>
                                                @elseif(!$currentValues->state)
                                                    <a class="btn btn-primary "
                                                       href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/enableordisable') }}">
                                                        <i class="fa ">
                                                        </i>
                                                        تفعيل
                                                    </a>
                                                @endif
                                                <a class="btn btn-info "
                                                   href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/update') }}">
                                                    <i class="fa fa-pencil">

                                                    </i>
                                                    تعديل
                                                </a>
                                                <a class="btn btn-danger deletee"
                                                   href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/delete') }}">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                    حذف
                                                </a>


                                            </div>
                                            <div class="col-lg-10">


                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>





            {{--    <div class="content-wrapper">--}}
            {{--        <div class="content-header">--}}
            {{--        </div>--}}
            {{--        <div class="col-lg-6 pr-xl-5">--}}
            {{--            <div class=" card card-dark " style="background-color: silver ">--}}

            {{--                <x-form.header-card title="عرض التفاصيل"/>--}}

            {{--                <form--}}
            {{--                    method="Post"--}}
            {{--                    enctype="multipart/form-data">--}}
            {{--                    @csrf--}}


            {{--                    <div class="card-body fc-direction-rtl">--}}

            {{--                        <label>  {{$prod_name ?? ''}}  </label>--}}
            {{--                        <x-form.input name="prod_name" class="form-control" type="name"--}}
            {{--                                      label="اسم المنتج " placeholder="أدخل اسم المنتج الجديد "--}}
            {{--                                      value="{{$prod_name ?? ''}}"></x-form.input>--}}


            {{--                        <x-form.input name="prod_price" class="form-control" type="price"--}}
            {{--                                      label="السعر " placeholder=" أدخل سعر المنتج الجديد"--}}
            {{--                                      value="{{$prod_price ?? ''}}"></x-form.input>--}}


            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>القسم الفرعي</label>--}}
            {{--                            <select name="sub_id">--}}
            {{--                                @foreach($sections as $section)--}}

            {{--                                    @if(isset($id))--}}

            {{--                                        @if ($section->sub_id == $currentSections->sub_id)--}}
            {{--                                            <option--}}

            {{--                                                value="{{$section->sub_id}}"--}}
            {{--                                                selected="selected">{{$currentSections->sub_name}}--}}
            {{--                                            </option>--}}
            {{--                                        @else--}}
            {{--                                            <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}
            {{--                                        @endif--}}

            {{--                                    @else--}}
            {{--                                        <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}


            {{--                                    @endif--}}
            {{--                                    /////////--}}

            {{--                                @endforeach--}}
            {{--                            </select>--}}
            {{--                        </div>--}}

            {{--                        --}}{{--                    <div class="form-group col-sm-10" >--}}
            {{--                        --}}{{--                        <label>صور المنتح</label>--}}

            {{--                        --}}{{--                        <div class="card-body table-responsive p-0">--}}
            {{--                        --}}{{--                        <?php  $x = 0;  $arrays = array(); $arrays[$x] = 0   ?>--}}
            {{--                        --}}{{--                        <table id="tableprofider" class="table table-hover text-nowrap">--}}
            {{--                        --}}{{--                            <thead>--}}
            {{--                        --}}{{--                            <tr>--}}
            {{--                        --}}{{--                                @for( $i = 0 ; $i<=10 ; $i++)--}}

            {{--                        --}}{{--                                    @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}
            {{--                        --}}{{--                                        <th>{{$columns[$i]}}</th> @endif--}}
            {{--                        --}}{{--                                @endfor--}}

            {{--                        --}}{{--                            </tr>--}}
            {{--                        --}}{{--                            </thead>--}}
            {{--                        --}}{{--                            <tbody>--}}
            {{--                        --}}{{--                            <tr>--}}

            {{--                        --}}{{--                                @foreach( $rows as $row)--}}
            {{--                        --}}{{--                                    @for( $i = 0 ; $i<=10; $i++)--}}

            {{--                        --}}{{--                                        @for( $i = 0 ; $i<=10; $i++)--}}
            {{--                        --}}{{--                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}

            {{--                        --}}{{--                                                <?php $val = (string)$columns[$i] ?>--}}
            {{--                        --}}{{--                                                @if($val)--}}
            {{--                        --}}{{--                                              <td> {{$row->medl_img_ved}} </td>--}}

            {{--                        --}}{{--                                            @else--}}
            {{--                        --}}{{--                                                {{$row->medl_img_ved = NULL}}--}}
            {{--                        --}}{{--                                            @endif--}}
            {{--                        --}}{{--                                            @endif--}}
            {{--                        --}}{{--                                                        @endfor--}}
            {{--                        --}}{{--                                                        @endfor--}}
            {{--                        --}}{{--                                                        @endforeach--}}
            {{--                        --}}{{--                            </tr>--}}
            {{--                        --}}{{--                            </tbody>--}}
            {{--                        --}}{{--                        </table>--}}
            {{--                        --}}{{--                    </div>--}}
            {{--                        --}}{{--                    </div>--}}



            {{--                        --}}{{--                                <select>--}}
            {{--                        --}}{{--                                @foreach( $rows as $rows)--}}

            {{--                        --}}{{--                                    <option value="{{$rows->medl_id}}"> <img {{$rows->medl_img_ved}} > </option>--}}

            {{--                        --}}{{--                                    @for( $i = 0 ; $i<=10; $i++)--}}

            {{--                        --}}{{--                                        @for( $i = 0 ; $i<=10; $i++)--}}
            {{--                        --}}{{--                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}

            {{--                        --}}{{--                                                {{ $val = (string)$columns[$i] }}--}}
            {{--                        --}}{{--                                                @if($val)--}}
            {{--                        --}}{{--                                                    <td> {{$rows->$val}}</td> @endif--}}

            {{--                        --}}{{--                                            @endif--}}

            {{--                        --}}{{--                                        @endfor--}}

            {{--                        --}}{{--                                    @endfor--}}

            {{--                        --}}{{--                    <button type="button" value="اختر صورة" onclick="window.location='{{ url('/media_Library') }}" ></button>--}}


            {{--                        --}}{{--                    <div class="form-group col-sm-10 ">--}}
            {{--                        --}}{{--                        <select  name="medl_id" id="pos_id" multiple>--}}
            {{--                        --}}{{--                            @foreach( $mediaImgs as $mediaImg)--}}
            {{--                        --}}{{--                                <option value="{{$mediaImg->medl_id}}"> {{$mediaImg->medl_img_ved}} </option>--}}
            {{--                        --}}{{--                            @endforeach--}}
            {{--                        --}}{{--                        </select>--}}
            {{--                        --}}{{--                    </div>--}}

            {{--                        <x-form.input name="prod_avil_amount" class="form-control" type="number"--}}
            {{--                                      label="الكمية المتوفرة حالياً "--}}
            {{--                                      placeholder=" أدخل الكمية المتوفرة حالياً للمنتج الجديد "--}}
            {{--                                      value="{{$prod_avil_amount ?? ''}}"></x-form.input>--}}

            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>المقاسات</label>--}}
            {{--                            <br>--}}
            {{--                            @foreach( $measures as $measure)--}}
            {{--                                <input name="mesu_id[]" type="checkbox"--}}
            {{--                                       value="{{$measure->mesu_id}}"--}}

            {{--                                       @if(isset($id))--}}

            {{--                                       @foreach($currentMeasures as $currentMeasure)--}}

            {{--                                       @if($measure->mesu_id == $currentMeasure->mesu_id)--}}

            {{--                                       checked="checked"--}}
            {{--                                    @endif--}}


            {{--                                    @endforeach--}}

            {{--                                    @endif--}}


            {{--                                > {{$measure->mesu_value}}--}}
            {{--                                <br>--}}
            {{--                            @endforeach--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>الألوان المتاحة</label>--}}
            {{--                            <div>--}}
            {{--                                <input id="color" type="color" class="mr-1">--}}
            {{--                                <a style=" color: red" onclick="catshColor()"> اضغط لاضافة اللون </a>--}}

            {{--                            </div>--}}


            {{--                            <div>--}}

            {{--                                <div class="row" id="ColorRow">--}}

            {{--                                    @if(isset($id))--}}
            {{--                                        @foreach($productProdAvilColor as $productProdAvilColor)--}}
            {{--                                            <div class='box'--}}
            {{--                                                 style="background-color:{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                 id="{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                 name="box[]"--}}
            {{--                                                 value="false"--}}
            {{--                                                 onclick="destroyColor()"--}}
            {{--                                            >--}}
            {{--                                                <input type="hidden"--}}
            {{--                                                       value="{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                       name="ColorBox[]" class="ColorBox">--}}

            {{--                                            </div>--}}
            {{--                                            <div class="delete" id="delete">X</div>--}}

            {{--                                        @endforeach--}}
            {{--                                    @endif--}}

            {{--                                </div>--}}
            {{--                            </div>--}}


            {{--                        </div>--}}

            {{--                        <script>--}}

            {{--                            function catshColor() {--}}
            {{--                                var elemen = document.getElementById('color');--}}

            {{--                                var ColorArray = $('[name^=ColorBox]').map(function (i) {--}}
            {{--                                    //return this.name;--}}

            {{--                                    return this.value; // for real values of input--}}
            {{--                                }).get();--}}
            {{--                                var i = 0;--}}

            {{--                                var display;--}}

            {{--                                if (ColorArray.length === 0) {--}}
            {{--                                    do {--}}
            {{--                                        // alert(elem.id)--}}
            {{--                                        if (ColorArray[i] == elemen.value) {--}}
            {{--                                            alert("اللون موجود مسبقًا");--}}
            {{--                                            display = false;--}}
            {{--                                        } else {--}}
            {{--                                            alert("here")--}}
            {{--                                            display = true;--}}
            {{--                                        }--}}
            {{--                                        i++;--}}
            {{--                                    } while (i < ColorArray.length)--}}
            {{--                                } else {--}}
            {{--                                    for (var i = 0; i < ColorArray.length; i++) {--}}
            {{--                                        if (ColorArray[i] == elemen.value) {--}}
            {{--                                            alert("اللون موجود مسبقًا");--}}
            {{--                                            var display = false;--}}
            {{--                                        } else {--}}
            {{--                                            var display = true;--}}
            {{--                                        }--}}
            {{--                                    }--}}
            {{--                                }--}}



            {{--                                if (display === true) {--}}
            {{--                                    // var elemen = document.getElementById('color');--}}

            {{--                                    var colorRow = document.getElementById('ColorRow');--}}
            {{--                                    var colorInput = document.createElement('input');--}}
            {{--                                    colorInput.type = 'hidden';--}}
            {{--                                    colorInput.value = elemen.value;--}}
            {{--                                    colorInput.name = 'ColorBox[]';--}}
            {{--                                    var colorDeleteDiv = document.createElement('div');--}}
            {{--                                    colorDeleteDiv.className = 'delete';--}}
            {{--                                    var text = document.createTextNode('X');--}}
            {{--                                    var colorDiv = document.createElement('div');--}}
            {{--                                    colorDiv.className = 'box';--}}
            {{--                                    colorDiv.style.backgroundColor = elemen.value;--}}
            {{--                                    colorDiv.id = elemen.value;--}}
            {{--                                    colorDiv.value = false;--}}
            {{--                                    colorDiv.onclick = function () {--}}
            {{--                                        destroyColor();--}}
            {{--                                    };--}}
            {{--                                    colorDiv.appendChild(colorInput);--}}
            {{--                                    colorDeleteDiv.appendChild(text);--}}
            {{--                                    colorRow.appendChild(colorDiv);--}}
            {{--                                    colorRow.appendChild(colorDeleteDiv);--}}
            {{--                                    display = false;--}}
            {{--                                } else {--}}
            {{--                                    alert("do not print")--}}
            {{--                                }--}}
            {{--                            };--}}


            {{--                            function destroyColor(e) {--}}

            {{--                                var elem = document.getElementsByClassName('box');--}}

            {{--                                var ColorArray = $('[name^=ColorBox]').map(function (i) {--}}
            {{--                                    //return this.name;--}}
            {{--                                    return this.value; // for real values of input--}}
            {{--                                }).get();--}}

            {{--                                e = e || window.event;--}}
            {{--                                var t = e.target;--}}
            {{--                                for (var i = 0; i < ColorArray.length; i++) {--}}
            {{--                                    if (t.id === ColorArray[i]) {--}}
            {{--                                        elem.item(i).remove();--}}
            {{--                                    }--}}
            {{--                                }--}}
            {{--                            }--}}

            {{--                        </script>--}}


            {{--                        <div class="form-group col-sm-10">--}}
            {{--                            <label>معلومات المنتج</label>--}}
            {{--                            <textarea class="form-control" id="editor1" name="prod_desc_img"--}}
            {{--                                      style="width:100%"> </textarea>--}}
            {{--                        </div>--}}

            {{--                        <!-- jQuery -->--}}
            {{--                        <script src="../../plugins/jquery/jquery.min.js"></script>--}}

            {{--                        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

            {{--                        <script src="../../plugins/fastclick/fastclick.js"></script>--}}
            {{--                        <script src="../../dist/js/adminlte.min.js"></script>--}}
            {{--                        <script src="../../dist/js/demo.js"></script>--}}
            {{--                        <script src="../../plugins/ckeditor/ckeditor.js"></script>--}}

            {{--                        <script--}}
            {{--                            src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>--}}
            {{--                        <script>--}}
            {{--                            $(function () {--}}
            {{--                                // Replace the <textarea id="editor1"> with a CKEditor--}}
            {{--                                // instance, using default configuration.--}}
            {{--                                ClassicEditor--}}
            {{--                                    .create(document.querySelector('#editor1'))--}}
            {{--                                    .then(function (editor) {--}}
            {{--                                        // The editor instance--}}
            {{--                                    })--}}
            {{--                                    .catch(function (error) {--}}
            {{--                                        console.error(error)--}}
            {{--                                    })--}}

            {{--                                // bootstrap WYSIHTML5 - text editor--}}

            {{--                                $('.textarea').wysihtml5({--}}
            {{--                                    toolbar: {fa: true}--}}
            {{--                                })--}}
            {{--                            })--}}
            {{--                        </script>--}}

            {{--                        <x-form.cancel-button indexPage="products"/>--}}
            {{--                        <x-form.save-button/>--}}

            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--    </div>--}}



        @elseif("email_box/".$id ."/displayDetailes"==request()->path())


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>{{$pagename}}</h1>
                            </div>

                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">


                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">

                                        <div class="col-12">
                                            <a class="btn btn-danger deletee"
                                               style="float: left"
                                               href="{{ route('email_box.index') }}">
                                                الغاء
                                            </a>
                                            <h4> مرسل الي الايميل: {{$currentEmaile->sys_email}}</h4>
                                        </div>


                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong>مرسل من العميل: </strong><br>

                                                {{$currentValues->email_cla_name}}

                                            </address>

                                            <address>
                                                <strong>ايميل العميل: </strong><br>
                                                {{$currentValues->email_cla_email}}
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong>جوال العميل: </strong><br>
                                                {{$currentValues->email_cla_phone}}

                                            </address>
                                            <address>
                                                <strong> نوع الايميل: </strong><br>
                                                {{$currentValues->email_type}}
                                            </address>
                                        </div>

                                    </div>
                                    <!-- /.row -->

                                    {{--                            <!-- Table row -->--}}
                                    {{--                            <div class="row">--}}
                                    {{--                                <div class="col-12 table-responsive">--}}
                                    {{--                                    <table class="table table-striped">--}}
                                    {{--                                        <thead>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <th>تعداد</th>--}}
                                    {{--                                            <th>محصول</th>--}}
                                    {{--                                            <th>سریال #</th>--}}
                                    {{--                                            <th>توضیحات</th>--}}
                                    {{--                                            <th>قیمت کل</th>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        </thead>--}}
                                    {{--                                        <tbody>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>1</td>--}}
                                    {{--                                            <td>ندای وظیفه</td>--}}
                                    {{--                                            <td>455-981-221</td>--}}
                                    {{--                                            <td>بازی شوتر شخص اول</td>--}}
                                    {{--                                            <td>150000 تومان</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>1</td>--}}
                                    {{--                                            <td>تلویزیون هوشمند سامسونگ</td>--}}
                                    {{--                                            <td>247-925-726</td>--}}
                                    {{--                                            <td>لوازم خانگی</td>--}}
                                    {{--                                            <td>2,000,000 تومان</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>1</td>--}}
                                    {{--                                            <td>لباسشویی</td>--}}
                                    {{--                                            <td>735-845-642</td>--}}
                                    {{--                                            <td>--}}
                                    {{--                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ--}}
                                    {{--                                            </td>--}}
                                    {{--                                            <td>10,000 تومان</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        <tr>--}}
                                    {{--                                            <td>1</td>--}}
                                    {{--                                            <td>نجات سرباز رایان</td>--}}
                                    {{--                                            <td>422-568-642</td>--}}
                                    {{--                                            <td>لورم ایپسوم متن ساختگی</td>--}}
                                    {{--                                            <td>20,000 تومان</td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                        </tbody>--}}
                                    {{--                                    </table>--}}
                                    {{--                                </div>--}}
                                    {{--                                <!-- /.col -->--}}
                                    {{--                            </div>--}}
                                    {{--                            <!-- /.row -->--}}

                                    <div class="row mt-lg-5">

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">

                                                {{--                                                <a class="btn btn-danger deletee"--}}
                                                {{--                                                   href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/delete') }}">--}}
                                                {{--                                                    <i class="fa fa-trash">--}}
                                                {{--                                                    </i>--}}
                                                {{--                                                    حذف--}}
                                                {{--                                                </a>--}}


                                            </div>
                                            <div class="col-lg-10">


                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>





            {{--    <div class="content-wrapper">--}}
            {{--        <div class="content-header">--}}
            {{--        </div>--}}
            {{--        <div class="col-lg-6 pr-xl-5">--}}
            {{--            <div class=" card card-dark " style="background-color: silver ">--}}

            {{--                <x-form.header-card title="عرض التفاصيل"/>--}}

            {{--                <form--}}
            {{--                    method="Post"--}}
            {{--                    enctype="multipart/form-data">--}}
            {{--                    @csrf--}}


            {{--                    <div class="card-body fc-direction-rtl">--}}

            {{--                        <label>  {{$prod_name ?? ''}}  </label>--}}
            {{--                        <x-form.input name="prod_name" class="form-control" type="name"--}}
            {{--                                      label="اسم المنتج " placeholder="أدخل اسم المنتج الجديد "--}}
            {{--                                      value="{{$prod_name ?? ''}}"></x-form.input>--}}


            {{--                        <x-form.input name="prod_price" class="form-control" type="price"--}}
            {{--                                      label="السعر " placeholder=" أدخل سعر المنتج الجديد"--}}
            {{--                                      value="{{$prod_price ?? ''}}"></x-form.input>--}}


            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>القسم الفرعي</label>--}}
            {{--                            <select name="sub_id">--}}
            {{--                                @foreach($sections as $section)--}}

            {{--                                    @if(isset($id))--}}

            {{--                                        @if ($section->sub_id == $currentSections->sub_id)--}}
            {{--                                            <option--}}

            {{--                                                value="{{$section->sub_id}}"--}}
            {{--                                                selected="selected">{{$currentSections->sub_name}}--}}
            {{--                                            </option>--}}
            {{--                                        @else--}}
            {{--                                            <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}
            {{--                                        @endif--}}

            {{--                                    @else--}}
            {{--                                        <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}


            {{--                                    @endif--}}
            {{--                                    /////////--}}

            {{--                                @endforeach--}}
            {{--                            </select>--}}
            {{--                        </div>--}}

            {{--                        --}}{{--                    <div class="form-group col-sm-10" >--}}
            {{--                        --}}{{--                        <label>صور المنتح</label>--}}

            {{--                        --}}{{--                        <div class="card-body table-responsive p-0">--}}
            {{--                        --}}{{--                        <?php  $x = 0;  $arrays = array(); $arrays[$x] = 0   ?>--}}
            {{--                        --}}{{--                        <table id="tableprofider" class="table table-hover text-nowrap">--}}
            {{--                        --}}{{--                            <thead>--}}
            {{--                        --}}{{--                            <tr>--}}
            {{--                        --}}{{--                                @for( $i = 0 ; $i<=10 ; $i++)--}}

            {{--                        --}}{{--                                    @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}
            {{--                        --}}{{--                                        <th>{{$columns[$i]}}</th> @endif--}}
            {{--                        --}}{{--                                @endfor--}}

            {{--                        --}}{{--                            </tr>--}}
            {{--                        --}}{{--                            </thead>--}}
            {{--                        --}}{{--                            <tbody>--}}
            {{--                        --}}{{--                            <tr>--}}

            {{--                        --}}{{--                                @foreach( $rows as $row)--}}
            {{--                        --}}{{--                                    @for( $i = 0 ; $i<=10; $i++)--}}

            {{--                        --}}{{--                                        @for( $i = 0 ; $i<=10; $i++)--}}
            {{--                        --}}{{--                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}

            {{--                        --}}{{--                                                <?php $val = (string)$columns[$i] ?>--}}
            {{--                        --}}{{--                                                @if($val)--}}
            {{--                        --}}{{--                                              <td> {{$row->medl_img_ved}} </td>--}}

            {{--                        --}}{{--                                            @else--}}
            {{--                        --}}{{--                                                {{$row->medl_img_ved = NULL}}--}}
            {{--                        --}}{{--                                            @endif--}}
            {{--                        --}}{{--                                            @endif--}}
            {{--                        --}}{{--                                                        @endfor--}}
            {{--                        --}}{{--                                                        @endfor--}}
            {{--                        --}}{{--                                                        @endforeach--}}
            {{--                        --}}{{--                            </tr>--}}
            {{--                        --}}{{--                            </tbody>--}}
            {{--                        --}}{{--                        </table>--}}
            {{--                        --}}{{--                    </div>--}}
            {{--                        --}}{{--                    </div>--}}



            {{--                        --}}{{--                                <select>--}}
            {{--                        --}}{{--                                @foreach( $rows as $rows)--}}

            {{--                        --}}{{--                                    <option value="{{$rows->medl_id}}"> <img {{$rows->medl_img_ved}} > </option>--}}

            {{--                        --}}{{--                                    @for( $i = 0 ; $i<=10; $i++)--}}

            {{--                        --}}{{--                                        @for( $i = 0 ; $i<=10; $i++)--}}
            {{--                        --}}{{--                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}

            {{--                        --}}{{--                                                {{ $val = (string)$columns[$i] }}--}}
            {{--                        --}}{{--                                                @if($val)--}}
            {{--                        --}}{{--                                                    <td> {{$rows->$val}}</td> @endif--}}

            {{--                        --}}{{--                                            @endif--}}

            {{--                        --}}{{--                                        @endfor--}}

            {{--                        --}}{{--                                    @endfor--}}

            {{--                        --}}{{--                    <button type="button" value="اختر صورة" onclick="window.location='{{ url('/media_Library') }}" ></button>--}}


            {{--                        --}}{{--                    <div class="form-group col-sm-10 ">--}}
            {{--                        --}}{{--                        <select  name="medl_id" id="pos_id" multiple>--}}
            {{--                        --}}{{--                            @foreach( $mediaImgs as $mediaImg)--}}
            {{--                        --}}{{--                                <option value="{{$mediaImg->medl_id}}"> {{$mediaImg->medl_img_ved}} </option>--}}
            {{--                        --}}{{--                            @endforeach--}}
            {{--                        --}}{{--                        </select>--}}
            {{--                        --}}{{--                    </div>--}}

            {{--                        <x-form.input name="prod_avil_amount" class="form-control" type="number"--}}
            {{--                                      label="الكمية المتوفرة حالياً "--}}
            {{--                                      placeholder=" أدخل الكمية المتوفرة حالياً للمنتج الجديد "--}}
            {{--                                      value="{{$prod_avil_amount ?? ''}}"></x-form.input>--}}

            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>المقاسات</label>--}}
            {{--                            <br>--}}
            {{--                            @foreach( $measures as $measure)--}}
            {{--                                <input name="mesu_id[]" type="checkbox"--}}
            {{--                                       value="{{$measure->mesu_id}}"--}}

            {{--                                       @if(isset($id))--}}

            {{--                                       @foreach($currentMeasures as $currentMeasure)--}}

            {{--                                       @if($measure->mesu_id == $currentMeasure->mesu_id)--}}

            {{--                                       checked="checked"--}}
            {{--                                    @endif--}}


            {{--                                    @endforeach--}}

            {{--                                    @endif--}}


            {{--                                > {{$measure->mesu_value}}--}}
            {{--                                <br>--}}
            {{--                            @endforeach--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>الألوان المتاحة</label>--}}
            {{--                            <div>--}}
            {{--                                <input id="color" type="color" class="mr-1">--}}
            {{--                                <a style=" color: red" onclick="catshColor()"> اضغط لاضافة اللون </a>--}}

            {{--                            </div>--}}


            {{--                            <div>--}}

            {{--                                <div class="row" id="ColorRow">--}}

            {{--                                    @if(isset($id))--}}
            {{--                                        @foreach($productProdAvilColor as $productProdAvilColor)--}}
            {{--                                            <div class='box'--}}
            {{--                                                 style="background-color:{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                 id="{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                 name="box[]"--}}
            {{--                                                 value="false"--}}
            {{--                                                 onclick="destroyColor()"--}}
            {{--                                            >--}}
            {{--                                                <input type="hidden"--}}
            {{--                                                       value="{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                       name="ColorBox[]" class="ColorBox">--}}

            {{--                                            </div>--}}
            {{--                                            <div class="delete" id="delete">X</div>--}}

            {{--                                        @endforeach--}}
            {{--                                    @endif--}}

            {{--                                </div>--}}
            {{--                            </div>--}}


            {{--                        </div>--}}

            {{--                        <script>--}}

            {{--                            function catshColor() {--}}
            {{--                                var elemen = document.getElementById('color');--}}

            {{--                                var ColorArray = $('[name^=ColorBox]').map(function (i) {--}}
            {{--                                    //return this.name;--}}

            {{--                                    return this.value; // for real values of input--}}
            {{--                                }).get();--}}
            {{--                                var i = 0;--}}

            {{--                                var display;--}}

            {{--                                if (ColorArray.length === 0) {--}}
            {{--                                    do {--}}
            {{--                                        // alert(elem.id)--}}
            {{--                                        if (ColorArray[i] == elemen.value) {--}}
            {{--                                            alert("اللون موجود مسبقًا");--}}
            {{--                                            display = false;--}}
            {{--                                        } else {--}}
            {{--                                            alert("here")--}}
            {{--                                            display = true;--}}
            {{--                                        }--}}
            {{--                                        i++;--}}
            {{--                                    } while (i < ColorArray.length)--}}
            {{--                                } else {--}}
            {{--                                    for (var i = 0; i < ColorArray.length; i++) {--}}
            {{--                                        if (ColorArray[i] == elemen.value) {--}}
            {{--                                            alert("اللون موجود مسبقًا");--}}
            {{--                                            var display = false;--}}
            {{--                                        } else {--}}
            {{--                                            var display = true;--}}
            {{--                                        }--}}
            {{--                                    }--}}
            {{--                                }--}}



            {{--                                if (display === true) {--}}
            {{--                                    // var elemen = document.getElementById('color');--}}

            {{--                                    var colorRow = document.getElementById('ColorRow');--}}
            {{--                                    var colorInput = document.createElement('input');--}}
            {{--                                    colorInput.type = 'hidden';--}}
            {{--                                    colorInput.value = elemen.value;--}}
            {{--                                    colorInput.name = 'ColorBox[]';--}}
            {{--                                    var colorDeleteDiv = document.createElement('div');--}}
            {{--                                    colorDeleteDiv.className = 'delete';--}}
            {{--                                    var text = document.createTextNode('X');--}}
            {{--                                    var colorDiv = document.createElement('div');--}}
            {{--                                    colorDiv.className = 'box';--}}
            {{--                                    colorDiv.style.backgroundColor = elemen.value;--}}
            {{--                                    colorDiv.id = elemen.value;--}}
            {{--                                    colorDiv.value = false;--}}
            {{--                                    colorDiv.onclick = function () {--}}
            {{--                                        destroyColor();--}}
            {{--                                    };--}}
            {{--                                    colorDiv.appendChild(colorInput);--}}
            {{--                                    colorDeleteDiv.appendChild(text);--}}
            {{--                                    colorRow.appendChild(colorDiv);--}}
            {{--                                    colorRow.appendChild(colorDeleteDiv);--}}
            {{--                                    display = false;--}}
            {{--                                } else {--}}
            {{--                                    alert("do not print")--}}
            {{--                                }--}}
            {{--                            };--}}


            {{--                            function destroyColor(e) {--}}

            {{--                                var elem = document.getElementsByClassName('box');--}}

            {{--                                var ColorArray = $('[name^=ColorBox]').map(function (i) {--}}
            {{--                                    //return this.name;--}}
            {{--                                    return this.value; // for real values of input--}}
            {{--                                }).get();--}}

            {{--                                e = e || window.event;--}}
            {{--                                var t = e.target;--}}
            {{--                                for (var i = 0; i < ColorArray.length; i++) {--}}
            {{--                                    if (t.id === ColorArray[i]) {--}}
            {{--                                        elem.item(i).remove();--}}
            {{--                                    }--}}
            {{--                                }--}}
            {{--                            }--}}

            {{--                        </script>--}}


            {{--                        <div class="form-group col-sm-10">--}}
            {{--                            <label>معلومات المنتج</label>--}}
            {{--                            <textarea class="form-control" id="editor1" name="prod_desc_img"--}}
            {{--                                      style="width:100%"> </textarea>--}}
            {{--                        </div>--}}

            {{--                        <!-- jQuery -->--}}
            {{--                        <script src="../../plugins/jquery/jquery.min.js"></script>--}}

            {{--                        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

            {{--                        <script src="../../plugins/fastclick/fastclick.js"></script>--}}
            {{--                        <script src="../../dist/js/adminlte.min.js"></script>--}}
            {{--                        <script src="../../dist/js/demo.js"></script>--}}
            {{--                        <script src="../../plugins/ckeditor/ckeditor.js"></script>--}}

            {{--                        <script--}}
            {{--                            src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>--}}
            {{--                        <script>--}}
            {{--                            $(function () {--}}
            {{--                                // Replace the <textarea id="editor1"> with a CKEditor--}}
            {{--                                // instance, using default configuration.--}}
            {{--                                ClassicEditor--}}
            {{--                                    .create(document.querySelector('#editor1'))--}}
            {{--                                    .then(function (editor) {--}}
            {{--                                        // The editor instance--}}
            {{--                                    })--}}
            {{--                                    .catch(function (error) {--}}
            {{--                                        console.error(error)--}}
            {{--                                    })--}}

            {{--                                // bootstrap WYSIHTML5 - text editor--}}

            {{--                                $('.textarea').wysihtml5({--}}
            {{--                                    toolbar: {fa: true}--}}
            {{--                                })--}}
            {{--                            })--}}
            {{--                        </script>--}}

            {{--                        <x-form.cancel-button indexPage="products"/>--}}
            {{--                        <x-form.save-button/>--}}

            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--    </div>--}}
        @elseif("orders/".$id ."/displayDetailes"==request()->path())


            <?php
            $ord_number = $currentValues->ord_number;
            $ord_date = $currentValues->ord_date;
            $clinetName = $currentClient->cla_frist_name . ' ' . $currentClient->cla_last_name;
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>{{$pagename ??''}}</h1>
                            </div>

                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">


                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">

                                        <div class="col-12">
                                            <a class="btn btn-danger deletee"
                                               style="float: left"
                                               href="{{ route('orders.index') }}">
                                                الغاء
                                            </a>
                                            <h4> رقم الطلب: {{$ord_number}}</h4>
                                        </div>


                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong>اسم العميل: </strong><br>
                                                {{$clinetName}}
                                            </address>

                                            <address>
                                                <strong>تاريخ الطلب: </strong><br>
                                                {{$ord_date}}
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong> اجمالي تكلفة الطلب: </strong><br>

                                            </address>
                                            <address>
                                                <strong> طريقة الدفع: </strong><br>
                                                {{$currentPaymentMethod->pay_method_name}}
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong> حالة الطلب: </strong><br>
                                                {{$currentOrdStage->stage_name}}

                                            </address>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="row">

                                        <address>
                                            <strong> المنتجات: </strong><br>

                                        </address>
                                    </div>
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>تعداد</th>
                                                    <th>محصول</th>
                                                    <th>سریال #</th>
                                                    <th>توضیحات</th>
                                                    <th>قیمت کل</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>ندای وظیفه</td>
                                                    <td>455-981-221</td>
                                                    <td>بازی شوتر شخص اول</td>
                                                    <td>150000 تومان</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>تلویزیون هوشمند سامسونگ</td>
                                                    <td>247-925-726</td>
                                                    <td>لوازم خانگی</td>
                                                    <td>2,000,000 تومان</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>لباسشویی</td>
                                                    <td>735-845-642</td>
                                                    <td>
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                    </td>
                                                    <td>10,000 تومان</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>نجات سرباز رایان</td>
                                                    <td>422-568-642</td>
                                                    <td>لورم ایپسوم متن ساختگی</td>
                                                    <td>20,000 تومان</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row mt-lg-5">

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">
                                                @if($currentValues->state)
                                                    <a class="btn btn-success "
                                                       href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/enableordisable') }}">
                                                        <i class="fa ">
                                                        </i>
                                                        تعطيل
                                                    </a>
                                                @elseif(!$currentValues->state)
                                                    <a class="btn btn-primary "
                                                       href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/enableordisable') }}">
                                                        <i class="fa ">
                                                        </i>
                                                        تفعيل
                                                    </a>
                                                @endif
                                                <a class="btn btn-info "
                                                   href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/update') }}">
                                                    <i class="fa fa-pencil">

                                                    </i>
                                                    تعديل
                                                </a>
                                                <a class="btn btn-danger deletee"
                                                   href="{{ url('/'.$tables .'/'. $currentValues->fakeId . '/delete') }}">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                    حذف
                                                </a>


                                            </div>
                                            <div class="col-lg-10">


                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>





            {{--    <div class="content-wrapper">--}}
            {{--        <div class="content-header">--}}
            {{--        </div>--}}
            {{--        <div class="col-lg-6 pr-xl-5">--}}
            {{--            <div class=" card card-dark " style="background-color: silver ">--}}

            {{--                <x-form.header-card title="عرض التفاصيل"/>--}}

            {{--                <form--}}
            {{--                    method="Post"--}}
            {{--                    enctype="multipart/form-data">--}}
            {{--                    @csrf--}}


            {{--                    <div class="card-body fc-direction-rtl">--}}

            {{--                        <label>  {{$prod_name ?? ''}}  </label>--}}
            {{--                        <x-form.input name="prod_name" class="form-control" type="name"--}}
            {{--                                      label="اسم المنتج " placeholder="أدخل اسم المنتج الجديد "--}}
            {{--                                      value="{{$prod_name ?? ''}}"></x-form.input>--}}


            {{--                        <x-form.input name="prod_price" class="form-control" type="price"--}}
            {{--                                      label="السعر " placeholder=" أدخل سعر المنتج الجديد"--}}
            {{--                                      value="{{$prod_price ?? ''}}"></x-form.input>--}}


            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>القسم الفرعي</label>--}}
            {{--                            <select name="sub_id">--}}
            {{--                                @foreach($sections as $section)--}}

            {{--                                    @if(isset($id))--}}

            {{--                                        @if ($section->sub_id == $currentSections->sub_id)--}}
            {{--                                            <option--}}

            {{--                                                value="{{$section->sub_id}}"--}}
            {{--                                                selected="selected">{{$currentSections->sub_name}}--}}
            {{--                                            </option>--}}
            {{--                                        @else--}}
            {{--                                            <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}
            {{--                                        @endif--}}

            {{--                                    @else--}}
            {{--                                        <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}


            {{--                                    @endif--}}
            {{--                                    /////////--}}

            {{--                                @endforeach--}}
            {{--                            </select>--}}
            {{--                        </div>--}}

            {{--                        --}}{{--                    <div class="form-group col-sm-10" >--}}
            {{--                        --}}{{--                        <label>صور المنتح</label>--}}

            {{--                        --}}{{--                        <div class="card-body table-responsive p-0">--}}
            {{--                        --}}{{--                        <?php  $x = 0;  $arrays = array(); $arrays[$x] = 0   ?>--}}
            {{--                        --}}{{--                        <table id="tableprofider" class="table table-hover text-nowrap">--}}
            {{--                        --}}{{--                            <thead>--}}
            {{--                        --}}{{--                            <tr>--}}
            {{--                        --}}{{--                                @for( $i = 0 ; $i<=10 ; $i++)--}}

            {{--                        --}}{{--                                    @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}
            {{--                        --}}{{--                                        <th>{{$columns[$i]}}</th> @endif--}}
            {{--                        --}}{{--                                @endfor--}}

            {{--                        --}}{{--                            </tr>--}}
            {{--                        --}}{{--                            </thead>--}}
            {{--                        --}}{{--                            <tbody>--}}
            {{--                        --}}{{--                            <tr>--}}

            {{--                        --}}{{--                                @foreach( $rows as $row)--}}
            {{--                        --}}{{--                                    @for( $i = 0 ; $i<=10; $i++)--}}

            {{--                        --}}{{--                                        @for( $i = 0 ; $i<=10; $i++)--}}
            {{--                        --}}{{--                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}

            {{--                        --}}{{--                                                <?php $val = (string)$columns[$i] ?>--}}
            {{--                        --}}{{--                                                @if($val)--}}
            {{--                        --}}{{--                                              <td> {{$row->medl_img_ved}} </td>--}}

            {{--                        --}}{{--                                            @else--}}
            {{--                        --}}{{--                                                {{$row->medl_img_ved = NULL}}--}}
            {{--                        --}}{{--                                            @endif--}}
            {{--                        --}}{{--                                            @endif--}}
            {{--                        --}}{{--                                                        @endfor--}}
            {{--                        --}}{{--                                                        @endfor--}}
            {{--                        --}}{{--                                                        @endforeach--}}
            {{--                        --}}{{--                            </tr>--}}
            {{--                        --}}{{--                            </tbody>--}}
            {{--                        --}}{{--                        </table>--}}
            {{--                        --}}{{--                    </div>--}}
            {{--                        --}}{{--                    </div>--}}



            {{--                        --}}{{--                                <select>--}}
            {{--                        --}}{{--                                @foreach( $rows as $rows)--}}

            {{--                        --}}{{--                                    <option value="{{$rows->medl_id}}"> <img {{$rows->medl_img_ved}} > </option>--}}

            {{--                        --}}{{--                                    @for( $i = 0 ; $i<=10; $i++)--}}

            {{--                        --}}{{--                                        @for( $i = 0 ; $i<=10; $i++)--}}
            {{--                        --}}{{--                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}

            {{--                        --}}{{--                                                {{ $val = (string)$columns[$i] }}--}}
            {{--                        --}}{{--                                                @if($val)--}}
            {{--                        --}}{{--                                                    <td> {{$rows->$val}}</td> @endif--}}

            {{--                        --}}{{--                                            @endif--}}

            {{--                        --}}{{--                                        @endfor--}}

            {{--                        --}}{{--                                    @endfor--}}

            {{--                        --}}{{--                    <button type="button" value="اختر صورة" onclick="window.location='{{ url('/media_Library') }}" ></button>--}}


            {{--                        --}}{{--                    <div class="form-group col-sm-10 ">--}}
            {{--                        --}}{{--                        <select  name="medl_id" id="pos_id" multiple>--}}
            {{--                        --}}{{--                            @foreach( $mediaImgs as $mediaImg)--}}
            {{--                        --}}{{--                                <option value="{{$mediaImg->medl_id}}"> {{$mediaImg->medl_img_ved}} </option>--}}
            {{--                        --}}{{--                            @endforeach--}}
            {{--                        --}}{{--                        </select>--}}
            {{--                        --}}{{--                    </div>--}}

            {{--                        <x-form.input name="prod_avil_amount" class="form-control" type="number"--}}
            {{--                                      label="الكمية المتوفرة حالياً "--}}
            {{--                                      placeholder=" أدخل الكمية المتوفرة حالياً للمنتج الجديد "--}}
            {{--                                      value="{{$prod_avil_amount ?? ''}}"></x-form.input>--}}

            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>المقاسات</label>--}}
            {{--                            <br>--}}
            {{--                            @foreach( $measures as $measure)--}}
            {{--                                <input name="mesu_id[]" type="checkbox"--}}
            {{--                                       value="{{$measure->mesu_id}}"--}}

            {{--                                       @if(isset($id))--}}

            {{--                                       @foreach($currentMeasures as $currentMeasure)--}}

            {{--                                       @if($measure->mesu_id == $currentMeasure->mesu_id)--}}

            {{--                                       checked="checked"--}}
            {{--                                    @endif--}}


            {{--                                    @endforeach--}}

            {{--                                    @endif--}}


            {{--                                > {{$measure->mesu_value}}--}}
            {{--                                <br>--}}
            {{--                            @endforeach--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group col-sm-10 ">--}}
            {{--                            <label>الألوان المتاحة</label>--}}
            {{--                            <div>--}}
            {{--                                <input id="color" type="color" class="mr-1">--}}
            {{--                                <a style=" color: red" onclick="catshColor()"> اضغط لاضافة اللون </a>--}}

            {{--                            </div>--}}


            {{--                            <div>--}}

            {{--                                <div class="row" id="ColorRow">--}}

            {{--                                    @if(isset($id))--}}
            {{--                                        @foreach($productProdAvilColor as $productProdAvilColor)--}}
            {{--                                            <div class='box'--}}
            {{--                                                 style="background-color:{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                 id="{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                 name="box[]"--}}
            {{--                                                 value="false"--}}
            {{--                                                 onclick="destroyColor()"--}}
            {{--                                            >--}}
            {{--                                                <input type="hidden"--}}
            {{--                                                       value="{{$productProdAvilColor->prod_avil_color}}"--}}
            {{--                                                       name="ColorBox[]" class="ColorBox">--}}

            {{--                                            </div>--}}
            {{--                                            <div class="delete" id="delete">X</div>--}}

            {{--                                        @endforeach--}}
            {{--                                    @endif--}}

            {{--                                </div>--}}
            {{--                            </div>--}}


            {{--                        </div>--}}

            {{--                        <script>--}}

            {{--                            function catshColor() {--}}
            {{--                                var elemen = document.getElementById('color');--}}

            {{--                                var ColorArray = $('[name^=ColorBox]').map(function (i) {--}}
            {{--                                    //return this.name;--}}

            {{--                                    return this.value; // for real values of input--}}
            {{--                                }).get();--}}
            {{--                                var i = 0;--}}

            {{--                                var display;--}}

            {{--                                if (ColorArray.length === 0) {--}}
            {{--                                    do {--}}
            {{--                                        // alert(elem.id)--}}
            {{--                                        if (ColorArray[i] == elemen.value) {--}}
            {{--                                            alert("اللون موجود مسبقًا");--}}
            {{--                                            display = false;--}}
            {{--                                        } else {--}}
            {{--                                            alert("here")--}}
            {{--                                            display = true;--}}
            {{--                                        }--}}
            {{--                                        i++;--}}
            {{--                                    } while (i < ColorArray.length)--}}
            {{--                                } else {--}}
            {{--                                    for (var i = 0; i < ColorArray.length; i++) {--}}
            {{--                                        if (ColorArray[i] == elemen.value) {--}}
            {{--                                            alert("اللون موجود مسبقًا");--}}
            {{--                                            var display = false;--}}
            {{--                                        } else {--}}
            {{--                                            var display = true;--}}
            {{--                                        }--}}
            {{--                                    }--}}
            {{--                                }--}}



            {{--                                if (display === true) {--}}
            {{--                                    // var elemen = document.getElementById('color');--}}

            {{--                                    var colorRow = document.getElementById('ColorRow');--}}
            {{--                                    var colorInput = document.createElement('input');--}}
            {{--                                    colorInput.type = 'hidden';--}}
            {{--                                    colorInput.value = elemen.value;--}}
            {{--                                    colorInput.name = 'ColorBox[]';--}}
            {{--                                    var colorDeleteDiv = document.createElement('div');--}}
            {{--                                    colorDeleteDiv.className = 'delete';--}}
            {{--                                    var text = document.createTextNode('X');--}}
            {{--                                    var colorDiv = document.createElement('div');--}}
            {{--                                    colorDiv.className = 'box';--}}
            {{--                                    colorDiv.style.backgroundColor = elemen.value;--}}
            {{--                                    colorDiv.id = elemen.value;--}}
            {{--                                    colorDiv.value = false;--}}
            {{--                                    colorDiv.onclick = function () {--}}
            {{--                                        destroyColor();--}}
            {{--                                    };--}}
            {{--                                    colorDiv.appendChild(colorInput);--}}
            {{--                                    colorDeleteDiv.appendChild(text);--}}
            {{--                                    colorRow.appendChild(colorDiv);--}}
            {{--                                    colorRow.appendChild(colorDeleteDiv);--}}
            {{--                                    display = false;--}}
            {{--                                } else {--}}
            {{--                                    alert("do not print")--}}
            {{--                                }--}}
            {{--                            };--}}


            {{--                            function destroyColor(e) {--}}

            {{--                                var elem = document.getElementsByClassName('box');--}}

            {{--                                var ColorArray = $('[name^=ColorBox]').map(function (i) {--}}
            {{--                                    //return this.name;--}}
            {{--                                    return this.value; // for real values of input--}}
            {{--                                }).get();--}}

            {{--                                e = e || window.event;--}}
            {{--                                var t = e.target;--}}
            {{--                                for (var i = 0; i < ColorArray.length; i++) {--}}
            {{--                                    if (t.id === ColorArray[i]) {--}}
            {{--                                        elem.item(i).remove();--}}
            {{--                                    }--}}
            {{--                                }--}}
            {{--                            }--}}

            {{--                        </script>--}}


            {{--                        <div class="form-group col-sm-10">--}}
            {{--                            <label>معلومات المنتج</label>--}}
            {{--                            <textarea class="form-control" id="editor1" name="prod_desc_img"--}}
            {{--                                      style="width:100%"> </textarea>--}}
            {{--                        </div>--}}

            {{--                        <!-- jQuery -->--}}
            {{--                        <script src="../../plugins/jquery/jquery.min.js"></script>--}}

            {{--                        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

            {{--                        <script src="../../plugins/fastclick/fastclick.js"></script>--}}
            {{--                        <script src="../../dist/js/adminlte.min.js"></script>--}}
            {{--                        <script src="../../dist/js/demo.js"></script>--}}
            {{--                        <script src="../../plugins/ckeditor/ckeditor.js"></script>--}}

            {{--                        <script--}}
            {{--                            src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>--}}
            {{--                        <script>--}}
            {{--                            $(function () {--}}
            {{--                                // Replace the <textarea id="editor1"> with a CKEditor--}}
            {{--                                // instance, using default configuration.--}}
            {{--                                ClassicEditor--}}
            {{--                                    .create(document.querySelector('#editor1'))--}}
            {{--                                    .then(function (editor) {--}}
            {{--                                        // The editor instance--}}
            {{--                                    })--}}
            {{--                                    .catch(function (error) {--}}
            {{--                                        console.error(error)--}}
            {{--                                    })--}}

            {{--                                // bootstrap WYSIHTML5 - text editor--}}

            {{--                                $('.textarea').wysihtml5({--}}
            {{--                                    toolbar: {fa: true}--}}
            {{--                                })--}}
            {{--                            })--}}
            {{--                        </script>--}}

            {{--                        <x-form.cancel-button indexPage="products"/>--}}
            {{--                        <x-form.save-button/>--}}

            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--    </div>--}}


        @endif
    @endif






@endsection


