@extends('adminLayout')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة موقع تواصل إجتماعي جديد "></x-form.header-card>

            <form
{{--                  @if(isset($id))--}}
{{--                  action="/shipping-charge/{{$id}}/update"--}}
{{--                  @else--}}
                  action="/store-shipping-charge"
{{--                  @endif--}}
                  method="Post">


                @if(isset($id))

                    @if("shipping_charge/".$id."/update"==request()->path())
                        <?php
                        $ship_price = $currentValues->ship_price;

                        ?>
                    @endif
                @endif

                <div class="card-body fc-direction-rtl">
                    @csrf

                    <x-form.input name="ship_price" class="form-control" type="number"
                                  label=" تكلفة الشحن" placeholder="ادخل تكلفة الشحن"
                                  value="{{$ship_price ?? ''}}"></x-form.input>

                    <x-form.cancel-button indexPage="shipping_charge"></x-form.cancel-button>
                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
