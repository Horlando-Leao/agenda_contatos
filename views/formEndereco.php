<div class="container">
    <form action="?controller=EnderecosController&<?php echo isset($endereco->id) ? "method=atualizar&id={$endereco->id}&id_contato={$id_contato}" : "method=salvar"; ?>" method="post" >
    
    <div class="card-header">
                <span class="card-title">Endereços</span>
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
                <label class="col-sm-2 col-form-label text-right">Cep:</label>
                <input type="text" class="form-control col-sm-8" name="cep" id="cep" value="<?php
                echo isset($endereco->cep) ? $endereco->cep : null;
                ?>" />
                <!-- <button class="btn btn-primary" ><i class="fas fa-search"></i></button> -->
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Pais:</label>
                <input type="text" class="form-control col-sm-8" name="pais" id="pais" value="<?php
                echo isset($endereco->pais) ? $endereco->pais : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">UF:</label>
                <input type="text" class="form-control col-sm-8" name="uf" id="uf" value="<?php
                echo isset($endereco->uf) ? $endereco->uf : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Cidade:</label>
                <input type="text" class="form-control col-sm-8" name="localidade" id="localidade" value="<?php
                echo isset($endereco->localidade) ? $endereco->localidade : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Bairro:</label>
                <input type="text" class="form-control col-sm-8" name="bairro" id="bairro" value="<?php
                echo isset($endereco->bairro) ? $endereco->bairro : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Logradouro:</label>
                <input type="text" class="form-control col-sm-8" name="logradouro" id="logradouro" value="<?php
                echo isset($endereco->logradouro) ? $endereco->logradouro : null;
                ?>" />
            </div>

            <div class="form-check form-check-inline">
                
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
                <input type="hidden" name="id" id="id" value="<?php echo isset($endereco->id) ? $endereco->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <!-- <button class="btn btn-secondary">Limpar</button> -->
                <!-- <a class="btn btn-danger" href="?controller=EnderecosController&method=listar">Cancelar</a> -->
            </div>
        </div>
    </form>
</div>
<script src="services/JavaScripts/viacep.js"></script>