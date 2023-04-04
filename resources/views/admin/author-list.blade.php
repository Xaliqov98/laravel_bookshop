@foreach ($author as $a)
<tr>
    <td>{{$a->author}}</td>
    <td>{{$a->about}}</td>
    <td><img src="{{$a->image}}" height="40px" width="auto"></td>
    <td>
        <a href="#" class="btn btn-success edit" data-id="{{$a->id}}" data-author="{{$a->author}}" data-about="{{$a->about}}" data-image="{{$a->image}}">Edit</a>
        <a href="#" class="btn btn-danger delete" data-id="{{$a->id}}">Delete</a>
    </td>
</tr>
    
@endforeach