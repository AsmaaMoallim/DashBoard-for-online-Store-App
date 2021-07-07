@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="الإشعارات "/>

            <form action="/store-notification" method="post">
                <div class="card-body fc-direction-rtl">

                @csrf

                    <x-form.input name="notifi_title" class="form-control" type="text"
                                  label="عنوان الإشعار" placeholder="أدخل عنوان الإشعار" />

                    <div class="form-group col-sm-10 ">
                        <label>العميل</label>
                        <br>
                        <select name="man_id" id="man_id">
                        @foreach($clients as $client)
                                <option name="man_id" value="{{$client->cal_id}}"> {{$client->cal_frist_name}}{{$client->cla_last_name}} </option>
                            @endforeach
                        </select>
                                </div>

{{--                                <script>--}}
{{--                                    function changeSelection(value){--}}
{{--                                        var length = document.getElementById("option").options.length;--}}
{{--                                        if(value == 0){--}}
{{--                                            for(var i = 1 ; i<length ; i++)--}}
{{--                                                document.getElementById("option").options[i].selected = "selected";--}}
{{--                                            document.getElementById("option").options[0].selected = "";--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                </script>--}}


                                <div>
                                <label>نص الإشعار</label>
                                <br>
                                <textarea name="notifi_content" class="form-group col-sm-10" placeholder="أدخل نص الإشعار" > </textarea>
                                </div>


                                <x-form.cancel-button indexPage="notifications"/>
                                <x-form.save-button/>

                            </div>
                        </form>
                    </div>
                </div>
@endsection
