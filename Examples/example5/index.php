<html>
    
    <head>
    <title> </title>  
    </head>
    
    <body>
        <table>
            <th>Number</th>
            <th>Odd/Even</th> </th>
        </table>
        
    <?php
        // $n = 20943;
        // $n = number_format($n,2); 
        // echo $n  . "<br><br>";

        // $n = rand(5,15);   
        // echo $n  . "<br><br>";

        // $n = "hElLo WoRlD!";
        // echo strtoupper($n)  .  "<br><br>";
        // for ($i=0; $i<=5; $i++) {
        //     echo $i . "\n";   //displays values from 0 to 5
        // }
        echo"<table>";
            echo "<th>";
            
            for($i=0; $i<=9; $i++){
                $n = rand(1,10);
                $odd_or_even = ($number % 2 == 0)?"even":"odd";
                echo '<tr><td>'.$n."</td>"."<td>".$odd_or_even.'</td></tr>';
                $sum_total += $n;
            }
            echo "</th>";

        echo "</table>";
    echo "Sum:  ".$sum_total. "<br>"; 
    echo "Average:   ".$sum_total/9;
    ?>
        
        
        
        
    </body>
    
</html>