<div class="admitCard">
    <div>
        <div class="titles">
            <span class="upper-title"><b>ADMIT CARD</b></span><BR>
            <span class="center-title"><b>BASIC PROFICIENCY TEST-2021</b></span><br>
            <span class="lower-title"><b>(ARMED POLICE CADRE)</b></span><br>
        </div>
        <div>
            <div class="table tablefs employee_data">
                <table>
                    <tr>
                        <td>ROLL NO.</td>
                        <td><?php echo $candidate->roll_no; ?></td>
                    </tr>
                    <!--Tr>
                                                            <td>RANK</td><td>{$candidate->rank}</td>
                                                        </tr-->
                    <tr>
                        <td>NAME</td>
                        <td><?php echo $employee->name; ?></td>
                    </tr>
                    <tr>
                        <td>BELT NO.</td>
                        <td><?php echo $employee->depttno; ?></td>
                    </tr>
                    <tr>
                        <td>UNIT</td>
                        <td><?php echo $employee->bat_id; ?></td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">VENUE</td>
                        <td>Lovely Professional University Phagwara</td>
                    </tr>

                    <!--Tr>
                                                            <td>DEPUTATION</td><td>{$candidate->deputation}</td>
                                                        </tr-->
                    <!--tr>
                                                            <td>BLOCK</td><td>{$candidate->block}</td>
                                                        </tr-->
                </table>
            </div>
            <div class="employee_image">
                <table style="">
                    <!--tr>
                                                            <td style="text-align:right;font-size:17px;"><b>VENUE: LPU PHG.</b></td>
                                                        </tr-->
                    <tr>
                        <td>
                            <img src="<?php echo API_PUBLIC_URL . "profile_pic/" . $employee->profile_pic; ?>" />
                        </td>
                    </tr>
                </table>
            </div>
            <br />
            <div class="signature_div">
                <table>
                    <tr>
                        <td>
                            <img class="final_signature_authority" src='<?php echo base_url();?>/webroot/images/admitCard/final_signature2.png'><br>
                            <span class="punjabi">
                                <b>SIGNATURE OF ISSUING AUTHORITY</b>
                            </span>
                        </td>
                        <td><br><br><br><b>SIGNATURE OF CANDIDATE</b></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>