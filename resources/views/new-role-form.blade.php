@extends('layouts.admintemp')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة منصب جديد"/>

            <form>
                @csrf
                <div class="card-body fc-direction-rtl">

                    <!-- Dynamic dropDownList -->
                    <div class="form-group col-sm-10 ">
                        <label>الصلاحيات</label>
                        <br>
                        @foreach($permissions as $permission)
                            <input type="checkbox" value="{{$permission['id']}}"> {{$permission->Name}} >
                        @endforeach
                    </div>

{{--                <input type="checkbox" name="التعامل مع الإدارة" >--}}
{{--                <label for="role1">التعامل مع الإدارة</label>--}}

{{--                <input type="checkbox" name="التعامل مع مكتبة الصور و الفيديوهات" >--}}
{{--                <label for="role1">التعامل مع مكتبة الصور و الفيديوهات</label>--}}

{{--                <input type="checkbox" name="التعامل مع البانرات" >--}}
{{--                <label for="role1">التعامل مع البانرات</label>--}}

{{--                <input type="checkbox" name="التعامل مع الأقسام الرئيسية و الفرعية" >--}}
{{--                <label for="role1">التعامل مع الأقسام الرئيسية و الفرعية</label>--}}

{{--                <input type="checkbox" name="التعامل مع المنتجات" >--}}
{{--                <label for="role1">التعامل مع المنتجات</label>--}}

{{--                <input type="checkbox" name="لتعامل مع العملاء" >--}}
{{--                <label for="role1">لتعامل مع العملاء</label>--}}

{{--                <input type="checkbox" name="التعامل مع دليل المقاسات" >--}}
{{--                <label for="role1">التعامل مع دليل المقاسات</label>--}}

{{--                <input type="checkbox" name="التعامل مع بيانات التواصل" >--}}
{{--                <label for="role1">التعامل مع بيانات التواصل</label>--}}

{{--                <input type="checkbox" name="التعامل مع روابط التواصل الإجتماعي" >--}}
{{--                <label for="role1">التعامل مع روابط التواصل الإجتماعي</label>--}}

{{--                <input type="checkbox" name="التعامل مع تكلفة الشحن" >--}}
{{--                <label for="role1">التعامل مع تكلفة الشحن</label>--}}

{{--                <input type="checkbox" name="التعامل مع الحسابات البنكية" >--}}
{{--                <label for="role1">التعامل مع الحسابات البنكية</label>--}}

{{--                <input type="checkbox" name="التعامل مع التحويلات البنكية" >--}}
{{--                <label for="role1">التعامل مع التحويلات البنكية</label>--}}

{{--                <input type="checkbox" name="التعامل مع التعليقات" >--}}
{{--                <label for="role1">التعامل مع التعليقات</label>--}}

{{--                <input type="checkbox" name="التعامل مع الإشعارات" >--}}
{{--                <label for="role1">التعامل مع الإشعارات</label>--}}

{{--                <input type="checkbox" name="التعامل مع البريد" >--}}
{{--                <label for="role1">التعامل مع البريد</label>--}}

{{--                <input type="checkbox" name="  " >--}}
{{--                <label for="role1">   </label>--}}

{{--                <input type="checkbox" name="التعامل مع الصفحات الثابتة" >--}}
{{--                <label for="role1">التعامل مع الصفحات الثابتة</label>--}}

                    <x-form.cancel-button/>
                    <x-form.save-button/>

            </div>
            </form>
    </div>
</div>
@endsection

