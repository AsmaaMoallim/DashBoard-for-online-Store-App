@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة منصب جديد"></x-form.header-card>

            <form
                @if(isset($id))
                action="/positions_permissions/{{$id}}/update"
                @else
                action="/store-position"
                @endif
                method="Post">
            @csrf

                @if(isset($id))

                    @if("positions_permissions/".$id."/update"==request()->path())
                        <?php
                        $pos_name = $currentValues->pos_name;

                        ?>
                    @endif
                @endif

                <div class="card-body fc-direction-rtl">
                    <x-form.input name="pos_name" class="form-control" type="text"
                                  label="اسم المنصب" placeholder="أدخل اسم المنصب الجديد"
                                  value="{{$pos_name ?? ''}}"></x-form.input>


                    <div class="form-group col-sm-10 ">
                        <label>الصلاحيات</label>
                        <br>
                        @foreach($permissions as $permission)

                            <input type="checkbox" name="per_id[]" value="{{$permission['per_id']}}"

                            @if(isset($id))
                                @foreach($currentPermissions as $currentPermission)

                                    @if($permission->per_id == $currentPermission->per_id)

                                        checked="checked"
                                        @endif


                                    @endforeach

                                    @endif


                            > {{$permission->per_name}}
                            <br>
                        @endforeach
                    </div>


                    <x-form.cancel-button  indexPage="positions_permissions" ></x-form.cancel-button>
                    <x-form.save-button></x-form.save-button>

                </div>
            </form>
        </div>
    </div>

    </div>
@endsection

