

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 <?php foreach ($karyawan as $item) { ?>
                                        <tr>
                                            <td  class="text-center" >
                                                <!--<div class="checkbox-custom" style="margin-left: 20px;">-->
                                                <input <?php if ($item->f_type == 0) {
                                        echo 'style = "display:none"';
                                    } ?> type="checkbox"  id="checkbox1.<?php echo $item->f_emp_id ?>" value="<?php echo $item->f_emp_id ?>" name="idnya[]" >

                                            </td>

                                            <td  ><center>
                                        <a <?php if ($item->f_type == 0) {
                                        echo 'style = "display:none"';
                                    } ?> href="javascript: formsubmit('<?php echo $item->f_emp_id ?>')" title="Edit Employee" ><i class="fa fa-pencil"></i></a>
                                    </center>
                                    </td>
                                    <td><center><?php
                                        if ($item->f_termintate_date >= $datenow) {
                                            echo "<span class='badge badge-warning mr10 mb10' style='background-color: yellow;'>Resign</span>" ;
                                        } elseif ($item->f_termintate_date <= $datenow) {
                                            if ($item->f_status == 2) {
                                                echo "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Delete</span>";
                                            } else {

                                                echo "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Active</span>";
                                            }
                                        } elseif ($item->f_termintate_date == '') {
                                            if ($item->f_status == 2) {
                                                echo "<ul class = 'fa-ul'>
                                                <li>Delete</i></li>
                                                </ul>";
                                            } else {
                                                echo "<ul class='fa-ul'>
                                                    <li>Active</i></li>
                                                    </ul>";
                                            }
                                        } else {
                                            echo "<ul class = 'fa-ul'>
                                                <li>Active</i></li>
                                                </ul>";
                                        }
                                        ?>  
                                    </center></td>                                    
                                    <td><?php
                                        if ($item->f_type == 1) {
                                            echo 'External';
                                        } else {
                                            echo 'Internal';
                                        }
                                        ?></td>
                                    </td>                                    
                                    <td><?php echo $item->f_emp_id ?></td>
                                    <td><?php echo $item->f_fullname ?></td>
                                    <td><?php echo $item->f_gender ?></td>
                                    <td><?php echo $item->f_no_ktp ?></td>
                                    <td><?php echo $item->f_no_tlp ?></td>
                                    <td><?php echo $item->f_position_desc ?></td>
                                    <td><?php echo $item->f_joint_date ?></td>
                                    <td><?php echo $item->f_birth_date ?></td>
                                    <td><?php echo $item->f_email_address ?></td>
                                    <td><?php echo $item->f_company_desc ?></td>
                                    <td><?php echo $item->f_cost_center ?></td>
                                    <td><?php echo $item->f_dept_desc ?></td>
                                    <td><?php echo $item->f_directorate_desc ?></td>
                                    <td><?php echo $item->f_div_desc ?></td>
                                    <td><?php echo $item->f_emp_area_desc ?></td>
                                    <td><?php echo $item->f_emp_office_desc ?></td>
                                    <td><?php echo $item->f_emp_status_desc ?></td>
                                    <td><?php echo $item->f_landscape ?></td>
                                    <td><?php echo $item->f_org_unit_desc ?></td>
                                    <td><?php echo $item->f_termintate_date ?></td>
                                    <td><?php echo $item->f_group_desc ?></td>
                                    <td><?php echo $item->f_group_grade_code ?></td>
                                    </tr>
<?php } ?>