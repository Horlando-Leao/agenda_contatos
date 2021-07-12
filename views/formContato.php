<div class="container">
    <form action="?controller=ContatosController&<?php 
        echo isset($contato->id) ? "method=atualizar&id={$contato->id}" : "method=salvar";
        if(isset($contato->id)){
            $GLOBALS["id_contato"] = $contato->id;
        }
        ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Contato</span>
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
            <?php
             if(isset($contato->id)){
            echo('
            <p style="text-align: center; justify-content: space-between;">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTelefones" aria-expanded="false" aria-controls="collapseExample" style="border-width: 1px; border-right: 100px;">
                <i class="fas fa-phone"></i> Telefones
                </button>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEnderecos" aria-expanded="false" aria-controls="collapseExample" style="border-width: 1px; border-right: 100px;">
                <i class="fas fa-map-marker-alt"></i> Endereços
                </button>
            </p>
                ');
            }
            ?> 
            <div class="collapse" id="collapseTelefones">
                <div class="card card-body">
                <!-- <a href="?controller=TelefonesController&method=listar&idnow=<?php echo $contato->id; ?>" class="btn btn-success">Vamos Começar!</a> -->
                    
                    <?php
                    //include_once './controllers/TelefonesController.php';
                    $ListarTelefones = new TelefonesController();
                    $ListarTelefones->listar($contato->id);
                    ?>
                    </div>
            </div>
            <div class="collapse" id="collapseEnderecos">
                <div class="card card-body">
                <?php
                echo ("-aaaaaaaaa<br>-aaaaaa<br>-aaaaaaaa");
                ?>
                </div>
            </div>
            <div class="card-footer" style="margin-top: 40px;">
                <input type="hidden" name="id" id="id" value="<?php echo isset($contato->id) ? $contato->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-secondary">Limpar</button>
                <a class="btn btn-danger" href="?controller=ContatosController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>
