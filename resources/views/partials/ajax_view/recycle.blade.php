<table class="table">
    <thead>
        <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr>
            <td>{{ $loop->index +1}}</td>
            <td>{{ $member->name }}</td>
            <td>
                <a id="restore" href="{{ route('recycle.restore', $member->id) }}" ><span class="text-success"><i class="fa-solid fa-recycle"></i></span></a>
                <a id="forceDelete" href="{{ route('recycle.delete', $member->id) }}"><span class="text-danger px-2"><i class="fa-solid fa-trash-can text-danger"></i></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
