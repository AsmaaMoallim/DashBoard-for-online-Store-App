@extends('adminLayout')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة رقم تواصل جديد "></x-form.header-card>

            <form
                @if(isset($id))
                action="/contact_information_phone/{{$id}}/update"
                @else
                action="/store-contact-information-phone"
                @endif
                method="Post">


                @if(isset($id))

                    @if("contact_information_2/".$id."/update"==request()->path())
                        <?php
                        $sys_phone_num = $currentValues->sys_phone_num;
                        ?>
                    @endif
                @endif

                <div class="card-body fc-direction-rtl">
                    @csrf
                    <x-form.input name="sys_phone_num" class="form-control" type="phone"
                                  label=" رقم الجوال/الهاتف " placeholder=" أدخل الرقم الجديد "
                                  value="{{$sys_phone_num ?? ''}}"></x-form.input>

                    <x-form.cancel-button indexPage="contact_information"></x-form.cancel-button>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
