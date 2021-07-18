@extends('adminLayout')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة ايميل جديد "></x-form.header-card>

            <form
                  @if(isset($id))
                  action="/contact_information_email/{{$id}}/update"
                  @else
                  action="/store-contact-information-email"
                  @endif
                  method="Post">


                @if(isset($id))

                    @if("contact_information/".$id."/update"==request()->path())
                        <?php
                        $sys_email = $currentValues->sys_email;
                        ?>
                    @endif
                @endif

                <div class="card-body fc-direction-rtl">
                    @csrf
                    <x-form.input name="sys_email" class="form-control" type="email"
                                  label="عنوان الايميل " placeholder=" أدخل عنوان الايميل الجديد "
                                  value="{{$sys_email ?? ''}}"></x-form.input>

                    <x-form.cancel-button indexPage="contact_information"></x-form.cancel-button>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
