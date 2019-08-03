<?php  
include('connection.php');
 //filter.php  

 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
    
     /* $connect = mysql_connect("localhost", "root", "", "amcorpharma");*/  
      $output = '';  
      $output .= '  
           <table class="table table-bordered" style="color:black; text-align:center;">  
                 <tr style="color:black; text-align:center;">  
                      <th style="color:black; text-align:center;">Doctor_ID</th>
                      <th style="color:black; text-align:center;">Doctor_Name</th>
                      <th style="color:black; text-align:center;">Doctor_MobileNO</th>
                       <th style="color:black; text-align:center;">Doctor_Address</th>
                       <th style="color:black; text-align:center;">Doctor_Specialest</th>
                       <th style="color:black; text-align:center;">Date And Time</th>
                       <th style="color:black; text-align:center;">Product</th>
                      <th style="color:black; text-align:center;">Location</th> 
                          </tr>
      ';   

      /*$query = "SELECT * FROM assigned_doctor WHERE date_time BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'"; */ 


if ($_POST["from_date"]==$_POST["to_date"]) {
  $d = $_POST["from_date"];
 $query = "SELECT * FROM assigned_doctor
WHERE date_time LIKE '$d%'";
}else{
  $query = "SELECT * FROM assigned_doctor WHERE date_time BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
}
      
      $result = mysql_query($query);  
      if(mysql_num_rows($result)>0)  
      {  
           while($row = mysql_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                            <td>'. $row["doctor_id"] .'</td>  
                            <td>'. $row["dr_name"] .'</td>  
                            <td>'. $row["dr_mobile"] .'</td>  
                            <td>'. $row["dr_addr"] .'</td>  
                            <td>'. $row["dr_speci"] .'</td> 
                            <td>'. $row["date_time"] .'</td> 
                            <td>'. $row["product"] .'</td>  
                            <td>'. $row["location"] .'</td> 
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
 <style type="">
   .table th{
    background-color:lightgreen;

   }

   .table tr {
    text-align:bolder;

   }
   
 </style>
