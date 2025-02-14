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
    .page {
      page-break-after: always;
      height: 210mm;
      width: 297mm;
      margin: 0 auto;
      padding: 0mm;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }
    .cert_img{
      max-width: 297mm;
      max-height: 210mm;
      object-fit: cover;
      z-index: -8;
      position: absolute;
    }
    .cert_val_img{
      max-width: 297mm;
      max-height: 210mm;
      object-fit: cover;
      z-index: -9;
      position: absolute;
    }
    .cert_barcode {
      z-index: -7;
      position: absolute;
      top: 133mm;
      left: 255mm;
      width: 50mm;
    }
    .cert_name {
      z-index: -6;
      position: absolute;
      top: 60mm;
      left: 17.8mm;
      font-size: 22pt;
      font-family: 'Times New Roman', Times, serif;
      font-weight: bold;
    }
    .cert_date {
      z-index: -5;
      position: absolute;
      top: 71.5mm;
      left: 30mm;
      font-size: 22pt;
      font-family: Calibri, 'Trebuchet MS', sans-serif;
      font-weight: bold;
    }
    .cert_number {
      z-index: -4;
      position: absolute;
      top: 190mm;
      left: 244mm;
      font-size: 7pt;
      font-family: 'Times New Roman', Times, serif;
    }
    .val_ms_word {
      z-index: -3;
      position: absolute;
      top: 63mm;
      left: 178.3mm;
      font-size: 14pt;
      font-family: 'Times New Roman', Times, serif;
      text-align: center;
    }
    .val_ms_excel {
      z-index: -2;
      position: absolute;
      top: 73mm;
      left: 178.3mm;
      font-size: 14pt;
      font-family: 'Times New Roman', Times, serif;
      text-align: center;
    }
    .val_ms_powerpoint {
      z-index: -1;
      position: absolute;
      top: 83mm;
      left: 178.3mm;
      font-size: 14pt;
      font-family: 'Times New Roman', Times, serif;
      text-align: center;
    }
  </style>
</head>
<body>
  @foreach($pages as $page)
  <div class="page">
    <img class="cert_img" src="{{ $page['cert_url'] }}" alt="">
    <span class="cert_name">{{ $page['cert_name'] }}</span>
    <span class="cert_date">{{ $page['cert_date'] }}</span>
    <span class="cert_number">Certificate No {{ $page['cert_number'] }}</span>
    <div class="cert_barcode">
      <img src="data:image/png;base64,{{ $page['barcode'] }}" alt="Barcode">
    </div>
  </div>
  @endforeach
</body>

</html>