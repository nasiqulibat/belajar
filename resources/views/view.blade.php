<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Simple CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                
                @if( $errors->all() != null)
                    <div style="color:red">Data Tidak Boleh kosong <br> Submit Gagal</div>
                @endif
               
                <div class="title m-b-md">
                    Laravel Extreme Simple CRUD
                </div>
            <!-- <form id="inputform" onsubmit="return validateForm()" method="get" name="myForm" action=""> -->
            <form  method="post" name="myForm" action="{{URL::to('/kirim')}}" id="inputform">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                Nama :
                <input type="text" name="nama" if value=" @if (isset($nama)) {{ $nama }} @endif"> <br>
                Email
                <input type="email" name="email" value="@if (isset($email)) {{ $email }} @endif"><br>
                Tanggal Lahir
                <input type="date" name="tgl" value="@if (isset($tgl)) {{ $tgl }} @endif"><br>
                Telp
                <input type="text" name="telp" value="@if (isset($telp)) {{ $telp }} @endif"><br>
                Jenis Kelamin
                <select name="jk">
                    <option @if(!isset($jk)) {{"selected"}}  @endif selected disabled>belum terpilih</option>
                    <option value="male" @if (isset($jk)) @if ($jk == "male" ) {{"selected"}} @endif @endif>male</option>
                    <option value="female" @if (isset($jk)) @if ($jk == "female" ) {{"selected"}} @endif @endif>female</option>
                </select> <br>
                Alamat
                <textarea name="alamat" cols="30" rows="10">@if (isset($alamat)) {{ $alamat }} @endif</textarea> <br>
                <input type="submit" name="submit" value="submit">
            </form>
            <button onclick="document.getElementById('inputform').reset();">
                    CLEAR ENTRY
                </button>
            </div>
        </div>
    </body>
</html>

