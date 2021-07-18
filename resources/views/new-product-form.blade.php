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
                            <label>القسم الفرعي</label>
                            <select name="sub_id">
                                @foreach($sections as $section)

                                    @if(isset($id))

                                        @if ($section->sub_id == $currentSections->sub_id)
                                            <option
                                                value="{{$section->sub_id}}"
                                                selected="selected">{{$currentSections->sub_name}}
                                            </option>
                                        @else
                                            <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>
                                        @endif

                                    @else
                                        <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>

                                    @endif

                                @endforeach
                            </select>

                        </div>

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

                                                <img src="update/fetch_image/{{$media['medl_id']}}" class="img-thumbnail"
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

                        <div class="form-group col-sm-10 ">
                            <label>المقاسات</label>
                            <br>
                            @foreach( $measures as $measure)
                                <input name="mesu_id[]" type="checkbox"
                                       value="{{$measure->mesu_id}}"

                                       @if(isset($id))

                                       @foreach($currentMeasures as $currentMeasure)

                                       @if($measure->mesu_id == $currentMeasure->mesu_id)

                                       checked="checked"
                                    @endif

                                    @endforeach

                                    @endif

                                > {{$measure->mesu_value}}
                                <br>
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

                    <script>

                        function catshColor() {
                            var elemen = document.getElementById('color');

                            var ColorArray = $('[name^=ColorBox]').map(function (i) {
                                //return this.name;

                                return this.value; // for real values of input
                            }).get();
                            var i = 0;

                            var display;

                            if (ColorArray.length === 0) {
                                do {
                                    // alert(elem.id)
                                    if (ColorArray[i] == elemen.value) {
                                        alert("اللون موجود مسبقًا");
                                        display = false;
                                    } else {
                                        alert("here")
                                        display = true;
                                    }
                                    i++;
                                } while (i < ColorArray.length)
                            } else {
                                for (var i = 0; i < ColorArray.length; i++) {
                                    if (ColorArray[i] == elemen.value) {
                                        alert("اللون موجود مسبقًا");
                                        var display = false;
                                    } else {
                                        var display = true;
                                    }
                                }
                            }


                            if (display === true) {
                                // var elemen = document.getElementById('color');

                                var colorRow = document.getElementById('ColorRow');
                                var colorInput = document.createElement('input');
                                colorInput.type = 'hidden';
                                colorInput.value = elemen.value;
                                colorInput.name = 'ColorBox[]';
                                var colorDeleteDiv = document.createElement('div');
                                colorDeleteDiv.className = 'delete';
                                var text = document.createTextNode('X');
                                var colorDiv = document.createElement('div');
                                colorDiv.className = 'box';
                                colorDiv.style.backgroundColor = elemen.value;
                                colorDiv.id = elemen.value;
                                colorDiv.value = false;
                                colorDiv.onclick = function () {
                                    destroyColor();
                                };
                                colorDiv.appendChild(colorInput);
                                colorDeleteDiv.appendChild(text);
                                colorRow.appendChild(colorDiv);
                                colorRow.appendChild(colorDeleteDiv);
                                display = false;
                            } else {
                                alert("do not print")
                            }
                        };


                        function destroyColor(e) {

                            var elem = document.getElementsByClassName('box');

                            var ColorArray = $('[name^=ColorBox]').map(function (i) {
                                //return this.name;
                                return this.value; // for real values of input
                            }).get();

                            e = e || window.event;
                            var t = e.target;
                            for (var i = 0; i < ColorArray.length; i++) {
                                if (t.id === ColorArray[i]) {
                                    elem.item(i).remove();
                                }
                            }
                        }

                    </script>


                    <div class="form-group col-sm-10">
                        <label>معلومات المنتج</label>
                        <textarea class="form-control" id="editor1" name="prod_desc_img"
                                  style="width:100%"> </textarea>
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
            </form>
        </div>
    </div>
    </div>

@endsection


