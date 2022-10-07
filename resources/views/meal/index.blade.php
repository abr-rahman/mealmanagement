@extends('layout.dashboard')

@section('content')
    <h6 class="section-title text-center">Our Meal Management System</h6>
    <h6 class="section-subtitle mb-5 text-center">New stunning projects for our amazing clients</h6>
    <div class="filters">
        <a href="#" data-filter=".new" class="active">
            New
        </a>
        <a href="#" data-filter=".meal">
            Meal
        </a>
        <a href="#" data-filter=".market">
            Market
        </a>
        <a href="#" data-filter=".deposit">
            Deposit
        </a>
        <a href="#" data-filter=".details">
            Details
        </a>
    </div>
    <div class="portfolio-container">

        <div class="row my_style align-items-center new rounded">
            <div class="col-md-4 m-3">
                {{-- <form id="newMemberForm" action="{{ route('meal.store') }}" method="post" enctype="multipart/form-data"> --}}
                <form id="newMemberForm" name="newMemberForm" enctype="multipart/form-data">
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
                            <button type="submit" class="btn  btn-primary rounded w-md mt-3" id="saveBtn">Save</button>
                        </div>
                    </div>
                </form>

                <!-- edit Modal -->
                <div class="modal fade editModal" id="editModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" id="edit-content" role="document">
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
            <div class="col-md-6 table_color rounded p-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered user_datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my_style align-items-center meal rounded">
            <div class="col-md-4 m-3">
                <form method="POST" action="{{ route('meal.add') }}" enctype="multipart/form-data">
                    @csrf
                    <h4 class="mb-4">Add New Meal</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <select name="name" class="form-control text-dard rounded-0 bg-transparent" required>
                                <option value="">>--Select One--<< </option>
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
                <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog"
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
        </div>
        <div class="row my_style align-items-center market rounded">
            <div class="col-md-4 m-3">
                <form method="POST" action="{{ route('meal.market') }}" enctype="multipart/form-data">
                    @csrf
                    <h4 class="mb-4">Add New Meal</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Name</label>
                            <select name="name" class="form-control text-dard rounded-0 bg-transparent" required>
                                <option value="">>--Select One--<< /option>
                                        @foreach ($all_names as $all_name)
                                <option value="{{ $all_name->id }}">{{ $all_name->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Taka</label>
                            <input type="number" class="form-control rounded-0 bg-transparent" name="amount"
                                placeholder="Amount">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Form Date</label>
                            <input type="date" class="form-control rounded-0 bg-transparent" name="formDate"
                                value="{{ date('Y-m-d') }}" placeholder="Form Date">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>To Date</label>
                            <input type="date" class="form-control rounded-0 bg-transparent" name="toDate"
                                placeholder="To Date">
                        </div>

                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-primary rounded w-md mt-3">Send</button>
                        </div>
                    </div>
                </form>
                <!-- edit Modal -->
                <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog"
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
                            <table class="table table-bordered market_datatable">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Taka</th>
                                        <th>F.Date</th>
                                        <th>T.Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                            <p>Total Today Market: </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my_style align-items-center deposit rounded">
            <div class="col-md-4 m-3">
                <form method="POST" action="{{ route('meal.market') }}" enctype="multipart/form-data">
                    @csrf
                    <h4 class="mb-4">Add New Meal</h4>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Name</label>
                            <select name="name" class="form-control text-dard rounded-0 bg-transparent" required>
                                <option value="">>--Select One--<< /option>
                                        @foreach ($all_names as $all_name)
                                <option value="{{ $all_name->id }}">{{ $all_name->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Taka</label>
                            <input type="number" class="form-control rounded-0 bg-transparent" name="amount"
                                placeholder="Amount">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Form Date</label>
                            <input type="date" class="form-control rounded-0 bg-transparent" name="formDate"
                                value="{{ date('Y-m-d') }}" placeholder="Form Date">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>To Date</label>
                            <input type="date" class="form-control rounded-0 bg-transparent" name="toDate"
                                placeholder="To Date">
                        </div>

                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-primary rounded w-md mt-3">Send</button>
                        </div>
                    </div>
                </form>
                <!-- edit Modal -->
                <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog"
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
                            <table class="table table-bordered market_datatable">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Taka</th>
                                        <th>F.Date</th>
                                        <th>T.Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                            <p>Total Today Market: </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my_style align-items-center details rounded">
            <div class="col-md-12 table_color rounded p-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-bordered market_datatable">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Paid</th>
                                        <th>Total Meal</th>
                                        <th>Meal Cost</th>
                                        <th>Unpaid/Plus</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                            <p>Total Today Market: </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Session('success'))
        @endif
    @endsection
    @section('footer_script')
        <script>

            // if (Session('success')) {
            //     Swal.fire(
            //         'Good job!',
            //         'You clicked the button!',
            //         'success'
            //     )
            // }

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: "lBfrtip",
                "pageLength": parseInt("4"),
                "lengthMenu": [
                    [5, 10, 15, 20, 30, 40, -1],
                    [5, 10, 15, 20, 30, 40, "All"]
                ],
                ajax: "{{ route('meal.index') }}",
                columns: [{
                        data: 'id', name: 'id'
                    },
                    {
                        data: 'name', name: 'name'
                    },
                    {
                        data: 'email', name: 'email'
                    },
                    {
                        data: 'address', name: 'address'
                    },
                    {
                        data: 'action', name: 'action',
                    },
                ]
            });

            $('#saveBtn').click(function(e){
                e.preventDefault();
                $(this).html('Save');
                $.ajax({
                    data:$('#newMemberForm').serialize();
                    url:"{{ route('meal.store') }}",
                    type:"POST",
                    dataType:'json',
                    success:function(data){
                        alert('ok');
                        // table.draw();
                    }
                    error:function(data){
                        console.log('Error:',data);
                        $("#saveBtn").html("Save");
                    }
                })
            });

        });
            // $(document).on('click', '#edit', function(e){
            //     e.preventDefault();
            //     var url = $(this).attr('href');
            //     $.ajax({
            //         url: url,
            //         success: function(data) {

            //             $('#edit-content').html(data);
            //             $('.editModal').modal('show');
            //         }
            //     })
            // })


            // $("#edit").click(function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('href');
            //     alert('hi');
            //     $.ajax({
            //         type: 'POST',
            //         url: '/ajaxRequest',
            //         data: {
            //             name: name,
            //             password: password,
            //             email: email
            //         },
            //         success: function(data) {
            //             alert(data.success);
            //         }
            //     });
            // });
        </script>
    @endsection
