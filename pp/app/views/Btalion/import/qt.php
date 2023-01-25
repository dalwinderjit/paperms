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
                    <th>Residentail Complex </th>
                    <th>Type of Quarter</th>
                     <th>Location</th>
                      <th>Floor </th>
                      <th>Accommodation type</th>
                       <th>Quarter No.</th>
                        <th>Elecricity Meter No.</th>
                         <th>Condition</th>
                         <th>Taken Over date</th>
                          <th>Name of Alloment</th>
                           <th>Rank</th>
                            <th>Regtl.No.</th>
                             <th>Contact No.</th>
                              <th> Place of Posting</th>
                              <th>Allotment order </th>
                               <th>Allotment Date</th>
                                <th>Occupied Date </th>
                                
                      

                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->residecomplex; ?></td>
                    <td><?php echo $value->typeofqtr; ?></td><!-- 
                    <td><?php //echo $value->res; ?></td> -->
                    <td><?php echo $value->location; ?></td>
                    <td><?php echo $value->flor; ?></td>
                    <td><?php echo $value->accomdationtype; ?></td>
                    <td><?php echo $value->qtrno; ?></td>
                    <td><?php echo $value->electronicmeter; ?></td>
                    <td><?php echo $value->condit; ?></td>
                    <td><?php echo $value->todate; ?></td>
                    <td><?php echo $value->nameofallote; ?></td>
                    <td><?php echo $value->rank; ?></td>
                    <td><?php echo $value->regltno; ?></td>
                    <td><?php echo $value->contactno; ?></td>
                    <td><?php echo $value->placeofposting; ?></td>
                    <td><?php echo $value->allotmentorder; ?></td> 
                    <td><?php echo $value->allotmentdate; ?></td>
                     <td><?php echo $value->occudate; ?></td>

                     
                <?php endforeach; } ?>
              </tbody>
           </table>
</body>
</html>