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