@extends('layouts.admintemp')

@section('content')

    <!-- form div -->
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">
            <div>
                <h3>Test Edit</h3>
            </div>

            <form action="/update" method="Post">
                <div class="card-body fc-direction-rtl">
                    @csrf

                    <input type="text" name="ManagerName" value="{{$data->ManagerName}}"  >
                    <br>
                    <input type="text" name="ManagerPhone" value="{{$data->ManagerPhone}}"  >
                    <br>
                    <input type="text" name="ManagerRole" value="{{$data->ManagerRole}}"  >
                    <br>
                    <input type="text" name="ManagerEmail" value="{{$data->ManagerEmail}}"  >
                    <br>
                    <input type="text" name="ManagerPassword" value="{{$data->ManagerPassword}}"  >

                    <x-form.save-button/>

                </div>
            </form>
        </div>
    </div>
@endsection

