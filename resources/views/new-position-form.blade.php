@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة منصب جديد"></x-form.header-card>

            <form action="/store-position" method="post">
            @csrf

                @if(isset($id))

                    @if("position/".$id."/update"==request()->path())
                        <?php
                        $pos_name = $currentValues->pos_name;
                        $medl_description = $currentValues->medl_description;
                        $medl_img_ved = $currentValues->medl_img_ved;

                        ?>
                    @endif
                @endif

                <div class="card-body fc-direction-rtl">
                    <x-form.input name="pos_name" class="form-control" type="text"
                                  label="اسم المنصب" placeholder="أدخل اسم المنصب الجديد" ></x-form.input>


                    <!-- Dynamic dropDownList -->
                    <div class="form-group col-sm-10 ">
                        <label>الصلاحيات</label>
                        <br>
                        @foreach($permissions as $permission)
                            <input type="checkbox" name="per_id[]" value="{{$permission['per_id']}}"> {{$permission->per_name}}
                            <br>
                        @endforeach
                    </div>


                    <x-form.cancel-button  indexPage="positions_permissionsController" ></x-form.cancel-button>
                    <x-form.save-button></x-form.save-button>

                </div>
            </form>
        </div>
    </div>
@endsection

