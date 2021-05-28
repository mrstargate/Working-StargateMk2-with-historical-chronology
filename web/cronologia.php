<?php
include("ScriviCronologia.php");
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storico delle coordinate</title>
</head>
<link rel="stylesheet" href="StileCronologia.css">
<body>
    <table class="logo" align="center">
        <tr>
            <th><img src="https://www.gian-cursio.net/wp-content/uploads/2021/03/SGC_Spinning_Logo_Large.gif" alt="Commando Stargate" ></th>
        <th><h1>Commando Stargate</h1></th>
        <th><img src="https://www.gian-cursio.net/wp-content/uploads/2021/03/SGC_Spinning_Logo_Large.gif" alt="Commando Stargate" ></th>
        </tr>
    </table>
    &ensp;
    <table align="center">
        <tr>
        <th>
              Combinazione
        </th>
            <th>
                Simbolo 1
</th>
<th>
                Simbolo 2
</th>
<th>
                Simbolo 3
</th>
<th>
                Simbolo 4
</th>
<th>
                Simbolo 5
</th>
<th>
                Simbolo 6
</th>
<th>
                Simbolo 7
</th>

<th>
            Luogo conosciuto
</th>
<th>
            Orario accesso
</th>
<?php
$sql="SELECT Count(*) AS Righe FROM cronologia";
    $ok=mysqli_query($conne,$sql);
    if (!$ok) die("Errore query: ".mysqli_error($conne));
    $cont=mysqli_fetch_assoc($ok);

    for($i=1;$i<=$cont['Righe'];$i++){
        echo("<tr>");
        echo("<th>".$i."</th>");

        $sql="SELECT simbolo1,simbolo2,simbolo3,simbolo4,simbolo5,simbolo6,simbolo7,luogo FROM cronologia WHERE id=$i";
        $ok=mysqli_query($conne,$sql);
        if (!$ok) die("Errore query: ".mysqli_error($conne));
        $ris=mysqli_fetch_array($ok);
        for($j=0;$j<7;$j++){
            $sql=sprintf("SELECT nome FROM simboli where id='%s'",$ris[$j]);
            $ok=mysqli_query($conne,$sql);
            $val =mysqli_fetch_row($ok); 
            switch($ris[$j]){
                case 0:
                    $img='<img src="chevrons/001.svg" class="sim"/>';
                    break;
                case 1:
                    $img='<img src="chevrons/002.svg" class="sim"/>';
                    break;
                case 2:
                    $img='<img src="chevrons/003.svg" class="sim"/>';
                    break;
                case 3:
                    $img='<img src="chevrons/004.svg" class="sim"/>';
                    break;
                case 4:
                    $img='<img src="chevrons/005.svg" class="sim"/>';
                    break;
                case 5:
                    $img='<img src="chevrons/006.svg" class="sim"/>';
                    break;
                case 6:
                    $img='<img src="chevrons/007.svg" class="sim"/>';
                    break;
                case 7:
                    $img='<img src="chevrons/008.svg" class="sim"/>';
                    break;
                case 8:
                    $img='<img src="chevrons/009.svg" class="sim"/>';
                    break;
                case 9:
                    $img='<img src="chevrons/010.svg" class="sim"/>';
                    break;
                case 10:
                    $img='<img src="chevrons/011.svg" class="sim"/>';
                    break;
                case 11:
                    $img='<img src="chevrons/012.svg" class="sim"/>';
                    break;
                case 12:
                    $img='<img src="chevrons/013.svg" class="sim"/>';
                    break;
                case 13:
                    $img='<img src="chevrons/014.svg" class="sim"/>';
                    break;
                case 14:
                    $img='<img src="chevrons/015.svg" class="sim"/>';
                    break;
                case 15:
                    $img='<img src="chevrons/016.svg" class="sim"/>';
                    break;
                case 16:
                    $img='<img src="chevrons/017.svg" class="sim"/>';
                    break;
                case 17:
                    $img='<img src="chevrons/018.svg" class="sim"/>';
                    break;
                case 18:
                    $img='<img src="chevrons/019.svg" class="sim"/>';
                    break;
                case 19:
                    $img='<img src="chevrons/020.svg" class="sim"/>';
                    break;
                case 20:
                    $img='<img src="chevrons/021.svg" class="sim"/>';
                    break;
                case 21:
                    $img='<img src="chevrons/022.svg" class="sim"/>';
                    break;
                case 22:
                    $img='<img src="chevrons/023.svg" class="sim"/>';
                    break;
                case 23:
                    $img='<img src="chevrons/024.svg" class="sim"/>';
                    break;
                case 24:
                    $img='<img src="chevrons/025.svg" class="sim"/>';
                    break;
                case 25:
                    $img='<img src="chevrons/026.svg" class="sim"/>';
                    break;
                case 26:
                    $img='<img src="chevrons/027.svg" class="sim"/>';
                    break;
                case 27:
                    $img='<img src="chevrons/028.svg" class="sim"/>';
                    break;
                case 28:
                    $img='<img src="chevrons/029.svg" class="sim"/>';
                    break;
                case 29:
                    $img='<img src="chevrons/030.svg" class="sim"/>';
                    break;
                case 30:
                    $img='<img src="chevrons/031.svg" class="sim"/>';
                    break;
                case 31:
                    $img='<img src="chevrons/032.svg" class="sim"/>';
                    break;
                case 32:
                    $img='<img src="chevrons/033.svg" class="sim"/>';
                    break;
                case 33:
                    $img='<img src="chevrons/034.svg" class="sim"/>';
                    break;
                case 34:
                    $img='<img src="chevrons/035.svg" class="sim"/>';
                    break;
                case 35:
                    $img='<img src="chevrons/036.svg" class="sim"/>';
                    break;
                case 36:
                    $img='<img src="chevrons/037.svg" class="sim"/>';
                    break;
                case 37:
                    $img='<img src="chevrons/038.svg" class="sim"/>';
                    break;
                case 38:
                    $img='<img src="chevrons/039.svg" class="sim"/>';
                    break;

            }
            echo("<th>".$img."<br>".$val[0]."</th>");
        }
        echo("<th>".$ris[7]."</th>");

        $sql="SELECT giorno,giornoN,mese,anno,ora,minuti,secondi FROM orario WHERE id=$i";
        $ok=mysqli_query($conne,$sql);
        if (!$ok) die("Errore query: ".mysqli_error($conne));
        $oro=mysqli_fetch_array($ok);

        echo(sprintf("<th>".'%s'.",".'%s'." ".'%s'." ".'%s'.",".'%s'.":".'%s'.":".'%s'."</th>",$oro[0],$oro[1],$oro[2],$oro[3],$oro[4],$oro[5],$oro[6]));

        echo("</tr>");
      
    }  
    ?>
</table>
</body>
</html>
