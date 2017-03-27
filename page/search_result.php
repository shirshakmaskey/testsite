<?php ob_start();?>
<div class="navbar navbar-default mega-menu" role="navigation">
        <?php if(is_home()){ ?>
            <div class="container">
                <div class="navbar-header">
                    <center><a href="<?php echo base_url();?>" class="navbar-brand">
                        <img alt="Logo" src="{COMPANY_LOGO}" id="logo-header">
                    </a></center>                    
                </div>
            </div>
            <div class="clearfix"></div>
            
                <div class="container">
                    <div class="row">    
                            <div class="col-xs-12">
                            <form action="<?php echo base_url('search.php');?>" method="get" class="sky-form" name="searchForm" id="searchForm">
            <input type="hidden" name="m" value="user">
            <input type="hidden" name="p" value="search">
                                <center><div class="input-group input-group-lg col-md-8">
                                    <input type="text" placeholder="SEARCH" name="x" class="form-control" value="<?php echo @$_REQUEST['x'];?>" >
                                    <span class="input-group-btn">
                                        <button type="submit" name="searchBtn" id="searchBtn"  value="1" class="btn btn-default"><span style="color:#7fba00" class="glyphicon glyphicon-search"> </span></button>
                                    </span>
                                </div>
                                </center>                
                                <div class="text-center">                    
                                    <div><ul class="searchoption">
                                            <li><input type="checkbox" checked="" value="all" name="searchtype[]">  All</li>
                                            <li> <input type="checkbox" value="lyrics" name="searchtype[]">  Lyrics</li> 
                                            <li><input type="checkbox" value="artist" name="searchtype[]">  Artist</li>
                                            <li> <input type="checkbox" value="album" name="searchtype[]">  Album</li>
                                            <li> <input type="checkbox" value="genre" name="searchtype[]">  Genre</li> 
                                        </ul>                                
                                    </div>                
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            <div class="clearfix"></div>            
                <div id="atoz">                                           
                            <div class="text-center md-margin-30">
                                <ul id="atozbox">
                                <?php foreach(range('a','z') as $key=>$val){?>
                                
                                <li><a href="<?php echo base_url('search/alphabet/'.$val);?>"><?php echo $val;?></a></li>
                                <li>|</li>
                                <?php } ?>
                                <li><a href="<?php echo base_url('search/alphabet/0-9');?>">0 - 9</a></li> 
                                </ul>
                            </div>
                </div>
                <?php }else{?> 
<div class="container">
              <div class="row">
                <div class="col-md-4 logo_bar_left"> 
                    <div class="navbar-header">
                        <a href="<?php echo base_url();?>" class="navbar-brand">
                            <img alt="Logo" src="{COMPANY_LOGO}" id="logo-header">
                        </a>                
                    </div>
                </div>
            
                <div class="col-md-8 search_bar_right"> 
                           <div class="row content-md">   
                            <div class="col-xs-12">
                            <form action="<?php echo base_url('search.php');?>" method="get" class="sky-form" name="searchForm" id="searchForm">
            <input type="hidden" name="m" value="user">
            <input type="hidden" name="p" value="search">
                                <div class="input-group input-group-lg col-md-8  pull-right">
                                    <input type="text" placeholder="SEARCH" name="x" class="form-control" value="<?php echo @$_REQUEST['x'];?>" >
                                    <span class="input-group-btn">
                                        <button type="submit" name="searchBtn" id="searchBtn"  value="1" class="btn btn-default"><span style="color:#7fba00" class="glyphicon glyphicon-search"> </span></button>
                                    </span>
                                </div>
                                <div class="clearfix"></div>               
                                <div class="text-right">                    
                                    <div><ul class="searchoption">
                                            <li><input type="checkbox" checked="" value="all" name="searchtype[]">  All</li>
                                            <li> <input type="checkbox" value="lyrics" name="searchtype[]">  Lyrics</li> 
                                            <li><input type="checkbox" value="artist" name="searchtype[]">  Artist</li>
                                            <li> <input type="checkbox" value="album" name="searchtype[]">  Album</li>
                                            <li> <input type="checkbox" value="genre" name="searchtype[]">  Genre</li> 
                                        </ul>                                
                                    </div>                
                                </div>
                                </form>
                        </div>
                           </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
<div class="clearfix"></div>
                <div id="atoz">                                           
                            <div class="text-center md-margin-30">
                                <ul id="atozbox">
                                <?php foreach(range('a','z') as $key=>$val){?>
                                
                                <li><a href="<?php echo base_url('search/alphabet/'.$val);?>"><?php echo $val;?></a></li>
                                <li>|</li>
                                <?php } ?>
                                <li><a href="<?php echo base_url('search/alphabet/0-9');?>">0 - 9</a></li> 
                                </ul>
                            </div>
                </div>
                    <?php } ?>
        </div>
<?php
$cms['module:search'] = ob_get_clean();