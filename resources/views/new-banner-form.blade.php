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

                    @if(isset($id))


                        <div class="form-group col-sm-10">

                            <img src="{{$medl_img_ved}}">
                        </div>
                            <x-form.photo-input name="medl_id" label="الصورة" ></x-form.photo-input>

                    @else

                        <label class="pb-1">صورة البانر</label>

                        <div class="form-group col-sm-10 table-responsive " style="height: 300px;">
                            <table class="table-bordered">
                                <thead>
                                <tr>
                                    <th width="70%">الصورة</th>
                                    <th width="30%">اسم الصورة</th>
                                </tr>
                                </thead>
                                @foreach($data as $row)
                                    <tbody>
                                    <tr>
                                        <td> <input type="radio" name="medl_id" value="{{$row['medl_id']}}"> <img src="fetch_image/{{$row->medl_id}}" class="img-thumbnail" width="75" /> </td>
                                        <td>  {{$row->medl_name}} </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>

{{--                    <select>--}}
{{--                        @foreach($data as $ban_img)--}}
{{--                            <option onclick="setValue({{" $ban_img->medl_id"}}); showElement({{$ban_img->medl_img_ved}});"></option>--}}
{{--                            <img src="{{asset($ban_img->medl_img_ved)}}" style="max-width: 130px;">Hatchback</li>--}}

{{--                        @endforeach--}}

{{--                    </select>--}}
{{--                        <script>--}}
{{--                            /**--}}
{{--                             * Show or hide the element with the matching id.--}}
{{--                             * @param {string} divId The id of the element to show/hide.--}}
{{--                             * @param {boolean} show True to show, false to hide.--}}
{{--                             */--}}
{{--                            function showElement(divId, show) {--}}
{{--                                document.getElementById(divId).style.display = (show) ? "inline" : "none";--}}
{{--                            }--}}

{{--                            /**--}}
{{--                             * Set the value of the element with the matching id.--}}
{{--                             * @param {string} divId The id of the element to change.--}}
{{--                             * @param {string} value Value to set.--}}
{{--                             */--}}
{{--                            function setValue(divId, value) {--}}
{{--                                document.getElementById(divId).value = value;--}}
{{--                            }--}}

{{--                        </script>--}}




{{--                        <script src="jquery.js"></script>--}}
{{--                        <script src="fm.selectator.jquery.js"></script>--}}

{{--                        <script>--}}
{{--                            $('#singlebox').selectator();--}}
{{--                            $('#multibox').selectator();--}}
{{--                        </script>--}}


                    @endif



                        <x-form.cancel-button indexPage="banners"></x-form.cancel-button>
                        <x-form.save-button></x-form.save-button>

                </div>
            </form>
        </div>
    </div>

    </div>
@endsection

