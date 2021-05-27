<?php
    $server = "localhost"; // indirizzo del server
    $user = "root"; // utente gestore
    $psw = null; // simbolo di default

    $conn = mysqli_connect($server,$user,$psw);

    if(!$conn) die("Errore di connessione");

    error_reporting(0);
    $val=$_POST['val'];
    $valSep = explode(",", $val);

    $sql="CREATE database if not exists  Cronologie";

    $ok=mysqli_query($conn,$sql);
    if (!$ok) die("Errore query: ".mysqli_error($conn));

    $sql="USE Cronologie";
    $ok=mysqli_query($conn,$sql);
    if (!$ok) die("Errore query: ".mysqli_error($conn));
 
    $sql="CREATE TABLE IF NOT EXISTS cronologia(
        id int(10) AUTO_INCREMENT PRIMARY KEY,
        simbolo1 int(50),
        simbolo2 int(50),
        simbolo3 int(50),
        simbolo4 int(50),
        simbolo5 int(50),
        simbolo6 int(50),
        simbolo7 int(50),
        luogo varchar(100)
    )";
        
    $ok=mysqli_query($conn,$sql);
    if (!$ok) die("Errore query: ".mysqli_error($conn));
       
    $sql="CREATE TABLE IF NOT EXISTS Luogo_conosciuto(
        id int(2) AUTO_INCREMENT PRIMARY KEY,
        simbolo1 int(50) ,
        simbolo2 int(50) ,
        simbolo3 int(50) ,
        simbolo4 int(50) ,
        simbolo5 int(50) ,
        simbolo6 int(50) ,
        simbolo7 int(50) ,
        zona varchar(100)    
    )";
            
    $ok=mysqli_query($conn,$sql);
    if (!$ok) die("Errore query: ".mysqli_error($conn));
        

    $sql="INSERT INTO Luogo_conosciuto(id, simbolo1, simbolo2, simbolo3, simbolo4, simbolo5, simbolo6, simbolo7, zona)
    VALUES (NULL,'26','6','14','31','11','29','0','Abydos'),(NULL,'8','1','22','14','36','19','0','Chulak'),(NULL,'10','34','21','16','5','25','0','Cimmeria'),(NULL,'27','37','34','8','14','2','0','Edora'),(NULL,'29','26','8','6','17','15','0','Uronda'),(NULL,'3','28','7','21','17','24','0','Tollana'),(NULL,'25','34','5','7','22','13','0','Kheb'),(NULL,'27','34','14','2','18','37','0','Rogue base'),(NULL,'19','17','10','37','9','31','0','Apophis'),(NULL,'23','11','31','21','10','33','0','Martin'),(NULL,'37','8','27','34','2','36','0','Tok ra'),(NULL,'31','17','11','22','6','26','0','Nox'),(NULL,'37','8','27','14','34','26','0','P34-35J'),(NULL,'2','27','8','34','23','14','0','P3X-562'),(NULL,'5','32','26','36','10','17','0','P3X-7763'),(NULL,'23','3','19','8','14','28','0','Argos'),(NULL,'3','28','9','16','35','24','0','Dannes'),(NULL,'25','1','5','23','9','31','0','P3X-797')";

    $ok=mysqli_query($conn,$sql);
    error_reporting(0);

        

    $sql="ALTER IGNORE TABLE  Luogo_conosciuto ADD UNIQUE INDEX id_unq (simbolo1, simbolo2, simbolo3, simbolo4, simbolo5, simbolo6, simbolo7, zona)";
    $ok=mysqli_query($conn,$sql);

    
        
    $sql="CREATE TABLE IF NOT EXISTS Simboli(
        id int PRIMARY KEY,
        nome varchar(100)
    )";
        
    $ok=mysqli_query($conn,$sql);
    if (!$ok) die("Errore query: ".mysqli_error($conn));
    
    $sql = "INSERT INTO Simboli (id, nome)
    VALUES ('0','Punto Origine'),('1','Cratere'),('2','Vergine'),('3','Boote'),('4','Centauro'),('5','Bilancia'),('6','Serpente'),('7','Regolo'),('8','Scorpione'),('9','Corona Australe'),('10','Scudo'),('11','Sagittario'),('12','Aquila'),('13','Microscopio'),('14','Capricorno'),('15','Pesce Australe'),('16','Cavallino'),('17','Acquario'),('18','Pegaso'),('19','Scultore'),('20','Pesci'),('21','Andromeda'),('22','Triangolo'),('23','Ariete'),('24','Perseo'),('25','Balena'),('26','Toro'),('27','Auriga'),('28','Eridano'),('29','Orione'),('30','Cane Minore'),('31','Unicorno'),('32','Gemelli'),('33','Idra'),('34','Lince'),('35','Cancro'),('36','Sestante'),('37','Leone Minore'),('38','Leone')";
        $ok=mysqli_query($conn,$sql); 
        
    $sql="ALTER IGNORE TABLE  Simboli ADD UNIQUE INDEX id_une (id, nome)";
    $ok=mysqli_query($conn,$sql);

    $con="SELECT COUNT(*) AS Righe FROM cronologia";
    $ip=mysqli_query($conn,$con);
    $rig=mysqli_fetch_assoc($ip);


    $query = sprintf("SELECT zona FROM Luogo_conosciuto
        WHERE simbolo1='%s' 
        AND simbolo2='%s' 
        AND simbolo3='%s' 
        AND simbolo4='%s' 
        AND simbolo5='%s' 
        AND simbolo6='%s' 
        AND simbolo7='%s'",
        $valSep[0],$valSep[1],$valSep[2],$valSep[3],$valSep[4],
        $valSep[5],$valSep[6]);



    $ok=mysqli_query($conn,$query);
    if (!$ok) die("Errore query: ".mysqli_error($conn));
    $val =mysqli_fetch_row($ok);
    $zo="Sconosciuto";

    if($val[0]==null){
        $sql=sprintf("INSERT INTO cronologia(id,simbolo1,simbolo2,simbolo3,simbolo4,simbolo5,simbolo6,simbolo7,luogo) VALUE (NULL,'%s','%s','%s','%s','%s','%s','%s','%s')",$valSep[0],$valSep[1],$valSep[2],$valSep[3],$valSep[4],$valSep[5],$valSep[6],$zo);    //il select non accetta il valore valSep[0]
 
        $ok=mysqli_query($conn,$sql);
    }
    else
    {
        $sql=sprintf("INSERT INTO cronologia(id,simbolo1,simbolo2,simbolo3,simbolo4,simbolo5,simbolo6,simbolo7,luogo) VALUE (NULL,'%s','%s','%s','%s','%s','%s','%s','%s')",$valSep[0],$valSep[1],$valSep[2],$valSep[3],$valSep[4],$valSep[5],$valSep[6],$val[0]);    //il select non accetta il valore valSep[0]

        $ok=mysqli_query($conn,$sql);
    }

    $sql="CREATE TABLE IF NOT EXISTS Orario(
        id int AUTO_INCREMENT PRIMARY KEY,
        giorno varchar(100),
        giornoN int(10),
        mese varchar(100),
        anno int(10),
        ora int(10),
        minuti int(10),
        secondi int(10)
    )";
     $ok=mysqli_query($conn,$sql);

     date_default_timezone_set('Europe/Rome');
     $mydate=getdate(date("U"));

     $sql=sprintf("INSERT INTO orario(id,giorno,giornoN,mese,anno,ora,minuti,secondi) 
     VALUE (NULL,'%s','%s','%s','%s','%s','%s','%s')",$mydate["weekday"],$mydate["mday"],$mydate["month"],
     $mydate["year"],$mydate["hours"],$mydate["minutes"],$mydate["seconds"]);
     $ok=mysqli_query($conn,$sql);
     if (!$ok) die("Errore query: ".mysqli_error($conn));

mysqli_close($conn);
?>