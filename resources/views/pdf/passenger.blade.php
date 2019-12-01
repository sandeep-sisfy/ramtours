<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <style type="text/css">
      @media print {
         @page {
            margin: 0 !important;
            padding: 0;
            size: 1560px 2040px;
         }
      }

      table {
         margin: 0;
         padding: 0;
         border-spacing: 0;
      }

      table.order_pdf td h2 {
         font-size: 23px !important;
         margin-top: 5px;
      }

      table.order_pdf td p {
         font-size: 17px;
         font-weight: normal;
      }

      table.order_inner td.order_inner_head {
         font-weight: bold;
         border-top: 1px solid #ccc;
         border-bottom: 1px solid #ccc;
      }

      table.order_inner {
         width: 100%;
         padding: 5px;
      }

      table.info_side {
         width: 100%;
      }

      td.order_heading.side h2 {
         padding: 15px;
         font-size: 18px !important;
         font-weight: bold;
      }

      td.order_heading.side p {
         padding: 0 15px;
      }

      table.order_total {
         width: 100%;
         padding-top: 10px;
      }

      table.order_total td {
         font-size: 13px;
         font-weight: 600;
         padding: 5px 0 !important;
      }

      span.rt_tmm {
         font-size: 16px !important;
         color: #000 !important;
         margin-bottom: 0;
         font-weight: 600;
         display: block;
      }

      table.info_side td.order_inner_head {
         font-weight: bold;
         padding: 4px 10px;
         border-top: 1px solid #ccc !important;
         border-bottom: 1px solid #ccc !important;
      }

      table.c_details,
      table.cust_info {
         border-top: 1px solid #ccc;
         border-right: 1px solid #ccc;
         border-bottom: 1px solid #ccc;
      }

      table.c_details td,
      table.cust_info td {
         border-left: 1px solid #ccc;
      }

      span.fltt-info {
         font-weight: bold;
      }
   </style>
</head>

<body>
   <table class="order_pdf" border="0" cellspacing="0">
      <tbody>
         <tr>
            <td>
               <h2>פרטי הזמנה: -{{ $title }} </h2>
               <p>מסמך זה אינו מהווה אישור סופי להזמנתך, הזמנתך כרוכה באישור סופי מול ספקי התיירות וחברת התעופה, נציגי
                  רם נסיעות ותיירות יחזרו אליכם תוך 48
                  שעות לאישורה הסופי
               </p>
            </td>
         </tr>
         <tr>
            <td colspan="2" valign="middle">
               <table style="padding:10px 0 5px 0;">
                  <tr>
                     <td width="40" height="40"><img width="40" height="40"
                           src="{{base_path().'/public/assets/pdf/images/passenger.png'}}" class="img-fluid" alt="">
                     </td>
                     <td align="right" height="40">
                        <h2 style="line-height:30px"> פרטי הנוסעים </h2>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td width="69%" style="border: 1px solid #ccc;">
               <table class="order_inner" width="100%" cellspacing="0" border="0">
                  <tbody>
                     @foreach($pack_passenger['adults'] as $adult)
                     <tr>
                        <td class="order_inner_head" colspan="4">
                           מבוגרים {{++$loop->index}}
                        </td>
                     </tr>
                     <tr>
                        <td width="40%">
                           <strong>שם הנוסע </strong><br />
                           <span class="order_inner_data">{{ $adult['name'] }}</span>
                        </td>
                        <td width="20%">
                           <strong>שם משפחה </strong><br>
                           <span class="order_inner_data">{{ $adult['family_name'] }} </span>
                        </td>

                        <td width="20%">
                           <strong>מין </strong><br />
                           @if($adult['sex'] == 'male')
                           זכר
                           @else
                           נקבה
                           @endif
                        </td>
                        <td width="20%">
                           <strong>תאריך לידה </strong><br />
                           {{$adult['dob_day'].'-'.$adult['dob_month'].'-'.$adult['dob_year']}}
                        </td>
                     </tr>
                     @endforeach
                     @foreach($pack_passenger['childs'] as $child)
                     <tr>
                        <td class="order_inner_head" colspan="4">
                           ילדים {{++$loop->index}}
                        </td>
                     </tr>
                     <tr>
                        <td width="40%">
                           <strong>שם הנוסע </strong><br />
                           <span class="order_inner_data">{{ $child['name'] }}</span>
                        </td>
                        <td width="20%">
                           <strong>שם משפחה </strong><br>
                           <span class="order_inner_data">{{ $child['family_name'] }} </span>
                        </td>

                        <td width="20%">
                           <strong>מין </strong><br />
                           @if($child['sex'] == 'male')
                           זכר
                           @else
                           נקבה
                           @endif
                        </td>
                        <td width="20%">
                           <strong>תאריך לידה </strong><br />
                           {{$child['dob_day'].'-'.$child['dob_month'].'-'.$child['dob_year']}}
                        </td>
                     </tr>
                     @endforeach
                     @if(!empty($pack_passenger['infants']))
                     @foreach($pack_passenger['infants'] as $infant)
                     <tr>
                        <td class="order_inner_head" colspan="4">
                           תינוק {{++$loop->index}}
                        </td>
                     </tr>
                     <tr>
                        <td width="40%">
                           <strong>שם הנוסע </strong><br />
                           <span class="order_inner_data">{{ $infant['name'] }}</span>
                        </td>
                        <td width="20%">
                           <strong>משם משפחה </strong><br>
                           <span class="order_inner_data">{{ $infant['family_name'] }} </span>
                        </td>

                        <td width="20%">
                           <strong>מין </strong><br />
                           @if($infant['sex'] == 'male')
                           זכר
                           @else
                           נקבה
                           @endif
                        </td>
                        <td width="20%">
                           <strong>תאריך לידה </strong><br />
                           {{$infant['dob_day'].'-'.$infant['dob_month'].'-'.$infant['dob_year']}}
                        </td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
               </table>
            </td>
            <td valign="top" width="31%" cellspacing="0" cellpadding="0" bgcolor="#e8e8ea"
               style="border-width: 1px 0 1px 1px;border-style: solid;border-color:#ccc;">
               <table class="info_side order_inner" border="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td colspan="2" class="order_inner_head">מספר נוסעים </td>
                     </tr>
                     <tr>
                        <td width="50%"><strong>מבוגרים : </strong></td>
                        <td width="50%">{{$adults}}</td>
                     </tr>
                     <tr>
                        <td><strong>ילדים : </strong></td>
                        <td>{{$kids}}</td>
                     </tr>
                     <tr>
                        <td><strong>תינוקות </strong></td>
                        <td>{{$infants}}</td>
                     </tr>

                     <tr>
                        <td colspan="2" class="order_inner_head">פרטים כלליים </td>
                     </tr>
                     <tr>
                        <td><strong>תאריך ההזמנה : </strong></td>
                        <td>{{$order_date}}</td>
                     </tr>
                     <tr>
                        <td><strong>סוג הזמנה : </strong></td>
                        <td>{{$order_type}} </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
</body>

</html>