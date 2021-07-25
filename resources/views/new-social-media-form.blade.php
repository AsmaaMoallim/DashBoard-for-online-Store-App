@extends('adminLayout')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة موقع تواصل إجتماعي جديد "></x-form.header-card>

            <form
                  @if(isset($id))
                  action="/social_media_link/{{$id}}/update"
                  @else
                  action="/store-social-media-links"
                  @endif
                  method="Post"
                  enctype="multipart/form-data">


                @if(isset($id))

                    @if("social_media_link/".$id."/update"==request()->path())
                        <?php
                        $social_site_name = $currentValues->social_site_name;
                        $social_img = $currentValues->social_img;
                        $social_url = $currentValues->social_url;
                        ?>
                    @endif
                @endif

                <div class="card-body fc-direction-rtl">
                    @csrf
                    <x-form.input name="social_site_name" class="form-control" type="name"
                                  label="اسم موقع التواصل " placeholder=" أدخل اسم موقع التواصل الاجتماعي الجديد"
                                  value="{{$social_site_name ?? ''}}"></x-form.input>

                    @if(isset($id))

                        <x-form.photo-input name="social_img" label="صورة الموقع"
                                            value="{{$social_img ?? ''}}"></x-form.photo-input>

                        <div class="form-group col-sm-10">
                            <label>الصورة الحالية:    </label>

                            <img
                                width="100"
                                height="100"
                                src="update/fetch_image">
                        </div>


                    @else
                        <x-form.photo-input name="social_img" label="صورة الموقع"></x-form.photo-input>

                    @endif

                    <x-form.input name="social_url" class="form-control" type="url"
                                  label=" رابط موقع التواصل" placeholder=" أدخل رابط موقع التواصل الاجتماعي الجديد "
                                  value="{{$social_url ?? ''}}"></x-form.input>

                    <x-form.cancel-button indexPage="social_media_link"></x-form.cancel-button>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
