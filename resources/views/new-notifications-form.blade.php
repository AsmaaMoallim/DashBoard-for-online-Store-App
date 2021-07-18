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
                            function toggle(source) {
                                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                for (var i = 0; i < checkboxes.length; i++) {
                                    if (checkboxes[i] != source)
                                        checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>

                        <div class="form-group col-sm-10 ">
                            <label>العميل</label>
                            <br>
                        @foreach($clients as $clients)
                            <?php $clienttt = $clients->cla_id?>

                                <input type="checkbox"  name="cla_id[]" id="cal_id" value="{{$clienttt}}">
                                {{$clients->cal_frist_name}}{{$clients->cla_last_name}}
                                    <br>
                            @endforeach

                            <input name="cla_id[]" type="checkbox"
                                   value="{{$clienttt}}"
                                   onclick="toggle(this);"/> الكل <br />
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
