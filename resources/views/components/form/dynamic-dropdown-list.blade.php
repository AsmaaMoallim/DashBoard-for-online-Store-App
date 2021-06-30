    <div class="form-group col-sm-10 ">
        <label>{{$label}}</label>
        <select  name="ManagerRole" onchange="{{$onchange}}">
            @foreach($mainSections as $mainSection)
                <option value="{{$mainSection->id}}"> {{$mainSection->name}} </option>
            @endforeach
        </select>
    </div>


