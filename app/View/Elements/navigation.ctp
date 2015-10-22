<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Uniexpo | Painel administrativo</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?= $admLocal ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="<?= $admLocal ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?= $admLocal ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>

    <?php if ($this->params['controller'] === 'Users' && $this->params['action'] === 'index'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>
    <?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'index'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>
    <?php if ($this->params['controller'] === 'SkillUsers' && $this->params['action'] === 'index'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>
    <?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'add'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>
    <?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>
    <?php if ($this->params['controller'] === 'Projects' && $this->params['action'] === 'index' || $this->params['controller'] === 'Projects' && $this->params['action'] === 'add'
    || $this->params['controller'] === 'Projects' && $this->params['action'] === 'view' || $this->params['controller'] === 'Projects' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Skills' && $this->params['action'] === 'index' || $this->params['controller'] === 'Skills' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'Skills' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Socials' && $this->params['action'] === 'index' || $this->params['controller'] === 'Socials' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'Socials' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Archives' && $this->params['action'] === 'index' || $this->params['controller'] === 'Archives' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'Archives' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Usertypes' && $this->params['action'] === 'index' || $this->params['controller'] === 'Usertypes' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'Usertypes' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Semesters' && $this->params['action'] === 'index' || $this->params['controller'] === 'Semesters' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'Semesters' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Courses' && $this->params['action'] === 'index' || $this->params['controller'] === 'Courses' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'Courses' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Shifts' && $this->params['action'] === 'index' || $this->params['controller'] === 'Shifts' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'Shifts' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'SocialTypes' && $this->params['action'] === 'index' || $this->params['controller'] === 'SocialTypes' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'SocialTypes' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Themes' && $this->params['action'] === 'index' || $this->params['controller'] === 'Themes' && $this->params['action'] === 'add'
        || $this->params['controller'] === 'Themes' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'ProjectImages' && $this->params['action'] === 'add' || $this->params['controller'] === 'ProjectImages' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($this->params['controller'] === 'Movies' && $this->params['action'] === 'add' || $this->params['controller'] === 'Movies' && $this->params['action'] === 'edit'): ?>
        <link href="<?= $admLocal ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Uni</b>expo</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Uni</b>expo</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">Ir para o site</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?php if ($qtd == 1) : ?>
                        <?php if ($tipo['UserImage']['Aceito'] == 'S') : ?>
                        <?php
                        $tipo['UserImage']['dir'] = explode('\\', $tipo['UserImage']['dir']);
                        $tipo['UserImage']['dir'] = implode('/', $tipo['UserImage']['dir']);
                        $img = $admLocal . $tipo['UserImage']['dir'] . "/" . $tipo['UserImage']['filename'];
                        ?>
                        <br>
                        <img src="<?= $img ?>" class="img-circle" alt="User Image" \>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if ($qtd == 0 || $tipo['UserImage']['Aceito'] == 'N') : ?>
                        <?php if ($this->Session->read('Auth.User.Sexo') == 'Masculino') : ?>
                            <br>
                            <img src="<?= $admLocal ?>img/masculino.jpg" class="img-circle" alt="User Image">
                        <?php endif; ?>

                        <?php if ($this->Session->read('Auth.User.Sexo') == 'Feminino') : ?>
                            <br>
                            <img src="<?= $admLocal ?>img/feminino.jpg" class="img-circle" alt="User Image">
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="pull-left info">
                    <p><?php echo $tipo['User']['username']; ?></p>
                    <a><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header">Menu de navegação</li>
                <li class="treeview">
                    <a href="<?= $admLocal ?>Users/perfil">
                        <i class="fa fa-dashboard"></i> <span>Perfil</span> </i>
                    </a>
                </li>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 3 || $this->Session->read('Auth.User.user_type_id') == 1) : ?>
                <li class="treeview">
                    <a>
                        <i class="fa fa-files-o"></i>
                        <span>Administrações gerais</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= $admLocal ?>Usertypes""><i class="fa fa-circle-o"></i> Tipos de usuários</a></li>
                        <li><a href="<?= $admLocal ?>Semesters""><i class="fa fa-circle-o"></i> Semestres</a></li>
                        <li><a href="<?= $admLocal ?>Courses""><i class="fa fa-circle-o"></i> Cursos</a></li>
                        <li><a href="<?= $admLocal ?>Shifts""><i class="fa fa-circle-o"></i>Períodos</a></li>
                        <li><a href="<?= $admLocal ?>SocialTypes"><i class="fa fa-circle-o"></i>Tipos de sociais</a></li>
                        <li><a href="<?= $admLocal ?>Themes"><i class="fa fa-circle-o"></i>Temas para projetos</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 1) : ?>
                <li>
                    <a href="<?= $admLocal ?>Archives">
                        <i class="fa fa-th"></i> <span>Arquivos de projetos</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 2) : ?>
                <li class="treeview">
                    <a href="<?= $admLocal ?>Projects">
                        <i class="fa fa-laptop"></i>
                        <span>Projetos</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3 ) : ?>
                <li class="treeview">
                    <a href="<?= $admLocal ?>Skills">
                        <i class="fa fa-table"></i>
                        <span>Habilidades</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3) : ?>
                <li class="treeview">
                    <a href="<?= $admLocal ?>SkillUsers">
                        <i class="fa fa-table"></i>
                        <span>Habilidades de usuários</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3 ) : ?>
                <li class="treeview">
                    <a href="<?= $admLocal ?>Resumes">
                        <i class="fa fa-book"></i> <span>Curriculos</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 2 ) : ?>
                <li class="treeview">
                    <a href="<?= $admLocal?>Resumes">
                        <i class="fa fa-book"></i> <span>Curriculo</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 3 ) : ?>
                <li class="treeview">
                    <a href="<?= $admLocal ?>Users">
                        <i class="fa fa-dashboard"></i> <span>Usuários</span> </i>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ($this->Session->read('Auth.User.user_type_id') == 1 || $this->Session->read('Auth.User.user_type_id') == 2 ) : ?>
                <li class="treeview">
                    <a href="<?= $admLocal ?>Socials">
                        <i class="fa fa-table"></i> <span>Sociais</span>
                    </a>
                </li>
                <?php endif; ?>
                <li><a href="<?= $admLocal ?>Users/logout"><i class="fa fa-book"></i> <span>Sair do painel</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>