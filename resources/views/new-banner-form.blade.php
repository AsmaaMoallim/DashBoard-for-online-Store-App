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
{{--                        <x-form.photo-input name="medl_id" label="الصورة" ></x-form.photo-input>--}}

                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                        <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js" ></script>

                        <select id="demo-htmlselect">
                            <option value="0" data-imagesrc="https://i.imgur.com/XkuTj3B.png"
                                    data-description="Description with Facebook">Facebook</option>
                            <option value="1" data-imagesrc="https://i.imgur.com/8ScLNnk.png"
                                    data-description="Description with Twitter">Twitter</option>
                            <option value="2" selected="selected" data-imagesrc="https://i.imgur.com/aDNdibj.png"
                                    data-description="Description with LinkedIn">LinkedIn</option>
                            <option value="3" data-imagesrc="https://i.imgur.com/kFAk2DX.png"
                                    data-description="Description with Foursquare">Foursquare</option>
                        </select>



{{--                    <script src="css/chosen.css" ></script>--}}
{{--                        <script src="css/ImageSelect.css" ></script>--}}

{{--                        <script type="text/javascript">--}}
{{--                            function swapImage(){--}}
{{--                                var image = document.getElementById("imageToSwap");--}}
{{--                                image = image.value;--}}
{{--                            };--}}
{{--                        </script>--}}

{{--                    --}}




{{--                        <div class="form-group col-sm-10 ">--}}
{{--                            <label>الصورة</label>--}}
{{--                            <select name="pos_id" onchange="showImage">--}}
{{--                                @foreach($ban_img as $ban_img)--}}
{{--                                    <option  id="option" value="{{$ban_img->medl_id}}"> {{$ban_img->medl_img_ved}} </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <img  id="img" src="">--}}
{{--                        </div>--}}


                    <select>
                        @foreach($ban_img as $ban_img)
                            <option onclick="setValue({{" $ban_img->medl_id"}}); showElement({{$ban_img->medl_img_ved}});"></option>
                            <img src="{{asset($ban_img->medl_img_ved)}}" style="max-width: 130px;">Hatchback</li>

                        @endforeach
                    </select>
                        <script>
                            /**
                             * Show or hide the element with the matching id.
                             * @param {string} divId The id of the element to show/hide.
                             * @param {boolean} show True to show, false to hide.
                             */
                            function showElement(divId, show) {
                                document.getElementById(divId).style.display = (show) ? "inline" : "none";
                            }

                            /**
                             * Set the value of the element with the matching id.
                             * @param {string} divId The id of the element to change.
                             * @param {string} value Value to set.
                             */
                            function setValue(divId, value) {
                                document.getElementById(divId).value = value;
                            }

                        </script>




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

