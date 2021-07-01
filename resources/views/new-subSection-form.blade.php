@extends('adminLayout')

@section('content')
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title=" إضافة قسم رئيسي جديد"/>

            <form>
                <div class="card-body fc-direction-rtl">

                    <x-form.input name="" class="form-control" type="name"
                                  label="اسم القسم الفرعي"
                                  placeholder="ادخل اسم القسم الفرعي الجديد" />

                    <x-form.photo-input name="" label="صورة" />

{{--                    @include('components.form.dynamic-dropdown-list', ['label'=>' القسم الرئيسي التابع له',--}}
{{--                                  'onchange'=>'GetSelectedItem(this.value)'])--}}

                    <script>
                        function GetSelectedItem(value)
                        {
                            var option = document.getElementById(value);
                            var selectedop = option.options[option.selectedIndex].text;
                        }
                    </script>


                    <x-form.cancel-button indexPage="sub_Sections"/>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection
