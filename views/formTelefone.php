<div class="container">
    <form action="?controller=TelefonesController&<?php echo isset($telefone->id) ? "method=atualizar&id={$telefone->id}&id_contato={$id_contato}" : "method=salvar"; ?>" method="post" >
    <div class="card-header">
                <span class="card-title">Telefone</span>
            </div>
    <a class="btn btn-primary" href="?controller=ContatosController&method=editar&id=
    <?php 
        if(isset($id_contato["id_contato"])){
            echo intval($id_contato["id_contato"]); 
        }else{
            echo $id_contato;
        }
    ?>"><i class="far fa-user"></i> Voltar
    </a>
        <div class="card" style="top:40px">
       
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Telefone:</label>
                <input type="text" class="form-control col-sm-8" name="telefone" id="telefone" value="<?php
                echo isset($telefone->telefone) ? $telefone->telefone : null;
                ?>" />
            </div>

            <div class="form-check form-check-inline">
                <label class="col-sm-2 col-form-label text-right">Ativo:</label>
                <label class="form-check-label" for="exampleRadios1">Sim</label>
                <input type="radio" class="form-check-input" name="ativo" id="ativo" value="sim" 
                <?php 
                    if (isset($telefone->ativo)){
                        echo ($telefone->ativo == "sim") ? "checked" : null; 
                    }
                ?>/>
                <label class="form-check-label" for="exampleRadios1">Não</label>
                <input type="radio" class="form-check-input" name="ativo" id="ativo" value="não" 
                <?php 
                if (isset($telefone->ativo)){
                    echo ($telefone->ativo == "não") ? "checked" : null; 
                    }
                ?> />
                <input type="text" style="display: none;" name="id_contato" id="id_contato" value="<?php
                    if(isset($id_contato["id_contato"])){
                        echo intval($id_contato["id_contato"]); 
                    }else{
                        echo $id_contato;
                    }
                    //echo $id_contato["id_contato"];
                ?>" />

            </div>
            
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($telefone->id) ? $telefone->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <!-- <button class="btn btn-secondary">Limpar</button> -->
                <!-- <a class="btn btn-danger" href="?controller=EnderecosController&method=listar">Cancelar</a> -->
            </div>
        </div>
    </form>
</div>
