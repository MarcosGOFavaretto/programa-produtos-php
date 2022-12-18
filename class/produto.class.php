<?php
require_once("class/banco.class.php");
class Produto
{
    private $conexao;
    private $nomeUsuario;
    private $nomeProduto;
    private $nomeFornecedor;
    private $quantidade;

    // Criando o método construtor da classe:
    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Criando método para cadastrar as informações da URL da página no banco de dados:
    public function cadastrarDados($dados)
    {
        session_start();
        try {
            
            $email = $_SESSION['email'];
            $senha = $_SESSION['senha'];
            $nome = $this->conexao->getNome($email,$senha);
            $resultadoConsulta = $this->conexao->validarUsuario($nome);
            
            if ($resultadoConsulta == 1) {
                $this->nomeUsuario = $nome;
                $this->nomeProduto = $dados['txtProduto'];
                $this->nomeFornecedor = $dados['txtFornecedor'];
                $this->quantidade = $dados['txtQuantidade'];

                $sql = $this->conexao->conectarMySQL()->prepare("INSERT INTO tabela_produtos(nome_usuario,nome_produto,nome_fornecedor,quantidade) VALUES (?,?,?,?);");
                $sql->bindParam(1, $this->nomeUsuario);
                $sql->bindParam(2, $this->nomeProduto);
                $sql->bindParam(3, $this->nomeFornecedor);
                $sql->bindParam(4, $this->quantidade);

                if ($sql->execute()) {
                    return "1";
                } else {
                    return "0";
                }
            } else {
                return "Usuário não foi reconhecido";
            }
        } catch (PDOException $erro) {
            return "ERRO: " . $erro->getMessage();
        }
    }
}
