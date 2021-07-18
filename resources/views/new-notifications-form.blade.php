@extends('adminLayout')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <div class="col-lg-6 pr-xl-5">
            <div class=" card card-dark " style="background-color: silver ">

                <x-form.header-card title="الإشعارات "/>

                <form action="/store-notification" method="post">
                    <div class="card-body fc-direction-rtl">

                        @csrf

                        <x-form.input name="notifi_title" class="form-control" type="text"
                                      label="عنوان الإشعار" placeholder="أدخل عنوان الإشعار"/>

                        <script>
                            function selectAll()
                            {
                                options = document.getElementsByTagName("option");
                                for ( i=0; i<options.length; i++)
                                {
                                    options[i].selected = "true";
                                }
                            }

                                function GetSelectedItem(value) {
                                var option = document.getElementById(value);
                                var selectedop = option.options[option.selectedIndex].text;
                            }
                        </script>

                        <div class="form-group col-sm-10 ">
                            <label>العميل</label>
                            <br>
                            <select name="man_id" onchange="GetSelectedItem" id="man_id" multiple >

                                <option
                                    name="man_id[]" onclick="selectAll()"> الكل </option>
                                @foreach($clients as $client)
                                    <option id="man_id" name="man_id[]"
                                            value="{{$client->cal_id}}"> {{$client->cal_frist_name}}{{$client->cla_last_name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div>
                            <label>نص الإشعار</label>
                            <br>
                            <textarea name="notifi_content" class="form-group col-sm-10"
                                      placeholder="أدخل نص الإشعار"> </textarea>
                        </div>

                        <x-form.cancel-button indexPage="notifications"/>
                        <x-form.save-button/>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
