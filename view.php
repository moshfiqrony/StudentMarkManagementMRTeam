<?php
        $srl=1;
            include 'header.php';
        ?>
<!DOCTYPE html
<html>
    <head>
        <meta charset="UTF-8">
        <title>View</title>
        <style>
            input{
                padding: 10px;
                margin-bottom: 10px;
            }
            
            .login_box{
                width: 180px;
                height: 100px;
                margin-left: 400px;
                padding-top: 50px;
                padding-bottom: 20px
            }
            .main_body{
                margin: 0 auto;
                padding: 0;
                width: 100%; 
               }
            *{
                margin: 0;
                padding: 0
            }
            table{
                border: 1px solid black;
                float: center;
            }
            table tr{
                border: 1px solid black;
            }
            table tr td{
                text-align: center;
                border: 1px solid black;
            }
            table tr th{
                border: 1px solid black;
            }
            button{
                padding: 20px;
                margin-bottom: 10px;
                margin-top: 10px;
            }
            .tbl_srch,.tbl_srch tr,.tbl_srch tr td{
                border: 0px;
            }
            .activevw{
                 background-color: #4CAF50;
            }

        </style>
            
    </head>
    <body>
        
        <div class = "main_body">
        <center><button type="button" onclick="window.location.href='http://localhost/DBStudentGrade/insert.php'">New Entry</button></center>
        <form action="" method="get">
            <center>
                <table class="tbl_srch">
                <tr><h1>Result Info</h1></tr>
                    <tr>
                        
                        <td>
                            <input type="text" name="srch_id" placeholder="Search By ID">
                        </td>
                        <td>
                            <input type="text" name="srch_name" placeholder="Search By Name">
                        </td>
                        <td>
                            <input type="text" name="srch_crs" placeholder="Search By Course">
                        </td>
                        <td>
                            <input type="submit" name="search">
                        </td>
                    </tr>
                </table>
            </center>
        </form>

        <?php
        if(isset($_GET['msg'])){
            echo "<h1>".$_GET['msg']."</h1>";
        }

        ?>

        <div id='pnt'>
            <center><table>
                
                <tr>
                    <th>
                        Serial
                    </th>
                    <th>
                        <?php echo 'Student ID';?>
                    </th>
                    <th>
                        <?php echo 'Student Name';?>
                    </th>
                    <th>
                        <?php echo "Course ID";?>
                    </th>
                    <th>
                        <?php echo 'First Term';?>
                    </th>
                    <th>
                        <?php echo 'Mid Term';?>
                    </th>
                    <th>
                        <?php echo 'Attendence';?>
                    </th>
                    <th>
                        <?php echo 'Assignment';?>
                    </th>
                    <th>
                        <?php echo 'Project';?>
                    </th>
                    <th>
                        <?php echo 'Final Marks';?>
                    </th>
                    <th>
                        <?php echo 'Total Marks';?>
                    </th>
                    <th class="hideforpdf">
                        Action
                    </th>
                    
                </tr>
                <?php
                    include 'connection_db.php';
                    if(isset($_GET['search'])){
                        $id=$_GET["srch_id"];
                        $name=$_GET["srch_name"];
                        $crs=$_GET["srch_crs"];
                        $sql="SELECT `marks`.`id`,`marks`.`st_id`,`marks`.`crs_id`,`marks`.`frstTerm`,`marks`.`midTerm`,`marks`.`attn`,`marks`.`assign`,`marks`.`prjct`,`marks`.`final_marks`,`marks`.`total_marks`, `studentinfo`.`name` FROM `dbstudentgrade`.`marks` INNER JOIN `studentinfo` ON `studentinfo`.`id`= `marks`.`st_id` WHERE `st_id`='$id' OR `crs_id`='$crs' OR `studentinfo`.`name`='$name' ORDER BY `st_id`";
                    } else{
                        $sql="SELECT `marks`.`id`,`marks`.`st_id`,`marks`.`crs_id`,`marks`.`frstTerm`,`marks`.`midTerm`,`marks`.`attn`,`marks`.`assign`,`marks`.`prjct`,`marks`.`final_marks`,`marks`.`total_marks`, `studentinfo`.`name` FROM `dbstudentgrade`.`marks` INNER JOIN `studentinfo` ON `studentinfo`.`id`= `marks`.`st_id` ORDER BY `st_id`";
                    }
                    
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td>
                        <?php echo $srl++;?>
                    </td>
                    <td>
                        <?php echo $row['st_id'];?>
                    </td>
                    <td>
                        <?php echo $row['name'];?>
                    </td>
                    <td>
                        <?php echo $row['crs_id'];?>
                    </td>
                    <td>
                        <?php echo $row['frstTerm'];?>
                    </td>
                    <td>
                        <?php echo $row['midTerm'];?>
                    </td>
                    <td>
                        <?php echo $row['attn'];?>
                    </td>
                    <td>
                        <?php echo $row['assign'];?>
                    </td>
                    <td>
                        <?php echo $row['prjct'];?>
                    </td>
                    <td>
                        <?php echo $row['final_marks'];?>
                    </td>
                    <td>
                        <?php echo $row['total_marks'];?>
                    </td>
                    <td class="hideforpdf">
                        <a href="edit.php?id=<?php echo $row['id']?>">Edit</a>/<a href="delete.php?id=<?php echo $row['id']?>">Delete</a>
                    </td>
                    
                </tr>

                <?php                                      
                        }
                    }
                ?>
                
            </table></center>
        </div>
        </div>
        <center><tr>
                <td colspan="2" align="center"><input type="submit" value="Print" class="button" onclick="prnt()"></td>
            </tr></center>
        <div id="footer">
        <?php
            include 'footer.php';
        ?>
        </div>
        <script>
            function prnt(){
                var div="<html><head><style> .hideforpdf{display: none;}td{text-align:center;}table{border: 1px solid black;float: center;}table tr{border: 1px solid black;}table tr td{border: 1px solid black;}table tr th{border: 1px solid black;}</style></head><body>"
                div+=document.getElementById('pnt').innerHTML;
                div+="</body></html>"
                var win=window.open("", "", "width=960,height=500");
                win.document.write("<center><h1>Student Grade Sheet</h1></center><br><br>");
                win.document.write(div);
                win.document.write("<br><br><center><p>&copy All Rights Reserved By IUBAT UNIVERSITY</p><p>Developed By Moshfiqur Rahman Rony</p></center>");
                win.print();
            }
        </script>
    </body>
</html>
