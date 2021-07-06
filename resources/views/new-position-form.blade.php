@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة منصب جديد"/>

            <form action="" method="post">
                @csrf
                <div class="card-body fc-direction-rtl">
                    <x-form.input name="pos_id" class="form-control" type="text"
                                  label="اسم المنصب" placeholder="أدخل اسم المنصب الجديد" />


                                        <!-- Dynamic dropDownList -->
                    <div class="form-group col-sm-10 ">
                        <label>الصلاحيات</label>
                        <br>
                        @foreach( $permissions as $permission)
                            <input type="checkbox" value="{{$permission->per_id}}"> {{$permission->per_name}}>
                            <br>
                        @endforeach
                    </div>


                    <x-form.cancel-button  indexPage="positions_permissionsController" />
                    <x-form.save-button/>

            </div>
            </form>
    </div>
</div>
@endsection

