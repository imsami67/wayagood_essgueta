<?php 
include_once 'php_action/db_connect.php';
include_once 'inc/functions.php';

  if(isset($_REQUEST['get_tracking'])){
                $id=$_REQUEST['get_tracking'];
                $oder_data=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM sale_order WHERE order_id='$id'"));
                $orderNumber = $oder_data['ship_order_number'];
               // $goUrlApi = "https://ssapi.shipstation.com/shipments?orderNumber=".$orderNumber;

            //     $ch = curl_init();                  
            //     curl_setopt($ch, CURLOPT_URL, $goUrlApi);
            //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            //     curl_setopt($ch, CURLOPT_HEADER, FALSE);
                
            //                                      
            //         curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
            //         "Content-Type: application/json",
            //         "Authorization: $entrada",
            //             ));

$entrada = '';
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://ssapi.shipstation.com/shipments?&orderNumber=".$orderNumber."orderId=2",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                  CURLOPT_HTTPHEADER => array(
                    "Host: ssapi.shipstation.com",
                    "Authorization:Basic MzQ2YTEzZDE3ODMyNGViOWIwZWE2OTM3MGQ1Mjk2OGQ6OGY1ZjgzMDMyYjFlNGU3NWFlNzg0YjNhMWIxYzk2MmM"
                  ),
                ));

                @$response = curl_exec($curl);

                curl_close($curl);
               // echo $response;
             //   print_r($response);

                // $response = curl_exec($ch);
                // //print_r($response);
                // curl_close($ch);
                
                @$cadena = explode(",", $response);
                @$array = explode(":", $cadena[10]);
                @$arreglo = explode('"', $array[1]);
                @$track = $arreglo[1];
               if (!empty($track)) {
                	 @$update = mysqli_query($conn, "UPDATE sale_order SET tracking_number='$track' WHERE order_id='$id'") or die(mysqli_error());
                
                if($update){
                   $res=['msg'=>"Tracking Has Been  Successfully Saved",'sts'=>'success'];

                }else{
                    $res=['msg'=>mysqli_error($dbc),'sts'=>'error'];
                }

                @$cadena2 = explode(",", $response);
                @$array2 = explode(":", $cadena2[62]);
                @$arreglo2 = explode('"', $array2[1]);
                @$track2 = $arreglo2[1];
                @$update2 = mysqli_query($conn, "UPDATE sale_order SET tracking_number_return='$track2' WHERE id='$id'") or die(mysqli_error());
                
                if($update2){
                   $res=['msg'=>"Tracking Has Been  Successfully Saved",'sts'=>'success'];
                }else{
                      $res=['msg'=>mysqli_error($dbc),'sts'=>'error'];
                }
               }else{
               	 $res=['msg'=>"Tracking Number not assigned yet",'sts'=>'error'];
               }
               
                echo json_encode($res);
            
            }

 ?>