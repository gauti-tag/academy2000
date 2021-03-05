<?php

defined('BASEPATH') OR exit('No direct script access allowed');


		/**
		 * @param $type
		 * @param $message
		 * @param $url
		 */
		function setFlashData($type,$message,$url)
		{
			$CI = get_instance();
			$CI->load->library('session');
			$CI->session->set_flashdata($type,$message);
			redirect($url);
		}


		/**
		 * @param $class
		 * @param $message
		 * @param $url
		 */
    function setFlashDatawithClass($class,$message,$url)
	{
		$CI = get_instance();
		$CI->load->library('session');
		$CI->session->set_flashdata('class',$class);
		$CI->session->set_flashdata('message',$message);
		redirect($url);
	}

			function messageSuccess($type,$message)
			{
				$CI = get_instance();
				$CI->load->library('session');
				$messageBis = ' <div class="alert alert-success alert-dismissible" role="alert" style="width: 100%">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									'.$message.'
								</div>';
				return $CI->session->set_flashdata($type,$messageBis);
			}

			function messageWarning($type,$message)
			{
				$CI = get_instance();
				$CI->load->library('session');
				$messageBis = ' <div class="alert alert-warning alert-dismissible" role="alert" style="width: 100%">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											'.$message.'
										</div>';
				return $CI->session->set_flashdata($type,$messageBis);
			}

			function messageFailed($type,$message)
			{
				$CI = get_instance();
				$CI->load->library('session');
				$messageBis = ' <div class="alert alert-danger alert-dismissible" role="alert" style="width: 100%">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										'.$message.'
									</div>';
				return $CI->session->set_flashdata($type,$messageBis);
			}

		function sendEmail($from_nom,$from_email,$reply_to,$message,$objet,$destinataire){

			$headers ='From: "'.$from_nom.'"<'.$from_email.'>'."\n";
			$headers .='Reply-To: '.$reply_to.''."\n";
			$headers .='Content-Type: text/html; charset="utf-8"'."\n";
			$headers .='Content-Transfer-Encoding: 8bit';

			if(mail($destinataire, $objet, $message, $headers))
			{
				return true;

			}else{

				return false;
			}

		}


function  verifyInput($variable)
{
	$variable = trim($variable);
	$variable = htmlspecialchars($variable);
	$variable = stripcslashes($variable);

	return $variable;
}

		function sanitizeString($variable)
		{
			if(filter_var($variable,FILTER_SANITIZE_STRING))
			{
				return $variable;

			}else{

				return false;

			}
		}

		function sanitizeUrl($variable)
		{

			if(filter_var($variable, FILTER_VALIDATE_URL))
			{
				return $variable;

			}else{

				return  false;
			}

         }


		function isEmail($variable)
		{
			$variable = filter_var($variable,FILTER_VALIDATE_EMAIL);

			return $variable;
		}


		function isPhoneNumber($variable)
		{
			$variable = preg_match('/^[0-9 ]*$/',$variable);
			return $variable;
		}


		function adminLoggedIn()
		{
			$CI = get_instance();
			$CI->load->library('session');

			if($CI->session->userdata('id_admin_session'))
			{
				return true;

			}else{

				return false;
			}

		}

		function getAdminId()
		{
			$CI = get_instance();

			$CI->load->library('session');

			if($CI->session->userdata('id_admin_session'))
			{
				return $CI->session->userdata('id_admin_session');

			}else{

				return false;
			}

		}


		function studentLoggedIn()
		{
			$CI = get_instance();
			$CI->load->library('session');

			if($CI->session->userdata('id_student_session') and (($CI->session->userdata('status_student_session') == 1) OR  ($CI->session->userdata('status_student_session') == 2)))
			{
				return true;

			}else{

				return false;
			}

		}

		function getStudentId()
		{
			$CI = get_instance();

			$CI->load->library('session');

			if($CI->session->userdata('id_student_session'))
			{
				return $CI->session->userdata('id_student_session');

			}else{

				return 0;
			}
		}

			function statusSuccess($message)
			{
				echo '<span class="badge badge-success">'.$message.'</span>';
			}

			function statusFailed($message)
			{
				echo '<span class="badge badge-danger">'.$message.'</span>';
			}
