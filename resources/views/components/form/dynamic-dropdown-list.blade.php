    <div class="form-group col-sm-10 ">
        <label>{{$label}}</label>
        <select  name="ManagerRole" onchange="{{$onchange}}">
            @foreach($all as $data)
                <option value="{{$data->fakeId}}"> {{$data->$name}} </option>
            @endforeach
        </select>
    </div>


