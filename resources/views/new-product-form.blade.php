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
    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <div class="col-lg-6 pr-xl-5">
            <div class=" card card-dark " style="background-color: silver ">

                <x-form.header-card title="إضافة منتج جديد"/>

                <form
                    @if(isset($id))
                    action="/products/{{$id}}/update"
                    @else
                    action="/store-product"
                    @endif
                    method="Post"
                    enctype="multipart/form-data">
                    @csrf


                    @if(isset($id))

                        @if("products/".$id."/update"==request()->path())
                            <?php
                            $prod_name = $currentValues->prod_name;
                            $prod_price = $currentValues->prod_price;
                            $prod_avil_amount = $currentValues->prod_avil_amount;
                            $man_email = $currentValues->man_email;
                            ?>
                        @endif
                    @endif

                    <div class="card-body fc-direction-rtl">

                        <x-form.input name="prod_name" class="form-control" type="name"
                                      label="اسم المنتج " placeholder="أدخل اسم المنتج الجديد "
                                      value="{{$prod_name ?? ''}}"></x-form.input>


                        <x-form.input name="prod_price" class="form-control" type="price"
                                      label="السعر " placeholder=" أدخل سعر المنتج الجديد"
                                      value="{{$prod_price ?? ''}}"></x-form.input>


                                                <div class="form-group col-sm-10 ">
                                                    <span>القسم الرئيسي</span>
                                                    <select name="main_id" id="main_id" class="main_id">
                                                        @foreach($MainSection as $mainsection)
                                                        <option value="{{$mainsection->main_id}}"> {{$mainsection->main_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                        <div class="form-group col-sm-10 ">
                            <span>القسم الفرعي</span>
                            <select class="sub_name">
                                <option value="0" disabled="true" selected="true">القسم الفرعي</option>
{{--                                @foreach($Subsections as $subsection)--}}
{{--                                    <option value="{{$subsection->sub_id}}"> {{$subsection->sub_name}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>

                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $(document).on('change','.main_id',function (){

                                    // console.log("YES Changed")
                                    var main_id = $(this).val();
                                    // console.log(main_id);

                                    var div=$(this).parent();
                                    var op=" ";
                                    $.ajax({
                                        type:'get',
                                        url:'{!! URL::to('subSection') !!}',
                                        data:{'id':main_id},
                                        success:function (data){
                                            // console.log('success');
                                            // console.log(data);
                                            console.log(data,length);

                                            op+='<option value="0" selected disabled>القسم الفرعي</option>';
                                            for (var i=0; i <data.length;i++){
                                                op+='<option value="'+data[i].id+'">'+data[i].value+'</option>';
                                            }

                                            div.find('.sub_name').html(" ");
                                            div.find('.sub_name').append(op);
                                        },
                                        error:function (){

                                        }
                                    });
                                })
                            });
                        </script>


{{--                        <div class="form-group col-sm-10 ">--}}
{{--                            <label>القسم الرئيسي</label>--}}
{{--                            <select name="main_id" id="main_id"--}}
{{--                                    onchange="getOption()" onfocus="this.selectedIndex = -1;">--}}
{{--                                @foreach($mainsections as $mainsection)--}}

{{--                                                                        @if(isset($id))--}}

{{--                                                                            @if ($section->sub_id == $currentSections->sub_id)--}}
{{--                                    <option--}}
{{--                                        value="{{$mainsection->main_id}}"--}}
{{--                                    >{{$mainsection->main_name}}--}}
{{--                                    </option>--}}
{{--                                                                            @else--}}
{{--                                                                                <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}
{{--                                                                            @endif--}}

{{--                                                                        @else--}}
{{--                                                                            <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}

{{--                                                                        @endif--}}

{{--                                @endforeach--}}
{{--                            </select>--}}

{{--                        </div>--}}

{{--                        <div class="form-group col-sm-10 ">--}}
{{--                            <label>القسم الفرعي</label>--}}
{{--                            <select name="sub_id" id="sub_id">--}}
{{--                                <option id="sub_inner" value="sub_inner"></option>--}}

                                {{--                                @foreach($Subsections as $section)--}}

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

                                {{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

                        <label class="pb-1">صور المنتج</label>
                        <div class="form-group col-sm-10 table-responsive " style="height: 300px;">
                            <table class="table-bordered">
                                <thead>
                                <tr>
                                    <th width="70%">الصورة</th>
                                    <th width="30%">اسم الصورة</th>
                                </tr>
                                </thead>
                                @foreach($mediaLibrary as $media)
                                    <?php  $med = $media->medl_id ?>

                                    <tbody>
                                    <tr>
                                        <td>
                                            @if(isset($id))
                                                <input type="checkbox" name="medl_id[]"
                                                       value="{{$media['medl_id']}}"

                                                       @foreach($currentMedia as $currentMedias)
                                                       <?php   $curMedi = $currentMedias->medl_id ?>
                                                       @if($med == $curMedi)
                                                       checked="checked"
                                                    @endif
                                                    @endforeach
                                                >

                                                <img src="update/fetch_image/{{$media['medl_id']}}"
                                                     class="img-thumbnail"
                                                     width="75"/>
                                            @else
                                                <input type="checkbox" name="medl_id[]"
                                                       value="{{$media['medl_id']}}"
                                                >
                                                <img src="fetch_image/{{$med}}" class="img-thumbnail"
                                                     width="75"/>
                                            @endif

                                        </td>

                                        <td>  {{$media->medl_name}} </td>
                                    </tr>
                                    </tbody>
                                @endforeach

                            </table>
                        </div>

                        <x-form.input name="prod_avil_amount" class="form-control" type="number"
                                      label="الكمية المتوفرة حالياً "
                                      placeholder=" أدخل الكمية المتوفرة حالياً للمنتج الجديد "
                                      value="{{$prod_avil_amount ?? ''}}"></x-form.input>

                        <div class="form-group col-sm-10">
                            <label>المقاسات</label>
                            <br>
                            @foreach( $measures as $measure)
                                <input style="margin-left:7px" name="mesu_id[]" type="checkbox"
                                       value="{{$measure->mesu_id}}"

                                       @if(isset($id))

                                       @foreach($currentMeasures as $currentMeasure)

                                       @if($measure->mesu_id == $currentMeasure->mesu_id)

                                       checked="checked"
                                    @endif

                                    @endforeach

                                    @endif

                                > {{$measure->mesu_value}}
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group col-sm-10 ">
                        <label>الألوان المتاحة</label>
                        <div>
                            <input name="box[]" id="color" type="color" class="mr-1">
                            <a style=" color: red" onclick="catshColor()"> اضغط لاضافة اللون </a>

                        </div>
                        <div>
                            <div class="row" id="ColorRow" name="box[]">
                                @if(isset($id))
                                    @foreach($productProdAvilColor as $productProdAvilColor)
                                        <div class='box'
                                             style="background-color:{{$productProdAvilColor->prod_avil_color}}"
                                             id="{{$productProdAvilColor->prod_avil_color}}"
                                             name="box[]"
                                             value="false"
                                             onclick="destroyColor()"
                                        >
                                            <input type="hidden"
                                                   value="{{$productProdAvilColor->prod_avil_color}}"
                                                   name="ColorBox[]" class="ColorBox">

                                        </div>
                                        <div class="delete" id="delete">X</div>

                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                    <label class="pr-3">دليل المقاسات</label>
                    <div class="form-group col-sm-10 table-responsive " style="height: 300px;">
                        <table class="table-bordered">
                            <thead>
                            <tr>
                                <th width="70%">صورة الدليل</th>
                                <th width="30%">اسم الدليل</th>
                            </tr>
                            </thead>
                            @foreach($measures_index as $mesuIdx)
                                <?php  $img = $mesuIdx->mesu_index_id ?>

                                <tbody>
                                <tr>
                                    <td>
                                        @if(isset($id))
                                            <input type="radio" name="mesu_index_id"
                                                   value="{{$mesuIdx['mesu_index_id']}}"

                                                   @foreach($currentMesuIndx as $currentMesus)
                                                   <?php   $curMesu = $currentMesus->measure_index_id ?>

                                                   @if($mesuIdx == $currentMesus) checked="checked"
                                                @endif

                                                @endforeach
                                            >

                                            <img src="update/fetch_measures/{{$mesuIdx['mesu_index_id']}}"
                                                 class="img-thumbnail"
                                                 width="75"/>
                                        @else
                                            <input type="radio" name="mesu_index_id"
                                                   value="{{$mesuIdx['mesu_index_id']}}"
                                            >
                                            <img src="fetch_measures/{{$img}}" class="img-thumbnail"
                                                 width="75"/>
                                        @endif

                                    </td>

                                    <td>  {{$mesuIdx->mesu_index_name}} </td>
                                </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>

                    <x-form.input name="prod_desc_text" class="form-control" label="وصف المنتج" type="text"
                                  placeholder="ادخل معلومات المنتج نصاّ"/>

                    <label class="pr-3">بإمكانك إضافة صورة لوصف المنتج</label>
                    <div class="form-group col-sm-10 table-responsive " style="height: 300px;">
                        <table class="table-bordered">
                            <thead>
                            <tr>
                                <th width="70%">الصورة</th>
                                <th width="30%">اسم الصورة</th>
                            </tr>
                            </thead>
                            @foreach($mediaLibrary as $media)
                                <?php  $med = $media->medl_id ?>

                                <tbody>
                                <tr>
                                    <td>
                                        @if(isset($id))
                                            <input type="radio" name="prod_desc_img"
                                                   value="{{$media['medl_id']}}"

                                                   @foreach($currentMedia as $currentMedias)
                                                   <?php   $curMedi = $currentMedias->medl_id ?>
                                                   @if($med == $curMedi)
                                                   checked="checked"
                                                @endif
                                                @endforeach
                                            >

                                            <img src="update/fetch_image/{{$media['medl_id']}}"
                                                 class="img-thumbnail"
                                                 width="75"/>
                                        @else
                                            <input type="radio" name="prod_desc_img"
                                                   value="{{$media['medl_id']}}"
                                            >
                                            <img src="fetch_image/{{$med}}" class="img-thumbnail"
                                                 width="75"/>
                                        @endif

                                    </td>

                                    <td>  {{$media->medl_name}} </td>
                                </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>

                    <!-- jQuery -->
                    <script src="../../plugins/jquery/jquery.min.js"></script>

                    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <script src="../../plugins/fastclick/fastclick.js"></script>
                    <script src="../../dist/js/adminlte.min.js"></script>
                    <script src="../../dist/js/demo.js"></script>
                    <script src="../../plugins/ckeditor/ckeditor.js"></script>

                    <script
                        src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
                                toolbar: {fa: true}
                            })
                        })
                    </script>

                    <x-form.cancel-button indexPage="products"/>
                    <x-form.save-button/>

            </div>

            {{--            <h1 style="color: green">--}}
            {{--                GeeksForGeeks--}}
            {{--            </h1>--}}

            {{--            <b>--}}
            {{--                How to get selected value in dropdown--}}
            {{--                list using JavaScript?--}}
            {{--            </b>--}}

            {{--            <p>--}}
            {{--                Select one from the given options:--}}
            {{--                <select id="select1">--}}
            {{--                    <option value="free">Free</option>--}}
            {{--                    <option value="basic">Basic</option>--}}
            {{--                    <option value="premium">Premium</option>--}}
            {{--                </select>--}}
            {{--            </p>--}}

            {{--            <p>--}}
            {{--                The value of the option selected is:--}}
            {{--                <span class="output"></span>--}}
            {{--            </p>--}}

            {{--            <button onclick="getOption()">--}}
            {{--                Check option--}}
            {{--            </button>--}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

            <script type="text/javascript">
                function getOption() {
                    selectElement =
                        document.querySelector('#main_id');

                    output = selectElement.value;
                    var select = document.getElementById('sub_id');

                    {{--                    <?php $i = 0?>--}}
                        {{--                    for (var i = 0; i <= {{sizeof($Subsections)}}; i++) {--}}
                        {{--                        {{$sections[$i]->main_id}}--}}
                        {{--                        alert(select.id)--}}

                        {{--                    }--}}

                        @foreach($Subsections as $section)
                    if (output == {{$section->main_id}}) {
                        var opt = document.createElement('sub_inner');
                        opt.id = {{$section->main_id}};
                        opt.value = {{$section->sub_id}};

                        {{--opt.name  = {{$section->sub_name}};--}}
                        var text = document.createTextNode('X');

                        opt.appendChild(text);
                        select.appendChild(opt);
                        alert(output)
                        // document.querySelector('#sub_id').appendChild()
                    }
                    @endforeach
                    // document.querySelector('.output').textContent
                    //     = output;
                    // ;
                }


                {{--$(document).ready(function () {--}}
                {{--    $("#main_id").change(function () {--}}
                {{--        var val = $(this).val();--}}

                {{--        // if (val == "item1") {--}}
                {{--        $("#sub_id").html(--}}
                {{--        @foreach($Subsections as $section)--}}
                {{--        if (val === {{$section->main_id}}) {--}}
                {{--            alert(val)--}}
                {{--            @if(isset($id))--}}

                {{--            @if ($section->sub_id == $currentSections->sub_id)--}}
                {{--            < option--}}
                {{--            value = "{{$section->sub_id}}"--}}
                {{--            selected = "selected" >--}}
                {{--                {{$currentSections->sub_name}} < /option>--}}
                {{--            @else--}}
                {{--            <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}
                {{--            @endif--}}

                {{--            @else--}}
                {{--            <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>--}}

                {{--            @endif--}}
                {{--        }--}}

                {{--        @endforeach--}}

                {{--        // } else if (val == "item2") {--}}
                {{--        //     $("#size").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");--}}
                {{--        // } else if (val == "item3") {--}}
                {{--        //     $("#size").html("<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>");--}}
                {{--        // } else if (val == "item0") {--}}
                {{--        //     $("#size").html("<option value=''>--select one--</option>");--}}
                {{--        // }--}}
                {{--    });--}}
                {{--});--}}
            </script>

            </form>
        </div>
    </div>
    </div>

@endsection


