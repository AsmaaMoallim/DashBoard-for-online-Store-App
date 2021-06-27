@extends('layouts.admintemp')

@section('content')

    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <div class="card-header fc-direction-ltr">
                <h3 class="card-title fc-direction-rtl"> TestTitle </h3>
            </div>

            <!-- /.card-header End -->

            <!-- form start -->
            <form action="/addManager" method="Post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                    <x-test label="Test" :managers="$manager"/>

                </div>
            </form>
        </div>
    </div>
@endsection
