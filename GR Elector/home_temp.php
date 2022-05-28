        
<html>
    <head>
        <title>
            GR Elect
        </title>
        <style>
            .disclaimer
            {
                display:none;
            }
            #onediv
            {
                display:none;
            }
            #form
            {
                display:block;
            }
            #h2
            {
                visibility:hidden;
            }
        </style>
        <?php
            if((isset($_POST['btn']) && isset($_POST['inp1'])))
            {
                $con = mysqli_connect("localhost", "id18490456_food", "Sunku@944057", "id18490456_foodbuggy");
                if($con)
                {
                    $name = $_POST['inp1'];
                    $name = strtolower($name);
                    $name = str_replace(' ', '', $name);
                    $sql = "select chance from grelector where name='".$name."'";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        $row = mysqli_fetch_assoc($result);
                        if($row['chance'] == 0)
                        {
                                ?>
                                    <script type="text/javascript">
                                        window.location.href = "Main.php?name=<?php echo $name;?>";
                                    </script>
                                <?php
                        }
                        else
                        {
                            echo"You Have Already Voted";
                        }
                    }
                    else
                    {
                            echo "Enter Correct Name";
                    }
                    mysqli_close($con);
                }
            }
        ?>
    </head>
    <body>
        <form method="post" id="form">
            <center>
                 <img src = "hithere.png" alt="Hi There!" width = "400" hieght = "250">
                 <p>
                     <h>
                        <font size = "37"> Hello There!</font>
                     </h>
                 </p>
                 <p name="h2" id="h2">Enter The Correct Name</p>
                <div style = "position:relative; bottom:80px; top:600px; ">
                   
                     <input type="text" name="inp1" id="inp1"/>
                     <input type="submit" name="btn" id="btn"/>
        </form>
        <div id="onediv">
            <form method="post">
                <button class="test" name="btn1" type="submit" id="btn1">Select a Random Girl</button>
            </form>
        </div>
      </div>
            </center>
           
    </body>
</html>



