@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة منتج جديد"/>

            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body fc-direction-rtl">

                    <x-form.input name="prod_name" class="form-control" type="name"
                                  label="اسم المنتج " placeholder="أدخل اسم المنتج الجديد " />

{{--                    @include('components.form.dynamic-dropdown-list', ['label'=>'القسم الفرعي'])--}}

                    <x-form.input name="prod_price" class="form-control" type="price"
                                  label="السعر " placeholder=" أدخل سعر المنتج الجديد" />

                    <div>
                        <label for="file">صور المنتج</label>
                        <br>
                        <input type="file" id="file" name="file" multiple>
                    </div>
                    <br>

                    <x-form.input name="prod_avil_amount" class="form-control" type="number"
                                  label="الكمية المتوفرة حالياً " placeholder=" أدخل الكمية المتوفرة حالياً للمنتج الجديد " />


                    <x-form.input name="" class="form-control" type="text"
                                  label="المقاسات " placeholder="أدخل مقاسات المنتج و افصل كل قياس عن الآخر بـ',' " />

                    <div class="form-group col-sm-10 ">
                        <label>الألوان المتاحة</label>
                        <input id="color" type="color" class="mr-1" >
                        <input id="hex" class="form-control" name="prod_avil_color" type="text" placeholder="أدخل ألوان المنتج افصل كل لون عن الآخر بـ','" >
                    </div>

                    <script>

                        // var inputValue = document.getElementById("hex").value();
                        let colorInput = document.querySelector('#color');
                        let hexInput = document.querySelector('#hex');

                        colorInput.addEventListener('input',()=>{
                            let color = colorInput.value;
                            hexInput.value = color;
                          //  document.body.style.background = color;
                        });

                    </script>

                    <x-form.input name="" class="form-control" type="name"
                                  label="معلومات المنتج " placeholder="أدخل معلومات المنتج" />

                    <div class="form-group col-sm-10" >
                        <label>معلومات المنتج</label>
                        <textarea class="form-control" id="editor1" name="editor1" style="width:100%"> </textarea>
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


