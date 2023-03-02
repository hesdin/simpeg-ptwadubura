<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Details</title>

  <style>
    table {
      width: 95%;
      border-collapse: collapse;
      margin: 50px auto;
    }

    /* Zebra striping */
    tr:nth-of-type(odd) {
      background: #eee;
    }

    th {
      background: #3498db;
      color: white;
      font-weight: bold;
    }

    td,
    th {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
      font-size: 18px;
    }
  </style>

</head>

<body>

  <div style="width: 95%; margin: 0 auto;">
    <div style="width: 10%; float:left; margin-right: 20px;">
      <img src="{{ public_path('assets/images/logo.png') }}" width="100%" alt="">
    </div>
    <div style="width: 50%; float: left;">
      <h1>Absen Pegawai</h1>
    </div>
  </div>

  <table style="position: relative; top: 50px;">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Absen Masuk</th>
        <th>Absen Pulang</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($d_absen as $absen)
        <tr>
          <td data-column="Tanggal">{{ $absen->created_at }}</td>
          <td data-column="Absen Masuk">{{ $absen->absen_masuk }}</td>
          <td data-column="Absen Pulang" style="color: dodgerblue;">
            {{ $absen->absen_pulang }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html>
