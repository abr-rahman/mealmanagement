<form id="depositeFormUpdate" action="{{ route('deposite.update', $deposite->id) }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-sm-12 d-flex">
            <div class="col-3">
                <label for="">Name</label>
            </div>
            <select name="member_id" class="form-control text-dard rounded-0 bg-transparent" required>
                <option> >>--Select One--<< </option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">Amount</label>
                </div>
                    <input type="number" class="text-center text-center" name="amount"
                        placeholder="Amount"  value="{{ $deposite->amount }}">
            </div>
            <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">Date</label>
                </div>
                <input type="date" class="text-center" name="date" value="{{ $deposite->date }}"
                    placeholder="Date">
            </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
