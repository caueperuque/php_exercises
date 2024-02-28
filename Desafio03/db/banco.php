<?php
function alertaErro($msg){
        ?>
        <script>alert("<?php echo $msg; ?>")</script>
        <?php
}

class Crud {
    var $servidor = "localhost"; 
    var $usuario = "root";
    var $senha = "";
    var $bd = "db_currencies"; 
    var $link = ""; 
    
    var $mostraerro = true;

    function __construct() {
        $this->conecta();
    }
    
    /**
    Abre a conexão com o banco de dados
    */
    function conecta(){
        $this->link = new mysqli($this->servidor,$this->usuario,$this->senha,$this->bd);
        mysqli_set_charset($this->link,'utf8');
        if (mysqli_connect_errno()) {
            printf("Falha ao se conectar com o banco de dados: %s\n", mysqli_connect_error());
            exit();
        }
    }
    
    /**
    função retornar o resultado
    */
    function get_result( $Statement ) {
        $RESULT = array();
        $Statement->store_result();
        for ( $i = 0; $i < $Statement->num_rows; $i++ ) {
            $Metadata = $Statement->result_metadata();
            $PARAMS = array();
            while ( $Field = $Metadata->fetch_field() ) {
                $PARAMS[] = &$RESULT[ $i ][ $Field->name ];
            }
            call_user_func_array( array( $Statement, 'bind_result' ), $PARAMS );
            $Statement->fetch();
        }
        return $RESULT;
    }
    
     /**
    função type retorna o tipo do valor inserido
    */
    function type($args = [], $bind = false){
        $type = $binds = "";    
        $i = 1;
        if(($args) != ""){
            foreach($args as $valor){
                switch(gettype($valor)){
                    case 'integer':
                        $type .= 'i';
                        break;
                    case 'double':
                        $type .= 'd';
                        break;
                    case 'string':
                            $type .= 's';
                        break;
                    default:
                        $type .= 's';
                        break;  
                }   
                $binds .= "?";
                if($i < count($args)){
                    $binds .= ", ";     
                }
                $i++;
            }
        }
        if($bind){
            return $binds;  
        }
        return $type;
    }

    /**
    função parametros retorna os valores inseridos
    */
    function parametros($args=[], $sec=false){  
        $type = $this->type($args);    
        $parametro[] = &$type;
        if(($args) != ""){
            foreach($args as $key=>$valor){
                $parametro[] =& $args[$key];    
            }   
        }
        if($sec){
            $campos = implode(', ', array_keys($args)); 
            return $campos; 
        }
        return $parametro;
    }

    /**
    função tratar retorna os atributos da query inserida
    */
    function tratar($atributos){
        $tamanho = count($atributos);
        $str = "";
        for ($i = 0; $i < $tamanho; $i++) {
                $str .= $atributos[$i];
                if ($i < $tamanho - 1) {
                    $str .= ",";
                }
        }
        return $str;
    }
    
    /**
    BuscaAtributos parametros uma busca rapida de um tabela não use passando parametros
    */
    function BuscaAtributos($atributos,$tabela) {
        
        $sql = "select $atributos from " .($tabela);
        
        if($prepare = $this->link->prepare($sql)){
                if($prepare->execute()){
                    $result = $this->get_result($prepare);
                    if(!empty($result)){
                        return  ($result);
                    }else{
                        return NULL;
                    }
                }
        } else {
             if($this->mostraerro == TRUE){
                alertaErro("Erro: (prepare)" . $this->link->error); 
                die("Erro: (prepare)" . $this->link->error); exit;   
             }
             return FALSE;
        }
        
    }
    
    
    /*
    novo metodo mais seguro passe o seu SQL completo e os valores a serem substituidos
    */
    public function Consulta($sql,$valores){
        
        $sql = "select * from ".$sql;        
        if($prepare = $this->link->prepare($sql)){
            if(call_user_func_array(array($prepare, "bind_param"), $this->parametros($valores))){
                if($prepare->execute()){
                    //$prepare->bind_result($result);
                    /* fetch value */
                    $result = $this->get_result($prepare);
                    if(!empty($result)){
                        return  ($result);
                    }else{
                        return NULL;
                    }
                }
            } else {
                alertaErro("Erro: (prepare)" . $this->link->error);
                die("Erro (execute): " . $this->link->error); exit;
                return FALSE;
            }
        } else {
             if($this->mostraerro == TRUE){
                alertaErro("Erro: (prepare)" . $this->link->error);
                die("Erro: (prepare)" . $this->link->error); exit;   
             }
             return FALSE;
        }
        
    }

    /**
        ContaColunas retorna a quantidade de colunas da tabela passada por parâmetro
    */
    
    function ContaColunas($tabela)
    {
        $sql = "SHOW COLUMNS FROM ".$tabela;
        if($prepare = $this->link->prepare($sql)){
                if($prepare->execute()){
                    $result = $this->get_result($prepare);
                    if(!empty($result)){
                        return (count($result));
                    }else{
                        return NULL;
                    }
                }
        }
    }
    
    function desconecta(){
        $this->link->close();
    }
    
    function __destruct() {
        $this->desconecta();
    }
	
	public function execute($query){
        return mysqli_query($this->link, $query);
    }
    
}
