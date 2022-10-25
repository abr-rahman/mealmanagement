<form id="mealFormUpdate" action="{{ route('meal.update', $newmember->id) }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-sm-12 d-flex">
            <div class="col-3">
                <label for="">Name</label>
            </div>
            <select name="name" class="form-control text-dard rounded-0 bg-transparent" required>
                <option> >>--Select One--<< </option>
                @foreach ($members as $member)
                    <option>{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">Breakfast</label>
                </div>
                    <input type="number" class="text-center text-center" name="breakfast" width="40"
                        placeholder="Breakfast"  value="{{ $newmember->breakfast }}">
            </div>
            <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">Lunch</label>
                </div>
                <input type="number" class="text-center" name="lunch" value="{{ $newmember->lunch }}"
                    placeholder="Lunch">
            </div>
            <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">Dinner</label>
                </div>
                <input type="number" class="text-center" name="dinner" value="{{ $newmember->dinner }}"
                    placeholder="Dinner">
            </div>
            <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">Date</label>
                </div>
                <input type="date" class="text-center" name="date" value="{{ $newmember->date }}"
                    value="{{ date('Y-m-d') }}" placeholder="date">
            </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
