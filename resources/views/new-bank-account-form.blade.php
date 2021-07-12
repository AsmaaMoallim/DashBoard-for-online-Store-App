@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <!-- form div -->
        <div class="col-lg-6 pr-xl-5">
            <div class=" card card-dark " style="background-color: silver ">

                <x-form.header-card title="إضافة حساب بنكي جديد"></x-form.header-card>

                <form
                      @if(isset($id))
                      action="/sys_bank_account/{{$id}}/update"
                      @else
                      action="/store-bank-account"
                      @endif
                      method="Post">
                    <div class="card-body fc-direction-rtl">
                        @csrf
                        @if(isset($id))

                            @if("sys_bank_account/".$id."/update"==request()->path())
                                <?php
                                $sys_bank_name = $currentValues->sys_bank_name;
                                $sys_bank_account_num = $currentValues->sys_bank_account_num;
                                ?>
                            @endif
                        @endif

                        <x-form.input name="sys_bank_name" class="form-control" type="name"
                                      label="اسم البنك" placeholder="أدخل اسم البنك التابع للحساب البنكي الجديد"
                                      value="{{$sys_bank_name ?? ''}}"></x-form.input>

                        <x-form.input name="sys_bank_account_num" class="form-control" type="name"
                                      label="رقم الحساب
                                   " placeholder="أدخل رقم الحساب البنكي الجديد"
                                      value="{{$sys_bank_account_num ?? ''}}"></x-form.input>


                        <x-form.cancel-button indexPage="bank_accounts"></x-form.cancel-button>
                        <x-form.save-button></x-form.save-button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
