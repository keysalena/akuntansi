<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akuntansi extends CI_Controller
{
	public function index()
	{
		$this->load->view('dashboard');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function akun()
	{
		$this->load->view('akun');
	}
	public function sub()
	{
		$this->load->view('sub');
	}
	public function tipe()
	{
		$this->load->view('tipe');
	}
	public function data()
	{
		$this->load->view('data');
	}
	public function role()
	{
		$this->load->view('role');
	}
	public function profil()
	{
		$this->load->view('profil');
	}
	public function jurnal()
	{
		$this->load->view('jurnal');
	}
	public function dashboard()
	{
		$this->load->view('dashboard');
	}
	public function buku()
	{
		$this->load->view('buku');
	}
	public function saldo()
	{
		$this->load->view('saldo');
	}
	public function riwayat()
	{
		$this->load->view('riwayat');
	}
	public function laba()
	{
		$this->load->view('laba');
	}
	public function perubahan()
	{
		$this->load->view('perubahan');
	}
	public function lajur()
	{
		$this->load->view('lajur');
	}
	public function page_404()
	{
		$this->load->view('404');
	}
}
