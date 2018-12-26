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
            <td>Waktu Kejadian</td>
            <td>:</td>
            <td><b>{{date('d-m-Y',strtotime($det->tanggal_kejadian))}}</b></td>
        </tr> 
        <tr>
            <td>C</td>
            <td>Kronologi Kejadian</td>
            <td>:</td>
            <td><b>{{$det->kronologis}}</b></td>
        </tr>

        <tr>
            <td>D</td>
            <td>Penyebab Kejadian</td>
            <td>:</td>
            <td><b>{{$det->penyebab_kejadian}}</b></td>
        </tr>
        
    </table>
    <br>
    <legend><b>III. Data Kejadian Bencana</b></legend>
    <table style="border:0px;" border='0'>
        <tr>
            <td style="width:50px;">A</td>
            <td>Data Korban Manusia</td>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td>Korban Meninggal</td>
            <td style="text-align:right"><b>{{$det->jlh_meninggal}}</b></td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>Korban Luka-luka</td>
            <td style="text-align:right"><b>{{$det->jlh_luka}}</b></td>
            <td>Orang</td>
        </tr>
        
        <tr>
            <td>B</td>
            <td>Data Korban Bangunan/Rumah</td>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td>Jumlah Rusak Berat</td>
            <td style="text-align:right"><b>{{$det->jlh_rusak_berat}}</b></td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>Jumlah Rusak Sedang</td>
            <td style="text-align:right"><b>{{$det->jlh_rusak_sedang}}</b></td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>Jumlah Rusak Ringan</td>
            <td style="text-align:right"><b>{{$det->jlh_rusak_ringan}}</b></td>
            <td>Unit</td>
        </tr>
        
    </table>
</body>
</html>