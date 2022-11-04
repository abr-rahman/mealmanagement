<form id="marketFormUpdate" action="{{ route('market.update', $market->id) }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-sm-12 d-flex">
            <div class="col-3">
                <label for="">Name</label>
            </div>
            <select name="member_id" class="form-control text-dard rounded-0 bg-transparent" required>
                <option> >>--Select One--<< </option>
                @foreach ($members as $key => $member)
                    <option value="{{ $member->id }}" {{ $selectedRole == $member->id ? 'selected="selected"' : '' }} >{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">Amount</label>
                </div>
                    <input type="number" class="text-center text-center" name="amount" width="40"
                        placeholder="Amount"  value="{{ $market->amount }}">
            </div>
            <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">Form Date</label>
                </div>
                <input type="date" class="text-center" name="formDate" value="{{ $market->formDate }}"
                    value="{{ date('Y-m-d') }}" placeholder="Form Date">
            </div>
            <div class="form-group col-sm-12 d-flex">
                <div class="col-3">
                    <label for="">To Date</label>
                </div>
                <input type="date" class="text-center" name="toDate" value="{{ $market->toDate }}"
                    placeholder="To Date">
            </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
