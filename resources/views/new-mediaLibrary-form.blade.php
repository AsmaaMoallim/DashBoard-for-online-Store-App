@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة صورة جديدة"></x-form.header-card>

            <form enctype="multipart/form-data"
                  @if(isset($id))
                  action="/media_library/{{$id}}/update"
                  @else
                  action="/store-media-library"
                  @endif
                  method="Post"
                  enctype="multipart/form-data">
                <div class="card-body fc-direction-rtl">
                    @csrf
                    @if(isset($id))

                        @if("media_library/".$id."/update"==request()->path())
                            <?php
                            $medl_name = $currentValues->medl_name;
                            $medl_description = $currentValues->medl_description;
                            $medl_img_ved = $currentValues->medl_img_ved;

                            ?>
                        @endif
                    @endif

                    <x-form.input name="medl_name" class="form-control" type="name"
                                  label="اسم الصورة/الفيديو " placeholder="ادخل اسم الصورة/الفيديو "
                                  value="{{$medl_name ?? ''}}"></x-form.input>

                    <x-form.input name="medl_description" class="form-control" type="name"
                                  label="التعريف " placeholder="ادخل تعريف الصورة/الفيديو "
                                  value="{{$medl_description ?? ''}}"></x-form.input>

                    @if(isset($id))

                        @if("media_library/".$id."/update"==request()->path())

                        @endif

{{--                   need to be changed--}}

                            <div class="form-group col-sm-10">
                                <label>الصورة الحالية:    </label>

                                <img
                                    width="100"
                                    height="100"
                                    src="update/fetch_image">
                            </div>

                            <x-form.photo-input name="medl_img_ved" label="الصورة"
                                                value="{{$medl_img_ved ?? ''}}"></x-form.photo-input>

{{--                            <div class="form-group col-sm-10">--}}
{{--                                <label>الصورة/رابط الفيديو</label>--}}
{{--                                <textarea name="medl_img_ved" class="form-control" id="editor1" type="file" name="medl_img_ved"--}}
{{--                                          style="width:100%"> </textarea>--}}
{{--                            </div>--}}
                    @else()
                        <div class="form-group col-sm-10">
                            <label>الصورة/رابط الفيديو</label>
                            <br>
                            <input type="radio" name="media_type">
                            <input type="file" name="medl_img_ved">
                            <br>
                            <input type="radio" name="media_type">
                            <input type="url" name="medl_img_ved">
                        </div>

                    @endif

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

                    <x-form.cancel-button indexPage="media_Library"></x-form.cancel-button>
                    <x-form.save-button></x-form.save-button>

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection

