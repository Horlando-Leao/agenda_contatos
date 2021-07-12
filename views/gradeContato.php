<h1>Contatos</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ativo</th>
                <th>Email</th>
                <th>Ultima atualização</th>
                <th><a href="?controller=ContatosController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($contatos) {
                foreach ($contatos as $contato) {
                    ?>
                    <tr <?php 
                        if ($contato->ativo == 'não'){
                            echo('style="background-color: #ff9090; "');
                        }
                        ?> >
                        <td><?php echo $contato->nome; ?></td>
                        <td><?php echo $contato->ativo; ?></td>
                        <td><?php echo $contato->email; ?></td>
                        <td>
                        <?php 
                        if ($contato->data_atualizacao == "0000-00-00 00:00:00"){
                            echo $contato->data_criacao;
                        } else {
                            echo $contato->data_atualizacao;
                        }
                        ?>
                        </td>
                        <td>
                            <a href="?controller=ContatosController&method=editar&id=<?php echo $contato->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=ContatosController&method=excluir&id=<?php echo $contato->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
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