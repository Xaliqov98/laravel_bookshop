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

<!--/////////////////////////////////////////////////CATEGORY\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                                                <!--add modal-->
                                                <div class="modal fade" id="categoryadd" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Add New Category</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{URL::to('saveCategory')}}" id="addForm">
                                                                    <div class="mb-3">
                                                                        <label for="category">Category</label>
                                                                        <input type="text" name="category" class="form-control" placeholder="Input category">
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
                                                <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Edit Category</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{URL::to('updateCategory')}}" id="editForm">
                                                                    <input type="hidden" id="catid" name="id">
                                                                    <div class="mb-3">
                                                                        <label for="category">Category</label>
                                                                        <input type="text" name="category" id="category" class="form-control" >
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
                                                <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Delete Category</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <h4 class="text-center">Are you sure you want to delete Category?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" id="deletecategory" class="btn btn-danger">Delete</button>
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