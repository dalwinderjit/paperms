<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
            <table>
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Category of vehicle </th>
                    <th>Veh Class</th>
                     <th>Registeration No.</th>
                      <th>Chasis No. </th>
                      <th>Engine No.</th>
                       <th>Mode of Acquisition</th>
                        <th>Received/
Attached</th>
                         <th>Received From</th>
                         <th>Received Voucher/ RC No. or N/A</th>
                          <th>Received/ Attached  Date</th>
                           <th>Speedo/ Odometer Reading </th>
                            <th>No. of Tyres Received</th>
                             <th>Status of Vehicle</th>
                              <th> Condition of Vehicle</th>
                              <th>Status of On-Road  Vehicle</th>
                               <th>Status of Off-Road Vehicle in MT</th>
                                <th>If Condemn then Date of condemn  </th>
                                <th>Last Service Date </th>
                              <th> Last Inspection Date </th>

                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->catofvechicle; ?></td>
                    <td><?php echo $value->vechicleclass; ?></td>
                    <td><?php echo $value->regnom; ?></td>
                    <td><?php echo $value->chasisno; ?></td>
                    <td><?php echo $value->engineno; ?></td>
                    <td><?php echo $value->modeofac; ?></td>
                    <td><?php echo $value->recattached; ?></td>
                    <td><?php echo $value->recfrom; ?></td>
                    <td><?php echo $value->recvoucher; ?></td>
                    <td><?php echo $value->recattachdate; ?></td>
                    <td><?php echo $value->speedormeter; ?></td>
                    <td><?php echo $value->nooftyrerec; ?></td>
                    <td><?php echo $value->statusofvechile; ?></td>
                    <td><?php echo $value->conditionofvechile; ?></td>
                    <td><?php echo $value->statusofonroadvichile; ?></td>
                    <td><?php echo $value->statusofoffroadvichile; ?></td>
                    <td><?php echo $value->condemdate; ?></td>
                     <td><?php echo $value->lastservicedate; ?></td>
                    <td><?php echo $value->lastinspectiondate; ?></td>
                <?php endforeach; } ?>
              </tbody>
           </table>
</body>
</html>