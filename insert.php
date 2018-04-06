<!DOCTYPE html
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert</title>
        <style type="text/css">
            input{
                padding: 10px;
                margin-bottom: 5px;
                margin-top: 5px;
            }
            .sl_crs{
                padding: 10px;
                margin-bottom: 5px;
                margin-top: 5px;
                padding-left: 50px;
                padding-right: 47px;
            }
            .sl_term{
                padding: 10px;
                margin-bottom: 5px;
                margin-top: 5px;
                padding-left: 50px;
                padding-right: 30px;
            }
            .term{
                margin-left: 6px;
            }
            .activeinsm{
                 background-color: #4CAF50;
            }
        </style>      
    </head>
    <body>
        
        <?php
            include 'header.php';
            include 'connection_db.php';
            
//code start for auto id input
            if(!isset($_POST["st_id"])){
                $st_id = NULL;
            } else{
                $st_id = $_POST["st_id"];
            }
            
//code start for fetching for course id
            $sql = "SELECT `id` FROM `$dbname`.`courseinfo`";
            $qry = mysqli_query($conn, $sql);
            if(!$qry){
                die("Error" . mysqli_error_list($conn));
            }  
        ?>
        
        
        <div class = "main_body">
            <h4> <?php 
//code start for inserted message
                if(isset($_GET["msg"])){
                    $msg = $_GET["msg"];
                    echo "<center>".$msg."</center>";
                    } 
                ?></h4><br>
                    
                    
        <div class="insert_box">
            <center><form action="insert_code.php" method="post">
                <table width="300px"> 
                    <tr><h1>Insert Marks</h1></tr>
                    <tr>
                        <td>
                            <lebel for="st_id" >Student ID</lebel>
                        </td>
                        <td>
                            <input type="text" name="st_id" value="<?php echo $st_id;?>"placeholder="Student ID" required=''><br>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <lebel for="crs_id">Course ID</lebel>
                        </td>
                        <td>
                            <select class="sl_crs" name = "crs_id" >
                            <?php 
//code start for printing course id
                             if(mysqli_num_rows($qry)>0){
                             while ($row = mysqli_fetch_assoc($qry)){
                            ?>
                            <option value="<?php echo $row["id"];?>"><?php echo $row["id"];?></option> 
                            <?php }?>
                            <?php }
                            ?>
                            </select><br>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <lebel for="term">Term</lebel>
                        </td>
                        <td>
                            <select class="sl_term" name = "term">
                                <option value="frstTerm" >First</option>
                                <option value="midTerm" >Mid</option>
                                <option value="finalTerm" >Final</option>
                                <option value="assign" >Assignment</option>
                                <option value="prjct" >Project</option>
                                <option value="attn" >Attedance</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <lebel for="markss">Marks</lebel>
                        </td>
                        <td>
                            <input type="text" required='' name="marks" placeholder="Marks"><br>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="submit">Submit</button>
                <button type="reset">Reset</button>
                <button type="button" onclick="window.location.href='http://localhost/DBStudentGrade/view.php'">Show Marks</button>
                </form></center>

        </div>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
