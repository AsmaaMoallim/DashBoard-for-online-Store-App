@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة قسم رئيسي جديد "/>

            <form action="/store-main-section" method="post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                    <x-form.input name="main_name" class="form-control" type="name"
                                  label="اسم القسم الرئيسي" placeholder="ادخل اسم القسم الجديد" />

                    <x-form.photo-input name="medl_id" label="الصورة" />

                    <x-form.cancel-button indexPage="main_Sections"/>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection
