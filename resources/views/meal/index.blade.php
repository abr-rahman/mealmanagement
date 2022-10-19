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
            @include('parts.member')
        </div>
        <div class="row my_style align-items-center meal rounded">
            @include('parts.meal')
        </div>

        <div class="row my_style align-items-center market rounded">
            @include('parts.market')
        </div>

        <div class="row my_style align-items-center deposit rounded">
            @include('parts.deposite')
        </div>

        <div class="row my_style align-items-center details rounded">
            @include('parts.details')
        </div>

        <form id="deleted_form" method="post">
            @csrf
            @method('DELETE')
        </form>
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
                ajax: "{{ route('meal.index') }}",
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
                var url = '{{ route('meal.store') }}';

                $.ajax({
                    url:url,
                    method:'POST',
                    data:data,
                    success:function(data){
                        // if(data.success){
                        //     console.log(data);
                        // }
                        // toastr.success(data);
                        $('#new_member')[0].reset();
                        table.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });

            $(document).on('click', '#edit', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url
                    , type: 'get'
                    , success: function(data) {
                        // alert('ok');
                        $('#edit-content').empty();
                        $('#edit-content').html(data);
                        $('#editModalmember').modal('show');
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

            // $('body').on('click', '#delete', function(){
            //     var meal_id = $(this).data("id");
            //     confirm('Are you sure');
            //     $.ajax({
            //         type:"DELETE",
            //         success:function(data){
            //             alert('pk');
            //             table.draw();
            //         }
            //         error:function(data){
            //             console.log('Error:', data);
            //         }
            //     })
            // });

            // $(document).on('click', '#delete', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('href');
            //     confirm({
            //         // alert('ok');
            //         'title': 'Delete Confirmation'
            //         , 'content': 'Are you sure?'
            //         , 'buttons': {
            //             'Yes': {
            //                 'class': 'yes btn-modal-primary'
            //                 , 'action': function() {
            //                     $('#deleted_form').submit();
            //                 }
            //             }
            //             , 'No': {
            //                 'class': 'no btn-danger'
            //                 , 'action': function() {
            //                     console.log('Deleted canceled.');
            //                 }
            //             }
            //         }
            //     });
            // });

            // $(document).on('submit', '#deleted_form', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('action');
            //     var request = $(this).serialize();
            //     $.ajax({
            //         url: url,
            //         type: 'post',
            //         data: request,
            //         success: function(data) {
            //             if ($.isEmptyObject(data.errorMsg)) {
            //                 toastr.error(data);
            //                 table.ajax.reload();
            //             } else {
            //                 toastr.error(data.errorMsg);
            //             }
            //         },
            //         error: function(err) {
            //             if (err.status == 0) {
            //                 toastr.error('Net Connetion Error. Please check the connection.');
            //             } else if (err.status == 500) {
            //                 toastr.error('Server Error. Please contact to the support team.');
            //             }
            //         }
            //     });
            // });
            // meal add store -- second section

            $("#delete").click(function(e){
                e.preventDefault();
                var id = $(this).attr('href');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax(
                {
                    url: "row/"+id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (){
                        console.log("it Works");
                    }
                });

                });
            var meals_datatable = $('.meals_datatable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                pageLength: 4,
                ajax: "{{ route('meal.meals_datatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'breakfast',
                        name: 'breakfast'
                    },
                    {
                        data: 'lunch',
                        name: 'lunch'
                    },
                    {
                        data: 'dinner',
                        name: 'dinner'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
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
                        // alert(data);
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
                        // alert(data);
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
                        // alert(data);
                        $('#depositeStore')[0].reset();
                        deposite.ajax.reload();
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });
        });


            // if (Session('success')) {
            //     Swal.fire(
            //         'Good job!',
            //         'You clicked the button!',
            //         'success'
            //     )
            // }

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
