<?php  
 $connect = mysql_connect("localhost", "root", "", "amcorpharma");  
 $query = "SELECT * FROM assigned_doctor ORDER BY order_id desc";  
 $result = mysql_query($query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Ajax PHP mysql Date Range Search using jQuery DatePicker</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Ajax PHP mysql Date Range Search using jQuery DatePicker</h2>  
                <h3 align="center">Order Data</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               
                                <th>Doctor_ID</th>
                                <th>Doctor_Name</th>
                                <th>Doctor_MobileNO</th>
                                 <th>Doctor_Address</th>
                                 <th>Doctor_Specialest</th>
                                 <th>Date And Time</th>
                                 <th>Product</th>
                                <th>Location</th> 
                          </tr>  
                     <?php  
                      include('connection.php');
                      $result = mysql_query('Select * from assigned_doctor');
                      while($row = mysql_fetch_array($result))  
                     {  
                     ?>  
                          <tr>
             
                               <td><?php echo $row['doctor_id'];?></td> 
                                <td><?php echo $row['dr_name'];?></td>
                                <td><?php echo $row['dr_mobile'];?></td>
                               <td><?php echo $row['dr_addr'];?></td>
                               <td><?php echo $row['dr_speci'];?></td>
                                <td><?php echo $row['date_time'];?></td>
                                 <td><?php echo $row['product'];?></td>
                                 <td><?php echo $row['location'];?></td>
      
                         </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat:'dd-mm-yy'
              });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  

                if(from_date != '' && to_date != '')  
                {  

                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
