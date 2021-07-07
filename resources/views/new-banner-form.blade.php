@extends('adminLayout')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">
            <x-form.header-card title="إضافة بانر جديد"></x-form.header-card>

            <form action="/store-banner" method="post">
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
                        <x-form.photo-input name="medl_id" label="الصورة" ></x-form.photo-input>

                    @endif

                        <x-form.cancel-button indexPage="banners"></x-form.cancel-button>
                        <x-form.save-button></x-form.save-button>

                </div>
            </form>
        </div>
    </div>
@endsection

