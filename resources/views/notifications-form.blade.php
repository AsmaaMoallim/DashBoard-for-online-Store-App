@extends('layouts.admintemp')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="الإشعارات "/>

            <form>
                <div class="card-body fc-direction-rtl">



                                        <!-- Dynamic dropDownList -->
                    <div class="form-group col-sm-10 ">
                        <label></label>
                        <select name=""  >
                            @foreach($managers as $manager)
                                <option value="{{$manager['id']}}"> {{$manager->ManagerName}} </option>
                            @endforeach
                        </select>
                    </div>

                    @include('components.form.dynamic-dropdown-list', 'multiple' , ['label'=>'العميل',
                               'onchange'=>'changeSelection(this.value)', 'id'=> 'option'])

                    <script>
                        function changeSelection(value){

                            var length = document.getElementById("option").options.length;

                            if(value == 0){
                                for(var i = 1 ; i<length ; i++)
                                    document.getElementById("option").options[i].selected = "selected";
                                document.getElementById("option").options[0].selected = "";
                            }
                        }
                    </script>


                    <x-form.input name="" class="form-control" type="text"
                                  label="عنوان الإشعار" placeholder="أدخل عنوان الإشعار" />

                    <div class="form-group col-sm-10 ">
                    <label>نص الإشعار</label>
                    <br>
                    <textarea placeholder="أدخل نص الإشعار" > </textarea>
                    </div>

                    <x-form.cancel-button/>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection
