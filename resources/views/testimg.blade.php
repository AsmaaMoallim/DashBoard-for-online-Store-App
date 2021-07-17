@extends('adminLayout')

@section('content')

    @if("products/insertimg"==request()->path())

        <div class="col-lg-6 pr-xl-5">
            <div class=" card card-dark " style="background-color: silver ">

                <img
                    src="{{asset('https://www.google.com.sa/search?q=image&hl=ar&sxsrf=ALeKk02n8S-cImHfxgef7xpqQh8RnaKQ5w:1626279050249&tbm=isch&source=iu&ictx=1&fir=2DNOEjVi-CBaYM%252CAOz9-XMe1ixZJM%252C_&vet=1&usg=AI4_-kTdHq7xJp3YrXSxF61zau2vMj8IrA&sa=X&ved=2ahUKEwiRw-HI-eLxAhVBt6QKHdQWAOUQ9QF6BAgHEAE#imgrc=2DNOEjVi-CBaYM')}}"
                    alt="image">
            </div>
            <form
                method="post"
                action="/products/{{20}}/img"
                enctype="multipart/form-data">
                @csrf

                <div class="col-lg-6 pr-xl-5">

                    <div class=" card card-dark">

                        <input type="file" name="im" class="float-left">
                        <br>
                        <br>
                        <br>
                        <button type="submit"> here</button>


                    </div>
                </div>

            </form>
        </div>
    @else
        <div class="col-lg-6 pr-xl-5">
            <div class=" card card-dark " style="background-color: silver ">

                <img
                    src="https://www.google.com.sa/search?q=image&hl=ar&sxsrf=ALeKk02n8S-cImHfxgef7xpqQh8RnaKQ5w:1626279050249&tbm=isch&source=iu&ictx=1&fir=2DNOEjVi-CBaYM%252CAOz9-XMe1ixZJM%252C_&vet=1&usg=AI4_-kTdHq7xJp3YrXSxF61zau2vMj8IrA&sa=X&ved=2ahUKEwiRw-HI-eLxAhVBt6QKHdQWAOUQ9QF6BAgHEAE#imgrc=2DNOEjVi-CBaYM"
                    alt="image">
            </div>
        </div>
    @endif
@endsection
