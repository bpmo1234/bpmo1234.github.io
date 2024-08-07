</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4 sidebar-no-expand">
    <!-- Brand Logo -->
    <a href="<?php echo base_url ?>admin" class="brand-link bg-primary text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 2.5rem;height: 2.5rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <!-- Sidebar user panel (optional) -->
                    <div class="clearfix"></div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-4">
                        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item dropdown">
                                <a href="./" class="nav-link nav-home">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Accueil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-is-tree nav-transaction nav-transaction_send nav-transaction_receive">
                                    <i class="nav-icon fas fa-th-list"></i>
                                    <p>
                                        Transactions
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: block;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url ?>admin/?page=transaction/send" class="nav-link nav-transaction_send">
                                            <i class="far fa-paper-plane nav-icon"></i>
                                            <p>Transfert</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" id="receive-nav" class="nav-link nav-transaction_receive">
                                            <i class="fas fa-hands nav-icon"></i>
                                            <p>Retrait</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url ?>admin/?page=transaction" class="nav-link nav-transaction">
                                            <i class="fas fa-list nav-icon"></i>
                                            <p>Toutes les Transactions</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="<?php echo base_url ?>admin/?page=reports" class="nav-link nav-reports">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Raports</p>
                                </a>
                            </li>
                            <?php if($_settings->userdata('type') == 1): ?>
                            <li class="nav-header">Maintenance</li>
                            <li class="nav-item dropdown">
                                <a href="<?php echo base_url ?>admin/?page=maintenance/branch" class="nav-link nav-maintenance_branch">
                                    <i class="nav-icon fas fa-code-branch"></i>
                                    <p>Branch List</p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="<?php echo base_url ?>admin/?page=maintenance/fee" class="nav-link nav-maintenance_fee">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>Fee Table</p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>User List</p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>Settings</p>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- Add your image here -->
    <div class="sidebar-footer text-center">
        <img src="/mtms/images/banking.png" alt="Sidebar Bottom Image" class="img-fluid" style="max-width: 100%;">
    </div>
    <!-- /.sidebar -->
</aside>
<script>
    var page;
    $(document).ready(function(){
        page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
        page = page.replace(/\//gi,'_');

        if($('.nav-link.nav-'+page).length > 0){
            $('.nav-link.nav-'+page).addClass('active')
            if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
                $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
                $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
            }
            if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
                $('.nav-link.nav-'+page).parent().addClass('menu-open')
            }
        }

        $('#receive-nav').click(function(){
            $('#uni_modal').on('shown.bs.modal',function(){
                $('#find-transaction [name="tracking_code"]').focus();
            })
            uni_modal("Entrer le Code De transfer","transaction/find_transaction.php");
        })
    })
</script>
