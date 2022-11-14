

<div class="col-md-12 m-3">
 <form id="mealAddStore" method="POST" action="{{ route('meal.add.store') }}" enctype="multipart/form-data">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                    <td>Select All <input type="checkbox" class="check" id="checkAll" ></td>
                </tr>
            </thead>
            <tbody>
                {{-- <input type="hidden" name="date" value="{{ date('Y-m-d') }}" checked> --}}
                @foreach ($all_names as $names)
                    <tr>
                        <th scope="row"> {{ $names->name }} </th>
                        <td>
                            <input type="hidden" name="member_id[]" value="{{ $names->id }}" checked>
                            <input type="checkbox" name="breakfast[]" class="check">
                        </td>
                        <td>
                            <input type="checkbox" name="lunch[]" class="check">
                        </td>
                        <td>
                            <input type="checkbox" name="dinner[]" class="check">

                        </td>
                        <td> <input type="checkbox" class="check" ></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary rounded w-md mt-3">Send</button>
    </form>
</div>

{{-- <div class="col-md-4 m-3">
    <form id="mealAddStore" method="POST" action="{{ route('meal.add.store') }}" enctype="multipart/form-data">
        @csrf
        <h4 class="mb-4">Add New Meal</h4>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <select name="member_id" class="form-control text-dard rounded-0 bg-transparent" id="partReload" required>
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
</div> --}}
<div class="col-md-12 background-table rounded p-3 w-100">
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered meals_datatable w-100">
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
                </table>
            </div>
        </div>
    </div>
</div>

