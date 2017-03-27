<?php ob_start();?>
<a href="<?php echo base_url(""); ?>">
                    <h2><?php echo COMPANY_SITE_NAME?></h2>
                    <?php $row =  $funObj->configRow('COMPANY_SITE_NAME');?>
                    <?php echo $row->configdesc;?>
                </a>
<?php $cms['module:logo_section'] = ob_get_clean();