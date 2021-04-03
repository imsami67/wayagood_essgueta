
<?php 
include_once 'php_action/db_connect.php';
if(isset($_REQUEST['get_shiporderid'])){
				
			

				$id = mysqli_real_escape_string($dbc,(strip_tags($_REQUEST["get_shiporderid"],ENT_QUOTES)));
			
				$sql = "SELECT * from sale_order where order_id='$id'";
				$result=mysqli_query($dbc,$sql);
				$mostrar=mysqli_fetch_array($result);


				$shippnumber = "GCC2"."-".$mostrar['order_id']."-".date('d-m-y')."-"."nwicrm";
				$ordernumber = "GCC2"."-".$mostrar['order_id']."-".date('d-m-y')."-"."nwicrm";
				$name_client = $mostrar['nameClient']." ".$mostrar['lastNameClient'];
				$phone = $mostrar['phoneClient'];
				$address = $mostrar['dirClient'];
				$zipcode = $mostrar['zipcodeClient'];
				$city = $mostrar['cityClient'];
				$state = $mostrar['stateClient'];
				$product1 = $mostrar['product1'];
				$product2 = $mostrar['product2'];
				$product3 = $mostrar['product3'];
				$product4 = $mostrar['product4'];
				$product5 = '';
				$qty1 = $mostrar['qty1'];
				$qty2 = $mostrar['qty2'];
				$qty3 = $mostrar['qty3'];
				$qty4 = $mostrar['qty4'];
			
				$date = date('y/m/d');
				$qtyproducts = $mostrar['qty1']+$mostrar['qty2']+$mostrar['qty3']+$mostrar['qty4'];
				$qtyoncesproducts = $qtyproducts*2;

				$length = 2;
				$width = 4;
				$heigth = 6;
				
				if ($product5 == ""){

					if($product4 == ""){

						if($product3 == ""){

							if($product2 == ""){

								if($product1 == ""){

								}else{

									$sql1 = "SELECT * from db_products where id='product1'";
									$result1=mysqli_query($dbc,$sql1);
									$mostrar1=mysqli_fetch_array($result1);
									$idproduct1 = ($mostrar1['id']+1)-1;
									$sku1 = $mostrar1['sku'];
									$weight1 = $mostrar1['weight'];
									$nombreproduct1 = $mostrar1['name'];
									$qty1onces = $qty1 * $mostrar1['weight'];
				
									$dateorder = gmdate('Y-m-d h:i:s \G\M\T');
							
									$ch = curl_init();				
									curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders/createorder");
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
									curl_setopt($ch, CURLOPT_HEADER, FALSE);				
									curl_setopt($ch, CURLOPT_POST, TRUE);				
									curl_setopt($ch, CURLOPT_POSTFIELDS, "{
									\"orderNumber\": \"$shippnumber\",
									\"orderKey\": \"$ordernumber\",
									\"orderDate\": \"$dateorder\",
									\"paymentDate\": null,
									\"shipByDate\": null,
									\"orderStatus\": \"awaiting_shipment\",
									\"customerId\": \"12\",
									\"customerusername\": \"$name_client\",
									\"customerEmail\": null,
									\"billTo\": {
										\"name\": \"$name_client\",
										\"company\": null,
										\"street1\": null,
										\"street2\": null,
										\"street3\": null,
										\"city\": null,
										\"state\": null,
										\"postalCode\": null,
										\"country\": null,
										\"phone\": null,
										\"residential\": null
									},
									\"shipTo\": {
										\"name\": \"$name_client\",
										\"company\": null,
										\"street1\": \"$address\",
										\"street2\": null,
										\"street3\": null,
										\"city\": \"$city\",
										\"state\": \"$state\",
										\"postalCode\": \"$zipcode\",
										\"country\": \"US\",
										\"phone\": \"$phone\",
										\"residential\": true
									},
									\"items\": [									
													{
										\"lineItemKey\": \"vd08-MSLbtx\",
										\"sku\": \"$sku1\",
										\"name\": \"$nombreproduct1\",
										\"imageUrl\": null,
										\"weight\": {
											\"value\": $qty1onces,
											\"units\": \"ounces\"
										},
										\"quantity\": $qty1,
										\"unitPrice\": 0,
										\"taxAmount\": 0,
										\"shippingAmount\": 0,
										\"warehouseLocation\": null,
										\"options\": [
											{
											\"name\": \"Size\",
											\"value\": \"Large\"
											}
										],
										\"productId\": $idproduct1,
										\"fulfillmentSku\": null,
										\"adjustment\": false,
										\"upc\": \"00-00-00\"
										},
									],
									\"amountPaid\": 0,
									\"taxAmount\": 0,
									\"shippingAmount\": 0,
									\"customerNotes\": null,
									\"internalNotes\": null,
									\"gift\": false,
									\"giftMessage\": null,
									\"paymentMethod\": null,
									\"requestedShippingService\": \"Priority Mail\",
									\"carrierCode\": \"fedex\",
									\"serviceCode\": \"fedex_2day\",
									\"packageCode\": null,
									\"confirmation\": \"delivery\",							
									\"shipDate\": \"2019-11-18\",
									\"weight\": {
										\"value\": $qtyoncesproducts,
										\"units\": \"ounces\"
									},
									\"dimensions\": {
										\"units\": \"inches\",
										\"length\": $length,
										\"width\": $width,
										\"height\": $heigth
									},
									\"insuranceOptions\": {
										\"provider\": \"carrier\",
										\"insureShipment\": false,
										\"insuredValue\": 0
									},
									\"internationalOptions\": {
										\"contents\": null,
										\"customsItems\": null
									},
									\"advancedOptions\": {
										\"warehouseId\": null,
										\"nonMachinable\": false,
										\"saturdayDelivery\": true,
										\"containsAlcohol\": false,
										\"mergedOrSplit\": false,
										\"mergedIds\": [],
										\"parentId\": null,
										\"storeId\": \"448660\",
										\"customField1\": \"Custom data that you can add to an order. See Custom Field #2 & #3 for more info!\",
										\"customField2\": \"Per UI settings, this information can appear on some carrier's shipping labels. See link below\",
										\"customField3\": \"https://help.shipstation.com/hc/en-us/articles/206639957\",
										\"source\": \"Webstore\",
										\"billToParty\": null,
										\"billToAccount\": null,
										\"billToPostalCode\": null,
										\"billToCountryCode\": null
									},
									\"tagIds\": [
										12345
									]
									}");
									
									$entrada = 'MzQ2YTEzZDE3ODMyNGViOWIwZWE2OTM3MGQ1Mjk2OGQ6OGY1ZjgzMDMyYjFlNGU3NWFlNzg0YjNhMWIxYzk2MmM=';
									
									curl_setopt($ch, CURLOPT_HTTPHEADER, array(
									"Content-Type: application/json",
									"Authorization: Basic $entrada",
									));
									
                                    $response = curl_exec($ch);
                                    curl_close($ch);
									$update = mysqli_query($dbc, "UPDATE sale_order SET ship_order_number='$shippnumber' WHERE order_id='$id'");
									//header("Location:loadsales.php?order_id".$id);

									if ($update) {
					$res=['msg'=>"Order Has Been  Successfully Sent",'sts'=>'success'];

					}else{ 
						$res=['msg'=>mysqli_error($dbc),'sts'=>'error'];
					}	
								}								
				
							}else{

							$sql2 = "SELECT * from db_products where id='$product2'";
							$result2=mysqli_query($dbc,$sql2);
							$mostrar2=mysqli_fetch_array($result2);
							$idproduct2 = ($mostrar2['id']+1)-1;
							$sku2 = $mostrar2['sku'];
							$weight2 = $mostrar2['weight'];
							$nombreproduct2 = $mostrar2['name'];
							$qty2onces = $qty2 * $mostrar2['weight'];
		
							$sql1 = "SELECT * from db_products where id='$product1'";
							$result1=mysqli_query($dbc,$sql1);
							$mostrar1=mysqli_fetch_array($result1);
							$idproduct1 = ($mostrar1['id']+1)-1;
							$sku1 = $mostrar1['sku'];
							$weight1 = $mostrar1['weight'];
							$nombreproduct1 = $mostrar1['name'];
							$qty1onces = $qty1 * $mostrar1['weight'];
		
							$dateorder = gmdate('Y-m-d h:i:s \G\M\T');
							
							$ch = curl_init();				
							curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders/createorder");
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
							curl_setopt($ch, CURLOPT_HEADER, FALSE);				
							curl_setopt($ch, CURLOPT_POST, TRUE);				
							curl_setopt($ch, CURLOPT_POSTFIELDS, "{
							\"orderNumber\": \"$shippnumber\",
							\"orderKey\": \"$ordernumber\",
							\"orderDate\": \"$dateorder\",
							\"paymentDate\": null,
							\"shipByDate\": null,
							\"orderStatus\": \"awaiting_shipment\",
							\"customerId\": \"12\",
							\"customerusername\": \"$name_client\",
							\"customerEmail\": null,
							\"billTo\": {
								\"name\": \"$name_client\",
								\"company\": null,
								\"street1\": null,
								\"street2\": null,
								\"street3\": null,
								\"city\": null,
								\"state\": null,
								\"postalCode\": null,
								\"country\": null,
								\"phone\": null,
								\"residential\": null
							},
							\"shipTo\": {
								\"name\": \"$name_client\",
								\"company\": null,
								\"street1\": \"$address\",
								\"street2\": null,
								\"street3\": null,
								\"city\": \"$city\",
								\"state\": \"$state\",
								\"postalCode\": \"$zipcode\",
								\"country\": \"US\",
								\"phone\": \"$phone\",
								\"residential\": true
							},
							\"items\": [									
											{
								\"lineItemKey\": \"vd08-MSLbtx\",
								\"sku\": \"$sku1\",
								\"name\": \"$nombreproduct1\",
								\"imageUrl\": null,
								\"weight\": {
									\"value\": $qty1onces,
									\"units\": \"ounces\"
								},
								\"quantity\": $qty1,
								\"unitPrice\": 0,
								\"taxAmount\": 0,
								\"shippingAmount\": 0,
								\"warehouseLocation\": null,
								\"options\": [
									{
									\"name\": \"Size\",
									\"value\": \"Large\"
									}
								],
								\"productId\": $idproduct1,
								\"fulfillmentSku\": null,
								\"adjustment\": false,
								\"upc\": \"00-00-00\"
								},
								{
									\"lineItemKey\": \"vd08-MSLbtx\",
									\"sku\": \"$sku2\",
									\"name\": \"$nombreproduct2\",
									\"imageUrl\": null,
									\"weight\": {
										\"value\": $qty2onces,
										\"units\": \"ounces\"
									},
									\"quantity\": $qty2,
									\"unitPrice\": 0,
									\"taxAmount\": 0,
									\"shippingAmount\": 0,
									\"warehouseLocation\": null,
									\"options\": [
										{
										\"name\": \"Size\",
										\"value\": \"Large\"
										}
									],
									\"productId\": $idproduct2,
									\"fulfillmentSku\": null,
									\"adjustment\": false,
									\"upc\": \"00-00-00\"
									},
							],
							\"amountPaid\": 0,
							\"taxAmount\": 0,
							\"shippingAmount\": 0,
							\"customerNotes\": null,
							\"internalNotes\": null,
							\"gift\": false,
							\"giftMessage\": null,
							\"paymentMethod\": null,
							\"requestedShippingService\": \"Priority Mail\",
							\"carrierCode\": \"fedex\",
							\"serviceCode\": \"fedex_2day\",
							\"packageCode\": null,
							\"confirmation\": \"delivery\",							
							\"shipDate\": \"2019-11-18\",
							\"weight\": {
								\"value\": $qtyoncesproducts,
								\"units\": \"ounces\"
							},
							\"dimensions\": {
								\"units\": \"inches\",
								\"length\": $length,
								\"width\": $width,
								\"height\": $heigth
							},
							\"insuranceOptions\": {
								\"provider\": \"carrier\",
								\"insureShipment\": false,
								\"insuredValue\": 0
							},
							\"internationalOptions\": {
								\"contents\": null,
								\"customsItems\": null
							},
							\"advancedOptions\": {
								\"warehouseId\": null,
								\"nonMachinable\": false,
								\"saturdayDelivery\": true,
								\"containsAlcohol\": false,
								\"mergedOrSplit\": false,
								\"mergedIds\": [],
								\"parentId\": null,
								\"storeId\": \"448660\",
								\"customField1\": \"Custom data that you can add to an order. See Custom Field #2 & #3 for more info!\",
								\"customField2\": \"Per UI settings, this information can appear on some carrier's shipping labels. See link below\",
								\"customField3\": \"https://help.shipstation.com/hc/en-us/articles/206639957\",
								\"source\": \"Webstore\",
								\"billToParty\": null,
								\"billToAccount\": null,
								\"billToPostalCode\": null,
								\"billToCountryCode\": null
							},
							\"tagIds\": [
								12345
							]
							}");
							
							$entrada = 'MzQ2YTEzZDE3ODMyNGViOWIwZWE2OTM3MGQ1Mjk2OGQ6OGY1ZjgzMDMyYjFlNGU3NWFlNzg0YjNhMWIxYzk2MmM=';
							
							curl_setopt($ch, CURLOPT_HTTPHEADER, array(
							"Content-Type: application/json",
							"Authorization: Basic $entrada",
							));
							
							$response = curl_exec($ch);
							print_r($response);
							curl_close($ch);
							$update = mysqli_query($dbc, "UPDATE sale_order SET ship_order_number='$shippnumber' WHERE order_id='$id'");
							//header("Location:loadsales.php?order_id".$id);

							if ($update) {
					$res=['msg'=>"Order Has Been  Successfully Sent",'sts'=>'success'];

					}else{ 
						$res=['msg'=>mysqli_error($dbc),'sts'=>'error'];
					}
							}
							
						}else{

							$sql3 = "SELECT * from db_products where id='$product3'";
							$result3=mysqli_query($dbc,$sql3);
							$mostrar3=mysqli_fetch_array($result3);
							$idproduct3 = ($mostrar3['id']+1)-1;
							$sku3 = $mostrar3['sku'];
							$weight3 = $mostrar3['weight'];
							$nombreproduct3 = $mostrar3['name'];
							$qty3onces = $qty3 * $mostrar3['weight'];
		
							$sql2 = "SELECT * from db_products where id='$product2'";
							$result2=mysqli_query($dbc,$sql2);
							$mostrar2=mysqli_fetch_array($result2);
							$idproduct2 = ($mostrar2['id']+1)-1;
							$sku2 = $mostrar2['sku'];
							$weight2 = $mostrar2['weight'];
							$nombreproduct2 = $mostrar2['name'];
							$qty2onces = $qty2 * $mostrar2['weight'];
		
							$sql1 = "SELECT * from db_products where id='$product1'";
							$result1=mysqli_query($dbc,$sql1);
							$mostrar1=mysqli_fetch_array($result1);
							$idproduct1 = ($mostrar1['id']+1)-1;
							$sku1 = $mostrar1['sku'];
							$weight1 = 1;
							$nombreproduct1 = $mostrar1['name'];
							$qty1onces = $qty1 * $mostrar1['weight'];
		
							$dateorder = gmdate('Y-m-d h:i:s \G\M\T');
							
						$ch = curl_init();				
						curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders/createorder");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
						curl_setopt($ch, CURLOPT_HEADER, FALSE);				
						curl_setopt($ch, CURLOPT_POST, TRUE);				
						curl_setopt($ch, CURLOPT_POSTFIELDS, "{
						  \"orderNumber\": \"$shippnumber\",
						  \"orderKey\": \"$ordernumber\",
						  \"orderDate\": \"$dateorder\",
						  \"paymentDate\": null,
						  \"shipByDate\": null,
						  \"orderStatus\": \"awaiting_shipment\",
						  \"customerId\": \"12\",
						  \"customerusername\": \"$name_client\",
						  \"customerEmail\": null,
						  \"billTo\": {
							\"name\": \"$name_client\",
							\"company\": null,
							\"street1\": null,
							\"street2\": null,
							\"street3\": null,
							\"city\": null,
							\"state\": null,
							\"postalCode\": null,
							\"country\": null,
							\"phone\": null,
							\"residential\": null
						  },
						  \"shipTo\": {
							\"name\": \"$name_client\",
							\"company\": null,
							\"street1\": \"$address\",
							\"street2\": null,
							\"street3\": null,
							\"city\": \"$city\",
							\"state\": \"$state\",
							\"postalCode\": \"$zipcode\",
							\"country\": \"US\",
							\"phone\": \"$phone\",
							\"residential\": true
						  },
						  \"items\": [									
										{
							\"lineItemKey\": \"vd08-MSLbtx\",
							\"sku\": \"$sku1\",
							\"name\": \"$nombreproduct1\",
							\"imageUrl\": null,
							\"weight\": {
								\"value\": $qty1onces,
								\"units\": \"ounces\"
							},
							\"quantity\": $qty1,
							\"unitPrice\": 0,
							\"taxAmount\": 0,
							\"shippingAmount\": 0,
							\"warehouseLocation\": null,
							\"options\": [
								{
								\"name\": \"Size\",
								\"value\": \"Large\"
								}
							],
							\"productId\": $idproduct1,
							\"fulfillmentSku\": null,
							\"adjustment\": false,
							\"upc\": \"00-00-00\"
							},
							{
								\"lineItemKey\": \"vd08-MSLbtx\",
								\"sku\": \"$sku2\",
								\"name\": \"$nombreproduct2\",
								\"imageUrl\": null,
								\"weight\": {
									\"value\": $qty2onces,
									\"units\": \"ounces\"
								},
								\"quantity\": $qty2,
								\"unitPrice\": 0,
								\"taxAmount\": 0,
								\"shippingAmount\": 0,
								\"warehouseLocation\": null,
								\"options\": [
									{
									\"name\": \"Size\",
									\"value\": \"Large\"
									}
								],
								\"productId\": $idproduct2,
								\"fulfillmentSku\": null,
								\"adjustment\": false,
								\"upc\": \"00-00-00\"
								},
							{
								\"lineItemKey\": \"vd08-MSLbtx\",
								\"sku\": \"$sku3\",
								\"name\": \"$nombreproduct3\",
								\"imageUrl\": null,
								\"weight\": {
									\"value\": $qty3onces,
									\"units\": \"ounces\"
								},
								\"quantity\": $qty3,
								\"unitPrice\": 0,
								\"taxAmount\": 0,
								\"shippingAmount\": 0,
								\"warehouseLocation\": null,
								\"options\": [
									{
									\"name\": \"Size\",
									\"value\": \"Large\"
									}
								],
								\"productId\": $idproduct3,
								\"fulfillmentSku\": null,
								\"adjustment\": false,
								\"upc\": \"00-00-00\"
								},
						  ],
						  \"amountPaid\": 0,
						  \"taxAmount\": 0,
						  \"shippingAmount\": 0,
						  \"customerNotes\": null,
						  \"internalNotes\": null,
						  \"gift\": false,
						  \"giftMessage\": null,
						  \"paymentMethod\": null,
						  \"requestedShippingService\": \"Priority Mail\",
						  \"carrierCode\": \"fedex\",
						  \"serviceCode\": \"fedex_2day\",
						  \"packageCode\": null,
						  \"confirmation\": \"delivery\",							
						  \"shipDate\": \"2019-11-18\",
						  \"weight\": {
							\"value\": $qtyoncesproducts,
							\"units\": \"ounces\"
						  },
						  \"dimensions\": {
							\"units\": \"inches\",
							\"length\": $length,
							\"width\": $width,
							\"height\": $heigth
						  },
						  \"insuranceOptions\": {
							\"provider\": \"carrier\",
							\"insureShipment\": false,
							\"insuredValue\": 0
						  },
						  \"internationalOptions\": {
							\"contents\": null,
							\"customsItems\": null
						  },
						  \"advancedOptions\": {
							\"warehouseId\": null,
							\"nonMachinable\": false,
							\"saturdayDelivery\": true,
							\"containsAlcohol\": false,
							\"mergedOrSplit\": false,
							\"mergedIds\": [],
							\"parentId\": null,
							\"storeId\": \"448660\",
							\"customField1\": \"Custom data that you can add to an order. See Custom Field #2 & #3 for more info!\",
							\"customField2\": \"Per UI settings, this information can appear on some carrier's shipping labels. See link below\",
							\"customField3\": \"https://help.shipstation.com/hc/en-us/articles/206639957\",
							\"source\": \"Webstore\",
							\"billToParty\": null,
							\"billToAccount\": null,
							\"billToPostalCode\": null,
							\"billToCountryCode\": null
						  },
						  \"tagIds\": [
							12345
						  ]
						}");
						
						$entrada = 'MzQ2YTEzZDE3ODMyNGViOWIwZWE2OTM3MGQ1Mjk2OGQ6OGY1ZjgzMDMyYjFlNGU3NWFlNzg0YjNhMWIxYzk2MmM=';
						
						curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						  "Content-Type: application/json",
						  "Authorization: Basic $entrada",
						));
						
						$response = curl_exec($ch);
						curl_close($ch);
						$update = mysqli_query($dbc, "UPDATE sale_order SET ship_order_number='$shippnumber' WHERE order_id='$id'");
						//header("Location:loadsales.php?order_id".$id);

						if ($update) {
					$res=['msg'=>"Order Has Been  Successfully Sent",'sts'=>'success'];

					}else{ 
						$res=['msg'=>mysqli_error($dbc),'sts'=>'error'];
					}
						}		
                        
					}else{
						
							$sql4 = "SELECT * from db_products where id='$product4'";
							$result4=mysqli_query($dbc,$sql4);
							$mostrar4=mysqli_fetch_array($result4);
							$idproduct4 = ($mostrar4['id']+1)-1;
							$sku4 = $mostrar4['sku'];
							$weight4 = $mostrar4['weight'];
							$nombreproduct4 = $mostrar4['name'];
							$qty4onces = $qty4 * $mostrar4['weight'];
		
							$sql3 = "SELECT * from db_products where id='$product3'";
							$result3=mysqli_query($dbc,$sql3);
							$mostrar3=mysqli_fetch_array($result3);
							$idproduct3 = ($mostrar3['id']+1)-1;
							$sku3 = $mostrar3['sku'];
							$weight3 = $mostrar3['weight'];
							$nombreproduct3 = $mostrar3['name'];
							$qty3onces = $qty3 * $mostrar3['weight'];
		
							$sql2 = "SELECT * from db_products where id='$product2'";
							$result2=mysqli_query($dbc,$sql2);
							$mostrar2=mysqli_fetch_array($result2);
							$idproduct2 = ($mostrar2['id']+1)-1;
							$sku2 = $mostrar2['sku'];
							$weight2 = $mostrar2['weight'];
							$nombreproduct2 = $mostrar2['name'];
							$qty2onces = $qty2 * $mostrar2['weight'];
		
							$sql1 = "SELECT * from db_products where id='$product1'";
							$result1=mysqli_query($dbc,$sql1);
							$mostrar1=mysqli_fetch_array($result1);
							$idproduct1 = ($mostrar1['id']+1)-1;
							$sku1 = $mostrar1['sku'];
							$weight1 = $mostrar1['weight'];
							$nombreproduct1 = $mostrar1['name'];
							$qty1onces = (int)$qty1 * (int)$mostrar1['weight'];
		
							$dateorder = gmdate('Y-m-d h:i:s \G\M\T');
							
						$ch = curl_init();				
						curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders/createorder");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
						curl_setopt($ch, CURLOPT_HEADER, FALSE);				
						curl_setopt($ch, CURLOPT_POST, TRUE);				
						curl_setopt($ch, CURLOPT_POSTFIELDS, "{
						  \"orderNumber\": \"$shippnumber\",
						  \"orderKey\": \"$ordernumber\",
						  \"orderDate\": \"$dateorder\",
						  \"paymentDate\": null,
						  \"shipByDate\": null,
						  \"orderStatus\": \"awaiting_shipment\",
						  \"customerId\": \"12\",
						  \"customerusername\": \"$name_client\",
						  \"customerEmail\": null,
						  \"billTo\": {
							\"name\": \"$name_client\",
							\"company\": null,
							\"street1\": null,
							\"street2\": null,
							\"street3\": null,
							\"city\": null,
							\"state\": null,
							\"postalCode\": null,
							\"country\": null,
							\"phone\": null,
							\"residential\": null
						  },
						  \"shipTo\": {
							\"name\": \"$name_client\",
							\"company\": null,
							\"street1\": \"$address\",
							\"street2\": null,
							\"street3\": null,
							\"city\": \"$city\",
							\"state\": \"$state\",
							\"postalCode\": \"$zipcode\",
							\"country\": \"US\",
							\"phone\": \"$phone\",
							\"residential\": true
						  },
						  \"items\": [									
										{
							\"lineItemKey\": \"vd08-MSLbtx\",
							\"sku\": \"$sku1\",
							\"name\": \"$nombreproduct1\",
							\"imageUrl\": null,
							\"weight\": {
								\"value\": $qty1onces,
								\"units\": \"ounces\"
							},
							\"quantity\": $qty1,
							\"unitPrice\": 0,
							\"taxAmount\": 0,
							\"shippingAmount\": 0,
							\"warehouseLocation\": null,
							\"options\": [
								{
								\"name\": \"Size\",
								\"value\": \"Large\"
								}
							],
							\"productId\": $idproduct1,
							\"fulfillmentSku\": null,
							\"adjustment\": false,
							\"upc\": \"00-00-00\"
							},
							{
								\"lineItemKey\": \"vd08-MSLbtx\",
								\"sku\": \"$sku2\",
								\"name\": \"$nombreproduct2\",
								\"imageUrl\": null,
								\"weight\": {
									\"value\": $qty2onces,
									\"units\": \"ounces\"
								},
								\"quantity\": $qty2,
								\"unitPrice\": 0,
								\"taxAmount\": 0,
								\"shippingAmount\": 0,
								\"warehouseLocation\": null,
								\"options\": [
									{
									\"name\": \"Size\",
									\"value\": \"Large\"
									}
								],
								\"productId\": $idproduct2,
								\"fulfillmentSku\": null,
								\"adjustment\": false,
								\"upc\": \"00-00-00\"
								},
							{
								\"lineItemKey\": \"vd08-MSLbtx\",
								\"sku\": \"$sku3\",
								\"name\": \"$nombreproduct3\",
								\"imageUrl\": null,
								\"weight\": {
									\"value\": $qty3onces,
									\"units\": \"ounces\"
								},
								\"quantity\": $qty3,
								\"unitPrice\": 0,
								\"taxAmount\": 0,
								\"shippingAmount\": 0,
								\"warehouseLocation\": null,
								\"options\": [
									{
									\"name\": \"Size\",
									\"value\": \"Large\"
									}
								],
								\"productId\": $idproduct3,
								\"fulfillmentSku\": null,
								\"adjustment\": false,
								\"upc\": \"00-00-00\"
								},
							{
								\"lineItemKey\": \"vd08-MSLbtx\",
								\"sku\": \"$sku4\",
								\"name\": \"$nombreproduct4\",
								\"imageUrl\": null,
								\"weight\": {
									\"value\": $qty4onces,
									\"units\": \"ounces\"
								},
								\"quantity\": $qty4,
								\"unitPrice\": 0,
								\"taxAmount\": 0,
								\"shippingAmount\": 0,
								\"warehouseLocation\": null,
								\"options\": [
									{
									\"name\": \"Size\",
									\"value\": \"Large\"
									}
								],
								\"productId\": $idproduct4,
								\"fulfillmentSku\": null,
								\"adjustment\": false,
								\"upc\": \"00-00-00\"
								},
						  ],
						  \"amountPaid\": 0,
						  \"taxAmount\": 0,
						  \"shippingAmount\": 0,
						  \"customerNotes\": null,
						  \"internalNotes\": null,
						  \"gift\": false,
						  \"giftMessage\": null,
						  \"paymentMethod\": null,
						  \"requestedShippingService\": \"Priority Mail\",
						  \"carrierCode\": \"fedex\",
						  \"serviceCode\": \"fedex_2day\",
						  \"packageCode\": null,
						  \"confirmation\": \"delivery\",							
						  \"shipDate\": \"2019-11-18\",
						  \"weight\": {
							\"value\": $qtyoncesproducts,
							\"units\": \"ounces\"
						  },
						  \"dimensions\": {
							\"units\": \"inches\",
							\"length\": $length,
							\"width\": $width,
							\"height\": $heigth
						  },
						  \"insuranceOptions\": {
							\"provider\": \"carrier\",
							\"insureShipment\": false,
							\"insuredValue\": 0
						  },
						  \"internationalOptions\": {
							\"contents\": null,
							\"customsItems\": null
						  },
						  \"advancedOptions\": {
							\"warehouseId\": null,
							\"nonMachinable\": false,
							\"saturdayDelivery\": true,
							\"containsAlcohol\": false,
							\"mergedOrSplit\": false,
							\"mergedIds\": [],
							\"parentId\": null,
							\"storeId\": \"448660\",
							\"customField1\": \"Custom data that you can add to an order. See Custom Field #2 & #3 for more info!\",
							\"customField2\": \"Per UI settings, this information can appear on some carrier's shipping labels. See link below\",
							\"customField3\": \"https://help.shipstation.com/hc/en-us/articles/206639957\",
							\"source\": \"Webstore\",
							\"billToParty\": null,
							\"billToAccount\": null,
							\"billToPostalCode\": null,
							\"billToCountryCode\": null
						  },
						  \"tagIds\": [
							12345
						  ]
						}");
						
						$entrada = 'MzQ2YTEzZDE3ODMyNGViOWIwZWE2OTM3MGQ1Mjk2OGQ6OGY1ZjgzMDMyYjFlNGU3NWFlNzg0YjNhMWIxYzk2MmM=';
						
						curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						  "Content-Type: application/json",
						  "Authorization: Basic $entrada",
						));
						
						$response = curl_exec($ch);
						curl_close($ch);
						$update = mysqli_query($dbc, "UPDATE sale_order SET ship_order_number='$shippnumber' WHERE order_id='$id'");
						//header("Location:loadsales.php?order_id".$id);

						if ($update) {
					$res=['msg'=>"Order Has Been  Successfully Sent",'sts'=>'success'];

					}else{ 
						$res=['msg'=>mysqli_error($dbc),'sts'=>'error'];
					}
						}
					
				}else{

					$sql5 = "SELECT * from db_products where id='product5'";
					$result5=mysqli_query($dbc,$sql5);
					$mostrar5=mysqli_fetch_array($result5);
					$idproduct5 = ($mostrar5['id']+1)-1;
					$sku5 = $mostrar5['sku'];
					$weight5 = $mostrar5['weight'];
					$nombreproduct5 = $mostrar5['name'];
					$qty5onces = $qty5 * $mostrar5['weight'];

					$sql4 = "SELECT * from db_products where id='$product4'";
					$result4=mysqli_query($dbc,$sql4);
					$mostrar4=mysqli_fetch_array($result4);
					$idproduct4 = ($mostrar4['id']+1)-1;
					$sku4 = $mostrar4['sku'];
					$weight4 = $mostrar4['weight'];
					$nombreproduct4 = $mostrar4['name'];
					$qty4onces = $qty4 * $mostrar4['weight'];

					$sql3 = "SELECT * from db_products where id='$product3'";
					$result3=mysqli_query($dbc,$sql3);
					$mostrar3=mysqli_fetch_array($result3);
					$idproduct3 = ($mostrar3['id']+1)-1;
					$sku3 = $mostrar3['sku'];
					$weight3 = $mostrar3['weight'];
					$nombreproduct3 = $mostrar3['name'];
					$qty3onces = $qty3 * $mostrar3['weight'];

					$sql2 = "SELECT * from db_products where id='$product2'";
					$result2=mysqli_query($dbc,$sql2);
					$mostrar2=mysqli_fetch_array($result2);
					$idproduct2 = ($mostrar2['id']+1)-1;
					$sku2 = $mostrar2['sku'];
					$weight2 = $mostrar2['weight'];
					$nombreproduct2 = $mostrar2['name'];
					$qty2onces = $qty2 * $mostrar2['weight'];

					$sql1 = "SELECT * from db_products where id='$product1'";
					$result1=mysqli_query($dbc,$sql1);
					$mostrar1=mysqli_fetch_array($result1);
					$idproduct1 = ($mostrar1['id']+1)-1;
					$sku1 = $mostrar1['sku'];
					$weight1 = $mostrar1['weight'];
					$nombreproduct1 = $mostrar1['name'];
					$qty1onces = $qty1 * $mostrar1['weight'];

					$dateorder = gmdate('Y-m-d h:i:s \G\M\T');
					
				$ch = curl_init();				
				curl_setopt($ch, CURLOPT_URL, "https://ssapi.shipstation.com/orders/createorder");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, FALSE);				
				curl_setopt($ch, CURLOPT_POST, TRUE);				
				curl_setopt($ch, CURLOPT_POSTFIELDS, "{
				  \"orderNumber\": \"$shippnumber\",
				  \"orderKey\": \"$ordernumber\",
				  \"orderDate\": \"$dateorder\",
				  \"paymentDate\": null,
				  \"shipByDate\": null,
				  \"orderStatus\": \"awaiting_shipment\",
				  \"customerId\": \"12\",
				  \"customerusername\": \"$name_client\",
				  \"customerEmail\": null,
				  \"billTo\": {
					\"name\": \"$name_client\",
					\"company\": null,
					\"street1\": null,
					\"street2\": null,
					\"street3\": null,
					\"city\": null,
					\"state\": null,
					\"postalCode\": null,
					\"country\": null,
					\"phone\": null,
					\"residential\": null
				  },
				  \"shipTo\": {
					\"name\": \"$name_client\",
					\"company\": null,
					\"street1\": \"$address\",
					\"street2\": null,
					\"street3\": null,
					\"city\": \"$city\",
					\"state\": \"$state\",
					\"postalCode\": \"$zipcode\",
					\"country\": \"US\",
					\"phone\": \"$phone\",
					\"residential\": true
				  },
				  \"items\": [									
            					{
					\"lineItemKey\": \"vd08-MSLbtx\",
					\"sku\": \"$sku1\",
					\"name\": \"$nombreproduct1\",
					\"imageUrl\": null,
					\"weight\": {
						\"value\": $qty1onces,
						\"units\": \"ounces\"
					},
					\"quantity\": $qty1,
					\"unitPrice\": 0,
					\"taxAmount\": 0,
					\"shippingAmount\": 0,
					\"warehouseLocation\": null,
					\"options\": [
						{
						\"name\": \"Size\",
						\"value\": \"Large\"
						}
					],
					\"productId\": $idproduct1,
					\"fulfillmentSku\": null,
					\"adjustment\": false,
					\"upc\": \"00-00-00\"
					},
					{
						\"lineItemKey\": \"vd08-MSLbtx\",
						\"sku\": \"$sku2\",
						\"name\": \"$nombreproduct2\",
						\"imageUrl\": null,
						\"weight\": {
							\"value\": $qty2onces,
							\"units\": \"ounces\"
						},
						\"quantity\": $qty2,
						\"unitPrice\": 0,
						\"taxAmount\": 0,
						\"shippingAmount\": 0,
						\"warehouseLocation\": null,
						\"options\": [
							{
							\"name\": \"Size\",
							\"value\": \"Large\"
							}
						],
						\"productId\": $idproduct2,
						\"fulfillmentSku\": null,
						\"adjustment\": false,
						\"upc\": \"00-00-00\"
						},
					{
						\"lineItemKey\": \"vd08-MSLbtx\",
						\"sku\": \"$sku3\",
						\"name\": \"$nombreproduct3\",
						\"imageUrl\": null,
						\"weight\": {
							\"value\": $qty3onces,
							\"units\": \"ounces\"
						},
						\"quantity\": $qty3,
						\"unitPrice\": 0,
						\"taxAmount\": 0,
						\"shippingAmount\": 0,
						\"warehouseLocation\": null,
						\"options\": [
							{
							\"name\": \"Size\",
							\"value\": \"Large\"
							}
						],
						\"productId\": $idproduct3,
						\"fulfillmentSku\": null,
						\"adjustment\": false,
						\"upc\": \"00-00-00\"
						},
					{
						\"lineItemKey\": \"vd08-MSLbtx\",
						\"sku\": \"$sku4\",
						\"name\": \"$nombreproduct4\",
						\"imageUrl\": null,
						\"weight\": {
							\"value\": $qty4onces,
							\"units\": \"ounces\"
						},
						\"quantity\": $qty4,
						\"unitPrice\": 0,
						\"taxAmount\": 0,
						\"shippingAmount\": 0,
						\"warehouseLocation\": null,
						\"options\": [
							{
							\"name\": \"Size\",
							\"value\": \"Large\"
							}
						],
						\"productId\": $idproduct4,
						\"fulfillmentSku\": null,
						\"adjustment\": false,
						\"upc\": \"00-00-00\"
						},
					{
						\"lineItemKey\": \"vd08-MSLbtx\",
						\"sku\": \"$sku5\",
						\"name\": \"$nombreproduct5\",
						\"imageUrl\": null,
						\"weight\": {
							\"value\": $qty5onces,
							\"units\": \"ounces\"
						},
						\"quantity\": $qty5,
						\"unitPrice\": 0,
						\"taxAmount\": 0,
						\"shippingAmount\": 0,
						\"warehouseLocation\": null,
						\"options\": [
							{
							\"name\": \"Size\",
							\"value\": \"Large\"
							}
						],
						\"productId\": $idproduct5,
						\"fulfillmentSku\": null,
						\"adjustment\": false,
						\"upc\": \"00-00-00\"
						},
				  ],
				  \"amountPaid\": 0,
				  \"taxAmount\": 0,
				  \"shippingAmount\": 0,
				  \"customerNotes\": null,
				  \"internalNotes\": null,
				  \"gift\": false,
				  \"giftMessage\": null,
				  \"paymentMethod\": null,
				  \"requestedShippingService\": \"Priority Mail\",
				  \"carrierCode\": \"fedex\",
				  \"serviceCode\": \"fedex_2day\",
				  \"packageCode\": null,
				  \"confirmation\": \"delivery\",							
				  \"shipDate\": \"2019-11-18\",
				  \"weight\": {
					\"value\": $qtyoncesproducts,
					\"units\": \"ounces\"
				  },
				  \"dimensions\": {
					\"units\": \"inches\",
					\"length\": $length,
					\"width\": $width,
					\"height\": $heigth
				  },
				  \"insuranceOptions\": {
					\"provider\": \"carrier\",
					\"insureShipment\": false,
					\"insuredValue\": 0
				  },
				  \"internationalOptions\": {
					\"contents\": null,
					\"customsItems\": null
				  },
				  \"advancedOptions\": {
					\"warehouseId\": null,
					\"nonMachinable\": false,
					\"saturdayDelivery\": true,
					\"containsAlcohol\": false,
					\"mergedOrSplit\": false,
					\"mergedIds\": [],
					\"parentId\": null,
					\"storeId\": \"448660\",
					\"customField1\": \"Custom data that you can add to an order. See Custom Field #2 & #3 for more info!\",
					\"customField2\": \"Per UI settings, this information can appear on some carrier's shipping labels. See link below\",
					\"customField3\": \"https://help.shipstation.com/hc/en-us/articles/206639957\",
					\"source\": \"Webstore\",
					\"billToParty\": null,
					\"billToAccount\": null,
					\"billToPostalCode\": null,
					\"billToCountryCode\": null
				  },
				  \"tagIds\": [
					12345
				  ]
				}");
				
				$entrada = 'MzQ2YTEzZDE3ODMyNGViOWIwZWE2OTM3MGQ1Mjk2OGQ6OGY1ZjgzMDMyYjFlNGU3NWFlNzg0YjNhMWIxYzk2MmM=';
				
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				  "Content-Type: application/json",
				  "Authorization: Basic $entrada",
				));
				
				$response = curl_exec($ch);
				curl_close($ch);
				$update = mysqli_query($dbc, "UPDATE sale_order SET ship_order_number='$shippnumber' WHERE order_id='$id'");
				//header("Location:loadsales.php?order_id".$id);
				if ($update) {
					$res=['msg'=>"Order Has Been  Successfully Sent",'sts'=>'success'];

					}else{ 
						$res=['msg'=>mysqli_error($dbc),'sts'=>'error'];
					}
				}
				//print_r($response);
	echo json_encode($res);
			} ?>