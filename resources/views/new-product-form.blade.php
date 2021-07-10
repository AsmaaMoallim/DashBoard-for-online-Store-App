@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة منتج جديد"/>

            <form action="/store-product" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="card-body fc-direction-rtl">

                    <x-form.input name="prod_name" class="form-control" type="name"
                                  label="اسم المنتج " placeholder="أدخل اسم المنتج الجديد " />


                    <x-form.input name="prod_price" class="form-control" type="price"
                                  label="السعر " placeholder=" أدخل سعر المنتج الجديد" />


                    <div class="form-group col-sm-10 ">
                        <label>القسم الفرعي</label>
                        <select  name="sub_id" >
                            @foreach($sections as $section)
                                <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group col-sm-10" >
                        <label>صور المنتح</label>
                        <div class="card-body table-responsive p-0">
                        <?php  $x = 0;  $arrays = array(); $arrays[$x] = 0   ?>
                        <table id="tableprofider" class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                @for( $i = 0 ; $i<=10 ; $i++)

                                    @if(isset($columns[$i]) && $columns[$i]!='fakeId')
                                        <th>{{$columns[$i]}}</th> @endif
                                @endfor

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach( $rows as $row)
                                    @for( $i = 0 ; $i<=10; $i++)

                                        @for( $i = 0 ; $i<=10; $i++)
                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')

                                                <?php $val = (string)$columns[$i] ?>
                                                @if($val)
                                              <td> {{$row->medl_img_ved}} </td>

{{--                                            @else--}}
{{--                                                {{$row->medl_img_ved = NULL}}--}}
                                            @endif
                                            @endif
                                                        @endfor
                                                        @endfor
                                                        @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>



                    {{--                                <select>--}}
                    {{--                                @foreach( $rows as $rows)--}}

                    {{--                                    <option value="{{$rows->medl_id}}"> <img {{$rows->medl_img_ved}} > </option>--}}

                    {{--                                    @for( $i = 0 ; $i<=10; $i++)--}}

                    {{--                                        @for( $i = 0 ; $i<=10; $i++)--}}
                    {{--                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}

                    {{--                                                {{ $val = (string)$columns[$i] }}--}}
                    {{--                                                @if($val)--}}
                    {{--                                                    <td> {{$rows->$val}}</td> @endif--}}

                    {{--                                            @endif--}}

                    {{--                                        @endfor--}}

                    {{--                                    @endfor--}}

                    {{--                    <button type="button" value="اختر صورة" onclick="window.location='{{ url('/media_Library') }}" ></button>--}}


{{--                    <div class="form-group col-sm-10 ">--}}
{{--                        <select  name="medl_id" id="pos_id" multiple>--}}
{{--                            @foreach( $mediaImgs as $mediaImg)--}}
{{--                                <option value="{{$mediaImg->medl_id}}"> {{$mediaImg->medl_img_ved}} </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <x-form.input name="prod_avil_amount" class="form-control" type="number"
                                  label="الكمية المتوفرة حالياً " placeholder=" أدخل الكمية المتوفرة حالياً للمنتج الجديد " />

                    <div class="form-group col-sm-10 ">
                        <label>المقاسات</label>
                        <br>
                        @foreach( $measures as $measure)
                            <input name="mesu_value" type="checkbox" value="{{$measure->mesu_id}}"> {{$measure->mesu_value}}
                            <br>
                        @endforeach
                    </div>

                    <div class="form-group col-sm-10 ">
                        <label>الألوان المتاحة</label>
                        <input id="color" type="color" class="mr-1" onchange="pushData()">
                        <input id="hex" class="form-control" name="prod_avil_color[] [prod_avil_color]" type="text" placeholder="أدخل ألوان المنتج افصل كل لون عن الآخر بـ','" >
                    </div>

                    <script>
                        var myArry = ["#","#","#"]

                        function  pushData(){
                            // var inputColor = document.getElementById('color').value;
                            // let colorInput = document.querySelector('#color');
                            // let colorInput = document.querySelector('#color');
                            var colorInput = document.querySelector('#color');

                            colorInput.addEventListener('input',()=>{
                                let color = colorInput.value;
                                myArry.push(color);
                            });

                            var c = "";
                            for (i = 0; i<myArry.length; i++){
                                // hexInput.value = color;
                                c = c + myArry[i];
                            }
                            document.getElementById('hex').innerHTML = c;
                        }

                        // let colorInput = document.querySelector('#color');
                        // let hexInput = document.querySelector('#hex');
                        //
                        // colorInput.addEventListener('input',()=>{
                        //     let color = colorInput.value;
                        //     hexInput.value = color;
                        // });
                    </script>


                    <div class="form-group col-sm-10" >
                        <label>معلومات المنتج</label>
                        <textarea class="form-control" id="editor1" name="prod_desc_img" style="width:100%"> </textarea>
                    </div>

                    <!-- jQuery -->
                    <script src="../../plugins/jquery/jquery.min.js"></script>

                    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <script src="../../plugins/fastclick/fastclick.js"></script>
                    <script src="../../dist/js/adminlte.min.js"></script>
                    <script src="../../dist/js/demo.js"></script>
                    <script src="../../plugins/ckeditor/ckeditor.js"></script>

                    <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
                    <script>
                        $(function () {
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            ClassicEditor
                                .create(document.querySelector('#editor1'))
                                .then(function (editor) {
                                    // The editor instance
                                })
                                .catch(function (error) {
                                    console.error(error)
                                })

                            // bootstrap WYSIHTML5 - text editor

                            $('.textarea').wysihtml5({
                                toolbar: { fa: true }
                            })
                        })
                    </script>

                    <x-form.cancel-button indexPage="products" />
                    <x-form.save-button/>

                    </div>
            </form>
        </div>
    </div>
@endsection


