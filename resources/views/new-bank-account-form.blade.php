@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <!-- form div -->
        <div class="col-lg-6 pr-xl-5">
            <div class=" card card-dark " style="background-color: silver ">

                <x-form.header-card title="إضافة حساب بنكي جديد"/>

                <form action="/store-bank-account" method="post">
                    <div class="card-body fc-direction-rtl">
                        @csrf

                        <x-form.input name="sys_bank_name" class="form-control" type="name"
                                      label="اسم البنك" placeholder="أدخل اسم البنك التابع للحساب البنكي الجديد"/>

                        <x-form.input name="sys_bank_account_num" class="form-control" type="name"
                                      label="رقم الحساب
                                   " placeholder="أدخل رقم الحساب البنكي الجديد"/>


                        <x-form.cancel-button indexPage="bank_accounts"/>
                        <x-form.save-button/>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
