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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <center>
                <div class="form-body">
                    <form method="POST" action="{{ route('test2.action') }}">
                        @if(session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <label>Propinsi Tujuan</label>
                            <select class="form-control" name="province" id="province">
                                <option value="">-- Pilih Propinsi --</option>
                                @foreach($province['results'] as $key)
                                <option value="{{ $key['province_id'] }}">{{ $key['province'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kota Tujuan</label>
                            <select class="form-control" name="city" id="city">
                                <option value="">-- Pilih Kota --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Berat (Gram)</label>
                            <input type="number" name="weight" id="weight" class="form-control" placeholder="Berat">
                        </div>
                        <div class="form-group">
                            <label>Kurir</label>
                            <select class="form-control" id="courier" name="courier">
                                <option value="">-- Pilih Kurir --</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">Tiki</option>
                            </select>
                        </div>
                        <div class="form-group"><br><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(`#province`).on("change", function() {
            var id = $(this).val();
            $.get('{{ url("test_2/city") }}/' + id, respon => {
                let html = '<option value="">Choose City</option>';
                respon.rajaongkir.results.forEach(item => {
                    html += `<option value="${item.city_id}">${item.city_name}</option>`
                });
                $('#city').html(html);
            });
        });
    </script>
</body>

</html>