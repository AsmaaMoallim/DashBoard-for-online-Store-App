@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة موقع تواصل إجتماعي جديد "/>

            <form action="/store-social-media-links" method="post">
                <div class="card-body fc-direction-rtl">
                    @csrf
                    <x-form.input name="social_site_name" class="form-control" type="name"
                                  label="اسم موقع التواصل " placeholder=" أدخل اسم موقع التواصل الاجتماعي الجديد" />

                    <x-form.photo-input name="social_img" label="صورة الموقع"/>

                    <x-form.input name="social_url" class="form-control" type="url"
                                  label=" رابط موقع التواصل" placeholder=" أدخل رابط موقع التواصل الاجتماعي الجديد " />

{{--                    <x-form.cancel-button/>--}}
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection
