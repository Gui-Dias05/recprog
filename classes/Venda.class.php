<?php
    class Venda {
        private $v_idVenda;
        private $v_valor_total_venda;
        private $v_desconto;
        private $v_c_idCliente;
        private $iv_data_venda;

        public function __construct($id, $valor, $desconto, $idCliente, $data) {
            $this->setId($id);
            $this->setValor($valor);
            $this->setDesconto($desconto);
            $this->setCliente($idCliente);
            $this->setData($data);
        }

        public function getId() {return $this->v_idVenda;}

        public function getValor() {return $this->v_valor_total_venda;}

        public function getDesconto() {return $this->v_desconto;}

        public function getCliente() {return $this->v_c_idCliente;}

        public function getData() {return $this->iv_data_venda;}



        public function setId($id) {
                return $this->v_idVenda = $id;
           }

        public function setValor($valor) {
                return $this->v_valor_total_venda = $valor;
            }

        public function setDesconto($desconto) {
                return $this->v_desconto = $desconto;
            }

        public function setCliente($idCliente) {
                return $this->v_c_idCliente = $idCliente;
            }

        public function setData($data) {
                return $this->iv_data_venda = $data;
            }

       

        public function inserir() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO Venda (v_valor_total_venda, v_desconto, v_c_idCliente, iv_data_venda) VALUES(:v_valor_total_venda, :v_desconto, :v_c_idCliente, :iv_data_venda)');
            $stmt->bindValue(':v_valor_total_venda', $this->getValor());
            $stmt->bindValue(':v_desconto', $this->getDesconto());
            $stmt->bindValue(':v_c_idCliente', $this->getCliente());
            $stmt->bindValue(':iv_data_venda', $this->getData());
            
            return $stmt->execute();
        }

        public function editar($v_idVenda) {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE `Venda` SET `v_valor_total_venda` = :v_valor_total_venda, `v_desconto` = :v_desconto, `v_c_idCliente` = :v_c_idCliente, `iv_data_venda` = :iv_data_venda WHERE (`v_idVenda` = :v_idVenda);");
            $stmt->bindValue(':v_idVenda', $this->setId($this->v_idVenda), PDO::PARAM_INT);
            $stmt->bindValue(':v_valor_total_venda', $this->setValor($this->v_valor_total_venda), PDO::PARAM_STR);
            $stmt->bindValue(':v_desconto', $this->setDesconto($this->v_desconto), PDO::PARAM_STR);
            $stmt->bindValue(':v_c_idCliente', $this->setCliente($this->v_c_idCliente), PDO::PARAM_STR);
            $stmt->bindValue(':iv_data_venda', $this->setData($this->iv_data_venda), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function excluir($v_idVenda){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM venda WHERE v_idVenda = :v_idVenda');
            $stmt->bindValue(':v_idVenda', $v_idVenda);
            
            return $stmt->execute();
        }

       
        public function buscarVenda($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM Venda';
            if($id > 0){
                $query .= ' WHERE v_idVenda = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;

        }
    }

    ?>