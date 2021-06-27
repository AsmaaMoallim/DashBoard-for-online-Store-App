    <div class="form-group col-sm-10 ">
        <label>{{$label}}</label>
        <select  name="ManagerRole" onchange="{{$onchange}}">
            @foreach($managers as $manager)
                <option value="{{$manager->ManagerName}}"> {{$manager->ManagerName}} </option>
            @endforeach
        </select>
    </div>


