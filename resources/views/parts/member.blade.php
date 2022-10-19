<div class="col-md-4 m-3">
    {{-- <form action="{{ route('meal.store') }}" method="post" enctype="multipart/form-data"> --}}
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
    <!-- edit Modal -->
</div>
<div class="col-md-6 table_color rounded p-3">
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered user_datatable">
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
</div>
