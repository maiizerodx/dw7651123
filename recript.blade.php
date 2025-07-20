
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>พิมพ์ใบส่งของ และ บิลเงินสด ของ {{$data['customer_name']}}</title>
<style type="text/css">
body {
  background: rgb(204,204,204);
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;
}
page[size="A6"] {
  width: 10.5cm;
  height: 14.8cm;
}
page[size="A6"][layout="portrait"] {
  width: 14.8cm;
  height: 10.5cm;
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="portrait"] {
  width: 42cm;
  height: 29.7cm;
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="portrait"] {
  width: 21cm;
  height: 14.8cm;
}
.tableouter   {
  border-right: 1px solid #555555;
  border-bottom: 1px solid #555555;
}
.listItem    {
  border-collapse: collapse;
  border-spacing: 0;
  border: 2px solid #000000;
  margin: 0px auto;
}
.listItem th {
  font-size: 14px;
  font-weight: bold;
  padding-top: 3px;
  padding-right: 3px;
  padding-left: 3px;
  padding-bottom: 3px;
  border-style: solid;
  border-width: 1px;
  overflow: hidden;
  word-break: normal;
}
.listItem td {
  font-family: Arial, sans-serif;
  font-size: 14px;
  padding-top: 2px;
  padding-right: 5px;
  padding-left: 5px;
  padding-bottom: 1px;
  border-style: solid;
  border-width: 1px;
  overflow: hidden;
  word-break: normal;
}

.TableNormal {
  padding: 0px;
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
body,td,th {
  font-size: 14px;
}
</style>
</head>

<body>
@if(isset($order))
<?php
  if(isset($printDate))
    $strprintDate = date( 'd / m / Y', strtotime( $printDate ));
  else
    $strprintDate = date( 'd / m / Y', strtotime( $order->order_at ));
?>

@if($data['bean_total_amount'] > 0)
<page size="A5">
  <table width="100%" height="486" border="0" cellpadding="5" cellspacing="5" id="Table_5">
    <tr>
      <td height="50" colspan="5" valign="bottom" >
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tbody>
          <tr>
            <td width="5">&nbsp;</td>
            <td width="150">{{$data['car_name']}} / {{$data['customer_no']}}</td>
            <td><center>
              <strong style="font-size: 18px">ใบส่งของ</strong><br>(ถั่วงอก)
            </center></td>
            <td width="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขที่ {{$data['order_id']}}</td>
            <td width="5">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="5" align="center" valign="middle" ><img src="{{URL::asset('images/logo.jpg') }}" alt="" height="10"></td>
    </tr>
    <tr>
      <td rowspan="4"> <img src="{{URL::asset('images/Scan_06.jpg') }}" width=="5" height="370" alt=""></td>
      <td colspan="3"  width="360">
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tbody>
          <tr>
            <td width="300">ชื่อ {{$data['customer_name']}}</td>
            <td>วันที่ {{$strprintDate}}</td>
          </tr>
          <tr>
            <td colspan="2">ตลาด {{$data['market_name']}}</td>
          </tr>
          <tr>
            <td colspan="2">ที่อยู่ {{$data['customer_address']}}</td>
          </tr>
        </tbody>
      </table>
      </td>
      <td height="5" rowspan="4"> <img src="{{URL::asset('images/Scan_08.jpg') }}" width=="5" height="370" alt=""></td>
    </tr>
    <tr>
      <td colspan="3"><table width="100%" border="1" cellpadding="1" cellspacing="0" class="listItem">
        <tbody>
          <tr>
            <th>รายการ</th>
            <th width="60">จำนวน</th>
            <th width="80">จำนวนรวม</th>
          </tr>
          @for ($i = 5; $i < 8; $i++)
            <tr>
              <td>{{$products[$i]->name}}</td>
              <td align="center">{{$data['p'.($i+1)]}}</td>
              <td>
                @if($data['p'.($i+1)] != "" )
                  {{$data['p'.($i+1)]*$products[$i]->weight}} กิโล
                @endif
              </td>
            </tr>
          @endfor
          @for ($i = 18; $i < 20; $i++)
            @if ($i==20)
                @continue
            @endif
            <tr>
              <td>{{$products[$i]->name}}</td>
              <td align="center">{{$data['p'.($i+1)]}}</td>
              <td>
                @if($data['p'.($i+1)] != "" )
                  {{$data['p'.($i+1)]*$products[$i]->weight}} กิโล
                @endif
              </td>
            </tr>
          @endfor
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>ถั่วงอก (ถัง)</td>
            <td align="center">
            @if($data['num_bucket'] != 0)
              {{$data['num_bucket']}}
            @endif
            </td>
            <td>{{$data['list_bucket']}}</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>ถั่วงอก (ตะกร้า)</td>
            <td align="center">
            @if($data['num_basket'] != 0)
              {{$data['num_basket']}}
            @endif
            </td>
            <td>{{$data['list_basket']}}</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="320">ผู้รับของ............................</td>
            <td width="">ผู้รับเงิน............................</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </table>
</page>

<page size="A5">
  <table width="100%" border="0" cellpadding="5" cellspacing="5" id="Table_4">
    <tr>
      <td height="50" colspan="5" valign="bottom" >
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tbody>
          <tr>
            <td width="5">&nbsp;</td>
            <td width="150">{{$data['car_name']}} / {{$data['customer_no']}}</td>
            <td><center>
              <strong style="font-size: 18px">บิลเงินสด</strong><br>(ถั่วงอก)
            </center></td>
            <td width="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขที่ {{$data['order_id']}}</td>
            <td width="5">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="5" align="center" valign="middle" ><img src="{{URL::asset('images/logo.jpg') }}" height="10" alt=""></td>
    </tr>
    <tr>
      <td rowspan="4"> <img src="{{URL::asset('images/Scan_06.jpg') }}" width=="5" height="370" alt=""></td>
      <td colspan="3"  width="360">
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tbody>
            <tr>
              <td width="300">ชื่อ {{$data['customer_name']}}</td>
              <td>วันที่ {{$strprintDate}}</td>
            </tr>
            <tr>
              <td colspan="2">ตลาด {{$data['market_name']}}</td>
            </tr>
            <tr>
            <td colspan="2">ที่อยู่ {{$data['customer_address']}}</td>
          </tr>
          </tbody>
        </table>
      </td>
      <td rowspan="4"> <img src="{{URL::asset('images/Scan_08.jpg') }}" width=="5" height="370" alt=""></td>
    </tr>
    <tr>
      <td colspan="3"><table width="100%" border="1" cellpadding="1" cellspacing="0" class="listItem">
        <tbody>
          <tr>
            <th width="60">จำนวน</th>
            <th>รายการ</th>
            <th width="60">หน่วยละ</th>
            <th width="80">จำนวนเงิน</th>
          </tr>
          {{-- print only i in (6,7,8,19,20) --}}
          @for ($i = 0; $i < 20; $i++)
            @if ($i == 5 || $i == 6 || $i == 7 || $i == 18 || $i == 19)
              <tr>
                <td align="center">{{$data['p'.($i+1)]}}</td>
                <td>{{$products[$i]->name}}</td>
                <td>&nbsp;</td>
                <td align="right">
                  @if($data['p'.($i+1).'_amount'] != "" )
                    {{number_format($data['p'.($i+1).'_amount'],2)}}
                  @endif
                </td>
              </tr>
            @endif
          @endfor
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center">{{$data['num_bucket']}}</td>
            <td>ถั่วงอก (ถัง)</td>
            <td>&nbsp;</td>
            <td align="right">
            @if($data['bucket_amount'] != "" )
              {{number_format($data['bucket_amount'],2)}}
            @endif
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>{{$data['list_bucket']}}</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="center">{{$data['num_basket']}}</td>
            <td>ถั่วงอก (ตะกร้า)</td>
            <td>&nbsp;</td>
            <td align="right">
            @if($data['basket_amount'] != "" )
              {{number_format($data['basket_amount'],2)}}
            @endif
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>{{$data['list_basket']}}</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="right"><strong>รวม</strong></td>
            <td align="right">@if($data['bean_total_amount'] != "" ){{number_format($data['bean_total_amount'],2)}}@endif</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="bottom">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="320">ผู้รับของ............................</td>
              <td width="">ผู้รับเงิน............................</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</page>
@endif
@if($data['tofu_total_amount'] > 0)
<page size="A5">
  <table width="100%" height="486" border="0" cellpadding="5" cellspacing="5" id="Table_5">
    <tr>
      <td height="50" colspan="5" valign="bottom" >
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tbody>
          <tr>
            <td width="5">&nbsp;</td>
            <td width="150">{{$data['car_name']}} / {{$data['customer_no']}}</td>
            <td><center>
              <strong style="font-size: 18px">ใบส่งของ</strong><br>(เต้าหู้/เส้น)
            </center></td>
            <td width="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขที่ {{$data['order_id']}}</td>
            <td width="5">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="5" align="center" valign="middle" ><img src="{{URL::asset('images/logo.jpg') }}" alt="" height="10"></td>
    </tr>
    <tr>
      <td rowspan="4"> <img src="{{URL::asset('images/Scan_06.jpg') }}" width=="5" height="370" alt=""></td>
      <td colspan="3"  width="360">
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tbody>
          <tr>
            <td width="300">ชื่อ {{$data['customer_name']}}</td>
            <td>วันที่ {{$strprintDate}}</td>
          </tr>
          <tr>
            <td colspan="2">ตลาด {{$data['market_name']}}</td>
          </tr>
          <tr>
            <td colspan="2">ที่อยู่ {{$data['customer_address']}}</td>
          </tr>
        </tbody>
      </table>
      </td>
      <td height="5" rowspan="4"> <img src="{{URL::asset('images/Scan_08.jpg') }}" width=="5" height="370" alt=""></td>
    </tr>
    <tr>
      <td colspan="3"><table width="100%" border="1" cellpadding="1" cellspacing="0" class="listItem">
        <tbody>
          <tr>
            <th>รายการ</th>
            <th width="60">จำนวน</th>
            <th width="80">จำนวนรวม</th>
          </tr>
          @for ($i = 0; $i < 5; $i++)
            <tr>
              <td>{{$products[$i]->name}}</td>
              <td align="center">{{$data['p'.($i+1)]}}</td>
              <td>
                @if($data['p'.($i+1)] != "" )
                  {{$data['p'.($i+1)]*$products[$i]->weight}} กิโล
                @endif
              </td>
            </tr>
          @endfor

          @for ($i = 21; $i < 23; $i++)
            <tr>
              <td>{{$products[$i]->name}}</td>
              <td align="center">{{$data['p'.($i+1)]}}</td>
              <td>
                @if($data['p'.($i+1)] != "" )
                  {{$data['p'.($i+1)]*$products[$i]->weight}} กิโล
                @endif
              </td>
            </tr>
          @endfor
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="320">ผู้รับของ............................</td>
            <td width="">ผู้รับเงิน............................</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </table>
</page>

<page size="A5">
  <table width="100%" border="0" cellpadding="5" cellspacing="5" id="Table_4">
    <tr>
      <td height="50" colspan="5" valign="bottom" >
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tbody>
          <tr>
            <td width="5">&nbsp;</td>
            <td width="150">{{$data['car_name']}} / {{$data['customer_no']}}</td>
            <td><center>
              <strong style="font-size: 18px">บิลเงินสด</strong><br>(เต้าหู้/เส้น)
            </center></td>
            <td width="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขที่ {{$data['order_id']}}</td>
            <td width="5">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="5" align="center" valign="middle" ><img src="{{URL::asset('images/logo.jpg') }}" height="10" alt=""></td>
    </tr>
    <tr>
      <td rowspan="4"> <img src="{{URL::asset('images/Scan_06.jpg') }}" width=="5" height="370" alt=""></td>
      <td colspan="3"  width="360">
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tbody>
            <tr>
              <td width="300">ชื่อ {{$data['customer_name']}}</td>
              <td>วันที่ {{$strprintDate}}</td>
            </tr>
            <tr>
              <td colspan="2">ตลาด {{$data['market_name']}}</td>
            </tr>
            <tr>
            <td colspan="2">ที่อยู่ {{$data['customer_address']}}</td>
          </tr>
          </tbody>
        </table>
      </td>
      <td rowspan="4"> <img src="{{URL::asset('images/Scan_08.jpg') }}" width=="5" height="370" alt=""></td>
    </tr>
    <tr>
      <td colspan="3"><table width="100%" border="1" cellpadding="1" cellspacing="0" class="listItem">
        <tbody>
          <tr>
            <th width="60">จำนวน</th>
            <th>รายการ</th>
            <th width="60">หน่วยละ</th>
            <th width="80">จำนวนเงิน</th>
          </tr>
          {{-- print only i in (1-5,22,23) --}}
          @for ($i = 0; $i < 23; $i++)
            @if ($i == 0 || $i == 1 || $i == 2 || $i == 3 || $i == 4 || $i == 21 || $i == 22)
              <tr>
                <td align="center">{{$data['p'.($i+1)]}}</td>
                <td>{{$products[$i]->name}}</td>
                <td>&nbsp;</td>
                <td align="right">
                  @if($data['p'.($i+1).'_amount'] != "" )
                    {{number_format($data['p'.($i+1).'_amount'],2)}}
                  @endif
                </td>
              </tr>
            @endif
          @endfor
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="right"><strong>รวม</strong></td>
            <td align="right">@if($data['tofu_total_amount'] != "" ){{number_format($data['tofu_total_amount'],2)}}@endif</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="bottom">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="320">ผู้รับของ............................</td>
              <td width="">ผู้รับเงิน............................</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</page>
@endif
@endif

</body>
</html>
