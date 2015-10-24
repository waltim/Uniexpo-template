<div class="register-box">
    <div class="register-logo">
        <a href="<?= $admLocal ?>/Users/login"><b>Uni</b>expo</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Registrando um novo membro</p>

        <form action="<?= $admLocal ?>Users/add" id="UserAddForm" method="post" accept-charset="utf-8">

            <div class="form-group">
                <?php
                echo $this->Form->input('course_id', array('options' => $cursos, 'empty' => '-Selecione um curso-','class'=>'form-control','label'=>'Cursos',
                'id'=>'UserCourseId','name'=>'data[User][course_id]','required'));
                ?>
            </div>
            <div class="form-group">
                <?php
                echo $this->Form->input('semester_id', array('empty' => '-Nenhum curso selecionado-','class'=>'form-control','label'=>'Semestres',
                    'id'=>'UserSemesterId','name'=>'data[User][semester_id]','required'));
                ?>
            </div>
            <div class="form-group">
                <label>Informe seu sexo</label>
                <select class="form-control" name="data[User][Sexo]" id="UserSexo">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="data[User][username]" maxlength="150" id="UserUsername"
                       placeholder="Nome completo" required="required"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="data[User][Matricula]" id="UserMatricula"
                       placeholder="Ex: 11065814" pattern=".{8,}" title="A matrícula deve possuir 8 caracteres." required="required"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="data[User][Email]" id="UserEmail" placeholder="Email"
                       required="required"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="data[User][password]" type="password" id="UserPassword" required="required"
                       class="form-control" placeholder="Senha"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label>Telefone:</label>

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" name="data[User][Telefone]" maxlength="25" id="UserTelefone"
                           data-inputmask='"mask": "(999)99999-9999"' data-mask/>
                </div>
            </div>

            <div class="form-group">
                <input name="data[User][Aceito]" type="hidden" id="UserAceito" value="N"/>
            </div>
            <div class="form-group">
                <input name="data[User][user_type_id]" type="hidden" id="Useruser_type_id" value=2/>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <a href="<?= $admLocal ?>/Users/login" class="text-center">Eu já sou um membro</a>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.form-box -->
</div><!-- /.register-box -->
<?php
$this->Js->get('#UserCourseId')->event('change',

    $this->Js->request(array(

        'controller' => 'Semesters',

        'action' => 'listar_semestres_json',

    ), array(

        'update' => '#UserSemesterId',

        'async' => true,

        'method' => 'Post',

        'dataExpression' => true,

        'data' => $this->Js->serializeForm(array(

            'isForm' => true,

            'inline' => true

        ))

    ))

);
?>

<!-- jQuery 2.1.4 -->
<script src="<?= $admLocal ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?= $admLocal ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?= $admLocal ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?= $admLocal ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- InputMask -->
<script src="<?= $admLocal ?>plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?= $admLocal ?>plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?= $admLocal ?>plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<!-- date-range-picker -->

<script src="<?= $admLocal ?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- bootstrap color picker -->
<script src="<?= $admLocal ?>plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="<?= $admLocal ?>plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= $admLocal ?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= $admLocal ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?= $admLocal ?>plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?= $admLocal ?>dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $admLocal ?>dist/js/demo.js" type="text/javascript"></script>


<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {},
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
