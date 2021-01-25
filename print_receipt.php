<?php 
	
	ob_get_clean();
	header('Content-type: application/pdf');

	
    //echo $datefrom;
	require_once("fdf/fpdf.php");
	//require_once("f.php");
	//$dbConn = @new mysqli("localhost","root","","clinicdb");
	$db = new PDO('mysql:host=localhost;dbname=bfp_database','root','');
	
	Class report extends FPDF{
		function header(){
			$db = new PDO('mysql:host=localhost;dbname=bfp_database','root','');
			
			//$id = $_GET['id'];
			 $query="SELECT a.*,b.* FROM tbl_inspection a INNER JOIN tbl_address b ON a.add_id =b.add_id WHERE a.ins_id='56'"; 
			$result = $db->query($query);
			$x = "7";
			$y = "15";
			while($data=$result->fetch(PDO::FETCH_OBJ)){
				$inspection_no = $data->inspection_no;
				$inspector = $data->inspector;
				$establishment = $data->establishment;
				$brgy = $data->brgy;
				$municipality = $data->mun_city;
				$province = $data->province;
				$ins = explode(',',$inspector);
			}
			$query2="SELECT * FROM tbl_inspector WHERE position IN('Acting City Fire Marshal','City Fire Marshal') AND status='1'"; 
			$result2 = $db->query($query2);
			while($data=$result2->fetch(PDO::FETCH_OBJ)){
				$position = $data->position;
				$rank = $data->rank;
				$firstname = $data->firstname;
				$lastname = $data->lastname;
				$rankandname = $rank.' '.$firstname.' '.$lastname;
			}

			$query2="SELECT * FROM tbl_inspector WHERE position ='Chief, Fire Safety Enforment Branch' AND status='1'"; 
			$result2 = $db->query($query2);
			while($data=$result2->fetch(PDO::FETCH_OBJ)){
				
				$rank1 = $data->rank;
				$firstname1 = $data->firstname;
				$lastname1 = $data->lastname;
				$rankandname1 = $rank1.' '.$firstname1.' '.$lastname1;
			}
			
			$timezone = new DateTimeZone("Asia/Manila" );
			$date = new DateTime();
			$date->setTimezone($timezone );
			$d = $date->format('M-d-Y');

			$day = $date->format('d');
			$monthyear = $date->format('F Y');

			$name = $_GET['name'];
			$address = $_GET['address'];
			$gender = $_GET['gender'];
			$age = $_GET['age'];
			$purpose = $_GET['purpose'];
			$amount = $_GET['amount'];
			$collectionname = $_GET['collectionname'];


			// if ($gender == "female"){
			// 	$gender = "She";
			// }
			// if ($gender == "male"){
			// 	$gender = "He";
			// }

			// $this->SetFont('Times','',10);
			//$this->Image('bflogo.png',25,10,24.5);
			//$this->Image('bfplogo2.png',158,7,25.5);
			$this->Ln(0);

			$this->SetFont('Times','',10);
			$this->cell(190,3,'Republic of the Philippines',0,0,'C');
			$this->Ln();
			$this->SetFont('Times','B',10);
			$this->cell(190,5,'Province of Sarangani',0,0,'C');
			$this->Ln();
			$this->SetFont('Times','B',10);
			$this->cell(190,5,'Municipality of Glan',0,0,'C');
			$this->Ln();

			$this->SetFont('Times','B',10);
			$this->cell(190,5,'BARANGAY POBLACION',0,0,'C');
			$this->Ln();

			$this->SetFont('Times','B',20);
			$this->cell(190,25,'Official Receipt',0,0,'C');
			$this->Ln();
	

			$this->SetX(55);
			$this->SetFont('Times','',10);
			$this->Write(5,"Name: ");
			$this->SetFont('','BU');
			$this->Write(5, $name , '');

			$this->SetX(120);
			$this->SetFont('Times','',10);
			$this->Write(5,"Date: ");
			$this->SetFont('','BU');
			$this->Write(5, $d , '');



			$this->Ln();

			$this->SetX(55);
			$this->SetFont('Times','',10);
			$this->Write(5,"Address: ");
			$this->SetFont('','BU');
			$this->Write(5, $address , '');
			$this->Ln();
			$this->SetX(55);
			$this->Write(5,"_____________________________________________________ ");
			$this->Ln();
			$this->SetX(55);
			$this->SetFont('Times','',10);
			$this->Write(5,"Collection Name");
			$this->SetX(130);
			$this->Write(5,"Amount Paid ");
			
			$this->Ln();
			$this->SetX(55);
			$this->SetFont('','B');
			$this->Write(5, $collectionname , '');
			$this->SetX(130);
			$this->Write(5, $amount);
			$this->Ln();

			$this->SetX(55);
			$this->SetFont('','BU');
			$this->Write(5,"_____________________________________________________ ");
			$this->Ln();
			$this->SetX(110);
			$this->SetFont('Times','',10);
			$this->Write(5,"Total:");
			$this->SetX(130);
			$this->Write(5, $amount);
	


		}

	}
	$pdf = new report();
	$pdf->AliasNbPages();
	$pdf->AddPage('','A4',0);
	// $pdf->headertable();

	$pdf->Output('file.pdf','I');
?>