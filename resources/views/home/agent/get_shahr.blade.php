<option  value="" >شهر را انتخاب کنید </option>
@foreach($ostan->shahrs as $sha)
    <option  value="{{$sha->id}}">{{$sha->name}}</option>
@endforeach
