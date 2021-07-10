<div class="container">
    <form action="?controller=ContatosController&<?php echo isset($contato->id) ? "method=atualizar&id={$contato->id}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Usuário</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Nome:</label>
                <input type="text" class="form-control col-sm-8" name="nome" id="nome" value="<?php
                echo isset($contato->nome) ? $contato->nome : null;
                ?>" />
            </div>

            <div class="form-check form-check-inline">
                <label class="col-sm-2 col-form-label text-right">Ativo:</label>
                <label class="form-check-label" for="exampleRadios1">Sim</label>
                <input type="radio" class="form-check-input" name="ativo" id="ativo" value="sim" 
                <?php 
                    if (isset($contato->ativo)){
                        echo ($contato->ativo == "sim") ? "checked" : null; 
                    }
                ?>/>
                <label class="form-check-label" for="exampleRadios1">Não</label>
                <input type="radio" class="form-check-input" name="ativo" id="ativo" value="não" 
                <?php 
                if (isset($contato->ativo)){
                    echo ($contato->ativo == "não") ? "checked" : null; 
                    }
                ?> />
            </div>

            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Email:</label>
                <input type="text" class="form-control col-sm-8" name="email" id="email" value="<?php
                echo isset($contato->email) ? $contato->email : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Senha:</label>
                <input type="password" class="form-control col-sm-8" name="senha" id="senha" value="<?php
                echo isset($contato->senha) ? $contato->senha : null;
                ?>" />
            </div>
            <p style="text-align: center; justify-content: space-around;">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTelefones" aria-expanded="false" aria-controls="collapseExample" style="border-width: 10px; border-right: 100px;">
                Telefones
            </button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEnderecos" aria-expanded="false" aria-controls="collapseExample" style="border-width: 10px; border-right: 100px;">
                Endereços
            </button>
            </p>
            <div class="collapse" id="collapseTelefones">
                <div class="card card-body">
                Telefones
                    <ul>
                        <li>aaaaa</li>
                        <li>aaaaa</li>
                        <li>aaaaa</li>
                    </ul>
                </div>
            </div>
            <div class="collapse" id="collapseEnderecos">
                <div class="card card-body">
                Endereços
                    <ul>
                        <li>bbbbb</li>
                        <li>bbbbb</li>
                        <li>bbbbb</li>
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($contato->id) ? $contato->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-secondary">Limpar</button>
                <a class="btn btn-danger" href="?controller=ContatosController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>
