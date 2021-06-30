@extends('adminLayout')

@section('content')

    <!-- form div -->
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">
        <x-form.header-card title="إضافة مدير جديد"/>

            <form action="/addManager" method="Post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                    <x-form.input name="ManagerName" class="form-control" type="name"
                                  label="الاسم" placeholder="أدخل اسم المدير الجديد" />

                    <x-form.input name="ManagerPhone" class="form-control" type="tel"
                                  label="رقم الجوال" placeholder="أدخل رقم الجوال التابع للمدير الجديد" />

                    <x-form.input name="ManagerEmail" class="form-control" type="email"
                                  label="البريد الإلكتروني" placeholder="أدخل البريد الإلكتروني التابع للمدير الجديد" />

                    @include('components.form.dynamic-dropdown-list', ['label'=>'المنصب',
                       'onchange'=>'GetSelectedItem(this.value)', 'all'=>'managers','id'=>'man_id', 'name'=>'man_firs_name'])

                    <script>
                        function GetSelectedItem(value)
                        {
                            var option = document.getElementById(value);
                            var selectedop = option.options[option.selectedIndex].text;
                        }
                    </script>

                    <x-form.input name="ManagerPassword" class="form-control" type="password"
                                  label="كلمة المرور" placeholder="أدخل كلمة المرور التابعة للمدير الجديد" />

                    <x-form.cancel-button/>
                    <x-form.save-button/>

                    <button  class=" btn btn-primary ml-1" onclick="window.location='{{ url("TestEdit") }}'" type="button" value="تعديل" />

                </div>
            </form>
        </div>
    </div>
@endsection

