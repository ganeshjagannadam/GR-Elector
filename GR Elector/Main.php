<?php
            $name = $_GET['name'];
            $con = mysqli_connect("localhost", "id18490456_food", "Sunku@944057", "id18490456_foodbuggy");
            if($con)
            {
                $sql = "select chance from grelector where name='".$name."'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    $row = mysqli_fetch_assoc($result);
                    if($row['chance'] != 1)
                    {
                        if(isset($_POST['random']))
                        {
                            $names = array("Peddakotla Sai Geethika", "Yenamala Vinoothna", "Durgam Ramya", "Somagutta Hari chandana", "Dulam Sri Varshitha", "Dyle Mounika", "Syba Venkata Sudhestna", "Kondi Lakshmi Narayanamma", "Pedda Hanumanthappa Josthna", "Guddety Parimala Sreeja", "Devangam LakshmiNarayana Gari Sireesha", "Upinerthy Rachana", "Gunthakanti Aishwarya Reddy", "Basetti Madhumitha", "Shaik Husna Kowsar", "Gottam Archana", "Gajula Supreethi", "Tayyuru Supraja", "Vavili Mounika", "Yalamati Siri", "Vanam Sahithi Sai", "Nandam Vinaya", "Indukuri Harika", "Gangapalli Vyshnavi", "Garikapati Anjali", "Paturu Deekshitha", "Talari Kundana", "Kollam Hindu Priya", "Kala Sri Sai Raksha", "Muripala Nehaa", "Ediga Sai Pravallika", "Tippaleti Jayasree");
                            $extended = array(13, 3, 12, 6, 22, 19, 16, 15, 23);
                            $query = "update grelector set chance=1 where name='$name'";
                            if(mysqli_query($con, $query))
                            {
                                $rand = rand(0,8);
                                $rand_val = $extended[$rand]-1;
                                $gr = $names[$rand_val];
                                $n = $gr;
                                $n = strtolower($gr);
                                $n = str_replace(' ', '', $gr);
                                $sql2 = "select count from grelector where name='".$n."'";
                                $result = mysqli_query($con, $sql2);
                                if(true)
                                {
                                    $row = mysqli_fetch_assoc($result);
                                    $x = $row['count'];
                                    $x++;
                                    $sql1 = "update grelector set count = $x where name='".$n."'";
                                    if(mysqli_query($con, $sql1))
                                    {
                                        echo $gr;
                                        mysqli_close($con);
                                    }
                                    else
                                    {
                                        echo "please try again";
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        echo"You Have Already Voted";
                    }
                }
            }
        ?>
<html>
    <head>
        <title>
            GR Elector
        </title>
        <center>
             <div style = "position:relative; bottom:80px; top:250px; ">
            
        </div>
        </center>
        <style>
            .disclaimer {
                display : none;
            }
        </style>
        
    </head>
    <body>
        <center>
             <div style = "position:relative; bottom:80px; top:600px; ">
            <form method="post">
            <button class="test" name="random">Select a Random Girl</button>
        </form>
        </div>
        </center>
        
    </body>
</html>