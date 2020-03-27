<?php
class Emails_model extends CI_Model {
		private $sendfrom;
		private $adminemail;
		private $adminmobile;
		private $sitetitle;
		private $siteurl;
		private $mailHeader;
		private $mailFooter;

		function __construct() {
// Call the Model constructor
				parent :: __construct();
				$this->adminemail = $this->get_admin_email();
				$this->adminmobile = $this->get_admin_mobile();
				$siteInfo = $this->get_siteTitleUrl();
				$this->sitetitle = $siteInfo['title'];
				$this->siteurl = addHttp($siteInfo['url']);

				$headFootShortcode = array("{siteTitle}","{siteUrl}");
				$headFootVals = array($this->sitetitle,$this->siteurl);

				$mailsettings = $this->get_mailserver();
				$this->mailHeader = str_replace($headFootShortcode, $headFootVals, $mailsettings[0]->mail_header);
				$this->mailFooter = str_replace($headFootShortcode, $headFootVals, $mailsettings[0]->mail_footer);
				
				if ($mailsettings[0]->mail_default == "smtp") {
					
					if($mailsettings[0]->mail_secure == "no"){
						$secure = "";
					}else{
						$secure = $mailsettings[0]->mail_secure."://";
					}
						$this->sendfrom = $mailsettings[0]->mail_fromemail;
						$config = Array('protocol' => 'smtp', 'charset' => 'utf-8',
							'smtp_host' => $secure.$mailsettings[0]->mail_hostname, 
							'smtp_port' => $mailsettings[0]->mail_port, 
							'smtp_user' => $mailsettings[0]->mail_username, 'smtp_pass' => $mailsettings[0]->mail_password, 'mailtype' => 'html', 'charset' => 'iso-8859-1', 'wordwrap' => TRUE,'smtp_auth' => TRUE);
						$this->load->library('email', $config);
				}
				else {
						$this->sendfrom = $mailsettings[0]->mail_fromemail;
						$this->load->library('email');
						$this->email->set_mailtype("html");
				}
				
		}

		function sendtestemail($toemail) {
				$this->email->set_newline("\r\n");
				$message = $this->mailHeader;
				$message .= $this->sendfrom." --this is test email <br>";
				$message .= $this->mailFooter;
				$this->email->from($this->sendfrom);
				$this->email->to($toemail);
				$this->email->subject('tesing email server');
				$this->email->message($message);
				if (!$this->email->send()) {
						echo $this->email->print_debugger();
				}
				else {
						echo 'Email sent';
				}
		}
		function getNewConfirmEmailMessage($booking_data,$img,$segments_data)
		{
			$segments = '';
			foreach($segments_data as $s)
			{
				$segments.='<tr><td><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:6px 0"><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:30px" width="33%" align="left"><tbody><tr><td style="width:30px" width="30"><img src="https://ci6.googleusercontent.com/proxy/27bAiEznhTBjuDTK27sH-4mVNAMzC9Eyzr1auaeX5HPDBwo0NClXqvexdfUtu-_kc8mMzrasWeQlVEnGSf4xYVkY81mJ6RMg4NbsjjHA-xcngnSrt15j-H89rfIXCSY=s0-d-e1-ft#https://s1.travix.com/vayama/global/assets/email/icons/v2/airplane_right.png" style="border:none;vertical-align:middle;max-width:21px;width:21px" width="21" class="CToWUd"></td><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3">'.$s->depart_date.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->depart_name.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->arrive_name.' </td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr>';
			}
			$message = '<div style="font-family:Roboto,sans-serif;margin:0;padding:0">
    <table cellpadding="0" cellspacing="0" style="width:100%;background-color:#efeee5;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#EFEEE5"><tbody><tr><td style="display:none;overflow:hidden;float:left;line-height:0px;font-size:0"></td></tr><tr><td style="background-color:#ffffff" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="height:60px;color:#ffffff;padding-top:17px;padding-bottom:12px;width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" height="60" align="center"><tbody><tr><td style="height:0"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:90%;margin:0 20px;margin-left:auto;margin-right:auto" width="90%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:50%" width="50%" align="left"><tbody><tr><td><a href="https://tripmeng.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://tripmeng.com/&amp;source=gmail&amp;ust=1573553267019000&amp;usg=AFQjCNF_0uoFRTdTtPYG3V0O39CzmUlGDg"><img alt="" src="'.PT_GLOBAL_IMAGES_FOLDER.$img.'" style="border:none;width:150px" class="CToWUd"></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="padding-top:24px"><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="border-top-left-radius:5px;border-top-right-radius:5px;text-align:center;background-color:#1a91da;border-bottom:2px dashed #ffffff" align="center" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-bottom:15px;padding-top:15px;font-size:30.96px;color:#ffffff;text-align:center;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">You will receive your e-ticket later today</td></tr></tbody></table></td></tr><tr><td style="padding:10px 30px;text-align:left;color:#757575;background-color:#ffffff" align="left" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Dear '.$booking_data[0]->custfirstname.' '.$booking_data[0]->custlastname.'</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Thank you for your booking. Here is your booking request acknowledgement. You will receive your e-ticket and payment overview in a separate email today. <br> <br>Important: Please check this confirmation carefully. If any details are wrong, please phone us as soon as possible to try to limit change fees.<br> <br>Tip: you will find all information about your booking in Easy Fly With Us.</td></tr></tbody></table></td></tr><tr><td style="text-align:left;height:30px;padding:10px 30px;font-size:12px;font-weight:400;line-height:16px;vertical-align:middle;border-top:2px solid #efeee5;background-color:#f7f8f1;color:#757575;border-bottom-left-radius:5px;border-bottom-right-radius:5px" height="30" align="left" valign="middle" bgcolor="#F7F8F1">Booking number <strong>'.$booking_data[0]->booking_id.'</strong></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="background-color:#ffffff;border-radius:5px;overflow:hidden;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="width:100%;padding:10px 30px;border-bottom:2px solid #efeee5;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="vertical-align:top;text-align:left;width:70%;margin-left:auto;margin-right:auto" width="70%" align="left" valign="top"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Your booking details</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;font-size:0;height:10px"><td>&nbsp;</td></tr><tr><td style="padding:0 30px;text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;height:50px"><td style="text-align:left;width:50%;font-size:16px;color:#757575" width="50%" align="left"><table cellpadding="0" cellspacing="0"><tbody><tr><td>Airline Name: <strong style="color:#414141">'.$segments_data[0]->carrier_name.'</strong></td></tr></tbody></table></td><td style="text-align:right;width:50%" width="50%" align="right"><img alt="'.$segments_data[0]->carrier_name.'" src="'.$segments_data[0]->carrier_img.'" style="border:none;width:90px" width="90" class="CToWUd"></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:10px"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr>'.$segments.'<tr><td style="background-color:#ffffff;padding:20px 30px;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">The following products will be charged directly by the charging companies in the following currencies:</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">Charged approximately by '.$segments_data[0]->carrier_name.' '.$booking_data[0]->total_price.' USD </td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:20px 30px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;overflow:hidden;background-color:#1a91da;border-bottom:2px dashed #efeee5" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;padding:0;margin:0;width:100%;font-size:15.48px;font-weight:400;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Total</td></tr></tbody></table></td><td style="text-align:right" align="right"><div style="font-family:Linotte,Arial,sans-serif;font-weight:600;padding:0;margin:0;font-size:36px;line-height:33px;color:#ffffff"><span style="border-bottom:0px solid #ff7f00;display:inline-block">'.$booking_data[0]->total_price.'</span><span style="font-size:20px;font-weight:400"> $ (USD) </span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td style="padding-top:50px"><table cellpadding="0" cellspacing="0" style="width:100%;color:#ffffff;background-color:#1a91da;border-bottom:6px solid #ff7f00;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#1A91DA"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;padding:0 30px;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Customer service: </td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><div><span style="font-weight:600">E-mail: </span><a href="mailto:undefined" style="font-weight:400;text-decoration:underline;color:#ff7f00" target="_blank">info@tripmeng.com</a><br></div><div><span style="font-weight:600">Customer service:  </span><a href="tel:+34-902 152 125" style="font-weight:400;text-decoration:none;color:#ffffff" target="_blank" data-saferedirecturl="">+34-902 152 125</a><br></div></td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Easy Fly With US, Inc</td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Calle Sants 101 , 08028 Barcelona Spain<br> </td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>
</div>';
    		return $message;
		}
		public function SendConfirmationEmail($booking_data)
		{
			$this->load->model('modules/Flights_model');
			$emaildata = $this->Flights_model->getemaildata();
			$segments_data = $this->Flights_model->get_segmentsData($booking_data[0]->booking_id);
			$message = $this->getNewConfirmEmailMessage($booking_data,$emaildata[0]->header_logo_img,$segments_data);
			$to = $booking_data[0]->custemail;

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 
			$headers .= 'From: Tripmeng '.'<booking@tripmeng.com>'."\r\n".
			    'Reply-To: '.$this->sendfrom."\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			 
			$sub = 'tripmeng.com - Booking Request Acknowledgement ('.$booking_data[0]->booking_id.')';
			
			mail($to,$sub,$message,$headers);
			
		}
		function getNewticketIssueEmailMessage($booking_data,$img,$segments_data)
		{
			$segments = '';
			foreach($segments_data as $s)
			{
				$segments.='<tr><td><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:6px 0"><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:30px" width="33%" align="left"><tbody><tr><td style="width:30px" width="30"><img src="https://ci6.googleusercontent.com/proxy/27bAiEznhTBjuDTK27sH-4mVNAMzC9Eyzr1auaeX5HPDBwo0NClXqvexdfUtu-_kc8mMzrasWeQlVEnGSf4xYVkY81mJ6RMg4NbsjjHA-xcngnSrt15j-H89rfIXCSY=s0-d-e1-ft#https://s1.travix.com/vayama/global/assets/email/icons/v2/airplane_right.png" style="border:none;vertical-align:middle;max-width:21px;width:21px" width="21" class="CToWUd"></td><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3">'.$s->depart_date.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->depart_name.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->arrive_name.' </td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr>';
			}
			$message = '<div style="font-family:Roboto,sans-serif;margin:0;padding:0">
    <table cellpadding="0" cellspacing="0" style="width:100%;background-color:#efeee5;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#EFEEE5"><tbody><tr><td style="display:none;overflow:hidden;float:left;line-height:0px;font-size:0"></td></tr><tr><td style="background-color:#ffffff" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="height:60px;color:#ffffff;padding-top:17px;padding-bottom:12px;width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" height="60" align="center"><tbody><tr><td style="height:0"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:90%;margin:0 20px;margin-left:auto;margin-right:auto" width="90%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:50%" width="50%" align="left"><tbody><tr><td><a href="https://tripmeng.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://tripmeng.com/&amp;source=gmail&amp;ust=1573553267019000&amp;usg=AFQjCNF_0uoFRTdTtPYG3V0O39CzmUlGDg"><img alt="" src="'.PT_GLOBAL_IMAGES_FOLDER.$img.'" style="border:none;width:150px" class="CToWUd"></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="padding-top:24px"><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="border-top-left-radius:5px;border-top-right-radius:5px;text-align:center;background-color:#1a91da;border-bottom:2px dashed #ffffff" align="center" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-bottom:15px;padding-top:15px;font-size:30.96px;color:#ffffff;text-align:center;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Your E-ticket has been issued</td></tr></tbody></table></td></tr><tr><td style="padding:10px 30px;text-align:left;color:#757575;background-color:#ffffff" align="left" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Hello '.$booking_data[0]->custfirstname.' '.$booking_data[0]->custlastname.'</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Thank you for booking with Easy Fly Withus.<br>Please Follow the link to download the E-ticket <a href="'.base_url().'uploads/tickets/'.$booking_data[0]->booking_id.'.pdf">E-ticket Here</a><br>To ensure that all information is correct. <br>If there is a problem, please call us immediately at +34-902101203. <br>We are open 24 hours a day, 7 days a week. [Flights & Hotels] </td></tr></tbody></table></td></tr><tr><td style="text-align:left;height:30px;padding:10px 30px;font-size:12px;font-weight:400;line-height:16px;vertical-align:middle;border-top:2px solid #efeee5;background-color:#f7f8f1;color:#757575;border-bottom-left-radius:5px;border-bottom-right-radius:5px" height="30" align="left" valign="middle" bgcolor="#F7F8F1">Booking number <strong>'.$booking_data[0]->booking_id.'</strong></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="background-color:#ffffff;border-radius:5px;overflow:hidden;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="width:100%;padding:10px 30px;border-bottom:2px solid #efeee5;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="vertical-align:top;text-align:left;width:70%;margin-left:auto;margin-right:auto" width="70%" align="left" valign="top"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Your booking details</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;font-size:0;height:10px"><td>&nbsp;</td></tr><tr><td style="padding:0 30px;text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;height:50px"><td style="text-align:left;width:50%;font-size:16px;color:#757575" width="50%" align="left"><table cellpadding="0" cellspacing="0"><tbody><tr><td>Airline Name: <strong style="color:#414141">'.$segments_data[0]->carrier_name.'</strong></td></tr></tbody></table></td><td style="text-align:right;width:50%" width="50%" align="right"><img alt="'.$segments_data[0]->carrier_name.'" src="'.$segments_data[0]->carrier_img.'" style="border:none;width:90px" width="90" class="CToWUd"></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:10px"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr>'.$segments.'<tr><td style="background-color:#ffffff;padding:20px 30px;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">The following products will be charged directly by the charging companies in the following currencies:</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">Charged approximately by '.$segments_data[0]->carrier_name.' '.$booking_data[0]->total_price.' USD </td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:20px 30px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;overflow:hidden;background-color:#1a91da;border-bottom:2px dashed #efeee5" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;padding:0;margin:0;width:100%;font-size:15.48px;font-weight:400;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Total</td></tr></tbody></table></td><td style="text-align:right" align="right"><div style="font-family:Linotte,Arial,sans-serif;font-weight:600;padding:0;margin:0;font-size:36px;line-height:33px;color:#ffffff"><span style="border-bottom:0px solid #ff7f00;display:inline-block">'.$booking_data[0]->total_price.'</span><span style="font-size:20px;font-weight:400"> $ (USD) </span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td style="padding-top:50px"><table cellpadding="0" cellspacing="0" style="width:100%;color:#ffffff;background-color:#1a91da;border-bottom:6px solid #ff7f00;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#1A91DA"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;padding:0 30px;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Customer service: </td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><div><span style="font-weight:600">E-mail: </span><a href="mailto:undefined" style="font-weight:400;text-decoration:underline;color:#ff7f00" target="_blank">info@tripmeng.com</a><br></div><div><span style="font-weight:600">Customer service:  </span><a href="tel:+34-902 152 125" style="font-weight:400;text-decoration:none;color:#ffffff" target="_blank" data-saferedirecturl="">+34-902 152 125</a><br></div></td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Easy Fly With US, Inc</td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Calle Sants 101 , 08028 Barcelona Spain<br> </td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>
</div>';
    		return $message;
		}
		public function SendticketEmail($booking_data,$pathfile)
		{
			$this->load->model('modules/Flights_model');
			$emaildata = $this->Flights_model->getemaildata();
			$segments_data = $this->Flights_model->get_segmentsData($booking_data[0]->booking_id);
			$message = $this->getNewticketIssueEmailMessage($booking_data,$emaildata[0]->header_logo_img,$segments_data);
			$to = $booking_data[0]->custemail;

			


			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 
			$headers .= 'From: tripmeng '.'<booking@tripmeng.com>'."\r\n".
			    'Reply-To: '.$this->sendfrom."\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			
			 
			$sub = 'E-ticket for '.$booking_data[0]->custfirstname.'/'.$booking_data[0]->custlastname.'  ('.$booking_data[0]->booking_id.') for purchase made on tripmeng.com';
			
			echo mail($to,$sub,$message,$headers);
			
		}
		function getVerificationEmailMessage($booking_data,$img,$segments_data)
		{
			$segments = '';
			foreach($segments_data as $s)
			{
				$segments.='<tr><td><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:6px 0"><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:30px" width="33%" align="left"><tbody><tr><td style="width:30px" width="30"><img src="https://ci6.googleusercontent.com/proxy/27bAiEznhTBjuDTK27sH-4mVNAMzC9Eyzr1auaeX5HPDBwo0NClXqvexdfUtu-_kc8mMzrasWeQlVEnGSf4xYVkY81mJ6RMg4NbsjjHA-xcngnSrt15j-H89rfIXCSY=s0-d-e1-ft#https://s1.travix.com/vayama/global/assets/email/icons/v2/airplane_right.png" style="border:none;vertical-align:middle;max-width:21px;width:21px" width="21" class="CToWUd"></td><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3">'.$s->depart_date.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->depart_name.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->arrive_name.' </td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr>';
			}
			$message = '<div style="font-family:Roboto,sans-serif;margin:0;padding:0">
    <table cellpadding="0" cellspacing="0" style="width:100%;background-color:#efeee5;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#EFEEE5"><tbody><tr><td style="display:none;overflow:hidden;float:left;line-height:0px;font-size:0"></td></tr><tr><td style="background-color:#ffffff" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="height:60px;color:#ffffff;padding-top:17px;padding-bottom:12px;width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" height="60" align="center"><tbody><tr><td style="height:0"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:90%;margin:0 20px;margin-left:auto;margin-right:auto" width="90%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:50%" width="50%" align="left"><tbody><tr><td><a href="https://tripmeng.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://tripmeng.com/&amp;source=gmail&amp;ust=1573553267019000&amp;usg=AFQjCNF_0uoFRTdTtPYG3V0O39CzmUlGDg"><img alt="" src="'.PT_GLOBAL_IMAGES_FOLDER.$img.'" style="border:none;width:150px" class="CToWUd"></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="padding-top:24px"><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="border-top-left-radius:5px;border-top-right-radius:5px;text-align:center;background-color:#1a91da;border-bottom:2px dashed #ffffff" align="center" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-bottom:15px;padding-top:15px;font-size:30.96px;color:#ffffff;text-align:center;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Regarding payment for your booking</td></tr></tbody></table></td></tr><tr><td style="padding:10px 30px;text-align:left;color:#757575;background-color:#ffffff" align="left" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Hello '.$booking_data[0]->custfirstname.' '.$booking_data[0]->custlastname.'</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Thanks for booking with tripmeng<br>To issue your e-ticket we required follow documents.<br><br>- the completed Credit Card Authorization form (found on the link below)<br>- a copy of the front and back of the credit card used to pay for this booking (Please ensure that the card is signed)<br>- a copy of the credit card holders ID or passport<br>FOR SECURITY REASONS PLEASE BLOCK OUT THE DIGITS AFTER THE FIRST SIX AND BEFORE THE LAST FOUR DIGITS (40000xxxxxxxx1234)<br>Link to the Credit Card Authorization form:<br>https://tripmeng.com/doc/Credit_Card_Auth_Fax.pdf<br>Our email address is cs@tripmeng.com<br>Please get back to us with in 24 hours<br>Regards<br>The tripmeng Team</td></tr></tbody></table></td></tr><tr><td style="text-align:left;height:30px;padding:10px 30px;font-size:12px;font-weight:400;line-height:16px;vertical-align:middle;border-top:2px solid #efeee5;background-color:#f7f8f1;color:#757575;border-bottom-left-radius:5px;border-bottom-right-radius:5px" height="30" align="left" valign="middle" bgcolor="#F7F8F1">Booking number <strong>'.$booking_data[0]->booking_id.'</strong></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="background-color:#ffffff;border-radius:5px;overflow:hidden;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="width:100%;padding:10px 30px;border-bottom:2px solid #efeee5;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="vertical-align:top;text-align:left;width:70%;margin-left:auto;margin-right:auto" width="70%" align="left" valign="top"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Your booking details</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;font-size:0;height:10px"><td>&nbsp;</td></tr><tr><td style="padding:0 30px;text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;height:50px"><td style="text-align:left;width:50%;font-size:16px;color:#757575" width="50%" align="left"><table cellpadding="0" cellspacing="0"><tbody><tr><td>Airline Name: <strong style="color:#414141">'.$segments_data[0]->carrier_name.'</strong></td></tr></tbody></table></td><td style="text-align:right;width:50%" width="50%" align="right"><img alt="'.$segments_data[0]->carrier_name.'" src="'.$segments_data[0]->carrier_img.'" style="border:none;width:90px" width="90" class="CToWUd"></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:10px"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr>'.$segments.'<tr><td style="background-color:#ffffff;padding:20px 30px;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">The following products will be charged directly by the charging companies in the following currencies:</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">Charged approximately by '.$segments_data[0]->carrier_name.' '.$booking_data[0]->total_price.' USD </td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:20px 30px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;overflow:hidden;background-color:#1a91da;border-bottom:2px dashed #efeee5" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;padding:0;margin:0;width:100%;font-size:15.48px;font-weight:400;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Total</td></tr></tbody></table></td><td style="text-align:right" align="right"><div style="font-family:Linotte,Arial,sans-serif;font-weight:600;padding:0;margin:0;font-size:36px;line-height:33px;color:#ffffff"><span style="border-bottom:0px solid #ff7f00;display:inline-block">'.$booking_data[0]->total_price.'</span><span style="font-size:20px;font-weight:400"> $ (USD) </span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td style="padding-top:50px"><table cellpadding="0" cellspacing="0" style="width:100%;color:#ffffff;background-color:#1a91da;border-bottom:6px solid #ff7f00;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#1A91DA"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;padding:0 30px;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Customer service: </td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><div><span style="font-weight:600">E-mail: </span><a href="mailto:undefined" style="font-weight:400;text-decoration:underline;color:#ff7f00" target="_blank">info@tripmeng.com</a><br></div><div><span style="font-weight:600">Customer service:  </span><a href="tel:+34-902 152 125" style="font-weight:400;text-decoration:none;color:#ffffff" target="_blank" data-saferedirecturl="">+34-902 152 125</a><br></div></td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Easy Fly With US, Inc</td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Calle Sants 101 , 08028 Barcelona Spain<br> </td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>
</div>';
    		return $message;
		}
		public function SendEmailVerificationEmail($booking_data)
		{
			$this->load->model('modules/Flights_model');
			$emaildata = $this->Flights_model->getemaildata();
			$segments_data = $this->Flights_model->get_segmentsData($booking_data[0]->booking_id);
			$message = $this->getVerificationEmailMessage($booking_data,$emaildata[0]->header_logo_img,$segments_data);
			$to = $booking_data[0]->custemail;

			


			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 
			$headers .= 'From: tripmeng '.'<booking@tripmeng.com>'."\r\n".
			    'Reply-To: '.$this->sendfrom."\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			
			 
			$sub = 'Regarding payment for your booking ('.$booking_data[0]->booking_id.')';
			echo $sub;
			echo mail($to,$sub,$message,$headers);
			
		}
		function getProcessingEmailMessage($booking_data,$img,$segments_data)
		{
			$segments = '';
			foreach($segments_data as $s)
			{
				$segments.='<tr>
				<td>
				<table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center">
				<tbody><tr><td style="padding:6px 0"><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:30px" width="33%" align="left"><tbody><tr><td style="width:30px" width="30"><img src="https://ci6.googleusercontent.com/proxy/27bAiEznhTBjuDTK27sH-4mVNAMzC9Eyzr1auaeX5HPDBwo0NClXqvexdfUtu-_kc8mMzrasWeQlVEnGSf4xYVkY81mJ6RMg4NbsjjHA-xcngnSrt15j-H89rfIXCSY=s0-d-e1-ft#https://s1.travix.com/vayama/global/assets/email/icons/v2/airplane_right.png" style="border:none;vertical-align:middle;max-width:21px;width:21px" width="21" class="CToWUd"></td><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3">'.$s->depart_date.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->depart_name.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->arrive_name.' </td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr>';
			}
			$message = '<div style="font-family:Roboto,sans-serif;margin:0;padding:0">
    <table cellpadding="0" cellspacing="0" style="width:100%;background-color:#efeee5;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#EFEEE5"><tbody><tr><td style="display:none;overflow:hidden;float:left;line-height:0px;font-size:0"></td></tr><tr><td style="background-color:#ffffff" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="height:60px;color:#ffffff;padding-top:17px;padding-bottom:12px;width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" height="60" align="center"><tbody><tr><td style="height:0"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:90%;margin:0 20px;margin-left:auto;margin-right:auto" width="90%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:50%" width="50%" align="left"><tbody><tr><td><a href="https://tripmeng.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://tripmeng.com/&amp;source=gmail&amp;ust=1573553267019000&amp;usg=AFQjCNF_0uoFRTdTtPYG3V0O39CzmUlGDg"><img alt="" src="'.PT_GLOBAL_IMAGES_FOLDER.$img.'" style="border:none;width:150px" class="CToWUd"></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="padding-top:24px"><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="border-top-left-radius:5px;border-top-right-radius:5px;text-align:center;background-color:#1a91da;border-bottom:2px dashed #ffffff" align="center" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-bottom:15px;padding-top:15px;font-size:30.96px;color:#ffffff;text-align:center;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Your Booking is now Processing</td></tr></tbody></table></td></tr><tr><td style="padding:10px 30px;text-align:left;color:#757575;background-color:#ffffff" align="left" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Dear '.$booking_data[0]->custfirstname.' '.$booking_data[0]->custlastname.'</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Thank you for your booking. Here is your booking request acknowledgement. You will receive your e-ticket and payment overview in a separate email today. <br> <br>Important: Please check this confirmation carefully. If any details are wrong, please phone us as soon as possible to try to limit change fees.<br> <br>Tip: you will find all information about your booking in Easy Fly With Us.</td></tr></tbody></table></td></tr><tr><td style="text-align:left;height:30px;padding:10px 30px;font-size:12px;font-weight:400;line-height:16px;vertical-align:middle;border-top:2px solid #efeee5;background-color:#f7f8f1;color:#757575;border-bottom-left-radius:5px;border-bottom-right-radius:5px" height="30" align="left" valign="middle" bgcolor="#F7F8F1">Booking number <strong>'.$booking_data[0]->booking_id.'</strong></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="background-color:#ffffff;border-radius:5px;overflow:hidden;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="width:100%;padding:10px 30px;border-bottom:2px solid #efeee5;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="vertical-align:top;text-align:left;width:70%;margin-left:auto;margin-right:auto" width="70%" align="left" valign="top"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Your booking details</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;font-size:0;height:10px"><td>&nbsp;</td></tr><tr><td style="padding:0 30px;text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;height:50px"><td style="text-align:left;width:50%;font-size:16px;color:#757575" width="50%" align="left"><table cellpadding="0" cellspacing="0"><tbody><tr><td>Airline Name: <strong style="color:#414141">'.$segments_data[0]->carrier_name.'</strong></td></tr></tbody></table></td><td style="text-align:right;width:50%" width="50%" align="right"><img alt="'.$segments_data[0]->carrier_name.'" src="'.$segments_data[0]->carrier_img.'" style="border:none;width:90px" width="90" class="CToWUd"></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:10px"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr>'.$segments.'<tr><td style="background-color:#ffffff;padding:20px 30px;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">The following products will be charged directly by the charging companies in the following currencies:</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">Charged approximately by '.$segments_data[0]->carrier_name.' '.$booking_data[0]->total_price.' USD </td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:20px 30px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;overflow:hidden;background-color:#1a91da;border-bottom:2px dashed #efeee5" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;padding:0;margin:0;width:100%;font-size:15.48px;font-weight:400;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Total</td></tr></tbody></table></td><td style="text-align:right" align="right"><div style="font-family:Linotte,Arial,sans-serif;font-weight:600;padding:0;margin:0;font-size:36px;line-height:33px;color:#ffffff"><span style="border-bottom:0px solid #ff7f00;display:inline-block">'.$booking_data[0]->total_price.'</span><span style="font-size:20px;font-weight:400"> $ (USD) </span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td style="padding-top:50px"><table cellpadding="0" cellspacing="0" style="width:100%;color:#ffffff;background-color:#1a91da;border-bottom:6px solid #ff7f00;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#1A91DA"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;padding:0 30px;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Customer service: </td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><div><span style="font-weight:600">E-mail: </span><a href="mailto:undefined" style="font-weight:400;text-decoration:underline;color:#ff7f00" target="_blank">info@tripmeng.com</a><br></div><div><span style="font-weight:600">Customer service:  </span><a href="tel:+34-902 152 125" style="font-weight:400;text-decoration:none;color:#ffffff" target="_blank" data-saferedirecturl="">+34-902 152 125</a><br></div></td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Easy Fly With US, Inc</td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Calle Sants 101 , 08028 Barcelona Spain<br> </td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>
</div>';
    		return $message;
		}
		public function SendEmailProcessing($booking_data)
		{
			$this->load->model('modules/Flights_model');
			$emaildata = $this->Flights_model->getemaildata();
			$segments_data = $this->Flights_model->get_segmentsData($booking_data[0]->booking_id);
			$message = $this->getProcessingEmailMessage($booking_data,$emaildata[0]->header_logo_img,$segments_data);
			$to = $booking_data[0]->custemail;

			


			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 
			$headers .= 'From: tripmeng '.'<booking@tripmeng.com>'."\r\n".
			    'Reply-To: '.$this->sendfrom."\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			
			 
			$sub = 'Tripmeng is now Processing your booking ('.$booking_data[0]->booking_id.')';
			echo $sub;
			echo mail($to,$sub,$message,$headers);
			
		}
		function getCancellationEmailMessage($booking_data,$img,$segments_data)
		{
			$segments = '';
			foreach($segments_data as $s)
			{
				$segments.='<tr><td><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:6px 0"><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:30px" width="33%" align="left"><tbody><tr><td style="width:30px" width="30"><img src="https://ci6.googleusercontent.com/proxy/27bAiEznhTBjuDTK27sH-4mVNAMzC9Eyzr1auaeX5HPDBwo0NClXqvexdfUtu-_kc8mMzrasWeQlVEnGSf4xYVkY81mJ6RMg4NbsjjHA-xcngnSrt15j-H89rfIXCSY=s0-d-e1-ft#https://s1.travix.com/vayama/global/assets/email/icons/v2/airplane_right.png" style="border:none;vertical-align:middle;max-width:21px;width:21px" width="21" class="CToWUd"></td><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3">'.$s->depart_date.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->depart_name.'</td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="text-align:left;width:33%;padding:10px;padding-left:20px" width="33%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#007cc3"><table cellpadding="0" cellspacing="0"><tbody><tr><td style="font-weight:bold;font-size:16px;color:#414141">'.$s->arrive_name.' </td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575;padding-top:2px"></td></tr></tbody></table></td></tr><tr><td style="font-weight:400;font-size:13px;color:#757575"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:0"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr>';
			}
			$message = '<div style="font-family:Roboto,sans-serif;margin:0;padding:0">
    <table cellpadding="0" cellspacing="0" style="width:100%;background-color:#efeee5;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#EFEEE5"><tbody><tr><td style="display:none;overflow:hidden;float:left;line-height:0px;font-size:0"></td></tr><tr><td style="background-color:#ffffff" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="height:60px;color:#ffffff;padding-top:17px;padding-bottom:12px;width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" height="60" align="center"><tbody><tr><td style="height:0"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:90%;margin:0 20px;margin-left:auto;margin-right:auto" width="90%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:50%" width="50%" align="left"><tbody><tr><td><a href="https://tripmeng.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://tripmeng.com/&amp;source=gmail&amp;ust=1573553267019000&amp;usg=AFQjCNF_0uoFRTdTtPYG3V0O39CzmUlGDg"><img alt="" src="'.PT_GLOBAL_IMAGES_FOLDER.$img.'" style="border:none;width:150px" class="CToWUd"></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="padding-top:24px"><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="border-top-left-radius:5px;border-top-right-radius:5px;text-align:center;background-color:#1a91da;border-bottom:2px dashed #ffffff" align="center" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-bottom:15px;padding-top:15px;font-size:30.96px;color:#ffffff;text-align:center;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Your Booking Has Been Cancelled</td></tr></tbody></table></td></tr><tr><td style="padding:10px 30px;text-align:left;color:#757575;background-color:#ffffff" align="left" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Hello '.$booking_data[0]->custfirstname.' '.$booking_data[0]->custlastname.'</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Your booking has been cancelled due to payment verification<br>Please contact us to resolve this issue as soon as possible<br>Regards<br>The tripmeng Team</td></tr></tbody></table></td></tr><tr><td style="text-align:left;height:30px;padding:10px 30px;font-size:12px;font-weight:400;line-height:16px;vertical-align:middle;border-top:2px solid #efeee5;background-color:#f7f8f1;color:#757575;border-bottom-left-radius:5px;border-bottom-right-radius:5px" height="30" align="left" valign="middle" bgcolor="#F7F8F1">Booking number <strong>'.$booking_data[0]->booking_id.'</strong></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td style="background-color:#ffffff;border-radius:5px;overflow:hidden;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="width:100%;padding:10px 30px;border-bottom:2px solid #efeee5;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="vertical-align:top;text-align:left;width:70%;margin-left:auto;margin-right:auto" width="70%" align="left" valign="top"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;color:#007cc3;width:100%;padding-bottom:15px;padding-top:15px;font-size:21.5px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Your booking details</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;font-size:0;height:10px"><td>&nbsp;</td></tr><tr><td style="padding:0 30px;text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr style="width:100%;height:50px"><td style="text-align:left;width:50%;font-size:16px;color:#757575" width="50%" align="left"><table cellpadding="0" cellspacing="0"><tbody><tr><td>Airline Name: <strong style="color:#414141">'.$segments_data[0]->carrier_name.'</strong></td></tr></tbody></table></td><td style="text-align:right;width:50%" width="50%" align="right"><img alt="'.$segments_data[0]->carrier_name.'" src="'.$segments_data[0]->carrier_img.'" style="border:none;width:90px" width="90" class="CToWUd"></td></tr></tbody></table></td></tr><tr style="width:100%;font-size:0;height:10px"><td style="border-bottom:2px solid #efeee5;width:100%" width="100%">&nbsp;</td></tr><tr style="width:100%;font-size:0;height:0"><td>&nbsp;</td></tr>'.$segments.'<tr><td style="background-color:#ffffff;padding:20px 30px;width:100%" width="100%" bgcolor="#FFFFFF"><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">The following products will be charged directly by the charging companies in the following currencies:</td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="color:#757575;font-family:Roboto,sans-serif;font-weight:200;line-height:24px;padding-bottom:5px;margin:0;width:100%;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="color:#b5b5b5;font-size:13px;font-weight:400">Charged approximately by '.$segments_data[0]->carrier_name.' '.$booking_data[0]->total_price.' USD </td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="padding:20px 30px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;overflow:hidden;background-color:#1a91da;border-bottom:2px dashed #efeee5" bgcolor="#1A91DA"><table cellpadding="0" cellspacing="0" style="width:100%;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:left" align="left"><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;padding:0;margin:0;width:100%;font-size:15.48px;font-weight:400;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Total</td></tr></tbody></table></td><td style="text-align:right" align="right"><div style="font-family:Linotte,Arial,sans-serif;font-weight:600;padding:0;margin:0;font-size:36px;line-height:33px;color:#ffffff"><span style="border-bottom:0px solid #ff7f00;display:inline-block">'.$booking_data[0]->total_price.'</span><span style="font-size:20px;font-weight:400"> $ (USD) </span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td></td></tr></tbody></table></td></tr><tr><td style="padding-top:50px"><table cellpadding="0" cellspacing="0" style="width:100%;color:#ffffff;background-color:#1a91da;border-bottom:6px solid #ff7f00;margin-left:auto;margin-right:auto" width="100%" align="center" bgcolor="#1A91DA"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="width:600px;text-align:center;padding:0 30px;margin-left:auto;margin-right:auto" width="600" align="center"><tbody><tr><td style="height:24px" height="24"></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="text-align:left;width:100%;margin-left:auto;margin-right:auto" width="100%" align="left"><tbody><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Customer service: </td></tr></tbody></table><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td><div><span style="font-weight:600">E-mail: </span><a href="mailto:undefined" style="font-weight:400;text-decoration:underline;color:#ff7f00" target="_blank">info@tripmeng.com</a><br></div><div><span style="font-weight:600">Customer service:  </span><a href="tel:+34-902 152 125" style="font-weight:400;text-decoration:none;color:#ffffff" target="_blank" data-saferedirecturl="">+34-902 152 125</a><br></div></td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Linotte,Arial,sans-serif;font-weight:400;padding:0;margin:0;width:100%;padding-top:15px;font-size:18.919999999999998px;padding-bottom:10px;color:#ffffff;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td style="text-align:inherit" align="inherit">Easy Fly With US, Inc</td></tr></tbody></table></td></tr><tr><td><table cellpadding="0" cellspacing="0" style="font-family:Roboto,sans-serif;font-weight:200;line-height:24px;margin:0;width:100%;padding-bottom:24px;color:#ffffff;font-size:15px;margin-left:auto;margin-right:auto" width="100%" align="center"><tbody><tr><td>Calle Sants 101 , 08028 Barcelona Spain<br> </td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>
</div>';
    		return $message;
		}
		public function SendCancelledEmail($booking_data)
		{
			$this->load->model('modules/Flights_model');
			$emaildata = $this->Flights_model->getemaildata();
			$segments_data = $this->Flights_model->get_segmentsData($booking_data[0]->booking_id);
			$message = $this->getCancellationEmailMessage($booking_data,$emaildata[0]->header_logo_img,$segments_data);
			$to = $booking_data[0]->custemail;

			


			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 
			$headers .= 'From: Tripmeng '.'<booking@tripmeng.com>'."\r\n".
			    'Reply-To: '.$this->sendfrom."\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			
			 
			$sub = 'Booking Cancelled of your booking# ('.$booking_data[0]->booking_id.')';
			
			echo mail($to,$sub,$message,$headers);
			
		}
//send email to customer
		function sendEmail_customer($details, $sitetitle) {
			$currencycode = $details->currCode;
			$currencysign = $details->currSymbol;
				$custid = $details->bookingUser;
				$country = $details->userCountry;
				$name = $details->userFullName;
				$phone = $details->userMobile;
				$paymethod = $details->paymethod;
				$invoiceid = $details->id;
				$refno = $details->code;
				$totalamount = $details->checkoutTotal;
				$deposit = $details->checkoutAmount;
				$duedate = $details->expiry;
				$date = $details->date;
				$sendto = $details->accountEmail;
				$invoicelink = "<a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$template = $this->shortcode_variables("bookingordercustomer");
				$details = email_template_detail("bookingordercustomer");
				//$smsdetails = sms_template_detail("bookingordercustomer");
				$values = array($invoiceid, $refno, $deposit, $totalamount, $sendto, $custid, $country, $phone, $currencycode, $currencysign, $invoicelink, $sitetitle, $duedate, $name);
				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				// SMS Notification
				$template = get_sms_template(8); // booking order customer
				$smsmessage = str_replace(explode(' ', $template->shortcode), $values, $template->body);
				$this->load->library('Sms_notification');
                $smsNotification = new Sms_notification();
				$smsNotification->recepient = $phone;
				$smsNotification->message   = strip_tags($smsmessage);
				$response = $smsNotification->send();
				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $phone, "bookingordercustomer");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

//send email to Admin
		function sendEmail_admin($details, $sitetitle) {
				$currencycode = $details->currCode;
			 $currencysign = $details->currSymbol;

			    $custid = $details->bookingUser;
				$country = $details->userCountry;
				$name = $details->userFullName;
				$phone = $details->userMobile;
				$paymethod = $details->paymethod;
				$invoiceid = $details->id;
				$refno = $details->code;
				$totalamount = $details->checkoutTotal;
				$deposit = $details->checkoutAmount;
				$duedate = $details->expiry;
				$date = $details->date;
				$custemail = $details->accountEmail;
				$sendto = $this->adminemail;
				$invoicelink = "<a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$template = $this->shortcode_variables("bookingorderadmin");
				$details = email_template_detail("bookingorderadmin");
				//$smsdetails = sms_template_detail("bookingorderadmin");
				$values = array($invoiceid, $refno, $deposit, $totalamount, $custemail, $custid, $country, $phone, $currencycode, $currencysign, $invoicelink, $sitetitle, $name);
				
				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				
				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $this->adminmobile, "bookingorderadmin");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

//send email to Owner
		function sendEmail_owner($details, $sitetitle) {

			 $currencycode = $details->currCode;
			 $currencysign = $details->currSymbol;

			 $custid = $details->bookingUser;
				$country = $details->userCountry;
				$name = $details->userFullName;
				$phone = $details->userMobile;
				$paymethod = $details->paymethod;
				$invoiceid = $details->id;
				$refno = $details->code;
				$totalamount = $details->checkoutTotal;
				$deposit = $details->checkoutAmount;
				$duedate = $details->expiry;
				$date = $details->date;
				$custemail = $details->accountEmail;

				$sendto = $this->ownerEmail($details->module, $details->itemid);

				$message = $this->mailHeader;
				$message .= "<h4><b>Order Information</b></h4>";
				$message .= "Date :" . $date . ".<br>";
				$message .= "Invoice No.: " . $invoiceid . ".<br>";
			//	$message .= "Payment Method: " . $paymethod . ".<br><br>";
				$message .= "Deposit Amount: " . $currencycode . " " . $currencysign . $deposit . "<br>";
				$message .= "Total Amount: " . $currencycode . " " . $currencysign . $totalamount . "<br><br>";
				$message .= "<h4><b>Customer Information</b></h4>";
				$message .= "Customer ID: " . $custid . "<br>";
				$message .= "Name : " . $name . "<br>";
				$message .= "Email : " . $custemail . "<br>";
				if(!empty($country)){
				$message .= "Country : " . $country . "<br>";	
				}
				
				$message .= "Phone : " . $phone . "<br>";
				$message .= "<br> To view Invoice visit at: <a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$message .= $this->mailFooter;

				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject('New Booking Notification');
				$this->email->message($message);
				$this->email->send();
		}

//send email to Supplier
		function sendEmail_supplier($details, $sitetitle) {
			$currencycode = $details->currCode;
			 $currencysign = $details->currSymbol;

			    $custid = $details->bookingUser;
				$country = $details->userCountry;
				$name = $details->userFullName;
				$phone = $details->userMobile;
				$paymethod = $details->paymethod;
				$invoiceid = $details->id;
				$refno = $details->code;
				$totalamount = $details->checkoutTotal;
				$deposit = $details->checkoutAmount;
				$duedate = $details->expiry;
				$date = $details->date;
				$custemail = $details->accountEmail;
				$sendto = $this->supplierEmail($details->module, $details->itemid);
				$invoicelink = "<a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$template = $this->shortcode_variables("bookingordersupplier");
				$details = email_template_detail("bookingordersupplier");
				//$smsdetails = sms_template_detail("bookingorderadmin");
				$values = array($invoiceid, $refno, $deposit, $totalamount, $custemail, $custid, $country, $phone, $currencycode, $currencysign, $invoicelink, $sitetitle, $name);
				
				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				
				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $this->adminmobile, "bookingorderadmin");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();

			
		}

//send email to customer for booking payment success
		function paid_sendEmail_customer($details) {
			$currencycode = $details->currCode;
			$currencysign = $details->currSymbol;

				$custid = $details->bookingUser;
				$country = $details->userCountry;
				$name = $details->userFullName;
				$phone = $details->userMobile;
				$paymethod = $details->paymethod;
				$invoiceid = $details->id;
				$refno = $details->code;
				$totalamount = $details->checkoutTotal;
				$deposit = $details->checkoutAmount;
				$duedate = $details->expiry;
				$date = $details->date;
				$sendto = $details->accountEmail;

				$remaining = $details->remainingAmount;
				$sitetitle = "";

				$invoicelink = "<a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$template = $this->shortcode_variables("bookingpaidcustomer");
				$details = email_template_detail("bookingpaidcustomer");
				//$smsdetails = sms_template_detail("bookingpaidcustomer");
				$values = array($invoiceid, $refno, $deposit, $totalamount, $sendto, $custid, $country, $phone, $currencycode, $currencysign, $invoicelink, $sitetitle, $remaining, $name);
				
				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $phone, "bookingpaidcustomer");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

//send email to Admin for booking paid
		function paid_sendEmail_admin($details) {

			$currencycode = $details->currCode;
			$currencysign = $details->currSymbol;

				$custid = $details->bookingUser;
				$country = $details->userCountry;
				$name = $details->userFullName;
				$phone = $details->userMobile;
				$paymethod = $details->paymethod;
				$invoiceid = $details->id;
				$refno = $details->code;
				$totalamount = $details->checkoutTotal;
				$deposit = $details->checkoutAmount;
				$duedate = $details->expiry;
				$date = $details->date;
				$remaining = $details->remainingAmount;
				$custemail = $details->accountEmail;				
				$sendto = $this->adminemail;

				$sitetitle = "";

				$invoicelink = "<a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$template = $this->shortcode_variables("bookingpaidadmin");
				$details = email_template_detail("bookingpaidadmin");
				//$smsdetails = sms_template_detail("bookingpaidadmin");
				$values = array($invoiceid, $refno, $deposit, $totalamount, $custemail, $custid, $country, $phone, $currencycode, $currencysign, $invoicelink, $sitetitle, $name);
				
				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $this->adminmobile, "bookingpaidadmin");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject('Booking Payment Notification');
				$this->email->message($message);
				$this->email->send();
		}

//send email to Supplier for booking paid
		function paid_sendEmail_supplier($details) {

			$currencycode = $details->currCode;
			$currencysign = $details->currSymbol;

				$custid = $details->bookingUser;
				$country = $details->userCountry;
				$name = $details->userFullName;
				$phone = $details->userMobile;
				$paymethod = $details->paymethod;
				$invoiceid = $details->id;
				$refno = $details->code;
				$totalamount = $details->checkoutTotal;
				$deposit = $details->checkoutAmount;
				$duedate = $details->expiry;
				$date = $details->date;
				$remaining = $details->remainingAmount;
				$custemail = $details->accountEmail;				
				$sendto = $this->supplierEmail($details->module, $details->itemid);

				$sitetitle = "";

				$invoicelink = "<a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$template = $this->shortcode_variables("bookingpaidsupplier");
				$details = email_template_detail("bookingpaidsupplier");
				//$smsdetails = sms_template_detail("bookingpaidadmin");
				$values = array($invoiceid, $refno, $deposit, $totalamount, $custemail, $custid, $country, $phone, $currencycode, $currencysign, $invoicelink, $sitetitle, $name);
				
				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $this->adminmobile, "bookingpaidadmin");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject('Booking Payment Notification');
				$this->email->message($message);
				$this->email->send();
		}

//send email to Owner for booking paid
		function paid_sendEmail_owner($details) {
				$currencycode = $details->currCode;
				$currencysign = $details->currSymbol;

				$custid = $details->bookingUser;
				$country = $details->userCountry;
				$name = $details->userFullName;
				$phone = $details->userMobile;
				$paymethod = $details->paymethod;
				$invoiceid = $details->id;
				$refno = $details->code;
				$totalamount = $details->checkoutTotal;
				$deposit = $details->checkoutAmount;
				$duedate = $details->expiry;
				$date = $details->date;
				$remaining = $details->remainingAmount;
				$custemail = $details->accountEmail;				
			
				$sendto = $this->ownerEmail($details->module, $details->itemid);
				$sitetitle = "";
				
				$message = $this->mailHeader;
				$message .= "<h4><b>Booking Paid Successfully</b></h4>";
				$message .= "Invoice No.: " . $invoiceid . ".<br>";
				//$message .= "Payment Method: " . $paymethod . ".<br><br>";
				$message .= "Deposit Amount: " . $currencycode . " " . $currencysign . $deposit . "<br>";
				$message .= "Total Amount: " . $currencycode . " " . $currencysign . $totalamount . "<br><br>";
				$message .= "<h4><b>Customer Information</b></h4>";
				$message .= "Customer ID: " . $custid . "<br>";
				$message .= "Name : " . $name . "<br>";
				$message .= "Email : " . $custemail . "<br>";
				$message .= "Country : " . $country . "<br>";
				$message .= "Phone : " . $phone . "<br>";
				$message .= "<br> To view Invoice <a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$message .= $this->mailFooter;
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject('Booking Payment Notification');
				$this->email->message($message);
				$this->email->send();
		}

// sending booking cancellation emails
		function booking_request_cancellation_email($useremail, $bookingid) {
//to customer
				$message = $this->mailHeader;
				$message .= "Dear Customer,<br>";
				$message .= "Your booking cancellation request for Booking ID: $bookingid has been registered, you will soon be notified about the response by email.<br>";
				$message .= "Thanks For using our service.";
				$message .= $this->mailFooter;
				
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($useremail);
				$this->email->subject('Request to cancel Booking.');
				$this->email->message($message);
				$this->email->send();
// $this->email->print_debugger();
// to admin
				$adminmessage = "Dear Admin,<br>";
				$adminmessage .= " A request has been registered to cancel Booking id: $bookingid";
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($this->adminemail);
				$this->email->subject('Request Received to cancel Booking.');
				$this->email->message($adminmessage);
				$this->email->send();
		}

// sending booking cancellation approval email
		function booking_approve_cancellation_email($useremail) {
//to customer
				$message = $this->mailHeader;
				$message .= "Dear Customer,<br>";
				$message .= "Your booking has been cancelled.<br>";
				$message .= "Thanks For using our service.";
				$message .= $this->mailFooter;

				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($useremail);
				$this->email->subject('Your Booking Cancellation has been Processed.');
				$this->email->message($message);
				$this->email->send();
		}

// sending booking cancellation rejection email
		function booking_reject_cancellation_email($useremail, $bookingid) {
//to customer
				$message = $this->mailHeader;
				$message .= "Dear Customer,<br>";
				$message .= "Your booking cancellation request for booking id: $bookingid has been rejected.<br>";
				$message .= "Thanks For using our service.";
				$message .= $this->mailFooter;

				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($useremail);
				$this->email->subject('Your Booking Cancellation Request is rejected.');
				$this->email->message($message);
				$this->email->send();
		}

// send reset password
		function reset_password($to, $newpass, $phone = '') {
				$template = $this->shortcode_variables("forgotpassword");
				$details = email_template_detail("forgotpassword");
				//$smsdetails = sms_template_detail("forgotpassword");
				$values = array($to, $newpass);
				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $phone, "forgotpassword");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($to);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

//send signup email to customer
		function signupEmail($edata) {
				$phone = $edata['mobile'];
				$email = $edata['email'];
				$password = $edata['password'];
				$fullname = $edata['fullname'];
				$template = $this->shortcode_variables("customersignup");
				$details = email_template_detail("customersignup");
				//$smsdetails = sms_template_detail("customersignup");
				$values = array($fullname, $email, $password);
				
				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $phone, "customersignup");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($email);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

//send newsletter
		function sendNewsletter($message, $subject, $to) {

				$msg = $this->mailHeader;
				$msg .= $message;
				$msg .= $this->mailFooter;

				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($msg);
				$this->email->send();
		}

// get admin email
		function get_admin_email() {
				$this->db->select('accounts_email');
				$this->db->where('accounts_type', 'webadmin');
				$q = $this->db->get('pt_accounts')->result();
				return $q[0]->accounts_email;
		}
// get admin email
		function get_user_email($id) {
				$this->db->select('accounts_email');
				$this->db->where('accounts_id', $id);
				$q = $this->db->get('pt_accounts')->result();
				return $q[0]->accounts_email;
		}

// get admin Mobile
		function get_admin_mobile() {
				$this->db->select('ai_mobile');
				$this->db->where('accounts_type', 'webadmin');
				$q = $this->db->get('pt_accounts')->result();
				return $q[0]->ai_mobile;
		}

// get owner email
		function ownerEmail($type, $id) {
				$email = '';
				if ($type == "hotels") {
						$this->db->select('hotel_email');
						$this->db->where('hotel_id', $id);
						$q = $this->db->get('pt_hotels')->result();
						$email = $q[0]->hotel_email;
				}
				elseif ($type == "tours") {
						$this->db->select('tour_email');
						$this->db->where('tour_id', $id);
						$q = $this->db->get('pt_tours')->result();
						$email = $q[0]->tour_email;
				}
				elseif ($type == "cars") {
						$this->db->select('car_email');
						$this->db->where('car_id', $id);
						$q = $this->db->get('pt_cars')->result();
						$email = $q[0]->car_email;
				}
				return $email;
		}
// get supplier Email
		function supplierEmail($type, $id) {
				$email = '';
				if ($type == "hotels") {
						$this->db->select('hotel_owned_by');
						$this->db->where('hotel_id', $id);
						$q = $this->db->get('pt_hotels')->result();
						$email = $this->get_user_email($q[0]->hotel_owned_by);
				}
				elseif ($type == "tours") {
						$this->db->select('tour_owned_by');
						$this->db->where('tour_id', $id);
						$q = $this->db->get('pt_tours')->result();
						$email = $this->get_user_email($q[0]->tour_owned_by);
				}
				elseif ($type == "cars") {
						$this->db->select('car_owned_by');
						$this->db->where('car_id', $id);
						$q = $this->db->get('pt_cars')->result();
						$email = $this->get_user_email($q[0]->car_owned_by);
				}
				return $email;
		}

// update mailserver settings
		function update_mailserver() {
				$defmailer = $this->input->post('defmailer');
				if ($defmailer == "php") {
						$data = array('mail_default' => $this->input->post('defmailer'), 
									 'mail_fromemail' => $this->input->post('fromemail'),
									 'mail_header' => $this->input->post('mailheader'), 
							         'mail_footer' => $this->input->post('mailfooter'));
				}
				else {
						$data = array('mail_hostname' => $this->input->post('smtphost'), 
							'mail_fromemail' => $this->input->post('fromemail'),
							'mail_username' => $this->input->post('smtpuser'), 
							'mail_password' => $this->input->post('smtppass'), 
							'mail_port' => $this->input->post('smtpport'), 
							'mail_default' => $this->input->post('defmailer'), 
							'mail_secure' => $this->input->post('smtpsecure'),
							'mail_header' => $this->input->post('mailheader'), 
							'mail_footer' => $this->input->post('mailfooter'));
				}

				$this->db->where('mail_id', '1');
				$this->db->update('pt_mailserver', $data);
		}

// resend invoice
//send email to customer
		function resend_invoice($details) {
				$name = $details[0]->ai_first_name . " " . $details[0]->ai_last_name;
				$invoiceid = $details[0]->booking_id;
				$refno = $details[0]->booking_ref_no;
				$sendto = $details[0]->accounts_email;
				$message = $this->mailHeader;
				$message .= "Dear " . $name . ",<br>";
				$message .= "You may review your invoice by visiting at: <a href=" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . " >" . base_url() . "invoice?id=" . $invoiceid . "&sessid=" . $refno . "</a>";
				$message .= $this->mailFooter;


				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($sendto);
				$this->email->subject('Booking Invoice');
				$this->email->message($message);
				$this->email->send();
		}

		function get_siteTitleUrl() {
				$appsettings = $this->Settings_model->get_settings_data();
				$resultArray = array("title" => $appsettings[0]->site_title,"url" => $appsettings[0]->site_url);
				return $resultArray;
		}

	

// get mailserver settings
		function get_mailserver() {
				$this->db->where('mail_id', '1');
				return $this->db->get('pt_mailserver')->result();
		}
// send Verification Email

		public function email_verified($to, $pass, $name, $phone, $accType = null) {
			if($accType == "customers"){
				$loginurl = "<a href=" . base_url() . "login >" . base_url() . "login </a>";
				$pass = "";
			}else{

				$loginurl = "<a href=" . base_url() . "supplier >" . base_url() . "supplier </a>";
			}
				
			if($accType == "customers"){
				$template = $this->shortcode_variables("verifycustomeraccount");
				$details = email_template_detail("verifycustomeraccount");

				//$smsdetails = sms_template_detail("verifyaccount");
				$values = array($name, $to, $loginurl);
			}else{
				$template = $this->shortcode_variables("verifyaccount");
				$details = email_template_detail("verifyaccount");

				//$smsdetails = sms_template_detail("verifyaccount");
				$values = array($name, $to, $pass, $loginurl);
			}


				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $phone, "verifyaccount");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($to);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}
// send New supplier email to supplier

		public function supplier_signup($edata) {
				$details = email_template_detail("supplierregister");
				//$smsdetails = sms_template_detail("supplierregister");

				$message = $this->mailHeader;
				$message .= $details[0]->temp_body;
				$message .= $this->mailFooter;

				//sendsms($smsdetails[0]->temp_body, $edata['phone'], "supplierregister");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($edata['email']);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

// send New customer email to supplier

		public function customer_signup($edata) {
				$details = email_template_detail("customerregister");
				//$smsdetails = sms_template_detail("supplierregister");

				$message = $this->mailHeader;
				$message .= $details[0]->temp_body;
				$message .= $this->mailFooter;

				//sendsms($smsdetails[0]->temp_body, $edata['phone'], "supplierregister");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($edata['email']);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

// send New supplier signup email to Admin

		public function new_supplier_email($edata) {
				$template = $this->shortcode_variables("supplierregisteradmin");
				$details = email_template_detail("supplierregisteradmin");
				//$smsdetails = sms_template_detail("supplierregisteradmin");
				$values = array($edata['name'], $edata['email'], $edata['address'], $edata['phone']);

				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $this->adminmobile, "supplierregisteradmin");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($this->adminemail);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

// send New customer signup email to Admin

		public function new_customer_email($edata) {
				$template = $this->shortcode_variables("customerregisteradmin");
				$details = email_template_detail("customerregisteradmin");
				//$smsdetails = sms_template_detail("supplierregisteradmin");
				$values = array($edata['name'], $edata['email'], $edata['address'], $edata['phone']);

				$message = $this->mailHeader;
				$message .= str_replace($template, $values, $details[0]->temp_body);
				$message .= $this->mailFooter;

				//$smsmessage = str_replace($template, $values, $smsdetails[0]->temp_body);
				//sendsms($smsmessage, $this->adminmobile, "supplierregisteradmin");
				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($this->adminemail);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
		}

		public function sendtotest($template) {
				$details = email_template_detail($template);

				$message = $this->mailHeader;
				$message .= $details[0]->temp_body;
				$message .= $this->mailFooter;

				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($this->adminemail);
				$this->email->subject($details[0]->temp_subject);
				$this->email->message($message);
				$this->email->send();
				return '1';
		}

		public function quickemail($from, $body, $to, $subject) {
				$message = $this->mailHeader;
				$message .= $body;
				$message .= $this->mailFooter;

				$this->email->set_newline("\r\n");
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
		}

		public function shortcode_variables($template) {
				if ($template == "bookingorderadmin") {
						$result = array("{invoice_id}", "{invoice_code}", "{deposit_amount}", "{total_amount}", "{customer_email}", "{customer_id}", "{country}", "{phone}", "{currency_code}", "{currency_sign}", "{invoice_link}", "{site_title}", "{fullname}");
				}elseif ($template == "bookingordersupplier") {
						$result = array("{invoice_id}", "{invoice_code}", "{deposit_amount}", "{total_amount}", "{customer_email}", "{customer_id}", "{country}", "{phone}", "{currency_code}", "{currency_sign}", "{invoice_link}", "{site_title}", "{fullname}");
				}
				elseif ($template == "bookingpaidadmin") {
						$result = array("{invoice_id}", "{invoice_code}", "{deposit_amount}", "{total_amount}", "{customer_email}", "{customer_id}", "{country}", "{phone}", "{currency_code}", "{currency_sign}", "{invoice_link}", "{site_title}", "{fullname}");
				}
				elseif ($template == "bookingpaidsupplier") {
						$result = array("{invoice_id}", "{invoice_code}", "{deposit_amount}", "{total_amount}", "{customer_email}", "{customer_id}", "{country}", "{phone}", "{currency_code}", "{currency_sign}", "{invoice_link}", "{site_title}", "{fullname}");
				}
				elseif ($template == "supplierregister") {
						$result = array("{fullname}");
				}
				elseif ($template == "forgotpassword") {
						$result = array("{username}", "{password}");
				}
				elseif ($template == "bookingordercustomer") {
						$result = array("{invoice_id}", "{invoice_code}", "{deposit_amount}", "{total_amount}", "{customer_email}", "{customer_id}", "{country}", "{phone}", "{currency_code}", "{currency_sign}", "{invoice_link}", "{site_title}", "{due_date}", "{fullname}");
				}
				elseif ($template == "bookingpaidcustomer") {
						$result = array("{invoice_id}", "{invoice_code}", "{deposit_amount}", "{total_amount}", "{customer_email}", "{customer_id}", "{country}", "{phone}", "{currency_code}", "{currency_sign}", "{invoice_link}", "{site_title}", "{remaining_amount}", "{fullname}");
				}
				elseif ($template == "verifyaccount") {
						$result = array("{fullname}", "{email}", "{password}", "{loginurl}");
				}elseif ($template == "verifycustomeraccount") {
						$result = array("{fullname}", "{email}", "{password}", "{loginurl}");
				}
				elseif ($template == "supplierregisteradmin") {
						$result = array("{fullname}", "{email}", "{address}", "{phone}");
				}elseif ($template == "customerregisteradmin") {
						$result = array("{fullname}", "{email}", "{address}", "{phone}");
				}
				elseif ($template == "customersignup") {
						$result = array("{fullname}", "{email}", "{password}");
				}
				return $result;
		}

		function send_contact_email($from, $data) {

				$subject = "Contact From Website: ".$data['contact_name'] . " - ";
				$subject .= $data['contact_subject'];

				$msg = $this->mailHeader;
				$msg .= $data['contact_message'];
				$msg .= $this->mailFooter;

				$this->email->set_newline("\r\n");
				$this->email->from($from);
				$this->email->to($data['contact_email']);
				$this->email->cc($this->adminemail);
				$this->email->subject($subject);
				$this->email->message($msg);
				return $this->email->send();
		}
// special offers contact email
		function offerContactEmail() {
			$toemail = $this->input->post('toemail');
			$msg = $this->input->post('message');
			$phone = $this->input->post('phone');
			$name = $this->input->post('name');

			$message = $this->mailHeader;
			$message .= "Name: ".$name."<br>";
			$message .= "Phone: ".$phone."<br>";
			$message .= "Message: ".$msg."<br>";
			$message .= $this->mailFooter;

				$this->email->set_newline("\r\n");
				$this->email->from($this->sendfrom);
				$this->email->to($toemail);
				$this->email->subject('Special Offer Contact Email');
				$this->email->message($message);
				if (!$this->email->send()) {
						//echo $this->email->print_debugger();
				}
				else {
						//echo 'Email sent';
				}
		}

}