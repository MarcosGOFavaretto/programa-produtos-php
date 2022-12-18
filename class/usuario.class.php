<?php
require_once("class/banco.class.php");
class Usuario
{
    private $conexao;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $rg;
    private $cpf;

    // Criando método construtor da classe:
    public function __construct()
    {
        $this->conexao = new Banco();
    }

    // Criando método para o cadastro do usuário:
    public function cadastrarUsuario($dados)
    {
        try {
            $this->nome = $dados['txtNome'];
            $this->email = $dados['txtEmail'];
            $this->senha = $dados['txtSenha'];
            $this->telefone = $dados['txtTelefone'];
            $this->rg = $dados['txtRG'];
            $this->cpf = $dados['txtCPF'];

            $sql = $this->conexao->conectarMySQL()->prepare("INSERT INTO tabela_usuarios_ (nome,email,senha,telefone,rg,cpf) VALUES (?,?,?,?,?,?);");
            $sql->bindParam(1, $this->nome);
            $sql->bindParam(2, $this->email);
            $sql->bindParam(3, $this->senha);
            $sql->bindParam(4, $this->telefone);
            $sql->bindParam(5, $this->rg);
            $sql->bindParam(6, $this->cpf);

            if ($sql->execute()) {
                return "1";
            } else {
                return "0";
            }
        } catch (PDOException $erro_cadastrarUsuario) {
            return "Problema ao tentar gravar o usuário, erro: $erro_cadastrarUsuario";
        }
    }

    public function getNome($email, $senha)
    {
        try {
            $nome = $this->conexao->getNome($email, $senha);
            return $nome;
        } catch (PDOException $erro_getNome) {
            echo "Problema ao tentar receber o nome do usuário, erro: $erro_getNome";
        }
    }
}
