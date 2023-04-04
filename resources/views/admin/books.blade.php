@extends('admin.app')
@section('title')
    Books
@endsection
@section('content')
    <h1 class="page-header text-center">Jquery ajax crud</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>Books table
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#bookadd" class="btn btn-primary pull-right">Add Book</button>
        </h2>

    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Book</th>
                <th scope="col">Code</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Seller</th>
                <th scope="col">Publisher</th>
                <th scope="col">Binding</th>
                <th scope="col">Lang</th>
                <th scope="col">Page</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Rent price</th>
                <th scope="col">Buy price</th>
                <th scope="col">Discount</th>
                <th scope="col">Created</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="bookBody"></tbody>
        </table>
    </div>
</div>

<!--/////////////////////////////////////////////////BOOK\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                                            <!--add modal-->
<div class="modal fade" id="bookadd" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add New Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('saveBook')}}" id="bookaddForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="book">Book</label>
                        <input type="text" name="book" class="form-control" placeholder="Input book">
                    </div>
                    <div class="mb-3">
                        <label for="code">Code</label>
                        <input type="text" name="code" class="form-control" placeholder="Input code">
                    </div>
                    <div class="mb-3">
                        <label for="page">Page</label>
                        <input type="text" name="page" class="form-control" placeholder="Input page count">
                    </div>
                    <div class="mb-3">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" class="form-control" placeholder="Input stock count">
                    </div>
                    <div class="mb-3">
                        <label for="discounted">Discount</label>
                        <input type="text" name="discounted" class="form-control" placeholder="Input discount">
                    </div>
                    <div class="mb-3">
                        <label for="binding">Binding</label>
                        <select name="binding" class="form-control">
                            <option value="">Select...</option>
                            <option value="soft">Soft</option>
                            <option value="paperback">Paperback</option>
                            <option value="hardcover">Hardcover</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="language">Language</label>
                        <select name="language" class="form-control">
                            <option value="">Select language...</option>
                            <option value="AZ">AZ</option>
                            <option value="TR">TR</option>
                            <option value="EN">EN</option>
                            <option value="RU">RU</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="author_id">Author</label>
                        <select class="form-control" name="author_id">
                            <option value="">Select author...</option>
                        @foreach ($autdata as $a)
                            <option value="{{$a->id}}">{{$a->author}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category_id">Category/genre</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select genre...</option>
                        @foreach ($catdata as $c)
                            <option value="{{$c->id}}">{{$c->category}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="publish_id">Publisher</label>
                        <select class="form-control" name="publish_id">
                            <option value="">Select publishing...</option>
                        @foreach ($pubdata as $p)
                            <option value="{{$p->id}}">{{$p->publisher}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="seller_id">Seller</label>
                        <select class="form-control" name="seller_id">
                            <option value="">Select seller name...</option>
                        @foreach ($seldata as $s)
                            <option value="{{$s->id}}">{{$s->seller}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" placeholder="Enter price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="r_price">Rent Price</label>
                        <input type="text" class="form-control" placeholder="Enter price" name="r_price">
                    </div>
                    <div class="mb-3">
                        <label for="buy_price">Buy Price</label>
                        <input type="text" class="form-control" placeholder="Enter price" name="buy_price">
                    </div>
                    <div class="mb-3">
                        <label for="about">About</label>
                        <textarea name="about" class="form-control" placeholder="Input about this book"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="image" class="form-control-file" >
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

                                            <!--edit modal-->
<div class="modal fade" id="bookeditmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{URL::to('updateBook')}}" id="bookeditForm" enctype="multipart/form-data">
                    <input type="hidden" id="bookid" name="id">
                    <div class="mb-3">
                        <label for="book">Book</label>
                        <input type="text" name="book" id="book" class="form-control" placeholder="Input book">
                    </div>
                    <div class="mb-3">
                        <label for="code">Code</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Input code">
                    </div>
                    <div class="mb-3">
                        <label for="page">Page</label>
                        <input type="text" name="page" id="page" class="form-control" placeholder="Input page count">
                    </div>
                    <div class="mb-3">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" id="stock" class="form-control" placeholder="Input stock count">
                    </div>
                    <div class="mb-3">
                        <label for="discounting">Discount</label>
                        <input type="text" name="discounting" id="discounting" class="form-control" placeholder="Input discount">
                    </div>
                    <div class="mb-3">
                        <label for="binding">Binding</label>
                        <select name="binding" id="binding" class="form-control">
                            <option value="">Select...</option>
                            <option value="soft">Soft</option>
                            <option value="paperback">Paperback</option>
                            <option value="hardcover">Hardcover</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="language">Language</label>
                        <select name="language" id="language" class="form-control">
                            <option value="">Select language...</option>
                            <option value="AZ">AZ</option>
                            <option value="TR">TR</option>
                            <option value="EN">EN</option>
                            <option value="RU">RU</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="author_id">Author</label>
                        <select class="form-control" name="author_id" id="author_id">
                        @foreach ($autdata as $a)
                            <option value="{{$a->id}}">{{$a->author}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category_id">Category/genre</label>
                        <select class="form-control" name="category_id" id="category_id">
                        @foreach ($catdata as $c)
                            <option value="{{$c->id}}">{{$c->category}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="publish_id">Publisher</label>
                        <select class="form-control" name="publish_id" id="publish_id">
                        @foreach ($pubdata as $p)
                            <option value="{{$p->id}}">{{$p->publisher}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="seller_id">Seller</label>
                        <select class="form-control" name="seller_id" id="seller_id">
                        @foreach ($seldata as $s)
                            <option value="{{$s->id}}">{{$s->seller}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" placeholder="Enter price" name="price" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="r_price">Rent Price</label>
                        <input type="text" class="form-control" placeholder="Enter price" name="r_price" id="r_price">
                    </div>
                    <div class="mb-3">
                        <label for="buy_price">Buy Price</label>
                        <input type="text" class="form-control" placeholder="Enter price" name="buy_price" id="buy_price">
                    </div>
                    <div class="mb-3">
                        <label for="about">About</label>
                        <textarea name="about" id="about" class="form-control" ></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="image" id="image" class="form-control-file" >
                        <img id="img" src="" height="50px" width="auto">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

                                        <!--delete modal-->
<div class="modal fade" id="bookdeletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Are you sure you want to delete Book?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="deletebook" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            ShowBook();

            $('#bookaddForm').on('submit', function(e){
                e.preventDefault();
                
                let url = $(this).attr('action');
                $.ajax({
                    type:'POST',
                    url: url,
                    data: new FormData(this),          
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(){
                    $('#bookaddForm')[0].reset();
                    $('#bookadd').modal('hide');
                        ShowBook();
                        
                    }
                });
            });
            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                let book = $(this).data('book');
                let code = $(this).data('code');
                let page = $(this).data('page');
                let stock = $(this).data('stock');
                let binding = $(this).data('binding');
                let language = $(this).data('language');
                let discount = $(this).data('discount');
                let price = $(this).data('price');
                let r_price = $(this).data('r_price');
                let buy_price = $(this).data('buy_price');
                let author_id = $(this).data('author_id');
                let category_id = $(this).data('category_id');
                let seller_id = $(this).data('seller_id');
                let publish_id = $(this).data('publish_id');
                let created_at = $(this).data('created_at');
                let about = $(this).data('about');
                let image = $(this).data('image');
                $('#bookeditmodal').modal('show');
                $('#book').val(book);
                $('#code').val(code);
                $('#page').val(page);
                $('#stock').val(stock);
                $('#binding').val(binding);
                $('#language').val(language);
                $('#discount').val(discount);
                $('#price').val(price);
                $('#r_price').val(r_price);
                $('#buy_price').val(buy_price);
                $('#author_id').val(author_id);
                $('#category_id').val(category_id);
                $('#seller_id').val(seller_id);
                $('#publish_id').val(publish_id);
                $('#created_at').val(created_at);
                $('#about').val(about);
                $('#img').attr('src', image);
                $('#bookid').val(id);
            });
            $('#bookeditForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.post(url,form,function(data){
                    $('#bookeditForm')[0].reset();
                    $('#bookeditmodal').modal('hide');
                    ShowBook();
                })
            });
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                $('#bookdeletemodal').modal('show');
                $('#deletebook').val(id);
            });
            $('#deletebook').click(function(){
                let id = $(this).val();
                $.post("{{URL::to('deleteBook')}}",{id:id}, function(){
                    
                    ShowBook();
                })
                $('#bookdeletemodal').modal('hide');
            });
        });

        function ShowBook(){
            $.get("{{ URL::to('showBook')}}",function(data){
            $('#bookBody').empty().html(data);
            })
        }
    </script>
@endsection