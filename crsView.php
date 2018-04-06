<!DOCTYPE html
<html>
    <head>
        <meta charset="UTF-8">
        <title>Course View</title>
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
                width: 960px; 
               }
               .activevwc{
                 background-color: #4CAF50;
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
            td{
                border: 1px solid black;
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 15px;
                padding-right: 15px;
            }
            table tr th{
                border: 1px solid black;
            }
            button{
                padding: 20px;
                margin-bottom: 10px;
                margin-top: 10px;
            }
        </style>
            
    </head>
    <body>
        <?php
        $srl=1;
            include 'header.php';
        ?>
        <center><button type="button" onclick="window.location.href='http://localhost/DBStudentGrade/courseInsert.php'">New Entry</button></center>
        <div class = "main_body" id="main_body">
            
           <center> <table width="600px">
           <tr>
                    <?php if(isset($_GET['msg'])){
                        echo "<h3>".$_GET['msg']."</h3>";
                        }?>
                </tr>
            <tr><h1>Course Info</h1></tr>
                <tr>

                    <th>
                        Serial
                    </th>
                    
                    <th>
                        <?php echo "Course ID";?>
                    </th>
                    <th>
                        <?php echo 'Course Name';?>
                    </th>
                    <th>
                        <?php echo 'Credit Hour';?>
                    </th>
                    
                    <th class="hideforpdf">
                        Action
                    </th>
                    
                </tr>
                <?php
                    include 'connection_db.php';
                    $sql="SELECT * FROM `dbstudentgrade`.`courseinfo` ORDER BY `id`";
                    $result=  mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)){
                        while ($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td>
                        <?php echo $srl++;?>
                    </td>
                    <td>
                        <?php echo $row['id'];?>
                    </td>
                    <td>
                        <?php echo $row['name'];?>
                    </td>
                    <td>
                        <?php echo $row['creditHour'];?>
                    </td>
                    
                    <td class="hideforpdf">
                        <a href="edit_crs.php?id=<?php echo $row['id']?>">Edit</a>/<a href="delete_crs.php?id=<?php echo $row['id']?>">Delete</a>
                    </td>
                    
                </tr>
                <?php                                      
                        }
                    }
                ?>
                
</table></center>
        </div>
        <center>
            <input type="submit" value="Print" class="button" onclick="prnt()">
            </center>
        <?php
            include 'footer.php';
        ?>


        <script>
            function prnt(){
                var div="<html><head><style> .hideforpdf{display: none;}td{text-align: center;}table{border: 1px solid black;float: center;}table tr{border: 1px solid black;}table tr td{border: 1px solid black;}table tr th{border: 1px solid black;}</style></head><body>"
                div+=document.getElementById('main_body').innerHTML;
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
