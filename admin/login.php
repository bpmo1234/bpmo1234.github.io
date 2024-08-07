<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGIS-Z | Connexion</title>
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="/admin/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <style>
        .bg-bottom {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 1;
        }
        .login-button {
            position: relative;
            z-index: 2;

        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:active, .btn-primary.active,
        .show > .btn-primary.dropdown-toggle {
            background-color: #004085;
            border-color: #003569;
        }
    </style>
</head>
<body class="hold-transition login-page" style="position: relative; min-height: 100vh;">
    <div class="d-flex flex-column flex-root" style="flex: 1;">
        <?php require_once('inc/header.php') ?>

        <script>
            start_loader()
        </script>

        <h1 class="text-center py-5 login-title"><b><?php echo $_settings->info('name'); ?></b></h1>

        <div class="d-flex flex-column flex-root flex-grow-1">
            <!--begin::Authentication - Sign-in -->
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <!--begin::Logo-->
                    <a href="/" class="mb-12">
                        <img alt="Logo" src="/mtms/images/colombe.png" class="h-40px"/>
                    </a>
                    <!--end::Logo-->
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px bg-body rounded shadow p-3 mb-5 bg-white rounded">
                        <!--begin::Form-->
                        <form class="form w-100" id="login-frm" action="" method="POST">
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Connexion à SGIS-Z</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Nom d'utilisateur</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="text" name="username" value="" autofocus/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Mot de passe</label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="current-password"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" class="btn btn-lg btn-primary w-30 mb-5 login-button">
                                    <span class="indicator-label">Continuer</span>
                                    <span class="indicator-progress">Patientez-svp...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Submit button-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
    </div>
    <img src="/mtms/images/back.png" class="bg-bottom">   
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="/admin/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/admin/assets/js/scripts.bundle.js"></script>
    <script>const hostUrl = "/admin/assets/";</script>
    <!--end::Global Javascript Bundle-->
    <script>
        $(document).ready(function(){
            end_loader();
        });
    </script>
</body>
</html>
