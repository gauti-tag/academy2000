<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	/**
	 * @var
	 */
	private $CI;
	/**
	 * @var string
	 */
	private $output = '';


	/**
	 * Layout constructor.
	 */
	public function __construct(){

		$this->CI =& get_instance();
	}

	/**
	 * @param $name
	 * @param array $data
	 */
	public function back($name, $data = array()){
		$this->output .= $this->CI->load->view('back/'.$name, $data,true);
		$this->CI->load->view('back/default', array('output'=> $this->output));
	}

	/**
	 * @param $name
	 * @param array $data
	 */
	public function welcome_page($name, $data = array()){
		$this->output .= $this->CI->load->view($name, $data,true);
		$this->CI->load->view('home', array('output'	=> $this->output));
	}

	/**
	 * @param $name
	 * @param array $data
	 */
	public function front($name, $data = array()){
		$this->output .= $this->CI->load->view($name, $data,true);
		$this->CI->load->view('default', array('output'	=> $this->output));
	}


}
