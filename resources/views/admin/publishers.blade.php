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