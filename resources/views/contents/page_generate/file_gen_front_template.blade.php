@php

@endphp
<!DOCTYPE html>
<html>
<head>
  <title>PDF with Barcodes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    @page {
      padding: 0;
      margin: 0;
    }
    @font-face {
      font-family: 'Calibri';
      src: url( {{ public_path('fonts/Calibri.ttf') }} ) format('truetype');
    }
    .page {
      height: 220mm;
      width: 307mm;
      margin: 0 auto;
      padding: 0mm;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }
    /* .cert_img{
      max-height: 210mm;
      max-width: 305mm;
      object-fit: cover;
      z-index: -4;
      position: absolute;
    } */
    .cert_name {
      z-index: -3;
      position: absolute;
      top: 62.7mm;
      left: 22.5mm;
      font-size: 22pt;
      font-family: 'Times New Roman', Times, serif;
      font-weight: bold;
    }
    .cert_date {
      z-index: -3;
      position: absolute;
      top: 74.5mm;
      left: 33mm;
      font-size: 18pt;
      font-family:  'Arial' , sans-serif;
      font-weight: 300;
    }
    .cert_barcode {
      z-index: -2;
      position: absolute;
      top: 139.7mm;
      left: 193.7mm;
      width: 50mm;
      page-break-inside: avoid;
      display: inline-block;
    }
    .cert_number {
      z-index: -1;
      position: absolute;
      top: 192mm;
      left: 248mm;
      font-size: 7pt;
      font-family: 'Times New Roman', Times, serif;
    }
  </style>
</head>
<body>
  @foreach($pages as $page)
  <div class="page">
    {{-- <img class="cert_img" src="{{ $page['cert_url'] }}" alt=""> --}}
    {{-- <img class="cert_img" src="{{ url('/public/static/d_remove.png') }}" alt=""> --}}
    <span class="cert_barcode">
      <img src="data:image/png;base64,{{ $page['barcode'] }}" alt="Barcode">
    </span>
    <span class="cert_name">{{ $page['cert_name'] }}</span>
    <span class="cert_date">{{ $page['cert_date'] }}</span>
    <span class="cert_number">Certificate No {{ $page['cert_number'] }}</span>
  </div>
  @endforeach
</body>

</html>