<?php
// include_once 'controllers/EnderecosController.php';
// new EnderecosController();
?>
<h1>Endereços</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Cep</th>
                <th>UF</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Logradouro</th>
                <th><a href="?controller=EnderecosController&method=criar&id_contato=<?php echo $id_contato ?>" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($enderecos) {
                foreach ($enderecos as $endereco) {
                    ?>
                    <tr>
                        <td><?php echo $endereco->cep; ?></td>
                        <td><?php echo $endereco->uf; ?></td>
                        <td><?php echo $endereco->localidade; ?></td>
                        <td><?php echo $endereco->bairro; ?></td>
                        <td><?php echo $endereco->logradouro; ?></td>
                        <td>
                            <a href="?controller=EnderecosController&method=editar&id=<?php echo $endereco->id; ?>&id_contato=<?php echo $id_contato; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=EnderecosController&method=excluir&id=<?php echo $endereco->id; ?>&id_contato=<?php echo $id_contato; ?>" class="btn btn-danger btn-sm">Excluir</a>
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