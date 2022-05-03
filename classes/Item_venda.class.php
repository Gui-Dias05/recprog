<?php
    class Item_venda {
        private $iv_v_idVenda;
        private $iv_l_idLivro;
        private $iv_quantidade;
        private $iv_valor_total_item;

        public function __construct($idV, $idL, $quant, $total) {
            $this->setIdV($idV);
            $this->setIdL($idL);
            $this->setQuant($quant);
            $this->setTotal($total);
           
        }

        public function getIdV() {return $this->iv_v_idVenda;}

        public function getIdL() {return $this->iv_l_idLivro;}

        public function getQuant() {return $this->iv_quantidade;}

        public function getTotal() {return $this->iv_valor_total_item;}


        public function setIdL($idL) {
                return $this->iv_l_idLivro = $idL;
            }

        public function setIdV($idV) {
                return $this->iv_v_idVenda = $idV;
            }

        public function setQuant($quant) {
                return $this->iv_quantidade = $quant;
            }

        public function setTotal($total) {
                return $this->iv_valor_total_item = $total;
            }

 
            public function inserir() {
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare('INSERT INTO `recuperacaoav01`.`Item_venda` (`iv_v_idVenda`, `iv_l_idLivro`, `iv_quantidade`, `iv_valor_total_item`) VALUES (:iv_v_idVenda, :iv_l_idLivro, :iv_quantidade, :iv_valor_total_item)');
                $stmt->bindValue(':iv_v_idVenda', $this->getIdV());
                $stmt->bindValue(':iv_l_idLivro', $this->getIdL());
                $stmt->bindValue(':iv_quantidade', $this->getQuant());
                $stmt->bindValue(':iv_valor_total_item', $this->getTotal());

                return $stmt->execute();
                
            
        }

        public function excluir($iv_v_idVenda, $iv_l_idLivro){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM Item_venda WHERE (iv_v_idVenda = :iv_v_idVenda) AND (iv_l_idLivro = :iv_l_idLivro)');
            $stmt->bindValue(':iv_v_idVenda', $iv_v_idVenda);
            $stmt->bindValue(':iv_l_idLivro', $iv_l_idLivro);
            return $stmt->execute();
        }

        public function adicionarItem($iv_v_idVenda, $iv_l_idLivro){

            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO `recuperacaoav01`.`Item_venda` (`iv_v_idVenda`, `iv_l_idLivro`, `iv_quantidade`, `iv_valor_total_item`) VALUES (:iv_v_idVenda, :iv_l_idLivro, :iv_quantidade, :iv_valor_total_item)');
                $stmt->bindValue(':iv_v_idVenda', $this->getIdV());
                $stmt->bindValue(':iv_l_idLivro', $this->getIdL());
                $stmt->bindValue(':iv_quantidade', $this->getQuant());
                $stmt->bindValue(':iv_valor_total_item', $this->getTotal());
                $stmt = $pdo->prepare('UPDATE `recuperacaoav01`.`Venda` (`iv_v_idVenda`, `iv_l_idLivro`, `iv_quantidade`, `iv_valor_total_item`) VALUES (:iv_v_idVenda, :iv_l_idLivro, :iv_quantidade, :iv_valor_total_item)');
                return $stmt->execute();
        }

    }

    ?>