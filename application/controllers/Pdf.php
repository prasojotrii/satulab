<?php

defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . '/assets/dompdf/autoload.php';

use Dompdf\Dompdf;

class Pdf extends CI_Controller
{


	public function index()
	{

		$pdf = $this->load->view("template/printout/kalibrasi/laporan", null, true);

		$dompdf = new Dompdf();

		$dompdf->set_option('isRemoteEnabled', TRUE);

		$dompdf->loadHtml($pdf);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		//$dompdf->stream();
		$dompdf->stream('my.pdf', array('Attachment' => 0));
	}


	public function std()
	{

		// $pdf = $this->load->view("lembar_kerja", null, true);

		// $dompdf = new Dompdf();

		// $dompdf->set_option('isRemoteEnabled', TRUE);

		// $dompdf->loadHtml($pdf);

		// // (Optional) Setup the paper size and orientation
		// $dompdf->setPaper('A4', 'portrait');

		// // Render the HTML as PDF
		// $dompdf->render();

		// // Output the generated PDF to Browser
		// //$dompdf->stream();
		// $dompdf->stream('my.pdf', array('Attachment' => 0));


		$this->db->select("(SELECT STDDEV_POP(berat_isi) FROM tb_input_kalibrasi_glassware WHERE id_aset='0009-1022-INS') AS stddevsuhu", FALSE);

		$query = $this->db->get('tb_input_kalibrasi_glassware')->row();
		echo $query->stddevsuhu;
	}
}
