
<?php
    class Autor {
        private $a_idAutor;
        private $a_nome;
        private $a_sobrenome;

        public function __construct($id, $nome, $sobrenome) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setSobrenome($sobrenome);
        }

        public function getId() {return $this->a_idAutor;}

        public function getNome() {return $this->a_nome;}

        public function getSobrenome() {return $this->a_sobrenome;}


        public function setId($id) {
                return $this->a_idAutor = $id;
           }

        public function setNome($nome) {
                return $this->a_nome = $nome;
            }

        public function setSobrenome($sobrenome) {
                return $this->a_sobrenome = $sobrenome;
            }
            
        


        public function inserir() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO Autor (a_nome, a_sobrenome) VALUES(:a_nome, :a_sobrenome)');
            $stmt->bindValue(':a_nome', $this->getNome());
            $stmt->bindValue(':a_sobrenome', $this->getSobrenome());

            return $stmt->execute();
        }

        public function editar($a_idAutor) {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE `autor` SET `a_nome` = :a_nome, `a_sobrenome` = :a_sobrenome WHERE (`a_idAutor` = :a_idAutor);");
            $stmt->bindValue(':a_idAutor', $this->setId($this->a_idAutor), PDO::PARAM_INT);
            $stmt->bindValue(':a_nome', $this->setNome($this->a_nome), PDO::PARAM_STR);
            $stmt->bindValue(':a_sobrenome', $this->setSobrenome($this->a_sobrenome), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function excluir($a_idAutor){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM autor WHERE a_idAutor = :a_idAutor');
            $stmt->bindValue(':a_idAutor', $a_idAutor);
            
            return $stmt->execute(); 
        }

        public function buscarAutor($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM Autor';
            if($id > 0){
                $query .= ' WHERE a_idAutor = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;

        }
    }

    ?>