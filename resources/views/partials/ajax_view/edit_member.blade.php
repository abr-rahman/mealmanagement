<form id="memberFormUpdate" action="{{ route('member.update', $newmember->id) }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-sm-6">
            <select name="name" class="form-control text-dard rounded-0 bg-transparent" required>
                <option> >>--Select One--<< </option>
                @foreach ($members as $member)
                    <option>{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-6">
            <input type="email" class="form-control text-white rounded-0 bg-transparent" name="email" placeholder="Email" value="{{ $newmember->email }}">
        </div>

        <div class="form-group col-sm-6">
            <input type="phone" class="form-control text-white rounded-0 bg-transparent" name="phone" placeholder="Phone" value="{{ $newmember->phone }}">
        </div>

        <div class="form-group col-6">
            <input type="text" class="form-control text-white rounded-0 bg-transparent" name="address" placeholder="Address" value="{{ $newmember->address }}">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
