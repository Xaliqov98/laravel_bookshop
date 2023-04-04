@foreach ($publisher as $p)
<tr>
    <td>{{$p->publisher}}</td>
    <td>
        <a href="#" class="btn btn-success edit" data-id="{{$p->id}}" data-publisher="{{$p->publisher}}">Edit</a>
        <a href="#" class="btn btn-danger delete" data-id="{{$p->id}}">Delete</a>
    </td>
</tr>
    
@endforeach