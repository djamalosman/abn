

                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="<?php echo base_url("menu/home") ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                            </li>
                            <!--<script>alert("<?php echo ""//$data[0]->f_menuname ?>");</script>-->
                            <h3 class="menu-title">Main Menu</h3><!-- /.menu-title -->
                            <?php $temp = ""; ?>
                            <?php foreach ($data as $key=>$item) { ?>
                                <?php if($item->f_parentid!=$temp) { ?>
                                <li class="menu-item-has-children dropdown">
                                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i><?php echo $item->f_menuname ?></a>-->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon <?php echo $item->icon ?>"></i><?php echo $item->f_menuname ?></a>
                                    <ul class="sub-menu children dropdown-menu">
                                <?php } ?>
                                        <li><i class="fa fa-angle-double-right"></i><a href="<?php echo base_url($item->f_itemurl) ?>"><?php echo $item->f_itemname ?></a></li>  
                                <?php if($key==count($data)-1 || $item->f_parentid!=$data[$key+1]->f_parentid) { ?>    
                                    </ul>
                                </li>
                                <?php } ?>
                                
                                <?php $temp = $item->f_parentid ?>
                            <?php } ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->