@foreach ($seller as $s)
<tr>
    <td>{{$s->seller}}</td>
    <td>{{$s->phone}}</td>
    <td>{{$s->email}}</td>
    <td>{{$s->debt}}</td>
    <td>
        <a href="#" class="btn btn-success edit" data-id="{{$s->id}}" data-seller="{{$s->seller}}" data-phone="{{$s->phone}}" data-email="{{$s->email}}" data-debt="{{$s->debt}}">Edit</a>
        <a href="#" class="btn btn-danger delete" data-id="{{$s->id}}">Delete</a>
    </td>
</tr>
    
@endforeach