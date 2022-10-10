<select name = "" id="">
    @foreach($data as $row)
    <option value={{$row->name}}</option>
    @endforeach
</select>