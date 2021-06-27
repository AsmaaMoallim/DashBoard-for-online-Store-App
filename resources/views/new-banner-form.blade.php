@extends('layouts.admintemp')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">
            <x-form.header-card title="إضافة بانر جديد"/>

            <form>
                <div class="card-body fc-direction-rtl">

                    <x-form.input name="" class="form-control" type="name"
                                  label="اسم البانر" placeholder="ادخل اسم البانر الجديد" />

                    <x-form.photo-input name=" " label="الصورة" />

                        <x-form.cancel-button/>
                        <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection

