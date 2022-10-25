@extends('layout.dashboard')

@section('content')
    <h6 class="section-title text-center pt-3">Meal Management System</h6>
    <h6 class="section-subtitle mb-3 text-center">New stunning projects for our amazing clients</h6>
    <div class="filters">
        <a href="#" data-filter=".new" class="active"> Add</a>
        <a href="#" data-filter=".meal"> Meal</a>
        <a href="#" data-filter=".market"> Market</a>
        <a href="#" data-filter=".deposit"> Deposit</a>
        <a href="#" data-filter=".details"> Details</a>
    </div>
    <div class="portfolio-container">

        <div class="row my_style align-items-center new rounded">
            @include('partials.member')
        </div>
        <div class="row my_style align-items-center meal rounded">
            @include('partials.meal')
        </div>

        <div class="row my_style align-items-center market rounded">
            @include('partials.market')
        </div>

        <div class="row my_style align-items-center deposit rounded">
            @include('partials.deposite')
        </div>

        <div class="row my_style align-items-center details rounded">
            @include('partials.details')
        </div>

        <div class="modal editMealMemberModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit New Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="meal_member_edit_modal_body">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal editMeal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Meal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="meal_edit_modal_body">

                    </div>
                </div>
            </div>
        </div>


        {{-- @if (Session('success'))
        @endif --}}
    @endsection
    @section('footer_script')
    <script>
        $(function(){
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : '{{ csrf_token() }}'}
            });
            var table = $('.user_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: "lBfrtip",
                "pageLength": parseInt("4"),
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"]
                ],
                ajax: "{{ route('member.index') }}",
                columns: [{
                    data: 'id', name: 'id'},{data: 'name', name: 'name'},{data: 'email', name: 'email'},
                    { data: 'address', name: 'address'},{data: 'action', name: 'action',},
                ]
            });
            // details datatable start
            var tableDetails = $('.details_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: "lBfrtip",
                "pageLength": parseInt("4"),
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"]
                ],
                ajax: "{{ route('meal.details.index') }}",
                columns: [{
                        data: 'id', name: 'id'},{data: 'action', name: 'action',},
                ]
            });
            // details datatable end

            $('#new_member').submit(function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = '{{ route('member.store') }}';

                $.ajax({
                    url:url,
                    method:'POST',
                    data:data,
                    success:function(data){
                        // if(data.success){
                        //     console.log(data);
                        // }
                        toastr.success(data);
                        $('#new_member')[0].reset();
                        table.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });
            // edit member
            $(document).on('click', '#edit', function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                $.ajax({
                    url: url
                    , type: 'get'
                    , success: function(data) {
                        $('#meal_member_edit_modal_body').html(data);
                        $('.editMealMemberModal').modal('show');
                    }
                    , error: function(err) {
                        $('.data_preloader').hide();
                        if (err.status == 0) {

                            toastr.error('Net Connetion Error. Reload This Page.');
                        } else if (err.status == 500) {

                            toastr.error('Server Error, Please contact to the support team.');
                        }
                    }
                });
            })
            // edit meal
            $(document).on('click', '#EditMeal', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url
                    , type: 'get'
                    , success: function(data) {
                        $('#meal_edit_modal_body').html(data);
                        $('.editMeal').modal('show');
                    }
                    , error: function(err) {
                        $('.data_preloader').hide();
                        if (err.status == 0) {

                            toastr.error('Net Connetion Error. Reload This Page.');
                        } else if (err.status == 500) {

                            toastr.error('Server Error, Please contact to the support team.');
                        }
                    }
                });
            })

            // update meal
            $(document).on('submit', '#mealFormUpdate', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');

                $.ajax({
                    url:url,
                    method:'POST',
                    data:data,
                    success:function(data){
                        // if(data.success){
                        //     console.log(data);
                        // }
                        toastr.success(data);
                        $('.editMeal').modal('hide');
                        $('#mealFormUpdate')[0].reset();
                        meals_datatable.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });
            // update member
            $(document).on('submit', '#memberFormUpdate', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');

                $.ajax({
                    url:url,
                    method:'POST',
                    data:data,
                    success:function(data){
                        // if(data.success){
                        //     console.log(data);
                        // }
                        toastr.success(data);
                        $('.editMealMemberModal').modal('hide');
                        $('#memberFormUpdate')[0].reset();
                        table.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });
            //  member delete -- second section
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var id = $(this).attr('href');
                $.ajax(
                {
                    url: id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                    },
                    success: function (data){
                        toastr.success(data);
                        table.ajax.reload();
                    }
                });

            });
            var meals_datatable = $('.meals_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                pageLength: 4,
                ajax: "{{ route('meal.meals_datatable') }}",
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'name', name: 'name'},
                    { data: 'breakfast', name: 'breakfast'},
                    { data: 'lunch', name: 'lunch'},
                    { data: 'dinner', name: 'dinner'},
                    { data: 'date', name: 'date'},
                    { data: 'total', name: 'total'},
                    // {
                    //     data: 'total_meal',
                    //     name: 'total_meal'
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
                // ,fnDrawCallback: function(){
                //     var total_meal = sum_table_col($('.meals_datatable'), 'total_meal');
                //     $('#total_meal').text(total_meal);

                // }
            });

            $('#mealAddStore').submit(function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    url:url,
                    method:'POST',
                    data:data,
                    success:function(data){
                        toastr.success(data);
                        $('#mealAddStore')[0].reset();
                        meals_datatable.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });

            // market add store -- second section
            var mealMarketStore = $('.market_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                pageLength: 4,
                ajax: "{{ route('market.datatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'formDate',
                        name: 'formDate'
                    },
                    {
                        data: 'toDate',
                        name: 'toDate'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#mealMarketStore').submit(function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    url:url,
                    method:'POST',
                    data:data,
                    success:function(data){
                        toastr.success(data);
                        $('#mealMarketStore')[0].reset();
                        mealMarketStore.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });

            // deposite add store -- second section
            var deposite = $('.deposite_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                pageLength: 4,
                ajax: "{{ route('deposite.datatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#depositeStore').submit(function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    url:url,
                    method:'POST',
                    data:data,
                    success:function(data){
                        toastr.success(data);
                        $('#depositeStore')[0].reset();
                        deposite.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });
        });


    </script>
@endsection
