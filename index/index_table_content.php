<tr class="table_content" style="background-color: ivory">
    <td><?php echo $company_row["id"]; ?></td>
    <td><?php echo $company_row['companyName']; ?></td>
    <td><?php echo $company_row['ceoName']; ?></td>
    <td><?php echo $company_row['phoneNumber']; ?></td>
    <td><?php echo $company_row['ceoPhoneNumber']; ?></td>
    <td><?php echo $company_row['address1']; ?></td>
    <td><?php echo $company_row['address2']; ?></td>
    <td><?php echo $company_row['firstGaipDate']; ?></td>
    <td><?php echo $company_row['currentGaipDate']; ?></td>
    <td class="end_date"><?php echo $company_row['endGaipDate']; ?></td>
    <td><?php echo $company_row['currentGaipPrice']; ?></td>
    <td><?php echo $company_row['Gujwa']; ?></td>
    <td><?php echo $company_row['leftCalls']; ?></td>
    <td><input type="button" name="edit" value="수정" id="<?php echo $company_row["id"]; ?>"
               class="btn btn-info btn-xs edit_data"/></td>
    <td><input type="button" name="delete" value="삭제" id="<?php echo $company_row["id"]; ?>"
               class="btn btn-info btn-xs delete_data"/></td>
    <td><input type="button" name="" value="가입내역" id="<?php echo $company_row["id"]; ?>"
               class="btn btn-info btn-xs view_data"/></td>
    <td><input type="button" name="" value="재가입" id="<?php echo $company_row["id"]; ?>"
               class="btn btn-info btn-xs redo_data"/></td>
    <td><input type="button" name="" value="배정내역" id="<?php echo $company_row["id"]; ?>"
               class="btn btn-info btn-xs assign_data"/></td>
</tr>

