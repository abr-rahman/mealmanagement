<!-- core  -->
<script src="{{ 'dashboard' }}/assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="{{ 'dashboard' }}/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
<script src="{{ 'dashboard' }}/assets/vendors/bootstrap/bootstrap.affix.js"></script>
<script src="{{ 'dashboard' }}/assets/vendors/isotope/isotope.pkgd.js"></script>
<script src="{{ 'dashboard' }}/assets/js/leadmark.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function() {
        var table = $('.user_datatable').DataTable({
            processing: true,
            serverSide: true,
            dom: 'Bfrtip',
            pageLength: 3,
            ajax: "{{ route('meal.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });
    $(function() {
        var table = $('.meals_datatable').DataTable({
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
    });
    $(function() {
        var table = $('.market_datatable').DataTable({
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
    });
</script>
