@extends('adminLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        </div>
    <div class="col-lg-6 pr-xl-5">
        <div class=" card card-dark " style="background-color: silver ">

            <x-form.header-card title="إضافة قسم رئيسي جديد "></x-form.header-card>

            <form
                  @if(isset($id))
                  action="/main_Sections/{{$id}}/update"
                  @else
                  action="/store-main-section"
                  @endif
                  method="Post">
                <div class="card-body fc-direction-rtl">
                    @csrf
                    @if(isset($id))

                        @if("main_sections/".$id."/update"==request()->path())
                            <?php
                            $main_name = $currentValues->main_name;
                            $medl_img_ved = $currentforeignValues->medl_img_ved;


                            ?>
                        @endif
                    @endif
                    <x-form.input name="main_name" class="form-control" type="name"
                                  label="اسم القسم الرئيسي" placeholder="ادخل اسم القسم الجديد"
                                  value="{{$main_name ?? ''}}"></x-form.input>


                    @if(isset($id))


                        <div class="form-group col-sm-10">

                            <img src="{{$medl_img_ved}}">
                        </div>
                        <x-form.photo-input name="medl_id" label="الصورة" ></x-form.photo-input>

                    @else
                        <label class="pb-1">صورة القسم الرئيسي</label>

                        <div class="form-group col-sm-10 table-responsive " style="height: 300px;">
                            <table class="table-bordered">
                                <thead>
                                <tr>
                                    <th width="70%">الصورة</th>
                                    <th width="30%">اسم الصورة</th>
                                </tr>
                                </thead>
                                @foreach($data as $row)
                                    <tbody>
                                    <tr>
                                        <td> <input type="radio" name="medl_id" value="{{$row['medl_id']}}"> <img src="fetch_image/{{$row->medl_id}}" class="img-thumbnail" width="75" /> </td>
                                        <td>  {{$row->medl_name}} </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>

                    @endif


                    <x-form.cancel-button indexPage="main_sections"></x-form.cancel-button>
                    <x-form.save-button></x-form.save-button>

                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
