
<?php
    class Livro {
        private $l_idLivro;
        private $l_titulo;
        private $l_ano_publicacao;
        private $l_isdn;
        private $l_preco;

        public function __construct($id, $titulo, $ano, $isdn, $preco) {
            $this->setId($id);
            $this->setTitulo($titulo);
            $this->setAno($ano);
            $this->setIsdn($isdn);
            $this->setPreco($preco);
        }

        public function getId() {return $this->l_idLivro;}

        public function getTitulo() {return $this->l_titulo;}

        public function getAno() {return $this->l_ano_publicacao;}

        public function getIsdn() {return $this->l_isdn;}

        public function getPreco() {return $this->l_preco;}


        public function setId($id) {
                return $this->l_idLivro = $id;
           }

        public function setTitulo($titulo) {
                return $this->l_titulo = $titulo;
            }

        public function setAno($ano) {
                return $this->l_ano_publicacao = $ano;
            }

        public function setIsdn($isdn) {
                return $this->l_isdn = $isdn;
            }

        public function setPreco($preco) {
                return $this->l_preco = $preco;
            }

        public function inserir() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO Livro (l_titulo, l_ano_publicacao, l_isdn, l_preco) VALUES(:l_titulo, :l_ano_publicacao, :l_isdn, :l_preco)');
            $stmt->bindValue(':l_titulo', $this->getTitulo());
            $stmt->bindValue(':l_ano_publicacao', $this->getAno());
            $stmt->bindValue(':l_isdn', $this->getIsdn());
            $stmt->bindValue(':l_preco', $this->getPreco());
            
            return $stmt->execute();
        }

        public function editar($l_idLivro) {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE `livro` SET `l_titulo` = :l_titulo, `l_ano_publicacao` = :l_ano_publicacao, `l_isdn` = :l_isdn, `l_preco` = :l_preco WHERE (`l_idLivro` = :l_idLivro);");
            $stmt->bindValue(':l_idLivro', $this->setId($this->l_idLivro), PDO::PARAM_INT);
            $stmt->bindValue(':l_titulo', $this->setTitulo($this->l_titulo), PDO::PARAM_STR);
            $stmt->bindValue(':l_ano_publicacao', $this->setAno($this->l_ano_publicacao), PDO::PARAM_STR);
            $stmt->bindValue(':l_isdn', $this->setIsdn($this->l_isdn), PDO::PARAM_STR);
            $stmt->bindValue(':l_preco', $this->setPreco($this->l_preco), PDO::PARAM_STR);
            return $stmt->execute();
        }

        public function excluir($l_idLivro){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM livro WHERE l_idLivro = :l_idLivro');
            $stmt->bindValue(':l_idLivro', $l_idLivro);
            
            return $stmt->execute();
        }

        public function buscarLivro($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM Livro';
            if($id > 0){
                $query .= ' WHERE l_idLivro = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;

        }
    }

    ?>