<div class="col-md-4 m-3">
    <form id="mealAddStore" method="POST" action="{{ route('meal.add.store') }}" enctype="multipart/form-data">
        @csrf
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
                        <tr>
                            <th id="total_meal">Total Meal</th>
                        </tr>
                        <p>Total Today Meals: </p>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
