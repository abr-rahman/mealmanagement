@extends('layout.dashboard')
@section('content')
    <h6 class="section-title text-center pt-3">Meal Management System</h6>
    <h6 class="section-subtitle mb-3 text-center">New stunning projects for our amazing clients</h6>
    <div class="row">
        <div class="col-md-10">
            <div class="filters">
                <a href="#" data-filter=".new" class="active">Add</a>
                <a href="#" data-filter=".deposit">Deposit</a>
                <a href="#" data-filter=".market">Market</a>
                <a href="#" data-filter=".meal">Meal</a>
                <a href="#" data-filter=".details" id="reportDetails">Details</a>
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ route('recycle') }}" id="recycle" type="submit" class="btn btn-danger btn-sm">Recycle</a>
            <a href="{{ route('db.backup') }}" class="btn btn-info btn-sm">Back Up</a>
        </div>
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
        <div class="row  align-items-center details rounded w-100">
            @include('partials.details')
        </div>
        {{-- Edit Member Modal --}}
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
        {{-- Edit Meal Modal --}}
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
        {{-- Edit Market Modal --}}
        <div class="modal editMarket" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Market</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="market_edit_modal_body">

                    </div>
                </div>
            </div>
        </div>
        {{-- Edit Deposite Modal --}}
        <div class="modal editDeposite" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Deposite</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="deposite_edit_modal_body">

                    </div>
                </div>
            </div>
        </div>
        {{-- Recycle Modal --}}
        <div class="modal recycle" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Recycle Bin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="recycle_modal_body">

                    </div>
                </div>
            </div>
        </div>
    </div>
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
                // dom: "lBfrtip",
                // "pageLength": parseInt("4"),
                // "lengthMenu": [
                //     [10, 25, 50, 100, 500, 1000, -1],
                //     [10, 25, 50, 100, 500, 1000, "All"]
                // ],
                dom: 'Bfrtip',
                buttons: [
                    'colvis',
                    'excel',
                    'print'
                ],
                ajax: "{{ route('member.index') }}",
                columns: [{
                    data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'address', name: 'address'},
                    {data: 'action', name: 'action',},
                ]
            });
            // details datatable start
            var tableDetails = $('.details_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: "lBfrtip",
                "pageLength": 30,
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"]
                ],
                ajax: "{{ route('meal.details.index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'Serial No.'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'paid',
                        name: 'paid'
                    },
                    {
                        data: 'total_meal',
                        name: 'total_meal'
                    },
                    {
                        data: 'meal_cost',
                        name: 'meal_cost'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                footerCallback: function (row, data, start, end, display) {
                    var api = this.api();
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                    total2 = api.column(2).data().reduce(function (a, b) { return intVal(a) + intVal(b);}, 0);
                    total3 = api.column(3).data().reduce(function (a, b) { return intVal(a) + intVal(b);}, 0);
                    total4 = api.column(4).data().reduce(function (a, b) { return intVal(a) + intVal(b);}, 0);
                    total5 = api.column(5).data().reduce(function (a, b) { return intVal(a) + intVal(b);}, 0);

                    $(api.column(2).footer()).html(total2);
                    $(api.column(3).footer()).html(total3);
                    $(api.column(4).footer()).html(total4);
                    $(api.column(5).footer()).html(total5);
                },
            });
            // market add datatable -- second section
            var mealMarketStore = $('.market_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                ajax: "{{ route('market.datatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'member_id',
                        name: 'member_id'
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
                ],
                 footerCallback: function (row, data, start, end, display) {
                    var api = this.api();
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                    total = api.column(2).data().reduce(function (a, b) { return intVal(a) + intVal(b);}, 0);

                    $(api.column(2).footer()).html(total);
                },
            });
            // member store
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
                        $('#partReload').load(location.href+" #partReload>*","");
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
            // recycle
            $(document).on('click', '#recycle', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url
                    , type: 'get'
                    , success: function(data) {
                        $('#recycle_modal_body').html(data);
                        $('.recycle').modal('show');
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
            });
            //  restore
            $(document).on('click', '#restore', function(e) {
                e.preventDefault();
                // alert('ji');
                var id = $(this).attr('href');
                $.ajax(
                {
                    url: id,
                    type: 'get',
                    data: {
                        "id": id,
                    },
                    success: function (data){
                        if (!$.isEmptyObject(data.errorMsg)) {
                            toastr.error(data.errorMsg);
                            return;
                        }
                        toastr.success(data);
                        table.ajax.reload();
                        tableDetails.ajax.reload();
                        meals_datatable.ajax.reload();
                        mealMarketStore.ajax.reload();
                        deposite.ajax.reload();
                        $('.recycle').modal('hide');
                        $('#recycle_modal_body')[0].reset();
                    }
                });

            });
            //  force Delete
            $(document).on('click', '#forceDelete', function(e) {
                e.preventDefault();
                // alert('ji');
                var id = $(this).attr('href');
                $.ajax(
                {
                    url: id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                    },
                    success: function (data){
                        if (!$.isEmptyObject(data.errorMsg)) {
                            toastr.error(data.errorMsg);
                            return;
                        }
                        toastr.error(data);
                        table.ajax.reload();
                        $('.recycle').modal('hide');
                        $('#recycle_modal_body')[0].reset();
                    }
                });

            });
            // edit Market
            $(document).on('click', '#EditMarket', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url
                    , type: 'get'
                    , success: function(data) {
                        $('#market_edit_modal_body').html(data);
                        $('.editMarket').modal('show');
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
            });
            // edit Deposite
            $(document).on('click', '#editDeposite', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url
                    , type: 'get'
                    , success: function(data) {
                        $('#deposite_edit_modal_body').html(data);
                        $('.editDeposite').modal('show');
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
            });
            // update Deposite
            $(document).on('submit', '#depositeFormUpdate', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');

                $.ajax({
                    url:url,
                    method:'POST',
                    data:data,
                    success:function(data){
                        toastr.success(data);
                        $('.editDeposite').modal('hide');
                        $('#depositeFormUpdate')[0].reset();
                        deposite.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });
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
            });
            // update market
            $(document).on('submit', '#marketFormUpdate', function(e) {
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
                        $('.editMarket').modal('hide');
                        $('#marketFormUpdate')[0].reset();
                        mealMarketStore.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });
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

                        if (!$.isEmptyObject(data.errorMsg)) {
                            toastr.error(data.errorMsg);
                            return;
                        }
                        toastr.error(data);
                        table.ajax.reload();
                        tableDetails.ajax.reload();
                        meals_datatable.ajax.reload();
                        mealMarketStore.ajax.reload();
                        deposite.ajax.reload();
                    }
                });

            });
            var meals_datatable = $('.meals_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                // pageLength: 4,
                ajax: "{{ route('meal.meals_datatable') }}",
                columns: [
                    {  data: 'DT_RowIndex', name: 'Serial No.'},
                    { data: 'member_id', name: 'member_id'},
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

            // Meal add store
            $('#mealAddStore').submit(function(e){
                e.preventDefault();

                var url = $(this).attr('action');
                var data = $(this).serialize();
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

                // const member_id = [];
                // const breakfast = [];
                // const lunch = [];
                // const dinner = [];
                // const date = [];

                // $('input[name^="member_id"]').each(function(){
                //     member_id.push($(this).val());
                // })
                // $('input[name^="breakfast"]').each(function(){
                //     breakfast.push($(this).val());
                // })
                // $('input[name^="lunch"]').each(function(){
                //     lunch.push($(this).val());
                // })
                // $('input[name^="dinner"]').each(function(){
                //     dinner.push($(this).val());
                // })
                // $('input[name^="date"]').each(function(){
                //     date.push($(this).val());
                // })

                // $.ajax({
                //     url = $(this).attr('action'),
                //     type: post,
                //     data: {
                //         member_id: member_id,
                //         breakfast: breakfast,
                //         lunch: lunch,
                //         dinner: dinner,
                //         date: date,
                //     },
                //     success:function(response) {
                //         toastr.success(response);
                //     }
                // });


                // $('input[type=checkbox]').each(function() {
                    //     if (!this.checked) {
                        //         data += '&'+this.name+'=0';
                        //     }
                        // });

                // data.forEach((i, v) => console.log(`${i} ${v}`))


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
                columns: [
                    {data: 'DT_RowIndex', name: 'Serial No.'},
                    {data: 'member_id', name: 'member_id'},
                    { data: 'amount', name: 'amount'},
                    {data: 'date', name: 'date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                footerCallback: function (row, data, start, end, display) {
                    var api = this.api();
                    var intVal = function (i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                    };

                    total = api.column(2).data().reduce(function (a, b) { return intVal(a) + intVal(b);}, 0);

                    $(api.column(2).footer()).html(total);
                },
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
                        $('#newDeposite').modal('hide');
                        deposite.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });

            $("#checkAll").click(function () {
                $(".check").prop('checked', $(this).prop('checked'));
            });
            $("#name_check").click(function () {
                $(".name_check").prop('checked', $(this).prop('checked'));
            });
        });
    </script>
@endsection
