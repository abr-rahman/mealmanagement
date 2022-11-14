{{-- <div class="col-md-4 m-3">
    <form id="new_member">
        <h4 class="mb-4">Add New Member</h4>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <input type="text" class="form-control text-white rounded-0 bg-transparent" name="name"
                    placeholder="Name">
            </div>
            <div class="form-group col-sm-12">
                <input type="email" class="form-control text-white rounded-0 bg-transparent" name="email"
                    placeholder="Email">
            </div>
            <div class="form-group col-sm-12">
                <input type="phone" class="form-control text-white rounded-0 bg-transparent" name="phone"
                    placeholder="Phone">
            </div>
            <div class="form-group col-12">
                <textarea name="address" id="" cols="30" rows="1"
                    class="form-control text-white rounded-0 bg-transparent" placeholder="Address"></textarea>
            </div>
            <div class="form-group col-12 mb-0">
                <button type="submit" class="btn  btn-primary rounded w-md mt-3" id="saveBtn">Save</button>
            </div>
        </div>
    </form>
</div> --}}
<div class="col-md-12 rounded p-3 w-100">
    <h5 class="text-center mt-2">Add New Member</h5>
    <div class="btn-box justify-content-end d-flex p-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newMemberModal">Add New</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered user_datatable w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="newMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="new_member">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control text-white rounded-0 bg-transparent" name="name"
                                    placeholder="Name">
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="email" class="form-control text-white rounded-0 bg-transparent" name="email"
                                    placeholder="Email">
                            </div>
                            <div class="form-group col-sm-12">
                                <input type="phone" class="form-control text-white rounded-0 bg-transparent" name="phone"
                                    placeholder="Phone">
                            </div>
                            <div class="form-group col-12">
                                <textarea name="address" id="" cols="30" rows="1"
                                    class="form-control text-white rounded-0 bg-transparent" placeholder="Address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<form id="deleted_form" action="" method="post">
    @csrf
    {{-- @method('DELETE') --}}
</form>
