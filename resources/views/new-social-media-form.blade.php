@extends('layouts.admintemp')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة موقع تواصل إجتماعي جديد "/>

            <form>
                <div class="card-body fc-direction-rtl">

                    <x-form.input name="" class="form-control" type="name"
                                  label="اسم موقع التواصل " placeholder=" أدخل اسم موقع التواصل الاجتماعي الجديد" />

                    <x-form.photo-input name="" label="صورة الموقع"/>

                    <x-form.input name="" class="form-control" type="url"
                                  label=" رابط موقع التواصل" placeholder=" أدخل رابط موقع التواصل الاجتماعي الجديد " />

                    <x-form.cancel-button/>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection
