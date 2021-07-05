@extends('adminLayout')

@section('content')
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title=" إضافة قسم رئيسي جديد"/>

            <form action="/store-sub-section" method="post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                    <x-form.input name="sub_name" class="form-control" type="name"
                                  label="اسم القسم الفرعي"
                                  placeholder="ادخل اسم القسم الفرعي الجديد" />

                    <x-form.photo-input name="medl_id" label="صورة" />


                    <div class="form-group col-sm-10 ">
                        <label>القسم الرئيسي التابع له</label>
                        <select  name="main_id" onchange="GetSelectedItem">
                            @foreach($mainSections as $mainSection)
                                <option value="{{$mainSection->main_id}}"> {{$mainSection->main_name}} </option>
                            @endforeach
                        </select>
                    </div>

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
