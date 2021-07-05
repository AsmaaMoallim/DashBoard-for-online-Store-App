@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة صورة جديدة"/>

            <form action="/store-media-library" method="Post">
                <div class="card-body fc-direction-rtl">
                @csrf

                    <x-form.input name="medl_name" class="form-control" type="name"
                                  label="اسم الصورة/الفيديو " placeholder="ادخل اسم الصورة/الفيديو " />

                    <x-form.input name="medl_description" class="form-control" type="name"
                                  label="التعريف " placeholder="ادخل تعريف الصورة/الفيديو " />


                    <div class="form-group col-sm-10" >
                        <label>الصورة/رابط الفيديو</label>
                        <textarea name ="medl_img_ved" class="form-control" id="editor1" name="editor1" style="width:100%"> </textarea>
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

                    <x-form.cancel-button indexPage="media_Library"/>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection

