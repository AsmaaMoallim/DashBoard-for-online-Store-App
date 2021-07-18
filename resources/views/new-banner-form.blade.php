@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">
            <x-form.header-card title="إضافة بانر جديد"></x-form.header-card>

            <form
                  @if(isset($id))
                  action="/banners/{{$id}}/update"
                  @else
                  action="/store-banner"
                  @endif
                  method="Post">
                <div class="card-body fc-direction-rtl">
                    @csrf
                    @if(isset($id))

                        @if("banners/".$id."/update"==request()->path())
                            <?php
                            $ban_name = $currentValues->ban_name;
                            $medl_img_ved = $currentforeignValues->medl_img_ved;
                            ?>
                        @endif
                    @endif

                    <x-form.input name="ban_name" class="form-control" type="name"
                                  label="اسم البانر" placeholder="ادخل اسم البانر الجديد"
                                  value="{{$ban_name ?? ''}}"></x-form.input>

{{--                    @if(isset($id))--}}

{{--                        <div class="form-group col-sm-10">--}}

{{--                            <img src="{{$medl_img_ved}}">--}}
{{--                        </div>--}}

{{--                    @else--}}

                        <label class="pb-1">صورة البانر</label>
                        <div class="form-group col-sm-10 table-responsive " style="height: 300px;">
                            <table class="table-bordered">
                                <thead>
                                <tr>
                                    <th width="70%">الصورة</th>
                                    <th width="30%">اسم الصورة</th>
                                </tr>
                                </thead>

                                @foreach($medialibrary as $media)
                                    <?php  $med = $media->medl_id ?>

                                    <tbody>
                                    <tr>
                                        <td>
                                            @if(isset($id))
                                            <input type="radio" name="medl_id"
                                                   value="{{$media['medl_id']}}"

                                            @foreach($currentMedias as $currentMedia)
                                                   <?php   $curMedi = $currentMedia->medl_id ?>

                                                   @if($med == $curMedi)
                                                    checked="checked"
                                                @endif
                                                @endforeach
                                            >

                                            <img src="update/fetch_image/{{$media->medl_id}}" class="img-thumbnail" width="75" />
                                        @else
                                            <input type="radio" name="medl_id" value="{{$media['medl_id']}}">
                                            <img src="fetch_image/{{$med}}" class="img-thumbnail" width="75"/>
                                        @endif
                                        </td>

                                        <td>  {{$media->medl_name}} </td>

                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>

                        <x-form.cancel-button indexPage="banners"></x-form.cancel-button>
                        <x-form.save-button></x-form.save-button>

                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

