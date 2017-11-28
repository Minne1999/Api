<?php

$output = $_GET['output'];

$query = $this->db->query("SELECT * FROM opdracht");

$test = new apiClass($query, $output);

class apiClass {
	
	protected $query;

	public function __construct($query, $dataType){

		$this->query = $query;

		if($dataType == "xml"){
			$this->returnXml();
		} 
		else if($dataType == "Json")
		{
			$this->returnJson();
		} 
		else 
		{

		}
	}

	public function returnXml(){
		header("content-type: text/xml");
		$returnString = "<?xml version='1.0' encoding='utf-8'?>";
		$returnString .= "<opdrachten>";

		While($result = $this->query->unbuffered_row("array"))
		{
			$returnString .= "<opdracht>";

			foreach($result as $key => $value) {
	    		$returnString .= "<$key>$value</$key>";
			}

			$returnString .= "</opdracht>";
		}
		$returnString .= "</opdrachten>";

		echo $returnString;
	}

	public function returnJson(){
		header("Content-Type: application/json");
		$jsonEncoded = json_encode($this->query->result());

		echo $jsonEncoded;
	}
}
