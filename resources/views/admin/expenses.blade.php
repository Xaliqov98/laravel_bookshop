@extends('admin.app')
@section('title')
    Expenses
@endsection
@section('content')
    <h1 class="page-header text-center">Jquery ajax crud</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>Expenses table
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#expenseadd" class="btn btn-primary pull-right">Add Expense</button>
        </h2>

    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Expense</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="expenseBody"></tbody>
        </table>
    </div>
</div>



<!--/////////////////////////////////////////////////Expense\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                                            <!--add modal-->
                                            <div class="modal fade" id="expenseadd" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Add New Expense</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{URL::to('saveExpense')}}" id="expenseaddForm">
                                                                <div class="mb-3">
                                                                    <label for="expense">Expense</label>
                                                                    <input type="text" name="expense" class="form-control" placeholder="Input Expense">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exp_price">Price</label>
                                                                    <input type="text" name="exp_price" class="form-control"  placeholder="Input Price">
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
                                            <div class="modal fade" id="expenseeditmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Edit Expense</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{URL::to('updateExpense')}}" id="expenseeditForm">
                                                                <input type="hidden" id="expid" name="id">
                                                                <div class="mb-3">
                                                                    <label for="expense">Expense</label>
                                                                    <input type="text" name="expense" id="expense" class="form-control" >
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exp_price">Price</label>
                                                                    <input type="text" name="exp_price" id="exp_price" class="form-control" >
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
                                            <div class="modal fade" id="expensedeletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Delete Expense</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <h4 class="text-center">Are you sure you want to delete Expense?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" id="deleteexpense" class="btn btn-danger">Delete</button>
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

            ShowExpense();

            $('#expenseaddForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.ajax({
                    type:'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#expenseadd').modal('hide');
                        $('#expenseaddForm')[0].reset();
                        ShowExpense();
                    }
                });
            });
            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                let expense = $(this).data('expense');
                let exp_price = $(this).data('exp_price');
                $('#expenseeditmodal').modal('show');
                $('#expense').val(expense);
                $('#exp_price').val(exp_price);
                $('#expid').val(id);
            });
            $('#expenseeditForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                $.post(url,form,function(data){
                    $('#expenseeditmodal').modal('hide');
                    ShowExpense();
                })
            });
            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                $('#expensedeletemodal').modal('show');
                $('#deleteexpense').val(id);
            });
            $('#deleteexpense').click(function(){
                let id = $(this).val();
                $.post("{{URL::to('deleteExpense')}}",{id:id}, function(){
                    $('#expensedeletemodal').modal('hide');
                    ShowExpense();
                })
            });
        });

        function ShowExpense(){
            $.get("{{ URL::to('showExpense')}}",function(data){
            $('#expenseBody').empty().html(data);
            })
        }
    </script>
@endsection