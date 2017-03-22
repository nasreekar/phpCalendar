        <?php

            //This gets today's date
            $date =time () ; 

            //This puts the day, month, and year in separate variables
            $day = date('d', $date) ;
            $month = date('m', $date) ;
            $year = date('Y', $date) ;

            //Here we generate the first day of the month
            $first_day = mktime(0,0,0,$month, 1, $year) ;
            // print_r("First Day: ". $first_day);
            // echo "<br>";

            //This gets us the month name
            $monthName = date('F', $first_day) ;
            print_r("Title: ". $monthName);


            //Here you find out what day of the week the first day of the month falls on 
            $day_of_week = date('D', $first_day) ;
            echo "<br>";

            //Once you know what day of the week it falls on, we know how many blank days occur before it. If the first day of the week is a Sunday, then it is zero

            switch($day_of_week)
            { 
                case "Sun": $blank = 0; break; 
                case "Mon": $blank = 1; break; 
                case "Tue": $blank = 2; break; 
                case "Wed": $blank = 3; break; 
                case "Thu": $blank = 4; break; 
                case "Fri": $blank = 5; break; 
                case "Sat": $blank = 6; break; 
            }

            //We then determine how many days are in the current month
            $days_in_month = cal_days_in_month(0, $month, $year) ;
            print_r("Days in Month: ". $days_in_month);
            echo "<br>";
            echo "<br>";

            /* CALENDAR SETUP */

            //Here you start building the table heads 
            echo "<table border=1 width=294>";
            echo "<tr><th colspan=7> $monthName $year </th></tr>";
            echo "<tr><td width=42>S</td><td width=42>M</td><td 
            width=42>T</td><td width=42>W</td><td width=42>T</td><td 
            width=42>F</td><td width=42>S</td></tr>";

             //This counts the days in the week, up to 7
            $day_count = 1;

            echo "<tr>";

             //first you take care of those blank days
            while ( $blank > 0 ) 
            { 
               echo "<td></td>"; 
               $blank = $blank-1; 
               $day_count++;
            } 

             //sets the first day of the month to 1 
            $day_num = 1;

            //count up the days, until you've done all of them in the month
            while ( $day_num <= $days_in_month ) 

            { 
                // echo "<td> $day_num </td>"; 
                // $day_num++; 
                // $day_count++;

                //to highlight the current day
                if(date('d') != $day_num) {
                 echo "<td> $day_num </td>";
                 $day_num++;
                 $day_count++;
             } else {
                 echo "<td> <strong>$day_num</strong> </td>";
                 $day_num++;
                 $day_count++;
             }

            //Make sure you start a new row every week
                if ($day_count > 7)

                {
                    echo "</tr><tr>";
                    $day_count = 1;
                }
            }

                //Finally you finish out the table with some blank details if needed
                while ( $day_count >1 && $day_count <=7 ) 
                { 
                    echo "<td> </td>"; 
                    $day_count++; 
                } 

                echo "</tr></table>";
        ?>