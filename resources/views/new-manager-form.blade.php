@extends('adminLayout')

@section('content')

    <!-- form div -->
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">
            <x-form.header-card title="إضافة مدير جديد"></x-form.header-card>

            <form action="/store-manager" method="Post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                               @if("manager/".$id."/update"==request()->path())
                        <?php
                        $man_frist_name = $currentValues->man_frist_name;
                        $man_last_name = $currentValues->man_last_name;
                        $man_phone_num = $currentValues->man_phone_num;
                        $man_email = $currentValues->man_email;
                        $man_password = $currentValues->man_password;
                        ?>
                    @endif
                    {{--                    {{ "manager/1/update"==request()->path()? $currentValues->man_frist_name : "" }}--}}
                    {{--                    {{  request()->path() == 'manager/'.$id.'/update' ? $currentValues->man_frist_name: "" }}--}}
                    <x-form.input name="man_first_name" class="form-control" type="name" label="الاسم الأول" placeholder="أدخل الأسم الأول للمدير الجديد" value="{{$man_frist_name ?? ''}}"></x-form.input>

                          <x-form.input name="man_last_name" class="form-control" type="name" label="الاسم الأخير" placeholder="أدخل اسم الأخير للمدير الجديد" value="{{$man_last_name ?? ''}}"></x-form.input>

                        <x-form.input name="man_phone_num" class="form-control" type="tel" label="رقم الجوال" placeholder="أدخل رقم الجوال التابع للمدير الجديد" value="{{$man_phone_num ?? ''}}"></x-form.input>

                    <x-form.input name="man_email" class="form-control" type="email" label="البريد الإلكتروني" placeholder="أدخل البريد الإلكتروني التابع للمدير الجديد" value="{{$man_email ?? ''}}"></x-form.input>


{{--                    <div class="form-group col-sm-10 ">--}}
{{--                        <label>المنصب</label>--}}
{{--                        <select  name="pos_id" id="pos_id" onchange="GetSelectedItem">--}}
{{--                            @foreach($positions as $position)--}}
{{--                                <option value="{{$position->pos_id}}"> {{$position->pos_name}} </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}


                    {{--                    @include('components.form.dynamic-dropdown-list', ['label'=>'المنصب', 'onchange'=>'GetSelectedItem(this.value)', 'data'=>'positions','name'=>'pos_name'])--}}


                    {{--                    <div class="form-group col-sm-10 ">--}}
                    {{--                        <label>المنصب</label>--}}
                    {{--                        <select  name="ManagerRole" onchange="GetSelectedItem">--}}
                    {{--                            @foreach($positions as $position)--}}
                    {{--                                <option value="{{$position->pos_id}}"> {{$position->pos_name}} </option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}


                    {{--                    <x-form.dynamic-dropdown-list :data="$positions" id="pos_id" name="man_firs_name" label=""></x-form.dynamic-dropdown-list>--}}

                    <script>
                        function GetSelectedItem(pos_id)
                        {
                            var option = document.getElementById(pos_id);
                            var selectedop = option.options[option.selectedIndex].text;
                        }
                    </script>

                    <x-form.input name="man_password" class="form-control" type="password" label="كلمة المرور" placeholder="أدخل كلمة المرور التابعة للمدير الجديد" value="{{$man_password ?? ''}}"></x-form.input>
    <x-form.cancel-button indexPage="manager"></x-form.cancel-button>
                    <x-form.save-button></x-form.save-button>
                    <button  class=" btn btn-primary ml-1" onclick="window.location='{{ url("TestEdit") }}'" type="button" value="تعديل" ></button>

                </div>
            </form>
        </div>
    </div>
@endsection


