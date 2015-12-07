<?php

class printPDF{
	
	private $align;
	private $font;
	private $size;
	
	private $header;
	private $footer;
	
	public function setAlign($a){
		
		$this->align = $a;

	}
	
	public function setFont($f){
		
		$this->font = $f;

	}
	
	public function setSize($s){
		
		$this->size = $s;

	}
	
	public function setHeader($ah){
		
		$this->header = $h;

	}
	
	public function setFooter($fo){
		
		$this->footer = $fo;

	}
	
	public function print_pdf($text, $title = 'PDF Document'){

		require_once('../backend/tcpdf/tcpdf.php');

		$pdf = new TCPDF();
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage();
		
		$pdf->writeHTML($text, true, false, true, false, '');
		$pdf->Output($title, 'I');

	}
	
	
}