@extends('layouts.admintemp')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة صورة جديدة"/>

            <form action="/addManager" method="Post">
                <div class="card-body fc-direction-rtl">
                @csrf

                    <x-form.input name="" class="form-control" type="name"
                                  label="اسم الصورة/الفيديو " placeholder="ادخل اسم الصورة/الفيديو " />

                    <x-form.photo-input name="" label="اختيار الصورة/رابط الفيديو" />

                    <x-form.input name="" class="form-control" type="url"
                                  label="أو" placeholder="ادخل رابط الفيديو" />

                    <x-form.cancel-button/>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection

