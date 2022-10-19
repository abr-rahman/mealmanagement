<div class="col-md-4 m-3">
    <form id="mealAddStore" method="POST" action="{{ route('meal.add.store') }}" enctype="multipart/form-data">
        @csrf
    {{-- <form method="POST" id="" enctype="multipart/form-data"> --}}
        <h4 class="mb-4">Add New Meal</h4>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <select name="name" class="form-control text-dard rounded-0 bg-transparent" required>
                    <option value=""> >>--Select One--<< </option>
                    @foreach ($all_names as $all_name)
                    <option value="{{ $all_name->id }}">{{ $all_name->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12">
                <input type="number" class="form-control rounded-0 bg-transparent" name="breakfast"
                    placeholder="Breakfast">
            </div>
            <div class="form-group col-sm-12">
                <input type="number" class="form-control rounded-0 bg-transparent" name="lunch"
                    placeholder="Lunch">
            </div>
            <div class="form-group col-sm-12">
                <input type="number" class="form-control rounded-0 bg-transparent" name="dinner"
                    placeholder="Dinner">
            </div>
            <div class="form-group col-sm-12">
                <input type="date" class="form-control rounded-0 bg-transparent" name="date"
                    value="{{ date('Y-m-d') }}" placeholder="date">
            </div>

            <div class="form-group col-12 mb-0">
                <button type="submit" class="btn btn-primary rounded w-md mt-3">Send</button>
            </div>
        </div>
    </form>

    <!-- edit Modal -->
    {{-- $html .= '<a href=" '. route('meal.edit', [$row->id]). ' " id="edit"  data-toggle="modal" data-target="#editModalCenter" class="action-btn" title="Edit">Edit</a>'; --}}

    <div class="modal fade editModal" id="editModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit New Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control text-white rounded-0 bg-transparent"
                                name="name" placeholder="Name" value="">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="email" class="form-control text-white rounded-0 bg-transparent"
                                name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="phone" class="form-control text-white rounded-0 bg-transparent"
                                name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group col-6">
                            <textarea name="address" id="" cols="30" rows="1"
                                class="form-control text-white rounded-0 bg-transparent" placeholder="Address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="col-md-8 table_color rounded p-3">
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered meals_datatable">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Break.</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <p>Total Today Meals: </p>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
