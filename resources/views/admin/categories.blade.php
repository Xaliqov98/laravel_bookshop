@extends('admin.app')
@section('title')
    Genres
@endsection
@section('content')
    <h1 class="page-header text-center">Jquery ajax crud</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>Categories table
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#categoryadd" class="btn btn-primary pull-right">Add Category</button>
        </h2>

    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="categoryBody"></tbody>
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

            ShowCategory();

            $('#addForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.ajax({
                    type:'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#categoryadd').modal('hide');
                        $('#addForm')[0].reset();
                        ShowCategory();
                    }
                });
            });
            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                let category = $(this).data('category');
                $('#editmodal').modal('show');
                $('#category').val(category);
                $('#catid').val(id);
            });
            $('#editForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.post(url,form,function(data){
                    $('#editmodal').modal('hide');
                    ShowCategory();
                })
            });
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                $('#deletemodal').modal('show');
                $('#deletecategory').val(id);
            });
            $('#deletecategory').click(function(){
                let id = $(this).val();
                $.post("{{URL::to('deleteCategory')}}",{id:id}, function(){
                    $('#deletemodal').modal('hide');
                    ShowCategory();
                })
            });
        });

        function ShowCategory(){
            $.get("{{ URL::to('showCategory')}}",function(data){
            $('#categoryBody').empty().html(data);
            })
        }
    </script>
@endsection