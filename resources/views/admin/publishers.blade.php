@extends('admin.app')
@section('title')
    Publishers
@endsection
@section('content')
    <h1 class="page-header text-center">Jquery ajax crud</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>Publishes table
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#publisheradd" class="btn btn-primary pull-right">Add Publisher</button>
        </h2>

    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Publisher</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="publisherBody"></tbody>
        </table>
    </div>
</div>


<!--/////////////////////////////////////////////////Publisher\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                                            <!--add modal-->
                                            <div class="modal fade" id="publisheradd" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Add New Publisher</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{URL::to('savePublish')}}" id="publisheraddForm">
                                                                <div class="mb-3">
                                                                    <label for="publisher">Publisher</label>
                                                                    <input type="text" name="publisher" class="form-control" placeholder="Input Publisher">
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
                                            <div class="modal fade" id="publishereditmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Edit Publisher</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{URL::to('updatePublish')}}" id="publishereditForm">
                                                                <input type="hidden" id="pubid" name="id">
                                                                <div class="mb-3">
                                                                    <label for="publisher">Publisher</label>
                                                                    <input type="text" name="publisher" id="publisher" class="form-control" >
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
                                            <div class="modal fade" id="publisherdeletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Delete Publisher</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <h4 class="text-center">Are you sure you want to delete Publisher?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" id="deletepublisher" class="btn btn-danger">Delete</button>
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

            ShowPublisher();

            $('#publisheraddForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.ajax({
                    type:'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#publisheradd').modal('hide');
                        $('#publisheraddForm')[0].reset();
                        ShowPublisher();
                    }
                });
            });
            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                let publisher = $(this).data('publisher');
                $('#publishereditmodal').modal('show');
                $('#publisher').val(publisher);
                $('#pubid').val(id);
            });
            $('#publishereditForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.post(url,form,function(data){
                    $('#publishereditmodal').modal('hide');
                    ShowPublisher();
                })
            });
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                $('#publisherdeletemodal').modal('show');
                $('#deletepublisher').val(id);
            });
            $('#deletepublisher').click(function(){
                let id = $(this).val();
                $.post("{{URL::to('deletePublish')}}",{id:id}, function(){
                    $('#publisherdeletemodal').modal('hide');
                    ShowPublisher();
                })
            });
        });

        function ShowPublisher(){
            $.get("{{ URL::to('showPublish')}}",function(data){
            $('#publisherBody').empty().html(data);
            })
        }
    </script>
@endsection