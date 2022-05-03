
<?php
    class Livro_Autor {
        private $la_l_idLivro;
        private $la_a_idAutor;

        public function __construct($idL, $idA) {
            $this->setIdL($idL);
            $this->setIdA($idA);
           
        }

        public function getIdL() {return $this->la_l_idLivro;}

        public function getIdA() {return $this->la_a_idAutor;}

        public function setIdL($idL) {
                return $this->la_l_idLivro = $idL;
            }

        public function setIdA($idA) {
                return $this->la_a_idAutor = $idA;
            }



        public function inserir() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO Livro_Autor (la_l_idLivro, la_a_idAutor) VALUES(:la_l_idLivro, :la_a_idAutor)');
            $stmt->bindValue(':la_l_idLivro', $this->getIdL());
            $stmt->bindValue(':la_a_idAutor', $this->getIdA());
            
            return $stmt->execute();
        }

         public function editar($la_l_idLivro, $la_a_idAutor) {
             $pdo = Conexao::getInstance();
             $stmt = $pdo->prepare("UPDATE `Livro_Autor` SET `la_l_idLivro` = :la_l_idLivro, `la_a_idAutor` = :la_a_idAutor WHERE (`la_l_idLivro` = ':la_l_idLivro') and (`la_a_idAutor` = ':la_l_idLivro')");
             $stmt->bindValue(':la_l_idLivro', $this->setIdL($this->la_l_idLivro), PDO::PARAM_INT);
             $stmt->bindValue(':la_a_idAutor', $this->setIdA($this->la_a_idAutor), PDO::PARAM_STR);
             return $stmt->execute();
         }

        public function excluir($la_l_idLivro, $la_a_idAutor){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM Livro_Autor WHERE (la_l_idLivro = :la_l_idLivro) AND (la_a_idAutor = :la_a_idAutor)');
            $stmt->bindValue(':la_l_idLivro', $la_l_idLivro);
            $stmt->bindValue(':la_a_idAutor', $la_a_idAutor);
            
            return $stmt->execute();
        }

    }

    ?>