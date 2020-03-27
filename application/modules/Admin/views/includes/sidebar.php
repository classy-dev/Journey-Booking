<div class="sidebar-header">
    <img style="float: left; margin-right: 10px; max-width: 33px;" src="<?php echo base_url(); ?>uploads/global/favicon.png" class="hlogo_preview_img img-fluid brand-logos favicon">
    <h5>Administrator
        <small class="muted" style="color:#9d9d9d">Console</small>
    </h5>
</div>
<div class="root">
    <a href="<?php echo base_url().$this->uri->segment(1);?>/profile/">
        <i class="fa fa-user-circle-o pull-left" style="left:5px"></i>
        <p><strong><?php echo $this->session->userdata('fullName'); ?></strong> Current User</p>
    </a>
</div>
<div class="social-sidebar">
    <!--<div class="search-sidebar">
        <form class="search-sidebar-form has-icon filterform" onsubmit="return false;">
                <label for="sidebar-query" class="fa fa-search"></label>
                <input id="sidebar-query" type="text" placeholder="Search" class="form-control search-query filtertxt">
        </form>
        </div>-->
    <ul id="social-sidebar-menu" class="list-unstyled components">
        <li><a style="color:#F5F8FF" href="<?php echo base_url().$this->uri->segment(1);?>"><i style="color:#F5F8FF" class="fa fa-desktop"></i>  Dashboard</a></li>
        <?php if ($isadmin) {?>
            <?php $chkupdates = checkUpdatesCount();if ($chkupdates->showUpdates) {if ($isSuperAdmin) {?>
                <li>
                    <a href="<?php echo base_url(); ?>admin/updates/"><i class="fa fa-refresh"></i>
                        <span>Updates</span><span class="pull-right label label-danger" id="updatescount"><?php if ($chkupdates->count > 0) {echo $chkupdates->count;}
                            ;?></span>
                    </a>
                </li>
            <?php }}?>
            <?php if ($isSuperAdmin) {?>
                <li> <a href="<?php echo base_url(); ?>admin/settings/modules/"><i class="fa fa-cube"></i> <?php echo trans('08'); ?></a></li>
                <li>
                    <a href="#menu-ui" data-toggle="collapse" aria-expanded="false"><i class="fa fa-cog"></i> <?php echo trans('03'); ?></a>
                    <ul id="menu-ui" class="collapse wow fadeIn animated list-unstyled">
                        <li> <a href="<?php echo base_url(); ?>admin/settings/"><?php echo trans('04'); ?></a> </li>
                        <li> <a href="<?php echo base_url(); ?>admin/settings/currencies/">Currencies</a> </li>
                        <li> <a href="<?php echo base_url(); ?>admin/settings/paymentgateways/"><?php echo trans('05'); ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>admin/settings/social/"><?php echo trans('07'); ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>admin/settings/widgets/"><?php echo trans('010'); ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>admin/settings/sliders/"><?php echo trans('011'); ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>admin/templates/email/"><?php echo trans('012'); ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>admin/templates/sms_settings/">SMS API Settings</a></li>
                        <?php /*<li> <a href="<?php echo base_url(); ?>admin/backup/">BackUp</a></li> */?>
                        <!--<?php if (pt_permissions('locations', @$userloggedin)) {?>
                    <li><a href="<?php echo base_url() . $this->uri->segment(1); ?>/locations"><i class="fa fa-map-marker w30"></i> Locations<span class="pull-right label label-danger"></span></a></li>
                    <?php }?>-->
                    </ul>
                </li>
            <?php }?>
            <li>
                <a data-toggle="collapse"  aria-expanded="false" href="#ACCOUNTS"><i class="fa fa-user-circle"></i> <?php echo trans('017'); ?>
                </a>
                <ul id="ACCOUNTS" class="collapse wow fadeIn animated list-unstyled">
                    <?php if ($role != "admin") {?>
                        <li><a href="<?php echo base_url(); ?>admin/accounts/admins/"><?php echo trans('021'); ?></a></li>
                    <?php }?>
                    <li><a href="<?php echo base_url(); ?>admin/accounts/suppliers/"><?php echo trans('023'); ?></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/accounts/customers/"><?php echo trans('025'); ?></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/accounts/guest/"><?php echo trans('027'); ?><?php echo trans('025'); ?></a></li>
                </ul>
            </li>
            <li>
                <a href="#CMS" data-toggle="collapse" aria-expanded="false"><i style="width:30px" class="fa fa-list-alt w30"></i><span><?php echo trans('013'); ?></span></a>
                <ul id="CMS" class="collapse wow fadeIn animated list-unstyled">
                    <li><a href="<?php echo base_url(); ?>admin/cms"><?php echo trans('015'); ?></a></li>
                    <!-- <li><a href="<?php echo base_url(); ?>admin/cms/menus/manage"><?php echo trans('016'); ?></a></li> -->
                </ul>
            </li>
        <?php } ?>
        <?php if (empty($supplier)) {
            $moduleslist = app()->service('ModuleService')->all();
            $baseurl = base_url();
            $urisegment = $this->uri->segment(1);
            foreach ($moduleslist as $modl) {
                $isenabled = isModuleActive($modl->name);
                if ($isenabled) {
                    if (pt_permissions($modl->name, $userloggedin) && !in_array(strtolower($modl->name), ['offers', 'newsletter', 'coupons', 'reviews'])) {
                        ?>
                        <li>
                            <a href="#<?php echo $modl->name; ?>" data-toggle="collapse" aria-expanded="false"><i class="w30 <?=$modl->menus->icon;?>"></i><?php echo $modl->label; ?></a>
                            <?php if ($urisegment == "admin" && !empty($modl->menus->admin)) {?>
                                <ul id="<?php echo $modl->name; ?>" class="collapse wow fadeIn animated list-unstyled">
                                    <?php foreach ($modl->menus->admin as $menu): ?>
                                        <li><a href="<?=base_url($menu->link);?>"><?=$menu->label;?></a></li>
                                    <?php endforeach;?>
                                </ul>
                            <?php } else if (!empty($modl->menus->supplier)) {?>
                                <ul id="<?php echo $modl->name; ?>" class="collapse wow fadeIn animated list-unstyled">
                                    <?php foreach ($modl->menus->supplier as $menu): ?>
                                        <li><a href="<?=base_url($menu->link);?>"><?=$menu->label;?></a></li>
                                    <?php endforeach;?>
                                </ul>
                            <?php }?>
                        </li>
                        <?php
                    }
                }
            }
        }?>
        <?php if ($isadmin && $role != "admin") { if (isModuleActive('offers')) {?>
            <li>
                <a data-toggle="collapse" aria-expanded="false" href="#SPECIAL_OFFERS"><i class="fa fa-gift w30"></i> Offers<i class="fa fa-angle-right pull-right menu-icon"></i></a>
                <ul id="SPECIAL_OFFERS" class="collapse wow fadeIn animated list-unstyled">
                    <li><a href="<?php echo base_url(); ?>admin/offers/"><?php echo trans('029'); ?> <?php echo trans('030'); ?></a></li>
                    <li><a href="<?php echo base_url(); ?>admin/offers/settings/"><?php echo trans('030'); ?> <?php echo trans('04'); ?></a></li>
                </ul>
            </li>
        <?php }if (isModuleActive('coupons')) {?>
            <li>
                <a href="<?php echo base_url(); ?>admin/coupons/"><i class="fa fa-asterisk"></i> Coupons</a>
            </li>
        <?php }}?>
        <?php if ($isadmin) {if (isModuleActive('newsletter')) {?>
            <?php if (pt_permissions('newsletter', @$userloggedin)) {?>
                <li><a href="<?php echo base_url(); ?>admin/newsletter/"><i class="fa fa-envelope"></i> <?php echo trans('031'); ?> <span class="pull-right label label-danger" id=""></span></a>
                </li>
            <?php }}}?>
        <?php if (pt_permissions('booking', @$userloggedin)) {?>
            <li><a href="<?php echo base_url() . $this->uri->segment(1); ?>/bookings/"><i class="fa fa-list w30"></i> <?php echo trans('034'); ?><span class="pull-right label label-danger" id=""></span></a>
            </li>
            <li><a href="<?php echo base_url() . $this->uri->segment(1); ?>/flightsbookings/"><i class="fa fa-list w30"></i> Flights Booking<span class="pull-right label label-danger" id=""></span></a>
            </li>
            <li><a href="<?php echo base_url() . $this->uri->segment(1); ?>/flightsdiscounts/"><i class="fa fa-percent w30"></i> Flights Discounts<span class="pull-right label label-danger" id=""></span></a>
            </li>
        <?php }?>
    </ul>
</div>
<!-- <ul class="list-unstyled CTAs">
    <li><a style="position:fixed;bottom:30px;width:210px;" target="_blank" href="https://phptravels.com/documentation/" class="article"><i style="margin-top:0px" class="fa fa-chevron-left"></i> Documentation</a></li>
</ul> -->