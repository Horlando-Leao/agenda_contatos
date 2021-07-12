<?php
class View {
    public function load($model, $acao, $data = null){
        include("views/$model/$acao.php");
    }
} 

?>