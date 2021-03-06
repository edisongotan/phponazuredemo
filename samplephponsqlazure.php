
<html>
    <head>
    <title>PHP with SQL Azure Demo</title>
    </head>

    <body>

    <?php

        function OpenConnection()  
        {  
            try  
            {  
                $serverName = "azureoss.database.windows.net,1433";  
                $connectionOptions = array("Database"=>"azureoss",  
                    "Uid"=>"edisongotan", "PWD"=>"Rachelnavales2016");  
                $conn = sqlsrv_connect($serverName, $connectionOptions);  
                if($conn == false)  
                    die(FormatErrors(sqlsrv_errors()));  
            }  
            catch(Exception $e)  
            {  
                echo("Error!");  
            }  
        }


        try  
        {  
            $conn = OpenConnection();  
            $tsql = "SELECT * FROM dbo.users";  
            $getAll = sqlsrv_query($conn, $tsql);    
            while($row = sqlsrv_fetch_array($getAll, SQLSRV_FETCH_ASSOC))  
            {  
                echo($row['first_name']);  
                echo("<br/>");    
            }  
            sqlsrv_free_stmt($getAll);  
            sqlsrv_close($conn);  
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }

    ?>

    </body>

</html>