<?php

    Class Usuario
    {
        private $conect;

        public function conectar()
        {
            global $conect;
            $conect = new PDO("mysql:host=localhost;dbname=gado_sistema","root","vertrigo");
            $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function cadastrar($nome, $email, $senha)
        {
            global $conect;
            // Verificar se já existe e-mail cadastrado//
            $consulta = $conect->prepare("SELECT id_usuarios FROM usuarios WHERE BINARY email = :e");
            $consulta->bindValue(":e",$email);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return false;
            }
            else
            {
                $consulta = $conect->prepare("INSERT INTO usuarios (nome,email,senha) VALUES(:n, :e, :s)");
                $consulta->bindValue(":n",$nome);
                $consulta->bindValue(":e",$email);
                $consulta->bindValue(":s",md5($senha));
                $consulta->execute();
                return true;
            }
        }
        public function logar($email,$senha)
        {
            global $conect;
            $consulta = $conect->prepare("SELECT *FROM usuarios WHERE BINARY email = :e AND senha = :s");
            $consulta->bindValue(":e",$email);
            $consulta->bindValue(":s",md5($senha));
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                $dados = $consulta->fetch();
                session_start();
                $_SESSION['id_usuarios'] = $dados['id_usuarios'];
                $_SESSION['nome'] = $dados['nome'];
                $_SESSION['email'] = $dados['email'];
                return true;
            }
            else
            {
                return false;
            }
        }

        public function alterar($emailalterar, $id)
        {
            global $conect;
            // Verificar se já existe e-mail cadastrado//
            $consulta = $conect->prepare("SELECT id_usuarios FROM usuarios WHERE BINARY email=:e");
            $consulta->bindValue(":e",$emailalterar);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return false;
            }
            else
            {
                $consulta = $conect->prepare("UPDATE usuarios SET email=:e WHERE id_usuarios=:id");
                $consulta->bindValue(":e",$emailalterar);
                $consulta->bindValue(":id",$id);
                $consulta->execute();
                return true;
            }
        }

        public function alterarnome($nomealterar, $id)
        {
            global $conect;
            $consulta = $conect->prepare("UPDATE usuarios SET nome=:n  WHERE id_usuarios=:id");
            $consulta->bindValue(":n",$nomealterar);
            $consulta->bindValue(":id",$id);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;

            }
            
                
            
        }

        public function alterarsenha($senha_alterar, $id)
        {
            global $conect;
            $consulta = $conect->prepare("UPDATE usuarios SET senha=:s WHERE id_usuarios=:id");
            $consulta->bindValue(":s",md5($senha_alterar));
            $consulta->bindValue(":id",$id);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;

            }

        }
        public function delete($email_delete)
        {
            global $conect;
            try{
            $consulta = $conect->prepare("DELETE FROM usuarios WHERE email=:e");
            $consulta->bindValue(":e",$email_delete);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            }catch(Exception $e){
                return false;
            }

        }

        public function cadastrar_gado($tipo, $raça, $idade, $estado, $cidade, $preço, $quantidade, $peso, $telefone, $id)
        {
            global $conect;
            $consulta = $conect->prepare("INSERT INTO gado (tipo, raça, idade, estado, cidade, preço, quantidade, peso, telefone, id_usuarios)VALUES(:t, :r, :i, :e, :c, :p, :q, :pe, :te,:id)");
            $consulta->bindValue(":t",$tipo);
            $consulta->bindValue(":r",$raça);
            $consulta->bindValue(":i",$idade);
            $consulta->bindValue(":e",$estado);
            $consulta->bindValue(":c",$cidade);
            $consulta->bindValue(":p",$preço);
            $consulta->bindValue(":q",$quantidade);
            $consulta->bindValue(":pe",$peso);
            $consulta->bindValue(":te",$telefone);
            $consulta->bindValue(":id",$id);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;

            }
        }

        public function alterar_gado($tipo2, $raça2, $idade2, $estado2, $cidade2, $preço2, $quantidade2, $peso2, $telefone2, $id2)
        {
            global $conect;
            $consulta = $conect->prepare("UPDATE gado SET tipo=:t, raça=:r, idade=:i, estado=:e, cidade=:c, preço=:p, quantidade=:q, peso=:pe, telefone=:te WHERE id_gado=:id");
            $consulta->bindValue(":t",$tipo2);
            $consulta->bindValue(":r",$raça2);
            $consulta->bindValue(":i",$idade2);
            $consulta->bindValue(":e",$estado2);
            $consulta->bindValue(":c",$cidade2);
            $consulta->bindValue(":p",$preço2);
            $consulta->bindValue(":q",$quantidade2);
            $consulta->bindValue(":pe",$peso2);
            $consulta->bindValue(":te",$telefone2);
            $consulta->bindValue(":id",$id2);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;

            }
        }

        public function cadastrar_leilao($nome_leilao, $data, $local, $id)
        {
            global $conect;
            $consulta = $conect->prepare("INSERT INTO leilao (nome_leilao, data_leilao, localizacao, id_usuarios)VALUES(:n, :d, :l, :id)");
            $consulta->bindValue(":n",$nome_leilao);
            $consulta->bindValue(":d",$data);
            $consulta->bindValue(":l",$local);
            $consulta->bindValue(":id",$id);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;

            }

        }

        public function alterar_leilao($nome_leilao2, $data_leilao2, $local2, $id2)
        {
            global $conect;
            $consulta = $conect->prepare("UPDATE leilao SET nome_leilao=:n, data_leilao=:d, localizacao=:l WHERE id_leilao=:id");
            $consulta->bindValue(":n",$nome_leilao2);
            $consulta->bindValue(":d",$data_leilao2);
            $consulta->bindValue(":l",$local2);
            $consulta->bindValue(":id",$id2);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;

            }
        }
        public function cadastrar_vacina($nome_vacina, $data_aplicacao, $vacinados, $id)
        {
            global $conect;
            $consulta = $conect->prepare("INSERT INTO vacina (nome_vacina, data_aplicacao, vacinados, id_usuarios)VALUES(:n, :d, :v, :id)");
            $consulta->bindValue(":n",$nome_vacina);
            $consulta->bindValue(":d",$data_aplicacao);
            $consulta->bindValue(":v",$vacinados);
            $consulta->bindValue(":id",$id);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;

            }

        }

        public function alterar_vacina($nome_vacina2, $data_aplicacao2, $vacinados2, $id2)
        {
            global $conect;
            $consulta = $conect->prepare("UPDATE vacina SET nome_vacina=:n, data_aplicacao=:d, vacinados=:v WHERE id_vacina=:id");
            $consulta->bindValue(":n",$nome_vacina2);
            $consulta->bindValue(":d",$data_aplicacao2);
            $consulta->bindValue(":v",$vacinados2);
            $consulta->bindValue(":id",$id2);
            $consulta->execute();
            if($consulta->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;

            }
        }
        
    }

?>