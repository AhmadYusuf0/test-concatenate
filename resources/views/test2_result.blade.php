<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Test 1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-5" style="border-radius: 10px; background-color:gray;">
        <div class="row justify-content-center">
            <div class="form-body">
                <?php
                $result = $results->rajaongkir;
                ?>
                @isset($result->origin_details)
                <center>
                    <div class="form-group">
                        <h5 class="my-3">Alamat Asal</h5>
                        <table class="table" style="border-radius: 10px; background-color:pink;">
                            <tr>
                                <th>Propinsi</th>
                                <td>{{ $result->origin_details->province }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>{{ $result->origin_details->city_name }}</td>
                            </tr>
                            <tr>
                                <th>Kode POS</th>
                                <td>{{ $result->origin_details->postal_code }}</td>
                            </tr>
                        </table>
                    </div>
                </center>
                @endisset
                @isset($result->destination_details)
                <center>
                    <div class="form-group">
                        <h5 class="my-3">Alamat Tujuan</h5>
                        <table class="table">
                            <tr>
                                <th>Propinsi</th>
                                <td>{{ $result->destination_details->province}}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>{{ $result->destination_details->city_name }}</td>
                            </tr>
                            <tr>
                                <th>Kode POS</th>
                                <td>{{ $result->destination_details->postal_code }}</td>
                            </tr>
                        </table>
                    </div>
                </center>
                @endisset
                @isset($result->results)
                <center>
                    <div class="form-group">
                        <h5 class="my-3">Hasil</h5>
                        <table class="table">
                            <tr>
                                <th>Ekspedisi</th>
                                <td>{{ $result->results[0]->code}}</td>
                            </tr>
                            <tr>
                                <th>Kurir</th>
                                <td>{{ $result->results[0]->name }}</td>
                            </tr>
                            @foreach($result->results[0]->costs as $key)
                            <tr>
                                <th>Layanan</th>
                                <td>{{ $key->service }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $key->description }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp. {{ $key->cost[0]->value }}</td>
                            </tr>
                            <tr>
                                <th>Estimasi Tiba</th>
                                <td>{{ $key->cost[0]->etd }} Hari</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </center>
                @endisset
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>