@extends('admin.app')
@section('title')
    Sellers
@endsection
@section('content')
    <h1 class="page-header text-center"></h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>Sellers table
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#selleradd" class="btn btn-primary pull-right">Add Seller</button>
        </h2>

    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Seller</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Debt</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="sellerBody"></tbody>
        </table>
    </div>
</div>


<!--/////////////////////////////////////////////////Seller\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                                            <!--add modal-->
                                            <div class="modal fade" id="selleradd" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Add New Seller</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{URL::to('saveSeller')}}" id="selleraddForm">
                                                                <div class="mb-3">
                                                                    <label for="seller">Seller</label>
                                                                    <input type="text" name="seller" class="form-control" placeholder="Input seller">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="text" name="phone" class="form-control" placeholder="Input phone number">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email">E-mail</label>
                                                                    <input type="mail" name="email" class="form-control" placeholder="Input email">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="debt">debt</label>
                                                                    <input type="text" name="debt" class="form-control" value="0">
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
                                            <div class="modal fade" id="sellereditmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Edit Seller</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{URL::to('updateSeller')}}" id="sellereditForm">
                                                                <input type="hidden" id="selid" name="id">
                                                                <div class="mb-3">
                                                                    <label for="seller">Seller</label>
                                                                    <input type="text" name="seller" id="seller" class="form-control" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="text" name="phone" id="phone" class="form-control" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email">E-mail</label>
                                                                    <input type="mail" name="email" id="email" class="form-control" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="debt">debt</label>
                                                                    <input type="text" name="debt" id="debt" class="form-control">
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
                                            <div class="modal fade" id="sellerdeletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Delete Seller</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <h4 class="text-center">Are you sure you want to delete Seller?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" id="deleteseller" class="btn btn-danger">Delete</button>
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

            ShowSeller();

            $('#selleraddForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.ajax({
                    type:'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#selleradd').modal('hide');
                        $('#selleraddForm')[0].reset();
                        ShowSeller();
                    }
                });
            });
            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                let seller = $(this).data('seller');
                let phone = $(this).data('phone');
                let email = $(this).data('email');
                let debt = $(this).data('debt');
                $('#sellereditmodal').modal('show');
                $('#seller').val(seller);
                $('#phone').val(phone);
                $('#email').val(email);
                $('#debt').val(debt);
                $('#selid').val(id);
            });
            $('#sellereditForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.post(url,form,function(data){
                    $('#sellereditmodal').modal('hide');
                    ShowSeller();
                })
            });
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                $('#sellerdeletemodal').modal('show');
                $('#deleteseller').val(id);
            });
            $('#deleteseller').click(function(){
                let id = $(this).val();
                $.post("{{URL::to('deleteSeller')}}",{id:id}, function(){
                    $('#sellerdeletemodal').modal('hide');
                    ShowSeller();
                })
            });
        });

        function ShowSeller(){
            $.get("{{ URL::to('showSeller')}}",function(data){
            $('#sellerBody').empty().html(data);
            })
        }
    </script>
@endsection