<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
    .page-break {
        page-break-after: always;
    }
    .text-center{
        text-align:center
    }
    </style>
</head>
<body>
    <h1 class="text-center">
        INSTRUMEN LAPORAN KEJADIAN
    </h1>

    <legend><b>I. Identitas (Dinas/Instansi Sosial)</b></legend>
    <table style="border:0px;" border='0'>
        <tr>
            <td style="width:50px;">1</td>
            <td>Provinsi</td>
            <td>:</td>
            <td>_____________________________________________</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Kabupaten/Kota</td>
            <td>:</td>
            <td>_____________________________________________</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Nama Dinas/Instansi Sosial Provinsi/Kab/Kota</td>
            <td>:</td>
            <td>_____________________________________________</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Nama Pimpinan (Kepala Dinas)</td>
            <td>:</td>
            <td>_____________________________________________</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Alamat </td>
            <td>:</td>
            <td>_____________________________________________</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Nomor Telepon/Fax</td>
            <td>:</td>
            <td>_____________________________________________</td>
        </tr>
    </table>
    <br>
    <legend><b>II. Kejadian Bencana Sosial</b></legend>
    <table style="border:0px;" border='0'>
        <tr>
            <td style="width:50px;">A</td>
            <td>Jenis Bencana Sosial</td>
            <td>:</td>
            <td><b>{{$det->jenis->jenis}}</b></td>
        </tr>
       
        <tr>
            <td>B</td>
            <td>Lokasi Pengungsian</td>
            <td>:</td>
            <td><b>{{$det->lokasi}}</b></td>
        </tr>
        <tr>
            <td>D=C</td>
            <td>Kronologi Kejadian</td>
            <td>:</td>
            <td><b>{{$det->kronologis}}</b></td>
        </tr>
        
    </table>
    <br>
    <legend><b>III. Data Kejadian Bencana</b></legend>
    <table style="border:0px;" border='0'>
        <tr>
            <td rowspan="2" style="width:50px;">A</td>
            <td rowspan="2">Data Pengungsi</td>
            <td colspan="2"></td>
            <td colspan="2">Total</td>
        </tr>
        <tr>
            <td>Jumlah Laki-laki</td>
            <td>Jumlah Perempuan</td>
        </tr>
        <tr>
            <td></td>
            <td>Dewasa</td>
            <td style="text-align:right"><b>{{$det->total_dewasa_lk}} Orang</b></td>
            <td style="text-align:right"><b>{{$det->total_dewasa_pr}} Orang</b></td>
            <td style="text-align:right"><b>{{($det->total_dewasa_pr + $det->total_dewasa_lk)}} Orang</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Anak-anak</td>
            <td style="text-align:right"><b>{{$det->total_anak_lk_6_17}} Orang</b></td>
            <td style="text-align:right"><b>{{$det->total_anak_pr_6_17}} Orang</b></td>
            <td style="text-align:right"><b>{{($det->total_anak_pr_6_17 + $total_anak_lk_6_17)}} Orang</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Balita</td>
            <td style="text-align:right"><b></b></td>
            <td style="text-align:right"><b></b></td>
            <td style="text-align:right"><b>{{($det->total_balita_0_5)}} Orang</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Lansia</td>
            <td style="text-align:right"><b></b></td>
            <td style="text-align:right"><b></b></td>
            <td style="text-align:right"><b>{{($det->total_lansia)}} Orang</b></td>
        </tr>

    </table>
</body>
</html>