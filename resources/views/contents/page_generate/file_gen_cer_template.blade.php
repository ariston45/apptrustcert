<!DOCTYPE html>
<html>

<head>
  <title>PDF with Barcodes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    .page {
      page-break-after: always;
      /* Pisahkan setiap halaman */
      text-align: center;
    }

    .barcode {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  @foreach($pages as $page)
    <div class="page">
    <h1>Page {{ $page['page_number'] }}</h1>
    <div class="barcode">
      <img src="data:image/png;base64,{{ $page['barcode'] }}" alt="Barcode">
    </div>
    </div>
  @endforeach
</body>

</html>