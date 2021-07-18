@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title=" إضافة قسم رئيسي جديد"></x-form.header-card>

            <form
                  @if(isset($id))
                  action="/sub_sections/{{$id}}/update"
                  @else
                  action="/store-sub-section"
                  @endif
                  method="Post">
                <div class="card-body fc-direction-rtl">
                    @csrf
                    @if(isset($id))

                        @if("sub_sections/".$id."/update"==request()->path())
                            <?php
                            $sub_name = $currentValues->sub_name;
                            $CurrentmainSection = $CurrentmainSection->main_name;
                            $medl_img_ved = $currentforeignValues->medl_img_ved;


                            ?>
                        @endif
                    @endif
                    <x-form.input name="sub_name" class="form-control" type="name"
                                  label="اسم القسم الفرعي"
                                  placeholder="ادخل اسم القسم الفرعي الجديد"
                                  value="{{$sub_name ?? ''}}"></x-form.input>

                    <div class="form-group col-sm-10 ">
                        <label>القسم الرئيسي التابع له</label>
                        <select onchange="GetSelectedItem">
                            @foreach($mainSections as $mainSection)
                                @if(isset($id))

                                @if ($mainSection->main_id == $currentValues->main_id)
                                    <option
                                        value="{{$mainSection->main_id}}"
                                            selected="selected">{{$CurrentmainSection}}
                                </option>
                                    @else
                                        <option

                                            value="{{$mainSection->main_id}}"> {{$mainSection->main_name}}
                                        </option>
                                    @endif

                            @else
                                    <option

                                        value="{{$mainSection->main_id}}"> {{$mainSection->main_name}}
                                </option>


                                @endif
                            @endforeach
                        </select>
                    </div>
                    <label class="pb-1">صورة القسم الرئيسي</label>
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

                    <script>
                        function GetSelectedItem(value) {
                            var option = document.getElementById(value);
                            var selectedop = option.options[option.selectedIndex].text;
                        }
                    </script>

                    <x-form.cancel-button indexPage="sub_sections"></x-form.cancel-button>
                    <x-form.save-button></x-form.save-button>

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
