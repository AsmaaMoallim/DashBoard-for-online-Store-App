@extends('adminLayout')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <div class="col-lg-6 pr-xl-5">
            <div class=" card card-dark " style="background-color: silver ">

                <x-form.header-card title=" تحديث حالة الطلب "></x-form.header-card>

                <form
                    action="/orders/{{$id}}/update"
                    method="Post">


                    <?php
                    $stage_name = $CurrentStage->stage_name;
                    ?>

                    <div class="card-body fc-direction-rtl">
                        @csrf
                        <div class="form-group col-sm-10 ">
                            <label>حالة الطلب </label>
                            <select name="stage_id" onchange="GetSelectedItem">
                                @foreach($stages as $stage)

                                    <option

                                        @if ($stage->stage_name == $stage_name)
                                        selected="selected"
                                        @endif
                                        value="{{$stage->stage_id}}"
                                        >{{$stage->stage_name}}
                                    </option>

                                @endforeach
                            </select>
                        </div>
{{--                        <x-form.input name="stage_name" class="form-control" type="name"--}}
{{--                                      label=" حالة الطلب: " placeholder=" ادخل حالة الطلب الجديدة "--}}
{{--                                      value="{{$stage_name }}"></x-form.input>--}}

                        <x-form.cancel-button indexPage="contact_information"></x-form.cancel-button>
                        <x-form.save-button/>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
