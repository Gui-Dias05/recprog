<?php
    class Cliente {
        private $c_idCliente;
        private $c_nome;
        private $c_cpf;
        private $c_dt_nascimento;

        public function __construct($id, $nome, $cpf, $data) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setCPF($cpf);
            $this->setData($data);
        }

        public function getId() {return $this->c_idCliente;}

        public function getNome() {return $this->c_nome;}

        public function getCPF() {return $this->c_cpf;}

        public function getData() {return $this->c_dt_nascimento;}


        public function setId($id) {
                return $this->c_idCliente = $id;
           }

        public function setNome($nome) {
                return $this->c_nome = $nome;
            }

        public function setCPF($cpf) {
                return $this->c_cpf = $cpf;
            }

        public function setData($data) {
                return $this->c_dt_nascimento = $data;
            }
            
        


        public function inserir() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO Cliente (c_nome, c_cpf, c_dt_nascimento) VALUES(:c_nome, :c_cpf, :c_dt_nascimento)');
            $stmt->bindValue(':c_nome', $this->getNome());
            $stmt->bindValue(':c_cpf', $this->getCPF());
            $stmt->bindValue(':c_dt_nascimento', $this->getData());
            
            return $stmt->execute();
        }

        public function editar($c_idCliente) {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE `Cliente` SET `c_nome` = :c_nome, `c_cpf` = :c_cpf, `c_dt_nascimento` = :c_dt_nascimento  WHERE (`c_idCliente` = :c_idCliente);");
            $stmt->bindValue(':c_idCliente', $this->setId($this->c_idCliente), PDO::PARAM_INT);
            $stmt->bindValue(':c_nome', $this->setNome($this->c_nome), PDO::PARAM_STR);
            $stmt->bindValue(':c_cpf', $this->setCPF($this->c_cpf), PDO::PARAM_STR);
            $stmt->bindValue(':c_dt_nascimento', $this->setData($this->c_dt_nascimento), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function excluir($c_idCliente){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM Cliente WHERE c_idCliente = :c_idCliente');
            $stmt->bindValue(':c_idCliente', $c_idCliente);
            
            return $stmt->execute();
        }

        public function buscar($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM Cliente';
            if($id > 0){
                $query .= ' WHERE c_idCliente = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;

        }
    }

    ?>