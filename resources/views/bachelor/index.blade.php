<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bachelor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="wraper">
            <div class="container">
                <div class="content">
                    <div class="card">
                        <div class="card-header">
                            <h2>This is card header</h2>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <form>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">+ Row</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Name</th>
                                                <td><a class="btn-sm"><span><i class="fa-solid fa-check"></i></span></a></td>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border">
                                                <td class="border-right">
                                                    <a><i class="fa-solid fa-xmark"></i></a>
                                                </td>
                                                <td class="border-right">
                                                    ***
                                                </td>
                                                <td class="border-right">
                                                    <input type="text">
                                                </td>
                                                <td class="border-right">--</td>
                                                <td class="border-right">
                                                    ***
                                                </td>
                                            </tr>
                                            <tr class="border">
                                                <td class="border-right">
                                                    ***
                                                </td>
                                                 <th class="border-right">
                                                    <input type="date" name="" id="">
                                                </th>
                                                <th scope="row" class="border-right"></th>
                                                <td class="border-right"></td>
                                                <td class="border-right">
                                                    <input type="text" value="2400">
                                                </td>
                                            </tr>
                                            <tr class="border">
                                                <td class="border-right">
                                                    <a class="btn-sm"><span><i class="fa-solid fa-check"></i></span></a>
                                                </td>

                                                <th scope="row" class="border-right"></th>
                                                <td class="border-right"></td>
                                                <td class="border-right"></td>

                                            </tr>

                                            {{-- Calculation row add  --}}

                                            <tr class="border">
                                                <td class="border-right">
                                                    ***
                                                </td>
                                                <th scope="row" class="border-right">Total Meal</th>
                                                <th class="border-right">PTM : 40.5</th>
                                                <td class="border-right">***</td>
                                                <th class="border-right">Total Cost : 2400</th>
                                            </tr>
                                            <tr class="border">
                                                <td class="border-right">
                                                    ***
                                                </td>
                                                <th scope="row" class="border-right">40.5</th>
                                                <th class="border-right">M rate : 59.25</th>
                                                <td class="border-right">***</td>
                                                <th class="border-right">Gain : 2000</th>
                                            </tr>

                                            <tr class="border">
                                                <td class="border-right">
                                                    ***
                                                </td>
                                                <th class="border-right">paid</th>
                                                <th scope="row" class="border-right">2000</th>
                                                <td class="border-right">***</td>
                                                <th class="border-right text-danger">Loss : 400</th>
                                            </tr>

                                            <tr class="border">
                                                <td class="border-right">
                                                    ***
                                                </td>
                                                <th class="border-right">Plus/Unpaid</th>
                                                <th scope="row" class="border-right text-danger">-400</th>
                                                <td class="border-right">***</td>
                                                <th class="border-right">***</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p>This is card footer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
