<div class="col-md-12 rounded p-3 background-table">
    <div class="table-responsive">
        <table class="table table-bordered details_datatable w-100">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Paid</th>
                    <th>Total Meal</th>
                    <th>Meal Cost</th>
                    <th>Unpaid/Plus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
                <tfoot>
                    <tr>
                        {{-- <th>Meal Rate:</th>
                        <th></th> --}}
                        <th colspan="2" style="text-align:right"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <div class="d-flex justify-content-center">
                <h6>Meal Rate: {{ number_format($mealRate, 2) }}</h6>
            </div>
    </div>
</div>
