@extends('adminLayout')

@section('content')
    <!-- form div -->
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة صورة قياسات جديدة" />
            <form action="/addManager" method="Post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                    <x-form.photo-input name="" label="صورة القياسات الجديد" />

                    <x-form.save-button/>
                    <x-form.cancel-button/>
                    <button class=" btn ml-1 " type="submit" style='float: left; background-color: #23923d;' > تعديل </button>

                </div>
            </form>
        </div>
    </div>
@endsection

