<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $tipoView['User']['username']; ?>
        </h1>

    </section>
    <section class="content">
        <table id="example1" class="table-bordered table-striped">
            <tbody>
            <tr>
                <td><strong>Foto de perfil</strong></td>
            </tr>
            <?php
            if (isset($tipoView['UserImage']['dir'])): ?>
                <tr>
                    <td class="actions">
                        <?php
                        if ($tipoView['UserImage']['Aceito'] == 'N'):
                            echo $this->Html->link(__('Aprovar foto'), array('controller' => 'UserImages', 'action' => 'aprovar', $tipoView['UserImage']['id']), array('class' => 'btn btn-default btn-xs'));
                        else:
                            echo $this->Html->link(__('Desaprovar foto'), array('controller' => 'UserImages', 'action' => 'desaprovar', $tipoView['UserImage']['id']), array('class' => 'btn btn-default btn-xs'));
                        endif;
                        ?>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <?php
                    if ($tipoView['UserImage']['filename'] == null):
                        if ($tipoView['User']['Sexo'] == 'Masculino') :?>
                            <img src="<?= $admLocal ?>img/masculino.jpg" style="width: 230px">
                        <?php endif; ?>
                        <?php if ($tipoView['User']['Sexo'] == 'Feminino') : ?>
                        <img src="<?= $admLocal ?>img/feminino.jpg" style="width: 230px">
                    <?php endif; ?>

                        <?php
                    else:
                        if (isset($tipoView['UserImage']['dir'])):

                            $tipoView['UserImage']['dir'] = explode("\\", $tipoView['UserImage']['dir']);
                            $tipoView['UserImage']['dir'] = implode('/', $tipoView['UserImage']['dir']);

                            $img = $admLocal . $tipoView['UserImage']['dir'] . '/' . $tipoView['UserImage']['filename']?>

                            <img src="<?= $img ?>" style="width: 250px;"\>
                        <?php endif; ?>
                        <?php
                    endif;
                    ?>
                </td>
            </tr>
            <tr>
                <td><strong>Matrícula</strong></td>
                <td>
                    <?php echo $tipoView['User']['Matricula']; ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td><strong>Curso</strong></td>
                <td>
                    <?php echo $tipoView['Course']['Nome']; ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td><strong>Semestre</strong></td>
                <td>
                    <?php echo $tipoView['Semester']['Descricao']; ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>
                    <?php echo $tipoView['User']['Email']; ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td><strong>Telefone</strong></td>
                <td>
                    <?php echo $tipoView['User']['Telefone']; ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td><strong>Sexo</strong></td>
                <td>
                    <?php echo $tipoView['User']['Sexo']; ?>
                    &nbsp;
                </td>
            </tr>
            </tbody>
        </table>
    </section>

</div>
