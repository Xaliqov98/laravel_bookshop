@extends('admin.app')
@section('title')
    Authors
@endsection
@section('content')
    <h1 class="page-header text-center">Jquery ajax crud</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>Authors table
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#authoradd" class="btn btn-primary pull-right">Add Author</button>
        </h2>

    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Author</th>
                <th scope="col">About</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="authorBody"></tbody>
        </table>
    </div>
</div>


<!--/////////////////////////////////////////////////AUTHOR\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                                                <!--add modal-->
                                                <div class="modal fade" id="authoradd" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Add New Author</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{URL::to('saveAuthor')}}" id="authoraddForm" enctype="multipart/form-data">
                                                                    <div class="mb-3">
                                                                        <label for="author">Author</label>
                                                                        <input type="text" name="author" class="form-control" placeholder="Input author">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="about">About</label>
                                                                        <textarea name="about" class="form-control" placeholder="Input about her/him"></textarea>
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
                                                <div class="modal fade" id="authoreditmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Edit Author</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{URL::to('updateAuthor')}}" id="authoreditForm" enctype="multipart/form-data">
                                                                    <input type="hidden" id="autid" name="id">
                                                                    <div class="mb-3">
                                                                        <label for="author">Author</label>
                                                                        <input type="text" name="author" id="author" class="form-control" >
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="about">About</label>
                                                                        <textarea name="about" id="about" class="form-control" placeholder="Input about her/him"></textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="image">Image</label>
                                                                        <input type="file" name="image" id="image" class="form-control-file" required="">
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
                                                <div class="modal fade" id="authordeletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Delete Author</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <h4 class="text-center">Are you sure you want to delete Author?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" id="deleteauthor" class="btn btn-danger">Delete</button>
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

            ShowAuthor();

            $('#authoraddForm').on('submit', function(e){
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
                    $('#authoraddForm')[0].reset();
                    $('#authoradd').modal('hide');
                        ShowAuthor();
                        
                    }
                });
            });
            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                let author = $(this).data('author');
                let about = $(this).data('about');
                let image = $(this).data('image');
                $('#authoreditmodal').modal('show');
                $('#author').val(author);
                $('#about').val(about);
                $('#img').attr('src', image);
                $('#autid').val(id);
            });
            $('#authoreditForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.post(url,form,function(data){
                    $('#authoreditForm')[0].reset();
                    $('#authoreditmodal').modal('hide');
                    ShowAuthor();
                })
            });
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                $('#authordeletemodal').modal('show');
                $('#deleteauthor').val(id);
            });
            $('#deleteauthor').click(function(){
                let id = $(this).val();
                $.post("{{URL::to('deleteAuthor')}}",{id:id}, function(){
                    
                    ShowAuthor();
                })
                $('#authordeletemodal').modal('hide');
            });
        });

        function ShowAuthor(){
            $.get("{{ URL::to('showAuthor')}}",function(data){
            $('#authorBody').empty().html(data);
            })
        }
    </script>
@endsection