<div class="container-fluid" data-ng-init="loadMenuAccess()">
    <?php echo form_open('menu/access_permission_process/'.$id_level) ?>
    <div style="overflow-x: scroll;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="white-space: nowrap; width: 1%;"></th>
                <th style="white-space: nowrap; width: 1%;">Parent Menu</th>
                <th style="white-space: nowrap; width: 1%;"></th>
                <th>Item Menu</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $tmp = "";
            foreach ($menu_list as $item) { 
            ?>
            <tr>
            <?php if ($item->f_menuid!=$tmp) { ?>        
                <td><input value="<?php echo $item->f_menuid ?>" id="<?php echo $item->f_menuid ?>" <?php echo $item->Header_Check!=null ? "checked" : "" ?> type="checkbox" name="idheader[]"></td>
                <td><label for="<?php echo $item->f_menuid ?>"><?php echo $item->f_menuname ?></label></td>
            <?php } else { ?>
                <td></td>
                <td></td>
            <?php } ?>
                <td><input value="<?php echo $item->f_itemid ?>" id="<?php echo $item->f_itemid ?>" <?php echo $item->Item_Check!=null ? "checked" : "" ?> type="checkbox" name="iditem[]"></td>
                <td>
                    <label for="<?php echo $item->f_itemid ?>">
                    <?php echo $item->f_itemname ?>
                    </label>
                </td>
            </tr>
            <?php $tmp=$item->f_menuid ?>
            <?php } ?>
        </tbody>
    </table>
    </div>
    <button type="submit" class="btn btn-success" style="margin-bottom: 20px">Simpan</button>
    
    <?php echo form_close() ?>
</div>