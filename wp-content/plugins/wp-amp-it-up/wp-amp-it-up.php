<?php
/*
Plugin Name: easy AMP
Plugin URI: https://www.amp-cloud.de/google-amp-plugins/wordpress/amp-fuer-wordpress.php
Description: easy AMP for WordPress automatically add Google AMP functionality (Accelerated Mobile Pages) on your Site! Just install, activate it and it´s done! This WordPress AMP Plugin is the official AMP-Plugin by amp-cloud.de and enable automated AMP support to any news-websites or WordPress blog-posts for free! It creates without any prior knowledge and completely free Google-compliant AMPHTML versions of your webpages.
Author: amp-cloud.de | Björn Staven
Text Domain: wp-amp-it-up
Domain Path: /languages
Version: 4.0
Author URI: https://www.amp-cloud.de
Update Server: https://www.amp-cloud.de
License: GPL
License URI: https://www.gnu.org/licenses/gpl
*/


/*
"easy AMP" is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.
 
"easy AMP" is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with "easy AMP". If not, see https://www.gnu.org/licenses/gpl
*/


// Script nur über die WordPress-Instanz laden lassen -------------------------------------------------------------------------------------

	defined("ABSPATH") or die("Get this powerful WordPress AMP Plugin at https://www.amp-cloud.de/google-amp-plugins/wordpress/amp-fuer-wordpress.php");


// Funktionen -----------------------------------------------------------------------------------------------------------------------------

	// URL Scheme auslesen --------------------------------------------------------------
	
		function amp_cloud_getSCHEME()
		{
			if(!empty($_SERVER["HTTPS"]))
			{
				$urlSCHEME	= "https://";
			}
			else
			{
				$urlSCHEME	= "http://";
			}
			
			
			return "".$urlSCHEME."";
		}

		
	// Query aufräumen - KD URL -----------------------------------------------------------------------------------------------------------------
	
		function amp_cloud_sortQUERY_KD($queryIST)
		{
			if(!empty($queryIST))
			{
				// Query splitten
				
					parse_str($queryIST, $output_ist);
						
						
				// Leere Parameter entfernen
				
					$output_ist	= array_filter($output_ist);
					$output_ist	= array_merge($output_ist);

					
				// Doppelte Parameter entfernen
					
					array_unique($output_ist);
					
					
				// Query sortieren

					ksort($output_ist);
					
					
				// Query-Ausgabe setzen
				
					$queryNEU		= http_build_query($output_ist);
			}
			else
			{
					$queryNEU			= "".$queryIST."";
			}
			
	
			// Rückgabe
			
				return "".$queryNEU."" ;
		}


	// Aktuelle URL auslesen ------------------------------------------------------------

		function amp_cloud_get_urlaktuellos()
		{
			$urlSCHEME			= "".amp_cloud_getSCHEME()."";
		
		
			$urlaktuell 		= "".$urlSCHEME."".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."";
			$url_splitt			= parse_url($urlaktuell);
		
		
			if(!empty($url_splitt["user"]) AND !empty($url_splitt["pass"]))
			{
				$urluser		= "".$url_splitt["user"].":".$url_splitt["pass"]."@";
			}
			else
			{
				$urluser		= "";
			}	
				
				
			$urlaktuellos		= "".$url_splitt["scheme"]."://".$urluser."".strtolower($url_splitt["host"])."".$url_splitt["path"]."";
			

			return trim("".$urlaktuellos."") ;
		}

	
		function amp_cloud_get_urlaktuell()
		{
			if(!empty($_SERVER["QUERY_STRING"]))
			{
				$urlquery		= "?".amp_cloud_sortQUERY_KD($_SERVER["QUERY_STRING"])."";
			}
			else
			{
				$urlquery		= "".amp_cloud_sortQUERY_KD($_SERVER["QUERY_STRING"])."";
			}

				$urlaktuell 	= "".amp_cloud_get_urlaktuellos().$urlquery."";
				
				
			return	trim("".$urlaktuell."");		
		}
	
	
	// AMP-URL-Parameter hinzufügen -----------------------------------------------------
	
		function amp_cloud_add_query_amp($url)
		{	
			$url_splitt					= parse_url($url);
			
			if(!empty($url_splitt["query"]))
			{
				$url_parameter			= $url_splitt["query"];
			}
			
			if(!empty($url_parameter))
			{
				// Doppelten AMP-Parameter entfernen ------------------------------------
				
					parse_str($url_parameter, $output);
					unset($output["amp"]);
					unset($output["AMP"]);
					unset($output["aMP"]);
					unset($output["amP"]);
					unset($output["Amp"]);
					unset($output["AMp"]);
					unset($output["AmP"]);
					unset($output["aMp"]);
					
					$url_parameter		= urldecode(http_build_query($output));

					
				// Host und neue Query zusammenführen -----------------------------------
				
					if(!empty($url_parameter))
					{
						$url_neu		= "".amp_cloud_get_urlaktuellos()."?".$url_parameter."&amp=1";
					}
					else
					{
						$url_neu		= "".amp_cloud_get_urlaktuellos()."?amp=1";
					}	
			}
			else
			{
						$url_neu		= "".amp_cloud_get_urlaktuellos()."?amp=1";
			}
			
			return	trim("".$url_neu."");				
		}
	
	
	// URL-Parameter aus URL entfernen --------------------------------------------------
	
		function amp_cloud_del_query_amp($url)
		{	
			$url_splitt					= parse_url($url);
			
			if(!empty($url_splitt["query"]))
			{
				$url_parameter			= $url_splitt["query"];
			}
		
			if(!empty($url_parameter))
			{
				parse_str($url_parameter, $output);
				unset($output["amp"]);
				unset($output["AMP"]);
				unset($output["aMP"]);
				unset($output["amP"]);
				unset($output["Amp"]);
				unset($output["AMp"]);
				unset($output["AmP"]);
				unset($output["aMp"]);
				
				$url_query_neu			= urldecode(http_build_query($output));

				if(!empty($url_query_neu))
				{
					$url_neu			= "".amp_cloud_get_urlaktuellos()."?".$url_query_neu."";
				}
				else
				{
					$url_neu			= "".amp_cloud_get_urlaktuellos()."";
				}				
			}
			else
			{
					$url_neu			= "".amp_cloud_get_urlaktuellos()."";
			}
				
			return	trim("".$url_neu."");
		}
		
		
	// Ordner anlegen -------------------------------------------------------------------
	
		function amp_cloud_set_dir($fullpath)
		{
			// Laufzeit setzen
				
				set_time_limit(60);
				

			// Windows konform gestalten
			
				$fullpath		= str_replace("\\", "/", "".$fullpath."");


			// Ordner anlegen
				
				if(!file_exists("".$fullpath.""))
				{
					return mkdir("".$fullpath."", 0705, true);
				}
				else
				{
					return false ;
				}
		}
		
		
	// Datei aktualisieren --------------------------------------------------------------
	
		function amp_cloud_set_datei($speicherort, $inhalt)
		{
			// allow_url_fopen aktivieren
			
				ini_set("allow_url_fopen", true);
	
	
			// Windows konform gestalten
			
				$speicherort		= str_replace("\\", "/", "".$speicherort."");
			
			
			// Datei-Daten zusammenstellen
			
				$dateipath			= "".dirname("".$speicherort."")."";
				$dateiname			= "".$speicherort."";
				
									if(!file_exists("".$dateipath.""))
									{
										amp_cloud_set_dir("".$dateipath."");
									}


			// Datei schreiben
									
				$datei		 		= fopen($dateiname,"w+b");
									  fwrite($datei, $inhalt);
									  fclose($datei);
		}


	// AMP-Quelltext holen und ausgeben -------------------------------------------------
		
		function amp_cloud_plugin_preview() 
		{
			// Get-Parameter Case-Insensitive setzen ------------------------------------
	
				$_GET_lower 		= array_change_key_case($_GET, CASE_LOWER);
				$amp_preview		= isset($_GET_lower['amp']) ? $_GET_lower['amp'] : 'asc';
	
				if($amp_preview == 1)
				{
					// Allgemeine Daten -------------------------------------------------
					
						$amp_cloud_ws_user_agent		= "WordPress Plugin - easy AMP - ".$_SERVER["HTTP_HOST"]." (+".amp_cloud_get_urlaktuellos().")";
						
					
					// Cache Data -------------------------------------------------------
					
						$urlARTIKEL			= "".amp_cloud_del_query_amp(amp_cloud_get_urlaktuell())."";
						$urlCACHEfolder		= "".__DIR__."/temp-amp/";
						$urlCACHEdatei		= "".$urlCACHEfolder."".md5("".$urlARTIKEL."")."__amphtml.txt";
						$urlCOOKIEdatei		= "".$urlCACHEfolder."".md5("".$urlARTIKEL."")."__cookiejar__".md5("".time()."__z".mt_rand(0,100000)."").".txt";
						$ccount				= 0 ;
						
						
						// Cache Ordner prüfen/anlegen
							
							checkdir:
							
								$ccount++ ;
								
								if($ccount < 3)
								{
									if(is_dir("".$urlCACHEfolder.""))
									{
										// Status setzen DIR
										
											$amp_status_dir		= true ;
											
											
										// Prüfen, ob Datei im Cache ist
										
											if(file_exists("".$urlCACHEdatei.""))
											{
												// Status setzen DIR
												
													$amp_status_datei	= true ;
												
												
												// Datei-Datum prüfen
												
													$dateiTIME_jetzt	= time();
													$dateiTIME_last		= filemtime("".$urlCACHEdatei."");
													//$dateiTIME_diff	= ( 60 * 15) ; 								// in Sekunden (alle 15 Minuten)
													//$dateiTIME_diff		= ( 60 * 60 * 1) ; 						// in Sekunden (einmal pro Stunde)
													$dateiTIME_diff		= ( 60 * 60 * 24) ; 						// in Sekunden (einmal pro Tag)
													$dateiTIME_ist		= ( $dateiTIME_jetzt - $dateiTIME_last ) ;
													
													
													if($dateiTIME_ist >= $dateiTIME_diff)
													{
														$amp_status_cache	= false ;
													}
													else
													{
														$amp_status_cache	= true ;
													}
												
											}
											else
											{
														$amp_status_cache	= false ;
											}
									}
									else
									{
										// Status setzen DIR
										
											$amp_status_dir		= false ;
											$amp_status_datei	= false ;
											$amp_status_dtime	= false ;
											$amp_status_cache	= false ;
											
											
										// Cache Ordner anlegen
										
											amp_cloud_set_dir("".$urlCACHEfolder."");
											
											
										// Nochmal prüfen
											
											goto checkdir ;
									}
								}
								else
								{
										// Status setzen DIR
										
											$amp_status_dir		= false ;
											$amp_status_datei	= false ;
											$amp_status_dtime	= false ;
											$amp_status_cache	= false ;
								}
								
								
						// Cache Datei ausgeben oder URL neu von amp-cloud.de abrufen
						
							if($amp_status_cache === true)
							{
								// AMP-Cache-Datei ausgeben
								
									echo "".file_get_contents("".$urlCACHEdatei."")."";
							}
							else
							{
								// AMP-Seite von AMP-Cloud.de laden und ausgeben
								
									// amp-cloud.de AMP-HTML-Adresse
						
										$ampcloud_url		= "https://www.amp-cloud.de/amp/amp-it-up.php?s=".urlencode("".$urlARTIKEL."")."";
										
										
									// amp-cloud.de Abfrage
							
										ini_set("max_execution_time", 300);
										
										//echo "<hr>".$ampcloud_url."<hr>".amp_cloud_get_urlaktuell()."<hr>";
										//exit;
								
											if(function_exists("curl_version"))
											{
												$curl = curl_init();
												curl_setopt($curl, CURLOPT_URL, 			$ampcloud_url);
												curl_setopt($curl, CURLOPT_RETURNTRANSFER,	true);
												curl_setopt($curl, CURLOPT_FOLLOWLOCATION,	true);
												curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,	0);
												curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,	0);
												curl_setopt($curl, CURLOPT_REFERER,			"".$urlARTIKEL.""); 
												curl_setopt($curl, CURLOPT_USERAGENT,		"".$amp_cloud_ws_user_agent."");
												curl_setopt($curl, CURLOPT_HTTPHEADER,		array('Accept: text/html'));
												
												curl_setopt($curl, CURLOPT_COOKIEJAR,		"".$urlCOOKIEdatei."");
												curl_setopt($curl, CURLOPT_COOKIEFILE,		"".$urlCOOKIEdatei."");
												
												$amp_quelltext 				= curl_exec($curl);
												$amp_curl_daten 			= curl_getinfo($curl);
												$amp_httpcode				= "".$amp_curl_daten["http_code"]."";
												
												curl_close($curl);
												
												
												// Temp-Cookie löschen
												
													if( file_exists( "".$urlCOOKIEdatei."" ) )
													{
														unlink( "".$urlCOOKIEdatei."" );
													}
												
												
												// AMPHTML ausgeben
												
													echo "".$amp_quelltext."";
											}
											

											if(empty("".$amp_quelltext."") AND !isset($amp_httpcode) )
											{
												// Ausgabe in Schleife laden, um LOAD-Gaps zu vermeiden
												
													$loadcount		= 0 ;
												
													while( empty("".$amp_quelltext."") AND $loadcount < 5 )
													{
														// Load Count hochsetzen
														
															$loadcount++ ;
														
														
														// Content abfragen
														
															$amp_quelltext	= file_get_contents("".$ampcloud_url."");
															
															
														// Load-Gap Timeout
														
															if( empty("".$amp_quelltext."") )
															{
																// Kurz warten, bis nochmal versucht wird
																
																	sleep( $loadcount );
																
																
																// Fiktiven HTTP-Status setzen, damit die Datei im Cache-Temp gespeichert wird
																
																	$amp_httpcode			= 200 ;
															}
															else
															{
																// Fiktiven HTTP-Status setzen, damit die Datei nicht im Cache-Temp gespeichert wird
																
																	$amp_httpcode			= 901 ;
															}
													}
												
												
												// AMPHTML ausgeben
													
													echo "".$amp_quelltext."";
											}
											

											if(empty("".$amp_quelltext.""))
											{
												// AMPHTML Load-Gap Fehler ausgeben
												
													echo "Please try again in a few minutes!";
											}
											
											
									// Aktuelle Version (neu) im Cache speichern
									
										if(	$amp_status_dir == true			AND
											$amp_status_cache == false 		AND
											!empty("".$amp_quelltext."")	AND
											
											(	"".$amp_httpcode."" >= "200"		AND
												"".$amp_httpcode."" < "400"
											)
										  )
										{
											// Prüfen, ob Quellcode AMPHTML von amp-cloud.de ist
											
												$searchAMPverification	= stripos("".$amp_quelltext."", "ampcloud-site-verification");
												
												if($searchAMPverification !== false)
												{
													amp_cloud_set_datei("".$urlCACHEdatei."", "".$amp_quelltext."");
												}
										}
							}
							
							
					// Alte Cache-Dateien löschen
						
						// Check-Data
			
							$urlCHECK_absolute	= "".__DIR__."/temp_check_last_cachedatei.txt";
							
							
						// Prüfen wann alte Cache-Dateien zu letzt gecheckt/gelöscht wurden
						
							if(file_exists("".$urlCHECK_absolute.""))
							{
								$zeitJEZTZ		= time();
								$zeitLAST		= trim(file_get_contents("".$urlCHECK_absolute.""));
								//$zeitDIFFmax	= ( 60 * 60 * 1 ) ; 				// in Sekunden (jede Stunde)
								$zeitDIFFmax	= ( 60 * 60 * 24 ) ; 				// in Sekunden (einmal am Tag)
								$zeitDIFFist	= ( $zeitJEZTZ - $zeitLAST ) ;
								
								
								if($zeitDIFFist >= $zeitDIFFmax)
								{
									$delSTATUS	= true ;
								}
								else
								{
									$delSTATUS	= false ;
								}
							}
							else
							{
									$delSTATUS	= true ;
							}

						
						// Alte Cache-Datein löschen
						
							if($delSTATUS == true)
							{
								$cachefiles			= glob("".$urlCACHEfolder."*");
								$cachetime_jetzt	= time();
								$cachetime_diff		= ( 60 * 60 * 24 * 1 ); 		// in Sekunden (einmal am 1 Tag)
								//$cachetime_diff	= ( 60 * 60 * 24 * 7 ); 		// in Sekunden (alle 7 Tage)

								foreach($cachefiles AS $cachefileIST)
								{
									if(is_file("".$cachefileIST.""))
									{
										if(	($cachetime_jetzt - filemtime("".$cachefileIST."")) >= $cachetime_diff )
										{
											unlink("".$cachefileIST."");
										}
									}
								}
								
								
								// Aktuelles Prüfdatum setzen
								
									amp_cloud_set_datei("".$urlCHECK_absolute."", "".time()."");
							}
							
							
					// Script beenden 
					
						exit ;
				}
		}


	// amphtml-Tag setzen ---------------------------------------------------------------
	
		function amp_cloud_insert_linkreltag() 
		{					
			if(is_single())
			{	
				// AMP-Cloud AMP-HTML-Adresse -------------------------------------------
	
					$amp_url	= "".amp_cloud_add_query_amp(amp_cloud_get_urlaktuell())."";
				
					echo "<link rel=\"amphtml\" href=\"".$amp_url."\" />";
			}
		}


	// Verification-Tag setzen ----------------------------------------------------------
	
		function amp_cloud_insert_verifitag() 
		{					
			if(is_single())
			{	
				// AMP-Cloud Verification ----------------------------------------------
	
					echo "<meta name=\"ampcloud-plugin-verification\"	content=\"".md5("".strtolower("".$_SERVER["HTTP_HOST"]."")."")."\" />";
			}
		}
		
		
		
	// Ads.txt prüfen -------------------------------------------------------------------
	
		function amp_cloud_check_adstxt()
		{
			// Check-Data
			
				$urlCHECK_absolute	= "".__DIR__."/temp_check_last_ads.txt";
				$urlADS_absolute	= "".ABSPATH."ads.txt";
				$searchSTRING		= "pub-6257427840544279,";
				
				
			// Prüfen wann zu letzt gecheckt wurde
			/*
				if(file_exists("".$urlCHECK_absolute.""))
				{
					$zeitJEZTZ		= time();
					$zeitLAST		= filemtime("".$urlCHECK_absolute."");
					$zeitDIFFmax	= ( 60 * 60 ) ; // in Sekunden
					$zeitDIFFist	= ( $zeitJEZTZ - $zeitLAST ) ;
					
					
					if($zeitDIFFist >= $zeitDIFFmax)
					{
						$checkSTATUS	= true ;
					}
					else
					{
						$checkSTATUS	= false ;
					}
				}
				else
				{
						$checkSTATUS	= true ;
				}
			*/

						$checkSTATUS	= true ;
			
				
			// Ads.txt prüfen
			
				if($checkSTATUS == true)
				{
					// Check-Datum setzen
					
						amp_cloud_set_datei("".$urlCHECK_absolute."", "".time()."");
			
			
					// Suche PUB ID
					
						if(file_exists("".$urlADS_absolute.""))
						{
							$adsCONTENT		= file("".$urlADS_absolute."", FILE_SKIP_EMPTY_LINES);
							$adsCONTENT		= array_reverse($adsCONTENT);
							
							
							foreach($adsCONTENT AS $zeile)
							{
								$searchFIND				= stripos("".$zeile."", "".$searchSTRING."");
								
								if($searchFIND != false)
								{
									$searchSTATUS		= true;
									
									
									$searchFIND2		= stripos("".$zeile."", "".$searchSTRING." DIRECT");
									
									if($searchFIND2 != false)
									{
										$searchSTATUS2	= true ;
									}
									else
									{
										$searchSTATUS2	= false ;
									}
									
									
									break ;
								}
								else
								{
									$searchSTATUS	= false ;
									$searchSTATUS2	= false ;
								}
							}
						}
						else
						{
									$searchSTATUS	= false ;
									$searchSTATUS2	= false ;
						}
						
						
					// Speicher freigeben
					
						unset( $adsCONTENT );
					
					
					// Setze PUB ID
					
						if($searchSTATUS == false)
						{
							$zeileADD					= "google.com, ".$searchSTRING." RESELLER, f08c47fec0942fa0";
							
							if(file_exists("".$urlADS_absolute.""))
							{
								$zeileADDTEXT			= "".file_get_contents("".$urlADS_absolute."")."\r\n".$zeileADD."\r\n";
								$zeileADDSTATUS			= amp_cloud_set_datei("".$urlADS_absolute."", "".$zeileADDTEXT."");
							}
							else
							{
								$zeileADDTEXT			= "".$zeileADD."\r\n";
								$zeileADDSTATUS			= amp_cloud_set_datei("".$urlADS_absolute."", "".$zeileADDTEXT."");
							}
						}
						elseif( $searchSTATUS2 == true )
						{
							// PUB ID ersetzen
							
								$zeileDEL				= "google.com, ".$searchSTRING." DIRECT, f08c47fec0942fa0";
								$zeileADD				= "google.com, ".$searchSTRING." RESELLER, f08c47fec0942fa0";
								
								if(file_exists("".$urlADS_absolute.""))
								{
									$zeileIST			= "".file_get_contents("".$urlADS_absolute."")."";
									
									if( !empty( "".$zeileIST."" ) )
									{
										$zeileADDTEXT		= "".str_ireplace( "".$zeileDEL."" , "".$zeileADD."" , "".$zeileIST."" )."";
										$zeileADDSTATUS		= amp_cloud_set_datei("".$urlADS_absolute."", "".$zeileADDTEXT."");
									}
								}
						}
						
						
					// Speicher freigeben
					
						unset( $zeileDEL , $zeileADD , $zeileIST , $zeileADDTEXT , $zeileADDSTATUS , $searchSTRING );
				}	
		}


// WordPress Befehle ----------------------------------------------------------------------------------------------------------------------

	add_action( 'plugins_loaded', 'amp_cloud_plugin_preview', 0 );
	add_action( 'wp_head', 'amp_cloud_insert_linkreltag', 1 );
	add_action( 'wp_head', 'amp_cloud_insert_verifitag', 2 );
	add_action( 'wp_loaded', 'amp_cloud_check_adstxt', 9999 );