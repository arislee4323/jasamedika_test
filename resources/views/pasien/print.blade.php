<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ID Card</title>
    <style>
        .page-break {
            page-break-after: always;
        }

        .main {
            width: 346px;
            height: 214px;
            margin: auto;
            margin-bottom: 30px;
            position: relative;
        }

        .background-image {
            width: 345px;
            height: 212px;
            border-radius: 6px;
            position: relative;
            border: 1px solid gray;
            position: absolute;
        }

        .main-data {
            width: 345px;
            height: 212px;
            position: absolute;
        }

        .right-div,
        .left-div {
            position: absolute;
            float: left;
            width: 172px;
            height: 212px;
        }

        .logo {
            position: absolute;
            margin: 25px 0 0 18px;
        }

        .info {
            position: absolute;
            padding: 0 12px;
            height: 120px;
            margin-top: 70px;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .register-hr {
            border-bottom: 1px solid black;
            width: 80px;
        }

        .back-div {
            padding: 10px;
            position: absolute;
            height: 194px;
            margin-left: 120px;
            width: 208px;
            display:
        }
    </style>
</head>

<body>
    @foreach ($pasiens as $pasien)
    <div>
        <div class="main">
            <img class="background-image" src="{{public_path('images/data.jpg')}}" alt="">
            <div class="main-data">
                <div class="left-div" style="font-size:15px; line-height: 1.5;">
                    <img class="logo" src="{{public_path('images/jasamedika.png')}}" width="110" alt="">
                    <div class="info">
                        <span class="text-md">ID: {{$pasien->id}}</span><br>
                        <span class="text-md">Nama: {{$pasien->nama_pasien}}</span><br>
                        <span class="text-md">Alamat: {{$pasien->alamat}}</span><br>
                        <span class="text-md">RT: {{$pasien->rt}}</span> <span class="text-md">RW: {{$pasien->rw}}</span><br>
                        <span class="text-md">Kelurahan: {{$pasien->kelurahan->nama_kelurahan}}</span><br>
                        
                    </div>
                </div>
                <div class="right-div" style="padding-left: 50px">
                    @if($pasien->jenis_kelamin == 'Pria')
                    <img style="height: 80px; margin-left:15px;; margin-top:25px;"
                        src="{{public_path('images/admin-2.jpg')}}" alt="" width="75">
                    @endif
                    @if($pasien->jenis_kelamin == 'Wanita')
                    <img style="height: 80px; margin-left:15px;; margin-top:25px;"
                        src="{{public_path('images/admin-3.png')}}" alt="" width="75">
                    @endif
                    <div class="flex items-center" style="margin-top: 10px;">
                        <span style="position: absulate;">
                            <img src="{{public_path('images/call.png')}}"
                                style="position: absulate; color: black; width: 12px;" alt="">
                        </span>
                        <span class="text-xs ml-2" style="font-size: 13px;">{{$pasien->no_telp}}</span>
                    </div>
                    <div class="flex items-center">
                        <span style="position: absulate;">
                            <img src="{{public_path('images/gender.jpg')}}"
                                style="position: absulate; color: black; width: 20px;" alt="">
                        </span>
                        <span class="text-xs ml-2" style="font-size: 15px;">{{$pasien->jenis_kelamin}}</span>
                    </div>
                    <img class="mx-auto" src="{{public_path('images/sign.png')}}" alt="" width="60"
                        style="margin-left:20px; margin-top: 5px;">
                   
                </div>
            </div>

        </div>
    </div>
    @endforeach
</body>

</html>