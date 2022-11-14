

{{-- <div class="col-md-4 m-3">
    <form id="depositeStore" method="POST" action="{{ route('deposite.store') }}" enctype="multipart/form-data">
        @csrf
        <h4 class="mb-4">Add Deposite</h4>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <label>Name</label>
                <select name="member_id" class="form-control text-dard rounded-0 bg-transparent" required>
                    <option value=""> >>--Select One--<< </option>
                    @foreach ($all_names as $all_name)
                        <option value="{{ $all_name->id }}">{{ $all_name->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12">
                <label>Amount</label>
                <input type="number" class="form-control rounded-0 bg-transparent" name="amount"
                    placeholder="Amount">
            </div>
            <div class="form-group col-sm-12">
                <label>Date</label>
                <input type="date" class="form-control rounded-0 bg-transparent" name="date"
                    value="{{ date('Y-m-d') }}" placeholder="Date">
            </div>
            <div class="form-group col-12 mb-0">
                <button type="submit" class="btn btn-primary rounded w-md mt-3">Send</button>
            </div>
        </div>
    </form>
</div> --}}
<div class="col-md-12 rounded p-3 w-100">
    <h5 class="text-center mt-2">Add New Deposit</h5>
    <div class="btn-box justify-content-end d-flex p-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newDeposite">Add New</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table-bordered deposite_datatable w-100">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" style="text-align:right">Total : </th>
                            <th style="text-align:right"> </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="newDeposite" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Deposite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="depositeStore" method="POST" action="{{ route('deposite.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Name</label>
                            <select name="member_id" class="form-control text-dard rounded-0 bg-transparent" required>
                                <option value=""> >>--Select One--<< </option>
                                @foreach ($all_names as $all_name)
                                    <option value="{{ $all_name->id }}">{{ $all_name->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Amount</label>
                            <input type="number" class="form-control rounded-0 bg-transparent" name="amount"
                                placeholder="Amount">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Date</label>
                            <input type="date" class="form-control rounded-0 bg-transparent" name="date"
                                value="{{ date('Y-m-d') }}" placeholder="Date">
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
