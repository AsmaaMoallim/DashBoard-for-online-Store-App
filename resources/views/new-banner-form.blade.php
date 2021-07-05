@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">
            <x-form.header-card title="إضافة بانر جديد"/>

            <form action="/store-banner" method="post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                    <x-form.input name="ban_name" class="form-control" type="name"
                                  label="اسم البانر" placeholder="ادخل اسم البانر الجديد" />

                    <x-form.photo-input name="medl_id" label="الصورة" />

                        <x-form.cancel-button indexPage="banners"/>
                        <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection

