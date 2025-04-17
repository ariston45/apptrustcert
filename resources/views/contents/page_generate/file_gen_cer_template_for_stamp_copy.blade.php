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
      /* page-break-after: always; */
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
      z-index: -11;
      position: absolute;
    }
    .cert_val_img{
      max-width: 297mm;
      max-height: 210mm;
      object-fit: cover;
      z-index: -10;
      position: absolute;
    }
    .cert_barcode {
      z-index: -7;
      position: absolute;
      top: 135mm;
      left: 193mm;
      width: 50mm;
    }
    .cert_name {
      z-index: -6;
      position: absolute;
      top: 61mm;
      left: 17.8mm;
      font-size: 22pt;
      font-family: 'Times New Roman', Times, serif;
      font-weight: bold;
    }
    .cert_date {
      z-index: -8;
      position: absolute;
      top: 72.4mm;
      left: 30mm;
      font-size: 18pt;
      font-family: Calibri, 'Trebuchet MS', sans-serif;
      font-weight: bold;
    }
    .cert_number {
      z-index: -7;
      position: absolute;
      top: 190mm;
      left: 244mm;
      font-size: 7pt;
      font-family: 'Times New Roman', Times, serif;
    }
    .val_ms_word {
      z-index: -6;
      position: absolute;
      top: 63mm;
      left: 178.3mm;
      font-size: 14pt;
      font-family: 'Times New Roman', Times, serif;
      text-align: center;
    }
    .val_ms_excel {
      z-index: -5;
      position: absolute;
      top: 73mm;
      left: 178.3mm;
      font-size: 14pt;
      font-family: 'Times New Roman', Times, serif;
      text-align: center;
    }
    .val_ms_powerpoint {
      z-index: -4;
      position: absolute;
      top: 83mm;
      left: 178.3mm;
      font-size: 14pt;
      font-family: 'Times New Roman', Times, serif;
      text-align: center;
    }
    .cert_number_stamp {
      z-index: -3;
      position: absolute;
      top: 157.7mm;
      left: 108mm;
      font-size: 7.5pt;
      font-family: Arial, Helvetica, sans-serif;
      text-align: center;
      width: 80mm;
      color: #696969;
      text-align: center;
      border-radius: 10px;
    }
    .cert_date_stamp {
      z-index: -2;
      position: absolute;
      top: 160.4mm;
      left: 108mm;
      font-size: 7.5pt;
      font-family: Arial, Helvetica, sans-serif;
      text-align: center;
      width: 80mm;
      color: #696969;
      text-align: center;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  {{-- @foreach($pages as $page) --}}
  <div class="page">
    <img class="cert_img" src="{{ $page['cert_url'] }}" alt="">
    <span class="cert_name">{{ $page['cert_name'] }}</span>
    <span class="cert_date">{{ $page['cert_date'] }}</span>
    <span class="cert_number">Certificate No {{ $page['cert_number'] }}</span>
    <div class="cert_barcode">
      <img src="data:image/png;base64,{{ $page['barcode'] }}" alt="Barcode">
    </div>
    <span class="cert_number_stamp">
      Nomor : {{ $page['cert_number'] }}
    </span>
    <span class="cert_date_stamp">Tanggal : {{ $page['cert_date_indonesia'] }}</span>
  </div>
  <div class="page">
    <img class="cert_val_img" src="{{ $page['cert_value_url'] }}" alt="">
    <span class="val_ms_word">{{ $page['val_word'] }}</span>
    <span class="val_ms_excel">{{ $page['val_excel'] }}</span>
    <span class="val_ms_powerpoint">{{ $page['val_powerpoint'] }}</span>
  </div>
  {{-- @endforeach --}}
</body>

</html>
