@foreach ($book as $b)
<tr>
    <td>{{$b->book}}</td>
    <td>{{$b->code}}</td>
    <td>{{$b->author}}</td>
    <td>{{$b->category}}</td>
    <td>{{$b->seller}}</td>
    <td>{{$b->publisher}}</td>
    <td>{{$b->binding}}</td>
    <td>{{$b->language}}</td>
    <td>{{$b->page}}</td>
    <td>{{$b->stock}}</td>
    <td>{{$b->price}}</td>
    <td>{{$b->r_price}}</td>
    <td>{{$b->buy_price}}</td>
    <td>{{$b->discounted}}</td>
    <td>{{$b->created_at}}</td>
    <td><img src="{{$b->image}}" height="40px" width="auto"></td>
    <td>
        <a href="#" class="btn btn-success edit" data-id="{{$b->id}}" data-book="{{$b->book}}" data-code="{{$b->code}}" data-page="{{$b->page}}" data-binding="{{$b->binding}}" data-stock="{{$b->stock}}" data-language="{{$b->language}}" data-price="{{$b->price}}" data-r_price="{{$b->r_price}}" data-buy_price="{{$b->buy_price}}" data-author_id="{{$b->author_id}}" data-category_id="{{$b->category_id}}" data-seller_id="{{$b->seller_id}}" data-publish_id="{{$b->publish_id}}" data-discount="{{$b->discounted}}" data-about="{{$b->about}}" data-image="{{$b->image}}">Edit</a>
        <a href="#" class="btn btn-danger delete" data-id="{{$b->id}}">Delete</a>
    </td>
</tr>
    
@endforeach