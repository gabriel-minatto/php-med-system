<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if( !function_exists( 'is_patient' ) )
	{
		function is_patient()
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			return ( $CI->session->userdata('paciente_id') != "" );
		}
	}
	
	if( !function_exists( 'is_doctor' ) )
	{
		function is_doctor()
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			return ( $CI->session->userdata('medico_id') != "" );
		}
	}
	
	if( !function_exists( 'is_secretary' ) )
	{
		function is_secretary()
		{
			$CI =& get_instance();
			$CI->load->helper('login');
			return ( $CI->session->userdata('secretario_id') != "" );
		}
	}
	
	
?>