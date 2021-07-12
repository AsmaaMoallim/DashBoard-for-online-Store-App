@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة عميل جديد"/>

            <form
                  @if(isset($id))
                  action="/clients/{{$id}}/update"
                  @else
                  action="/store-client"
                  @endif
                  method="Post">

                <div class="card-body fc-direction-rtl">
                    @csrf
                    @if(isset($id))

                        @if("clients/".$id."/update"==request()->path())
                            <?php
                            $cla_frist_name = $currentValues->cla_frist_name;
                            $cla_last_name = $currentValues->cla_last_name;
                            $cla_phone_num = $currentValues->cla_phone_num;
                            $cla_img = $currentValues->cla_img;
                            $cla_email = $currentValues->cla_email;
                            ?>
                        @endif
                    @endif


                <x-form.input name="cla_frist_name" class="form-control" type="name"
                              label="الاسم" placeholder="أدخل اسم العميل الجديد"
                              value="{{$cla_frist_name ?? ''}}"></x-form.input>

                    <x-form.input name="cla_last_name" class="form-control" type="name"
                                  label="الاسم الاخير" placeholder="أدخل الاسم الاخير للعميل الجديد"
                                  value="{{$cla_last_name ?? ''}}"></x-form.input>


                    @if(isset($id))


                        <div class="form-group col-sm-10">

                            <img src="{{$cla_img}}">
                        </div>
                        <x-form.photo-input name="cla_img" label="الصورة"
                                            value="{{$cla_img ?? ''}}"></x-form.photo-input>
                    @else

                    <x-form.photo-input name="cla_img" label="الصورة"></x-form.photo-input>
                    @endif
                <x-form.input name="cla_phone_num" class="form-control" type="tel"
                              label="رقم الجوال" placeholder="أدخل رقم الجوال  التابع للعميل الجديد"
                              value="{{$cla_phone_num ?? ''}}"></x-form.input>

                <x-form.input name="cla_email" class="form-control" type="email"
                              label="البريد الإلكتروني " placeholder="أدخل البريد الإلكتروني  التابع للعميل الجديد"
                              value="{{$cla_email ?? ''}}"></x-form.input>

{{--                <x-form.input name="cla_" class="form-control" type="password"--}}
{{--                              label="كلمة المرور" placeholder="أدخل كلمة المرور التابعة للعميل الجديد" />--}}

        <x-form.cancel-button indexPage="clients"/>
        <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection

