<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

            <table>
              <thead>
                 <tr>
                    <th>S.No</th>
                    <th>Type of Item </th>
                    <th>Name of Item</th>
                     <th>Category of item</th>
                      <th>Condition of item</th>
                      <th>Received From</th>
                       <th>Received Mode</th>
                        <th>Received Voucher/ RC No. </th>
                         <th>Received Voucher/ RC Date</th>
                         <th>Bill No. (if Purchased)</th>
                          <th>Bill Date</th>
                           <th>Received Date</th>
                            <th>Type of Fund</th>
                             <th>Govt fund Name</th>
                              <th>Status</th>

                 </tr>
              </thead>
              <tbody>
                <?php  $count = 0; if($weapon!=''){ foreach($weapon as $value): $count = $count+1; ?>
                 <tr class="odd gradeX">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $value->typeofitem; ?></td>
                    <td><?php echo $value->nameofitem; ?></td>
                    <td><?php echo $value->catofitem; ?></td>
                    <td><?php echo $value->conofitem; ?></td>
                    <td><?php echo $value->recfrom; ?></td>
                    <td><?php echo $value->recmode; ?></td>
                    <td><?php echo $value->recvocher; ?></td>
                    <td><?php echo $value->recdate; ?></td>
                    <td><?php echo $value->billno; ?></td>
                    <td><?php echo $value->billdate; ?></td>
                    <td><?php echo $value->billrecdate; ?></td>
                    <td><?php echo $value->typeoffund; ?></td>
                    <td><?php echo $value->govtfundname; ?></td>
                    <td><?php echo $value->status; ?></td>
                <?php endforeach; } ?>
              </tbody>
           </table>
</body>
</html>