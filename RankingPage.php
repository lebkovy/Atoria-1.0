<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="icon" href="fav.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Atoria</title>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'/>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>

<body style="background-image:url('img/bg.jpg');">

<?php

function DBArrayQuery($query)
{
    $link = mysql_connect('localhost', 'p512370_lebek', 'kuba11') or die('Nie udało się połączyć');
    mysql_select_db('p512370_atoria') or die('Nie udało się połączyćXD');

    $result = @mysql_query($query);
    $tablica = array();
    $num_fields = mysql_num_fields($result);
    $num_rows = mysql_num_rows($result);
    $nr_row = 0;
    while ($nr_row < $num_rows) {
        $nr_field = 0;
        $curr_row = mysql_fetch_row($result);
        while ($nr_field < $num_fields) {
            $tablica[$nr_row][$nr_field] = $curr_row[$nr_field];
            $nr_field++;
        };
        $nr_row++;
    };
    return $tablica;
}

;

$x = DBArrayQuery("select * from ranking order by wynik");

echo '<div align="center" id="s">';
echo '<img src="img/logo2.png" alt="logo"/>';
echo "</div>";


echo '<table border="0" align="center" cellpadding="15" cellspacing="15">';
echo "<tr>";
echo '<td style="background-image: url(\'img/rank2.png\');">';
echo "<div class='kaha'>IMIĘ</div>";
echo "</td>";
echo '<td style="background-image: url(\'img/rank2.png\');">';
echo "<div class='kaha'>NAZWISKO</div>";
echo "</td>";
echo '<td style="background-image: url(\'img/rank2.png\');">';
echo "<div class='kaha'>PŁEĆ</div>";
echo "</td>";
echo '<td style="background-image: url(\'img/rank2.png\');">';
echo "<div class='kaha'>RASA</div>";
echo "</td>";
echo '<td style="background-image: url(\'img/rank2.png\');">';
echo "<div class='kaha'>WYPRAWY</div>";
echo "</td>";
echo "</tr>";
foreach ($x as $wiersz) {
    echo "<tr>";
    foreach ($wiersz as $komorka) {
        echo "<td style=\"background-image: url('img/rank.png');\"><div class='kaha'>$komorka</div></td>";
    }
    echo "</tr>";
};
echo "</table>";

?>

<form action="RankingTwoPage.php" method="get">
    <div align="center" class="k"><br/>
        Gracz do usunięcia:<br/>
        <input type="text" name="imieDel" value="Imię" onfocus="if(this.value=='Imię')this.value='';"
               onblur="if(!this.value)this.value='Imię';"/>
        <input type="text" name="nazwiskoDel" value="Nazwisko" onfocus="if(this.value=='Nazwisko')this.value='';"
               onblur="if(!this.value)this.value='Nazwisko';"/>
    </div>
    <center>
        <button class="button" type="submit"
                onclick="return confirm('Jesteś pewien swoich zamiarów usunięcia zawonika z rankingu?');">
            <span>Usuń</span></button>
    </center>
</form>

</body>
</html>