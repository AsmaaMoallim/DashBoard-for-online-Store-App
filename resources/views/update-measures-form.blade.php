@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <!-- form div -->
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة صورة قياسات جديدة" > </x-form.header-card>
            <form
                  @if(isset($id))
                  action="/measure/{{$id}}/update"
                  @else
                  action="/store-measure"
                  @endif
                  method="Post">

                <div class="card-body fc-direction-rtl">
                    @csrf
                    @if(isset($id))
                        @if("measure/".$id."/update"==request()->path())
                            <?php
                            $mesu_value = $currentValues->mesu_value;
                            ?>
                        @endif
                    @endif

                    @if(isset($id))

                        <x-form.input name="mesu_value" class="form-control" type="name"
                                      label="المقاس " placeholder="أدخل المقاس "
                                      value="{{$mesu_value ?? ''}}"/>
                    @else
                        <x-form.photo-input name="" label="صورة القياسات الجديد" />

                    @endif

                    <x-form.save-button/>
                    <x-form.cancel-button indexPage="measure" />

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection

