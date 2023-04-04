@foreach ($expense as $e)
<tr>
    <td>{{$e->expense}}</td>
    <td>{{$e->exp_price}}</td>
    <td>
        <a href="#" class="btn btn-success edit" data-id="{{$e->id}}" data-expense="{{$e->expense}}" data-exp_price="{{$e->exp_price}}">Edit</a>
        <a href="#" class="btn btn-danger delete" data-id="{{$e->id}}">Delete</a>
    </td>
</tr>
    
@endforeach