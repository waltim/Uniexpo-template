<div class="login-box">
    <div class="login-logo">
        <a href="<?=$admLocal?>/Users/login"><b>Uni</b>expo</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Entre para iniciar a sua sessão</p>

        <form action="<?=$admLocal?>" method="post" id="UserLoginForm" accept-charset="utf-8">
            <div class="form-group has-feedback">
                <input type="email" name="data[User][Email]" id="UserEmail" class="form-control" placeholder="Email" required="required"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="data[User][password]" type="password" id="UserPassword" class="form-control" placeholder="Senha" required="required"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
            </div>
        </form>
        <a href="<?=$admLocal?>Users/add" class="text-center">Registrar um novo membro</a>

    </div>
</div>

<script src="<?=$admLocal?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?=$admLocal?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?=$admLocal?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>


