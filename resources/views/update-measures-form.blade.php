@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <!-- form div -->
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="تعديل صورة القياسات " > </x-form.header-card>
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
                        <label class="pb-1">صورة القياسات</label>

                        <div class="form-group col-sm-10 table-responsive " style="height: 300px;">
                            <table class="table-bordered">
                                <thead>
                                <tr>
                                    <th width="70%">الصورة</th>
                                    <th width="30%">اسم الصورة</th>
                                </tr>
                                </thead>
                                @foreach($mediaLibrary as $media)
                                    <?php  $med = $media->medl_id ?>

                                    <tbody>
                                    <tr>
                                        <td>
                                            @if(isset($id))
                                                <input type="radio" name="medl_id"
                                                       value="{{$media['medl_id']}}"

                                                       @foreach($currentMedia as $currentMedias)
                                                       <?php   $curMedi = $currentMedias->medl_id ?>
                                                       @if($med == $curMedi)
                                                       checked="checked"
                                                    @endif
                                                    @endforeach
                                                >
                                                <img src="update/fetch_image/{{$media['medl_id']}}" class="img-thumbnail"
                                                     width="75"/>
                                            @else
                                                <input type="radio" name="medl_id"
                                                       value="{{$media['medl_id']}}"
                                                >
                                                <img src="fetch_image/{{$med}}" class="img-thumbnail"
                                                     width="75"/>
                                            @endif

                                        </td>

                                        <td>  {{$media->medl_name}} </td>
                                    </tr>
                                    </tbody>

                                @endforeach

                                <img src="update/fetch_image/{{$media['medl_id']}}" class="img-thumbnail"
                                     width="75"/>
                            </table>
                        </div>
                    <br>

                    @endif

                    <x-form.save-button/>
                    <x-form.cancel-button indexPage="measure" />

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection

