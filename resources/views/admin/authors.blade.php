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