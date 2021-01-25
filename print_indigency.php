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

		


			if ($gender == "female"){
				$gender = "She";
			}
			if ($gender == "male"){
				$gender = "He";
			}

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
			$this->Ln();

			$this->SetFont('Times','B',14);
			$this->cell(190,5,'OFFICE OF THE BARANGAY COUNCIL',0,0,'C');
			$this->Ln();
			$this->Ln();
			
			$this->SetFont('Times','B',20);
			$this->cell(190,25,'CERTIFICATE OF INDIGENCY',0,0,'C');
			$this->Ln();
			
			$this->SetFont('Times','B',10);
			$this->cell(0,5,'TO WHOM IT MAY CONCERN: ',0,0,'L');
			$this->Ln(0);
			$this->SetFont('Times','B',10);
			$this->SetX(55);
			$this->cell(0,5,':',0,0,'');
			$this->Ln(0);
			$this->SetFont('Times','U',10);
			$this->Ln();
			$this->Ln();
			

			$this->SetX(20);
			$this->SetFont('Times','',10);
			$this->Write(5,"THIS IS TO CERTIFY that ");
			$this->SetFont('','BU');
			$this->Write(5, $name ,'');
			$this->SetFont('Times','',10);
			$this->Write(5,' of Legal age, is a bonafide resident of ','');
			$this->Write(5, $address ,'');
			$this->SetFont('Times','',10);
			$this->Write(5,' The said person is of good moracl character and an active member of the community. ','');
			$this->SetFont('Times','',10);
			$this->Write(5, $gender ,'');
			$this->SetFont('Times','',10);
			$this->Write(5,' is one of those who belong to a low-income family. ','');
			$this->SetFont('Times','',10);
			$this->Ln();
			$this->Ln();
			$this->SetX(20);
			$this->SetFont('Times','',10);
			$this->Write(5,"This certification is being issued upon the request of the above-named person for whatever purpose it may serve him best");
			$this->SetX(20);
			$this->Ln();
			$this->Ln();

			$this->SetX(20);
			$this->SetFont('Times','',10);
			$this->Write(5,"Given this ");
			$this->SetFont('Times','',10);
			$this->Write(5, $day,'');
			$this->SetFont('Times','',10);
			$this->Write(5,' of ','');
			$this->SetFont('Times','',10);
			$this->Write(5, $monthyear ,'');
			$this->SetFont('Times','',10);
			$this->Write(5,' at Barangay Glan Poblacion.','');


	
			$this->SetY(140);
			$this->SetX(130);
			$this->SetFont('Times','BU',10);
			$this->Write(5,"PUNONG BARANGAY NAME ");
			$this->Ln();
			$this->SetX(140);
			$this->SetFont('Times','',10);
			$this->Write(5,"Punong Barangay ");




		}

	}
	$pdf = new report();
	$pdf->AliasNbPages();
	$pdf->AddPage('','A4',0);
	// $pdf->headertable();

	$pdf->Output('file.pdf','I');
?>