@extends('adminLayout')

@section('content')
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة عميل جديد"/>

            <form>
                <div class="card-body fc-direction-rtl">
                    @csrf

                <x-form.input name="" class="form-control" type="name"
                              label="الاسم" placeholder="أدخل اسم العميل الجديد" />

                <x-form.photo-input name=" " label="الصورة" />

                <x-form.input name="" class="form-control" type="tel"
                              label="رقم الجوال" placeholder="أدخل رقم الجوال  التابع للعميل الجديد" />

                <x-form.input name="" class="form-control" type="email"
                              label="البريد الإلكتروني " placeholder="أدخل البريد الإلكتروني  التابع للعميل الجديد" />

                <x-form.input name="" class="form-control" type="password"
                              label="كلمة المرور" placeholder="أدخل كلمة المرور التابعة للعميل الجديد" />

        <x-form.cancel-button indexPage="clients"/>
        <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection

