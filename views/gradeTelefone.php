<?php
// include_once 'controllers/TelefonesController.php';
// new TelefonesController();
?>
<h1>Telefones</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Telefone</th>
                <th>Ativo</th>
                <th>Última atualização</th>
                <th><a href="?controller=TelefonesController&method=criar&id_contato=<?php echo $id_contato ?>" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($telefones) {
                foreach ($telefones as $telefone) {
                    ?>
                    <tr <?php 
                        if ($telefone->ativo == 'não'){
                            echo('style="background-color: #ff8080; "');
                        }
                        ?> >
                        <td><?php echo $telefone->telefone; ?></td>
                        <td><?php echo $telefone->ativo; ?></td>
                        <td>
                        <?php 
                        if ($telefone->data_atualizacao == "0000-00-00 00:00:00"){
                            echo $telefone->data_criacao;
                        } else {
                            echo $telefone->data_atualizacao;
                        }
                        ?>
                        </td>
                        <td>
                            <a href="?controller=TelefonesController&method=editar&id=<?php echo $telefone->id; ?>&id_contato=<?php echo $id_contato; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=TelefonesController&method=excluir&id=<?php echo $telefone->id; ?>&id_contato=<?php echo $id_contato; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>