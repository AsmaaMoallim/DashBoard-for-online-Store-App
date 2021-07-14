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
                            //                            $man_password = $currentValues->man_password;
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
                                    <option value="{{$section->sub_id}}"> {{$section->sub_name}} </option>
                                @endforeach
                            </select>
                        </div>

                                            <div class="form-group col-sm-10" >
                                                <label>صور المنتج</label>

{{--                                                @foreach($imgs as $img)--}}
<!--                                                -->
{{--//                                                $connection = mysqli_connect("localhost","root","");--}}
{{--//                                                $db = mysqli_select_db($connection, 'dashboard');--}}
{{--//                                                $query = "SELECT 'media_library.medl_img_ved' FROM 'media_library' ";--}}
{{--//                                                $mysqli_result = mysqli_query($connection,$query);--}}
{{--//                                                while ($row= mysqli_fetch_array($mysqli_result)){--}}
{{--//--}}
{{--                                                --}}

                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <th width="30%">Image</th>
                                                        <th width="70%">Name</th>
                                                    </tr>
                                                    @foreach($imgs as $img)
                                                        <tr>
                                                            <td>
                                                                <img src="{{asset('uploads/mediaLibrary/'.$img->medl_img_ved) }}"  class="img-thumbnail" width="75" />
                                                            </td>
                                                            <td>{{ $img->medl_name}}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>

{{--                                                <tr>--}}
{{--                                                    <td> <?php echo '<img src="data:image;base64,'.base64_decode($row['medl_img_ved']).'"alt="Image" style="">'; ?> </td>--}}
{{--                                                </tr>--}}
{{--                                                <?php--}}
{{--                                                }--}}
{{--                                                ?>--}}

{{--                                                @endforeach--}}
                                            </div>
                        {{--                        <div class="card-body table-responsive p-0">--}}
                        {{--                        <?php  $x = 0;  $arrays = array(); $arrays[$x] = 0   ?>--}}
                        {{--                        <table id="tableprofider" class="table table-hover text-nowrap">--}}
                        {{--                            <thead>--}}
                        {{--                            <tr>--}}
                        {{--                                @for( $i = 0 ; $i<=10 ; $i++)--}}

                        {{--                                    @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}
                        {{--                                        <th>{{$columns[$i]}}</th> @endif--}}
                        {{--                                @endfor--}}

                        {{--                            </tr>--}}
                        {{--                            </thead>--}}
                        {{--                            <tbody>--}}
                        {{--                            <tr>--}}

                        {{--                                @foreach( $rows as $row)--}}
                        {{--                                    @for( $i = 0 ; $i<=10; $i++)--}}

                        {{--                                        @for( $i = 0 ; $i<=10; $i++)--}}
                        {{--                                            @if(isset($columns[$i]) && $columns[$i]!='fakeId')--}}

                        {{--                                                <?php $val = (string)$columns[$i] ?>--}}
                        {{--                                                @if($val)--}}
                        {{--                                              <td> {{$row->medl_img_ved}} </td>--}}

                        {{--                                            @else--}}
                        {{--                                                {{$row->medl_img_ved = NULL}}--}}
                        {{--                                            @endif--}}
                        {{--                                            @endif--}}
                        {{--                                                        @endfor--}}
                        {{--                                                        @endfor--}}
                        {{--                                                        @endforeach--}}
                        {{--                            </tr>--}}
                        {{--                            </tbody>--}}
                        {{--                        </table>--}}
                        {{--                    </div>--}}
                        {{--                    </div>--}}



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
                                      label="الكمية المتوفرة حالياً "
                                      placeholder=" أدخل الكمية المتوفرة حالياً للمنتج الجديد "
                                      value="{{$prod_avil_amount ?? ''}}"></x-form.input>

                        <div class="form-group col-sm-10 ">
                            <label>المقاسات</label>
                            <br>
                            @foreach( $measures as $measure)
                                <input name="mesu_value" type="checkbox"
                                       value="{{$measure->mesu_id}}"> {{$measure->mesu_value}}
                                <br>
                            @endforeach
                        </div>

                        <div class="form-group col-sm-10 ">
                            <label>الألوان المتاحة</label>
                            <a style="background-color: #00c0ef" onclick="catshColor()"> اضف اللون </a>

                            <input id="color" type="color" class="mr-1">

                            {{--                            <input id="hex" class="form-control" name="prod_avil_color[] [prod_avil_color]" type="text"--}}
                            {{--                                   placeholder="أدخل ألوان المنتج افصل كل لون عن الآخر بـ','"--}}

                            @if(isset($id))
                                <div>


                                    <div class="row" id="ColorRow">
                                        @foreach($productProdAvilColor as $productProdAvilColor)
                                            <div class='box'
                                                 style="background-color:{{$productProdAvilColor->prod_avil_color}}"
                                                 id="{{$productProdAvilColor->prod_avil_color}}"
{{--                                                 value="{{$productProdAvilColor->prod_avil_color}}"--}}
                                                 name="box[]"
                                                 onclick="try1()"
                                                 >
                                                <input type="hidden" value="{{$productProdAvilColor->prod_avil_color}}"
                                                       name="ColorBox[]" class="ColorBox">

                                            </div>
                                            <div class="delete" id="delete">X</div>

                                        @endforeach
                                    </div>
                                </div>
                            @else
                            @endif

                        </div>

                        <script>

                            function catshColor() {
                                var elem = document.getElementById('color').value;

                                var ColorArray = $('[name^=ColorBox]').map(function(i) {
                                    //return this.name;
                                    return this.value; // for real values of input
                                }).get();

                                for (var i = 0; i < ColorArray.length; i++) {
                                    if (ColorArray[i] == elem){
                                        alert("اللون موجود مسبقًا");
                                        var display = false;
                                    }
                                    else {
                                        var display = true;
                                    }
                                }

                                if (display === true){
                                    var colorRow = document.getElementById('ColorRow');
                                    var colorInput = document.createElement('input');
                                    colorInput.type = 'hidden';
                                    colorInput.value = elem;
                                    colorInput.name = 'ColorBox[]';
                                    var colorDeleteDiv = document.createElement('div');
                                    colorDeleteDiv.className = 'delete';
                                    var text = document.createTextNode('X');
                                    var colorDiv = document.createElement('div');
                                    colorDiv.className = 'box';
                                    colorDiv.style.backgroundColor = elem;
                                    colorDiv.id = elem
                                    // colorDiv.onclick = checkIndex();
                                    // colorDiv.onclick = function () {
                                    //     destroyColor();
                                    //     // var elem = document.getElementById('box');
                                    //     // elem.remove(elem);
                                    // };
                                    colorDiv.appendChild(colorInput);
                                    colorDeleteDiv.appendChild(text);
                                    // colorDiv.appendChild(colorDeleteDiv);
                                    colorRow.appendChild(colorDiv);
                                    colorRow.appendChild(colorDeleteDiv);
                                    display = false;
                                }
                            };
                            // document.addEventListener('click',function(e){
                            //     if(e.target && e.target.id== 'box'){
                            //         var checks = document.querySelectorAll('.box');
                            //         alert( Array.from(checks).indexOf(event.target) );
                            // }
                            // });

                            function checkIndex(event){

                                var checks = document.querySelectorAll('.box');
                                // checks.forEach(function(check){
                                //     check.addEventListener('click', checkIndex);
                                // })
                                // for (var i = 0; i < ColorArray.length; i++) {
                                //         if (Array.from(checks).indexOf(event.target) === i){
                                //             alert("اللون موجود مسبقًا");
                                //             // elem1.item(i).remove();
                                //         }
                                //         else {
                                //             alert("اللون d مسبقًا");
                                //         }
                                //     }
                                alert( Array.from(checks).indexOf(event.target) );}


                            function try1() {

                                document.addEventListener('click', function (e) {
                                    // if(e.target && e.target.id== 'box'){
                                    //
                                    // }
                                    //     alert("h");
                                    // }
                                    e = e || window.event;
                                    var target = e.target;
                                    text = target.id;
                                    alert(text);
                                    remo();
                                    // target.removeEventListener('click', clickHandler);
                                }, false);

                            }
                            function remo(){
                                document.removeEventListener('click',function(){
                                    alert("removed")
                                })
                            }


                            function destroyColor() {

                                var elem1 = document.getElementsByClassName('box');
                                var ColorArray = $('[name^=ColorBox]').map(function(i) {
                                    //return this.name;
                                    return this.value; // for real values of input
                                }).get();
                                var checks = document.querySelectorAll('.box');
                                for (var i = 0; i < ColorArray.length; i++) {

                                    // alert(elem1.item(i).getAttribute('id'));

                                    // checkIndex(checks);


                                    // if (ColorArray[i] == elem){
                                    //     alert("اللون موجود مسبقًا");
                                    //     var display = false;
                                    // }
                                    // else {
                                    //     var display = true;
                                    // }
                                }
                                // var checks = $('[name^=box]').map(function(i) {
                                //     //return this.name;
                                //     return this.value; // for real values of input
                                // }).get();
                                // //

//
//                                 var checks = document.querySelectorAll('.box');

                                // checks.forEach(function(check){
                                //     check.addEventListener('click', checkIndex);
                                // })
// alert(Array.from(checks).indexOf(event.target))
                                function checkIndex(event){
                                    // for (var i = 0; i < ColorArray.length; i++) {
                                    //         if (Array.from(checks).indexOf(event.target) === i){
                                    //             alert("اللون موجود مسبقًا");
                                    //             // elem1.item(i).remove();
                                    //         }
                                    //         else {
                                    //             alert("اللون d مسبقًا");
                                    //         }
                                    //     }
                                    alert( Array.from(checks).indexOf(event.target) );}}

                                // $(document).click(function (event) {
                                //     alert($(this).value);
                                // });

                                // jQuery("box").click(function() {
                                //     var contentPanelId = jQuery(this).attr("value");
                                //     alert(contentPanelId);
                                // });
                                // alert(elem1.item(this).getAttribute("value"))
                                // for (var i = 0; i < ColorArray.length; i++) {
                                //     if (ColorArray[i] == elem1.item(i).getAttribute("value")){
                                //         alert("اللون موجود مسبقًا");
                                //         var display = false;
                                //     }
                                //     else {
                                //         // var display = true;
                                //     }
                                // }
                                // var elem2 = document.getElementById('delete');
                                // alert(elem1.value);
                                // elem1.remove(elem1);
                                // elem2.remove(elem2);


                            // var myArry = ["#", "#", "#"]
                            //
                            // function pushData() {
                            //     // var inputColor = document.getElementById('color').value;
                            //     // let colorInput = document.querySelector('#color');
                            //     // let colorInput = document.querySelector('#color');
                            //     var colorInput = document.querySelector('#color');
                            //
                            //     colorInput.addEventListener('input', () => {
                            //         let color = colorInput.value;
                            //         myArry.push(color);
                            //     });
                            //
                            //     var c = "";
                            //     for (i = 0; i < myArry.length; i++) {
                            //         // hexInput.value = color;
                            //         c = c + myArry[i];
                            //     }
                            //     document.getElementById('hex').innerHTML = c;
                            // }

                            // let colorInput = document.querySelector('#color');
                            // let hexInput = document.querySelector('#hex');
                            //
                            // colorInput.addEventListener('input',()=>{
                            //     let color = colorInput.value;
                            //     hexInput.value = color;
                            // });
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


