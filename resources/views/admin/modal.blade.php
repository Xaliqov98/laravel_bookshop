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
                                            