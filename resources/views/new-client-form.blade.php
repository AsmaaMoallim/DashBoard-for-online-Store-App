@extends('adminLayout')

@section('content')
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة عميل جديد"/>

            <form action="/store-client" method="post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                <x-form.input name="cla_frist_name" class="form-control" type="name"
                              label="الاسم" placeholder="أدخل اسم العميل الجديد" />

                    <x-form.input name="cla_last_name" class="form-control" type="name"
                                  label="الاسم الاخير" placeholder="أدخل الاسم الاخير للعميل الجديد" />

                    <x-form.photo-input name="cla_img" label="الصورة" />

                <x-form.input name="cla_phone_num" class="form-control" type="tel"
                              label="رقم الجوال" placeholder="أدخل رقم الجوال  التابع للعميل الجديد" />

                <x-form.input name="cla_email" class="form-control" type="email"
                              label="البريد الإلكتروني " placeholder="أدخل البريد الإلكتروني  التابع للعميل الجديد" />

                <x-form.input name="cla_" class="form-control" type="password"
                              label="كلمة المرور" placeholder="أدخل كلمة المرور التابعة للعميل الجديد" />

        <x-form.cancel-button indexPage="clients"/>
        <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection

