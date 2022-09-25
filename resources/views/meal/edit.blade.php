@extends('layout.dashboard')

@section('content')

    <div class="row my_style align-items-center new rounded">
        <div class="col-md-4 m-3">
            <form method="POST" action="{{ route('meal.store') }}" enctype="multipart/form-data">
                @csrf
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
                            class="form-control text-white mt-4 rounded-0 bg-transparent" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group col-12 mb-0">
                        <button type="submit" class="btn btn-primary rounded w-md mt-3">Send</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
