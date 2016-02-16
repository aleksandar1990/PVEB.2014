<?php

while (! file_exists('DBManager') )
    chdir('..');

include_once getcwd().'/registration/User.php';
include_once getcwd().'/registration/Cars.php';
include_once getcwd().'/Util/UserRoleConsts.php';


// za pristupanje metodama preko url-a get metodom npr ../DBManager/DBManager.php?function=saveNewUser
/*if(function_exists($_GET['function'])) {
	   $_GET['function']();
  }*/

class DBManager {

  //mysql info
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "rent_a_car_db";
    private $mysqli;
	

    //connect to db
    private function connectToDB()
    {
        if($this->mysqli == null) {
            $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if ($this->mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
            }
           // echo $this->mysqli->host_info . "<br/>";
        }

    }

    private function disconnectFromDB()
    {
        if($this->mysqli)
            $this->mysqli->close();
    }

    private  function realEscape($string)
    {
        return $this->mysqli->real_escape_string($string);
    }

    private function makeInsertSQLStringFromUser($user)
    {
        $fn = $this->realEscape($user->get_firstName());
        $ln =  $this->realEscape($user->get_lastName());
        $address = $this->realEscape($user->get_address());
        $phone = $this->realEscape($user->get_phone());
        $ssn = $this->realEscape($user->get_ssn());
        $id = $this->realEscape($user->get_id_card_number());
        $ppt = $this->realEscape($user->get_passport_id());
        $info = $this->realEscape($user->get_info());
        $pwd = $this->realEscape($user->get_password());
        $uname = $this->realEscape($user->get_username());
        $mail = $this->realEscape($user->get_email());

        $sql = "INSERT INTO Korisnik (Ime, Prezime, Adresa, Telefon,Mat_broj,BR_licne,Br_pasosa,Informacije,password,username,email,chack,identity)
                VALUES (\"$fn\",\"$ln\", \"$address\",\"$phone\",
                        $ssn,\"$id\",\"$ppt\",\"$info\",
                        \"$pwd\",\"$uname\", \"$mail\",'0', 'klijent')";
        return $sql;
    }

    public function saveNewUser($user)
    {
        $this->connectToDB();

        $insertSql = $this->makeInsertSQLStringFromUser($user);

        if ($this->mysqli->query($insertSql) === TRUE) {
            header('Location: ../isregistred.html');
        } else {
            echo "Error: " . $insertSql . "<br>" . $this->mysqli->error;
        }

        //$this->disconnectFromDB();
    }


    public function existsUserEmail($user)
    {
        if ($stmt = $this->mysqli->prepare("SELECT * FROM Korisnik WHERE email=?")) {

            /* bind parameters for markers */
            $mail = $this->realEscape($user->get_email());
            $stmt->bind_param("s", $mail);

            /* execute query */
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0)
            {
                return true;
            }
            else
            {
                return false;
            }


            $stmt->close();
        }
    }

    private function existsUserUsername($user)
    {
        if ($stmt = $this->mysqli->prepare("SELECT * FROM Korisnik WHERE username=?")) {

            /* bind parameters for markers */
            $uname = $this->realEscape($user->get_username());
            $stmt->bind_param("s", $uname);

            /* execute query */
            $stmt->execute();

            $stmt->store_result();

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                return true;
            }

            $stmt->close();
        }
    }


    public function updatePasswordForEmail($email, $password)
    {
        if ($stmt = $this->mysqli->prepare("UPDATE korisnik SET password = ? WHERE email = ?")) {

            $stmt->bind_param('ss',
                $password,
                $email);

            $stmt->execute();
            $stmt->close();
        }
    }

    public function checkIfUserExists($user)
    {

        return $this->existsUserUsername($user) || $this->existsUserEmail($user);

    }

    private function roleForUser($user)
    {
        $role = "";
        $identity = "identity";
        $query = "SELECT $identity FROM Korisnik WHERE email=? AND password=?";
        if ($stmt = $this->mysqli->prepare($query)) {

            /* bind parameters for markers */
            $uname = $this->realEscape($user->get_email());
            $pwd = $this->realEscape($user->get_password());

            //echo $uname." passwd ".$pwd."<br/>";

            $ss = 'ss';
            $stmt->bind_param($ss , $uname, $pwd);

            //echo "Stmt ".$stmt."<br/>";

            /* execute query */
            $stmt->execute();
            //echo "Rows ".$stmt->num_rows."<br/>";
            $stmt->store_result();

            $stmt->bind_result($role);

            while ($stmt->fetch()) {
                $stmt->close();
                return $role;
            }


            $stmt->close();

            return "Unknown user role";
        }
    }
	
	public function usernameForUserEmail($email)
    {
        $username = "";
        $identity = "identity";
        $query = "SELECT username FROM Korisnik WHERE email=?";
        if ($stmt = $this->mysqli->prepare($query)) {

            /* bind parameters for markers */


            //echo $uname." passwd ".$pwd."<br/>";

            $ss = 's';
            $stmt->bind_param($ss , $email);

            //echo "Stmt ".$stmt."<br/>";

            /* execute query */
            $stmt->execute();
            //echo "Rows ".$stmt->num_rows."<br/>";
            $stmt->store_result();

            $stmt->bind_result($username);

            while ($stmt->fetch()) {
                $stmt->close();
                return $username;
            }


            $stmt->close();

            return "Unknown username";
        }
    }
	
	public function idForUserEmail($email)
    {
        $id = 0;
        $query = "SELECT ID_korisnika FROM Korisnik WHERE email=?";
        if ($stmt = $this->mysqli->prepare($query)) {

            /* bind parameters for markers */


            //echo $uname." passwd ".$pwd."<br/>";

            $ss = 's';
            $stmt->bind_param($ss , $email);

            //echo "Stmt ".$stmt."<br/>";

            /* execute query */
            $stmt->execute();
            //echo "Rows ".$stmt->num_rows."<br/>";
            $stmt->store_result();

            $stmt->bind_result($id);

            while ($stmt->fetch()) {
                $stmt->close();
                return $id;
            }


            $stmt->close();

            return "Unknown id";
        }
    }


    
    public function getRoleForUser($user)
    {
      //$this->connectToDB();

      $role = $this->roleForUser($user);
      //echo "<br/>Role for current user: $role <br/>";

      //$this->disconnectFromDB();

      return $role;
    }

    public function isUserClient($user)
    {
        $role = $this->getRoleForUser($user);
        return UserRoleConsts::isRoleClient($role);
    }

    public function isUserOwner($user)
    {
        $role = $this->getRoleForUser($user);
        return UserRoleConsts::isRoleOwner($role);
    }

    public function isUserMechanic($user)
    {
        $role = $this->getRoleForUser($user);
        return UserRoleConsts::isRoleMechanic($role);
    }

    //singleton declaration
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;  
    }
    
    /* broj aplikacija za iznajmljivanje */
	public function numTotalRentAplication()
	{
		if ($stmt = $this->mysqli->query("SELECT * FROM iznajmi WHERE Datum_vracanja IS NULL")) {
			if ($stmt->num_rows == 0)
			{
				return false;
			}
			else
			{
				return $stmt->num_rows;
			}

			$stmt->close();
		}
	}
	
	/* broj automobila koji su prodati ili treba da se prodaju */
	public function numSellCars()
    {
        if ($stmt = $this->mysqli->query("SELECT * FROM prodati_automobili")) {

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                return $stmt->num_rows;
            }

            $stmt->close();
        }
    }
	
    public function numAllCars()
    {
        if ($stmt = $this->mysqli->query("SELECT * FROM automobili")) {

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                return $stmt->num_rows;
            }

            $stmt->close();
        }
    }
    
    
	/* broj dostupnih automobila */
	public function numAvailableCars()
    {
        if ($stmt = $this->mysqli->query("SELECT * FROM automobili WHERE Iznajmljen=0")) {

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                return $stmt->num_rows;
            }

            $stmt->close();
        }
    }
	
	
    /* broj klijenata */
    
	public function numClients()
    {
        if ($stmt = $this->mysqli->query("SELECT * FROM korisnik WHERE identity='klijent'")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                return $stmt->num_rows;
            }

            $stmt->close();
        }
    }
	
	/* broj kvarova */
	public function numFailures()
    {
        if ($stmt = $this->mysqli->query("SELECT * FROM kvarovi WHERE Datum_popravke IS NULL")) {
			

            if ($stmt->num_rows == 0)
            {
                return $stmt->num_rows;;
            }
            else
            {
                return $stmt->num_rows;
            }

            $stmt->close();
        }
    }
	
	
	/* broj transakcija */
	public function numTransactions()
    {
        if ($stmt = $this->mysqli->query("SELECT * FROM transakcije")) {
			

            if ($stmt->num_rows == 0)
            {
                return $stmt->num_rows;;
            }
            else
            {
                return $stmt->num_rows;
            }

            $stmt->close();
        }
    }
	
	/* prosecna kilometraza */
	public function avgMilage()
    {
        if ($stmt = $this->mysqli->query("SELECT round(avg(Kilometraza),2) as kilometraza FROM automobili")) {
			

             if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                while (($row = $stmt->fetch_assoc()) !== null) {	
					echo $row["kilometraza"];
				}
            }

            $stmt->close();
        }
    }
	
	
	public function maxMilage()
    {
        if ($stmt = $this->mysqli->query("SELECT max(Kilometraza) as kilometraza FROM automobili")) {
			

             if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                while (($row = $stmt->fetch_assoc()) !== null) {	
					echo $row["kilometraza"];
				}
            }

            $stmt->close();
        }
    }
	
	
	/* prosecna kilometraza */
	public function avgBuyCarPrice()
    {
        if ($stmt = $this->mysqli->query("SELECT round(avg(Cena_kupovine),2) as cena FROM automobili")) {
			

             if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                while (($row = $stmt->fetch_assoc()) !== null) {	
					echo $row["cena"];
				}
            }

            $stmt->close();
        }
    }
	
	/* prosecna kilometraza */
	public function avgRentCarPrice()
    {
        if ($stmt = $this->mysqli->query("SELECT round(avg(Cena_iznajmljivanja),2) as cena FROM automobili")) {
			

             if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                while (($row = $stmt->fetch_assoc()) !== null) {	
					echo $row["cena"];
				}
            }

            $stmt->close();
        }
    }
	

	public function opisDostupnihAutomobila()
    {
        if ($stmt = $this->mysqli->query("SELECT Proizvodjac, Model, Kategorija, Vrsta_goriva, Menjac, Kubikaza, Kilometraza, Cena_kupovine FROM automobili WHERE Iznajmljen=0")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				echo "<tr>";
                while (($row = $stmt->fetch_assoc()) !== null) {	
					echo "<tr>".
					 "<td>".$row["Proizvodjac"]."</td>".
					 "<td>".$row["Model"]."</td>".
					 "<td>".$row["Kategorija"]."</td>".
					 "<td>".$row["Vrsta_goriva"]."</td>".
					 "<td>".$row["Menjac"]."</td>".
					 "<td>".$row["Kubikaza"]."</td>".
					 "<td>".$row["Kilometraza"]."</td>".
					 "<td>".$row["Cena_kupovine"]."</td>".
					 "</tr>";
				}
            }

            $stmt->close();
        }
    }
	
	public function opisDostupnihAutomobilaJSON()
    {
        if ($stmt = $this->mysqli->query("SELECT Proizvodjac, Model, Kategorija, Vrsta_goriva, Menjac, Kubikaza, Kilometraza, Cena_kupovine FROM automobili WHERE Iznajmljen=0")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				$res = array();
				
				while($row = mysqli_fetch_array($stmt)) {
					$res[] = array(
					'Proizvodjac' => $row["Proizvodjac"],
					'Model' => $row["Model"],
					'Kategorija' => $row["Kategorija"],
					'Vrsta_goriva' => $row["Vrsta_goriva"],
					'Menjac' => $row["Menjac"],
					'Kubikaza' => $row["Kubikaza"],
					'Kilometraza' => $row["Kilometraza"],
					'Cena_kupovine' => $row["Cena_kupovine"]
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }
	
	public function listUsersJSON()
    {
        if ($stmt = $this->mysqli->query("SELECT Ime, Prezime, identity, username, email FROM korisnik")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				$res = array();
				
				while($row = mysqli_fetch_array($stmt)) {
					$res[] = array(
					'Ime' => $row["Ime"],
					'Prezime' => $row["Prezime"],
					'identity' => $row["identity"],
					'username' => $row["username"],
					'email' => $row["email"]
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }
	
	public function listTransactionsJSON()
    {
        if ($stmt = $this->mysqli->query("SELECT t.id_transakcije, k.Ime, k.Prezime, t.datum_transakcije, t.opis_transakcije, t.iznos FROM transakcije t JOIN korisnik k ON t.id_uplatioca=k.ID_korisnika")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				$res = array();
				
				while($row = mysqli_fetch_array($stmt)) {
					$res[] = array(
					'id_transakcije' => $row["id_transakcije"],
					'Ime' => $row["Ime"],
					'Prezime' => $row["Prezime"],
					'datum_transakcije' => $row["datum_transakcije"],
					'opis_transakcije' => $row["opis_transakcije"],
					'iznos' => $row["iznos"]
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }
    
    public function chachIznajmljen()
    {
       if ($stmt = $this->mysqli->prepare("SELECT * FROM iznajmi WHERE Br_sasije=? AND Datum_vracanja IS NULL")) {

           $stmt->bind_param('s', $_POST['chassis_num']);

            /* execute query */
            $stmt->execute();

            $stmt->store_result();
            

            if ($stmt->num_rows == 0)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }

            $stmt->close();
        }
    }
   
     public function proveriSasijupopravka()
    {
       if ($stmt = $this->mysqli->prepare("SELECT * FROM kvarovi  WHERE ID_sasije=?")) {

           $stmt->bind_param('s', $_POST['ID_sasije']);

            /* execute query */
            $stmt->execute();

            $stmt->store_result();

            if ($stmt->num_rows == 0)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }

            $stmt->close();
        }
    }
    
    public function proveriSasiju()
    {
       if ($stmt = $this->mysqli->prepare("SELECT * FROM automobili  WHERE BR_sasije=?")) {

           $stmt->bind_param('s', $_POST['chassis_num']);

            /* execute query */
            $stmt->execute();

            $stmt->store_result();

            if ($stmt->num_rows == 0)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }

            $stmt->close();
        }
    }
    public function listpopravkeJSON()
    {
        
        if ($stmt = $this->mysqli->query("SELECT * FROM kvarovi JOIN korisnik ON  kvarovi.ID_popravio = korisnik.ID_korisnika")) {
			$popravljeno;
		if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                $repear = array();
				
				while($row = mysqli_fetch_array($stmt)) {
                    if($row["Datum_popravke"]!=NULL)
                    {
                        $popravljeno="Fixed";
                    }
                    else {
                        $popravljeno="Not fixed yet";
                        }
					$res[] = array(
					'ID_kvara' => $row["ID_kvara"],
					'ID_sasije' => $row["ID_sasije"],
                    'popravio' => $popravljeno, 
                    'mehanicar' => $row['Ime'],   
					'Opis_kvara' => $row["Opis_kvara"],
					'Datum_prijave' => $row["Datum_prijave"],
					'Datum_popravke' => $row["Datum_popravke"],
                    'Opis_stanja' => $row["Opis_stanja"]
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }

    public function proveriKilometre()
    {
       if ($stmt = $this->mysqli->prepare("SELECT * FROM automobili WHERE automobili.BR_sasije=? AND Kilometraza< ?")) {

           $stmt->bind_param('si', $_POST['chassis_num'], $_POST['current_mileage']);

            /* execute query */
            $stmt->execute();

            $stmt->store_result();

            if ($stmt->num_rows == 0)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }

            $stmt->close();
        }
    }
    
    public function malFunction()
	{
            
                           $a1= $_POST['chassis_num'];
                           $a2= $_POST['id'];
                           $a3= $_POST['opis_kvara'];
                           $a5= $_POST['opis_stanja'];
                           $a4= $_POST['current_date'];
                           $a6='NULL';
         if ($stmt = $this->mysqli->prepare("INSERT INTO `kvarovi`(`ID_kvara`, `ID_sasije`, `ID_prijavio`, `ID_popravio`, `Opis_kvara`, `Datum_prijave`, `Datum_popravke`, `Cena_delova`, `Opis_popravke`, `Opis_stanja`) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )")) {
			
			   $stmt->bind_param('ssisssssss',$a6, $a1, $a2, $a6, $a3, $a4, $a6, $a6, $a6, $a5);
			    $stmt->execute();
                            $stmt->close();
	
                    
        }
         
      }
      
      
      public function PopravkamalFunction()
	{
            
                           $a0 = $_POST['current_date'];
						   $a1 = $_POST['ID_popravio'];
                           $a2 = $_POST['Cena_delova'];
                           $a3 = $_POST['Opis_popravke'];
						   $a4 = $_POST['Opis_kvara'];
                           $a5 = $_POST['Opis_stanja'];
                           $a6 = $_POST['ID_sasije'];
                    
       
        if ($stmt = $this->mysqli->prepare("UPDATE `kvarovi` SET `Datum_popravke`=?,`ID_popravio`=?,`Cena_delova`=?,`Opis_popravke`=?,`Opis_kvara`=?, `Opis_stanja`=? WHERE ID_sasije=?")) {
			
			   $stmt->bind_param('siissss',$a0, $a1, $a2, $a3, $a4, $a5, $a6);
                                $stmt->execute();
                                $stmt->close();
      
        }
        
      }
          
          
    public function OilInsert()
	{
            
                           $a1 = $_POST['tip_ulja'];
                           $a2 = $_POST['chassis_num'];
                           $a3 = $_POST['id'];
                           $a4 = $_POST['datum_promene_ulja'];
                           $a5 = $_POST['current_mileage'];
                           $a6 = '';
                           
        if ($stmt = $this->mysqli->prepare("INSERT INTO `zamena_ulja`( `ID`, `Oil_type`, `BRsasije`, `IDmehanicara`, `Datum_promene`, `Kilometraza`) VALUES ( ? , ? , ? , ? , ? , ? )")) {
			
			   $stmt->bind_param('sssisi',$a6, $a1, $a2, $a3, $a4, $a5);
			   
			   $stmt->execute();
			   $stmt->close();
        }
          }
    
     public function chachUgovoriBRsasije()
    {
       if ($stmt = $this->mysqli->prepare("SELECT * FROM automobili JOIN iznajmi ON automobili.BR_sasije=iznajmi.Br_sasije WHERE automobili.BR_sasije=? AND iznajmi.Br_ugovora=? AND Datum_vracanja IS NULL")) {

           $stmt->bind_param('si', $_POST['chassis_num'], $_POST['contract_num']);

            /* execute query */
            $stmt->execute();

            $stmt->store_result();

            if ($stmt->num_rows == 0)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }

            $stmt->close();
        }
    }
    
    
    public function returnUpdate()
        {
			  
				/* set autocommit to off */
			   $this->mysqli->autocommit(FALSE);
			   
			   $this->mysqli->begin_transaction();
				
               if ($stmt = $this->mysqli->prepare("UPDATE iznajmi SET Komentar =?, Datum_vracanja =? WHERE BR_sasije = ? AND Br_ugovora =?")) {
			
			   $stmt->bind_param('sssi',
			   $_POST['comment'],
               $_POST['current_date'],        
               $_POST['chassis_num'],
               $_POST['contract_num']);

               $stmt->execute();
               $stmt->close();
            }
		
			if ($stmt2 = $this->mysqli->prepare("INSERT INTO events SET start_date=?, end_date=?, text=?")) {
			
			   $stmt2->bind_param('sss',
			   $_POST['datetime'],
               $_POST['datetime'],        
               $_POST['comment']);

               $stmt2->execute();
               $stmt2->close();
			}
			
			if ($stmt3 = $this->mysqli->prepare("INSERT INTO transakcije SET id_uplatioca=?, opis_transakcije=?, iznos=?")) {
			
			   $stmt3->bind_param('isi',
			   $_POST['user_ID'],
               $_POST['comment'],        
               $_POST['iznos']);

               $stmt3->execute();
               $stmt3->close();
			}
			
			if($stmt && $stmt2 && $stmt3)
			{  
			   $this->mysqli->commit();  // Commit transaction
			}
			else
			{
				$this->mysqli->rollback();  // Rollback transaction
			}
		   
    }
	
	public function sellCar()
        {
			  
				/* set autocommit to off */
			   $this->mysqli->autocommit(FALSE);
			   
			   $this->mysqli->begin_transaction();
				
               if ($stmt = $this->mysqli->prepare("UPDATE prodati_automobili SET Placen=1, iznos = ? WHERE id_prodaje = ? AND broj_sasije_vozila = ?")) {
			
			   $stmt->bind_param('iis',
			   $_POST['iznos'],
			   $_POST['contract_num'],      
               $_POST['chassis_num']
               );

               $stmt->execute();
               $stmt->close();
            }
		
			if ($stmt2 = $this->mysqli->prepare("INSERT INTO events SET start_date=?, end_date=?, text=?")) {
			
			   $stmt2->bind_param('sss',
			   $_POST['datetime'],
               $_POST['datetime'],        
               $_POST['comment']);

               $stmt2->execute();
               $stmt2->close();
			}
			
			if ($stmt3 = $this->mysqli->prepare("INSERT INTO transakcije SET id_uplatioca=?, opis_transakcije=?, iznos=?")) {
			
			   $stmt3->bind_param('isi',
			   $_POST['user_ID'],
               $_POST['comment'],        
               $_POST['iznos']);

               $stmt3->execute();
               $stmt3->close();
			}
			
			if($stmt && $stmt2 && $stmt3)
			{  
			   $this->mysqli->commit();  // Commit transaction
			}
			else
			{
				$this->mysqli->rollback();  // Rollback transaction
			}
		   
    }
	

    public function listIznajmljeniJSON()
    {
        if ($stmt = $this->mysqli->query("SELECT iznajmi.BR_sasije, iznajmi.ID_korisnika, korisnik.Ime, Proizvodjac, Model, Br_ugovora, Datum_iznajmljivanja, Ugovoreni_datum_vracanja FROM automobili JOIN iznajmi ON automobili.BR_sasije = iznajmi.Br_sasije JOIN korisnik ON korisnik.ID_korisnika=iznajmi.ID_korisnika WHERE Datum_vracanja IS NULL")) {
			
			if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				$res = array();
				
				while($row = mysqli_fetch_array($stmt)) {
					$res[] = array(
					'BR_sasije' => $row["BR_sasije"],
					'ID_korisnika' => $row["ID_korisnika"],
                                        'Ime_korisnika' => $row['Ime'],
					'Proizvodjac' => $row["Proizvodjac"],
					'Model' => $row["Model"],
					'Br_ugovora' => $row["Br_ugovora"],
					'Datum_iznajmljivanja' => $row["Datum_iznajmljivanja"],
                    'Ugovoreni_datum_vracanja' => $row["Ugovoreni_datum_vracanja"]
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }
    
    public function forSaleJSON()
    {
        if ($stmt = $this->mysqli->query("SELECT p.id_prodaje, p.broj_sasije_vozila, a.Proizvodjac, a.Model, p.id_kupca, k.Ime, k.Prezime, p.iznos FROM prodati_automobili p JOIN korisnik k ON p.id_kupca=k.ID_korisnika JOIN automobili a ON a.BR_sasije=p.broj_sasije_vozila WHERE p.placen=0")) {
			
			if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				$res = array();
				
				while($row = mysqli_fetch_array($stmt)) {
					$res[] = array(
					'id_prodaje' => $row["id_prodaje"],
					'broj_sasije_vozila' => $row["broj_sasije_vozila"],
					'Proizvodjac' => $row["Proizvodjac"],
					'Model' => $row["Model"],
					'id_kupca' => $row["id_kupca"],
					'Ime' => $row["Ime"],
					'Prezime' => $row["Prezime"],
                    'iznos' => $row["iznos"]
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }
    
    
     
	public function listCarPriceJSON()
    {
        if ($stmt = $this->mysqli->query("SELECT BR_sasije, Proizvodjac, Model, Godiste, Cena_kupovine, Cena_iznajmljivanja FROM automobili WHERE Iznajmljen=0")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				$res = array();
				
				while($row = mysqli_fetch_array($stmt)) {
					$res[] = array(
					'BR_sasije' => $row["BR_sasije"],
					'Proizvodjac' => $row["Proizvodjac"],
					'Model' => $row["Model"],
					'Godiste' => $row["Godiste"],
					'Cena_kupovine' => $row["Cena_kupovine"], 
					'Cena_iznajmljivanja' => $row["Cena_iznajmljivanja"]
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }
	
	public function updateCarPrice()
    {
        if ($stmt = $this->mysqli->prepare("UPDATE automobili SET Cena_kupovine = ?, Cena_iznajmljivanja = ? WHERE BR_sasije = ?")) {
			
			   $stmt->bind_param('iis',
			   $_POST['buy_price'],
			   $_POST['rent_price'],
			   $_POST['chassis_number']);
			   
			   $stmt->execute();
			   $stmt->close();
        }
    }
	
	public function enterNewVehicle()
	{
			$p1 = $_POST['chassis_number']; 
			$p2 = $_POST['manufracturer'];
			$p3 = $_POST['model'];
			$p4 = $_POST['category'];
			$p5 = $_POST['door_num'];
			$p6 = $_POST['fuel_type'];
			$p7 = $_POST['gear_type'];
			$p8 = $_POST['year_built'];
			$p9 = $_POST['engine_number'];
			$p10 = $_POST['color'];
			$p11 = $_POST['picture'];
			$p12 = $_POST['buy_price'];
			$p13 = $_POST['rent_price'];
			$p14 = $_POST['capacity'];
			$p15 = $_POST['registration_plate'];
			$p16 = $_POST['first_registration'];
			$p17 = $_POST['milage'];
			$p18 = $_POST['accessories'];
			
			if ($stmt = $this->mysqli->prepare("INSERT INTO `automobili`
												(`BR_sasije`, `Proizvodjac`, `Model`, `Kategorija`, `BR_vrata`, `Vrsta_goriva`,
												`Menjac`, `Godiste`, `BR_motora`, `Boja`, `Slika`, `Cena_kupovine`,
												`Cena_iznajmljivanja`, `Kubikaza`, `Registraciona_oznaka`, `Prva_registracija`,
												`Kilometraza`, `Dodatna_oprema`)
  												 VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )")) {
				
				   $stmt->bind_param('ssssississsiisssis',
				   $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15, $p16, $p17, $p18);			   

				   if (!$stmt->execute()) 
				    {
						echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
				    }
					else 
					{
						$stmt->execute();
						echo "Vehicle is successfully inserted to database. ";
					}
				   $stmt->close();

				}
				
				
	}
			

	public function existsChassisNumber($cars)
    {
        if ($stmt = $this->mysqli->prepare("SELECT * FROM automobili WHERE BR_sasije=?")) {

            /* bind parameters for markers */
            $cars = $this->realEscape($cars->get_br_sasije());
            $stmt->bind_param("s", $cars);

            /* execute query */
            $stmt->execute();

            $stmt->store_result();

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
                return true;
            }

            $stmt->close();
        }
    }
    
     public function statisticJSON()
    {
        $iznajmio;
        if ($stmt = $this->mysqli->query("SELECT BR_sasije, Proizvodjac, Model, Kategorija, Vrsta_goriva, Menjac, Kubikaza, Kilometraza, Cena_kupovine, Iznajmljen FROM automobili")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
                       {
				while($row = mysqli_fetch_array($stmt)) {
                 
                     if($row["Iznajmljen"]=='1')
                    {
                        $iznajmio="Yes";
                        
                    }
                    else {
                        $iznajmio="No";
                        }
					$res[] = array(
					'BR_sasije' => $row["BR_sasije"],
					'Proizvodjac' => $row["Proizvodjac"],
					'Model' => $row["Model"],
                    'kubikaza' => $row['Kubikaza'],                                                
					'izvajmljen' => $iznajmio 
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
                       }
                       
        }
        
	
	
    public function SviAutomobili()
    {
        $iznajmio;
        if ($stmt = $this->mysqli->query("SELECT BR_sasije, Proizvodjac, Model, Kategorija, Vrsta_goriva, Menjac, Kubikaza, Kilometraza, Cena_kupovine, Iznajmljen FROM automobili")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				echo "<tr>";
                while (($row = $stmt->fetch_assoc()) !== null) {
                    if($row["Iznajmljen"]=='1')
                    {
                        $iznajmio="No";
                        
                    }
                    else {
                        $iznajmio="Yes";
                        }
                                
					echo "<tr>".
					 "<td>".$row["BR_sasije"]."</td>".
					 "<td>".$row["Proizvodjac"]."</td>".
					 "<td>".$row["Model"]."</td>".
					 "<td>".$row["Vrsta_goriva"]."</td>".
					 "<td>".$row["Menjac"]."</td>".
					 "<td>".$row["Kubikaza"]."</td>".
					 "<td>".$row["Kilometraza"]."</td>".
					 "<td>".$iznajmio."</td>".
					 "</tr>";
				}
            }
            $stmt->close();
        }
    }
	
	public function listNabavkaInsert()
	{
        if ($stmt = $this->mysqli->prepare("INSERT INTO `nabavka`( `ID_narucioca`, `nabavka`) VALUES ( ? , ? )")) {
			
			   $stmt->bind_param('is',
			   $_POST['id'],
			   $_POST['nabavka']);
			   
			   $stmt->execute();
			   $stmt->close();
        }
    }
	
	
	public function carRepearInsert()
	{
        if ($stmt = $this->mysqli->prepare("INSERT INTO `kvarovi`(`ID_sasije`, `ID_prijavio`,`ID_popravio`,`Opis_stanja`) VALUES ( ? , ? , ? , ? )")) {
			
			   $stmt->bind_param('siis',
			   $_POST['chassis_num'],
			   $_POST['id'],
			   $_POST['id'],
			   $_POST['opis_stanja']
			   );
			   
			   $stmt->execute();
			   $stmt->close();
        }
    }
	
    	public function listOilJSON()
    {
        if ($stmt = $this->mysqli->query("SELECT ID, BRsasije, Oil_type, korisnik.Ime, Datum_promene, zamena_ulja.Kilometraza, automobili.Proizvodjac FROM zamena_ulja JOIN korisnik ON zamena_ulja.IDmehanicara=korisnik.ID_korisnika JOIN automobili ON zamena_ulja.BRsasije=automobili.BR_sasije")) {
			

            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				$res = array();
				while($row = mysqli_fetch_array($stmt)) {
					$res[] = array(
					'ID' => $row["ID"],
					'BRsasije' => $row["BRsasije"],
                                        'Ime' => $row["Ime"],    
                                        'Oil_type' => $row["Oil_type"],
					'Datum_promene' => $row["Datum_promene"],
					'Kilometraza' => $row["Kilometraza"],
                                        'Proizvodjac' => $row["Proizvodjac"]    
                                                
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }
    
    
	public function listNabavkaJSON()
    {
        if ($stmt = $this->mysqli->query("SELECT n.ID_nabavke, k.Ime, k.Prezime, n.nabavka, n.datum_nabavke FROM nabavka n JOIN korisnik k ON n.ID_narucioca=k.ID_korisnika")) {
		
            if ($stmt->num_rows == 0)
            {
                return false;
            }
            else
            {
				$res = array();
				
				while($row = mysqli_fetch_array($stmt)) {
					$res[] = array(
					'ID_nabavke' => $row["ID_nabavke"],
					'Ime' => $row["Ime"],
					'Prezime' => $row["Prezime"],
					'nabavka' => $row["nabavka"],
					'datum_nabavke' => $row["datum_nabavke"]
					);
				}
		
				echo json_encode($res);
            }

            $stmt->close();
        }
    }

	public function neiznajmljeniAutomobili()
	{		
		$query = 'SELECT br_sasije, proizvodjac, model, kategorija, br_vrata, slika, godiste, cena_kupovine, cena_iznajmljivanja, kubikaza, kilometraza FROM automobili WHERE iznajmljen=0';

		$result = $this->mysqli->query($query);
				
		return $result;
	}

	public function error()
	{
		return $this->mysqli->error;
	}
	
	public function carDetails($br_sasije)
	{
		if(!$br_sasije)
		{
			return False;
		}
				
		$query = 'SELECT br_sasije, proizvodjac, model, kategorija, br_vrata, vrsta_goriva, menjac, slika, godiste, boja, cena_kupovine, cena_iznajmljivanja, kubikaza, registraciona_oznaka, prva_registracija, kilometraza FROM automobili WHERE br_sasije="'.$br_sasije.'"';

		$result = $this->mysqli->query($query);
		
		return $result;
	}
	
	public function ImePrezimeByKorisnikId($korisnik_id)
	{
		if(!$korisnik_id)
		{
			return False;
		}
		
		$query = 'SELECT ime, prezime, Adresa, Telefon,Mat_broj,BR_licne,Br_pasosa,Informacije,password,username,email,chack,identity FROM korisnik WHERE ID_korisnika = '.$korisnik_id;
		
		$result = $this->mysqli->query($query);
		
		return $result;
	}
	
	public function carsByManufacturer($manufacturer)
	{
		if(!$manufacturer)
		{
			return False;
		}
		
		$query = 'SELECT br_sasije, proizvodjac, model, kategorija, br_vrata, slika, godiste, cena_kupovine, cena_iznajmljivanja, kubikaza, kilometraza FROM automobili WHERE iznajmljen=0 AND UPPER(proizvodjac)=UPPER("'.$manufacturer.'")';
		
		$result = $this->mysqli->query($query);
		
		return $result;
	}
	
	public function updateUserData($data)
	{
		if(!$data)
		{
			return False;
		}
				
		$query = 'UPDATE korisnik SET ime="'.$data['fname'].'",prezime="'.$data['lname'].'",adresa="'.$data['address'].'", telefon="'.$data['phone'].'",br_licne="'.$data['card_id'].'",br_pasosa="'.$data['passport_id'].'",email="'.$data['email'].'",Mat_broj="'.$data['ssn'].'",informacije="'.$data['comments'].'" WHERE id_korisnika='.$_SESSION['id'];
		
		$_SESSION['email'] = $data['email'];
		
		$result = $this->mysqli->query($query);
		
		return $result;
	}
	
	public function allManufacturers()
	{
		$query = 'SELECT DISTINCT proizvodjac FROM automobili WHERE iznajmljen=0 ORDER BY proizvodjac';
		
		$result = $this->mysqli->query($query);
		
		return $result;
	}
		
	public function rentACar($data)
	{
		if(!$data)
		{
			return False;
		}

		$query = 'INSERT INTO iznajmi (br_sasije, id_korisnika, datum_iznajmljivanja, ugovoreni_datum_vracanja) VALUES ("'.$data['br_sasije'].'", "'.$_SESSION['id'].'", "'.$data['datum_iznajmljivanja'].'", "'.$data['ugovoreni_datum_vracanja'].'")';
				
		$result = $this->mysqli->query($query);
		
		return $result;
	}
	
	public function carIsRented($br_sasije)
	{
		if(!$br_sasije)
		{
			return False;
		}

		$query = 'SELECT COUNT(*) FROM automobili WHERE br_sasije="'.$br_sasije.'" AND iznajmljen=1';
		// echo $query . '<br/>';
		$result = $this->mysqli->query($query);
		
		return $result;
	}
	
	public function takeAReservationOnCar($id_kupac, $br_sasije)
	{
		if(!$br_sasije)
		{
			return False;
		}
		
		$query = 'SELECT cena_kupovine FROM automobili WHERE br_sasije = "'.$br_sasije.'"';
		if(!$query)
		{
			die('Error!');
		}
		
		$result = $this->mysqli->query($query);
		$result = $result->fetch_assoc();
		
		$iznos = $result['cena_kupovine'];
		
		$query = "INSERT INTO prodati_automobili (id_kupca, broj_sasije_vozila, iznos) VALUES ($id_kupac, '$br_sasije', $iznos)";
		
		$result = $this->mysqli->query($query);
		
		return $result;
	}


	
    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
       $this->connectToDB();
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */

    public  function  __destruct()
    {
        $this->disconnectFromDB();
    }

    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
} 


?>