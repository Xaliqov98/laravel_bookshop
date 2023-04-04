@foreach ($category as $c)
<tr>
    <td>{{$c->category}}</td>
    <td>
        <a href="#" class="btn btn-success edit" data-id="{{$c->id}}" data-category="{{$c->category}}">Edit</a>
        <a href="#" class="btn btn-danger delete" data-id="{{$c->id}}">Delete</a>
    </td>
</tr>
    
@endforeach