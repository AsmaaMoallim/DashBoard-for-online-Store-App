@extends('adminLayout')

@section('content')
<!-- form div -->
<div class="col-lg-6 pr-xl-5">
    <div class=" card card-dark " style="background-color: silver ">

        <x-form.header-card title="إضافة حساب بنكي جديد" />

        <form>
            <div class="card-body fc-direction-rtl">

                <x-form.input name="" class="form-control" type="name"
                              label="اسم البنك" placeholder="أدخل اسم البنك التابع للحساب البنكي الجديد" />

                <x-form.input name="" class="form-control" type="name"
                              label="رقم الحساب
" placeholder="أدخل اسم المدير الجديد" />


                <x-form.cancel-button  indexPage="bank_accounts" />
                <x-form.save-button/>

            </div>
        </form>
    </div>
</div>
@endsection
