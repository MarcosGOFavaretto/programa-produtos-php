<?php
class Banco
{
    // Declarando as variáveis:
    private $servidor;
    private $usuario;
    private $senha;
    private $bancodedados;
    public $nome;
    public $conexao;


    // Criando o método construtor da classe:
    public function __construct()
    {
        $this->servidor = "localhost:3307";
        $this->usuario = "root";
        $this->senha = "usbw";
        $this->bancodedados = "programa_produtos";
    }

    // Criando método para a conexão com o banco:
    public function conectarMySQL()
    {
        try {
            $this->conexao = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->bancodedados, $this->usuario, $this->senha);
            return $this->conexao;

            if ($this->conexao == TRUE) {
                echo "Conexao bem sucedida!";
            } else {
                echo "Conexao de dados mal - sucedida";
            }
        } catch (PDOException $erro_conectarMySQL) {
            echo "Problema ao tentar conectar ao banco, erro: $erro_conectarMySQL";
        }
    }

    public function validarUsuario($nome)
    {
        try {
            $con = mysqli_connect("$this->servidor", "$this->usuario", "$this->senha", "$this->bancodedados") or die("Conexão não realizada");
            $banco = mysqli_select_db($con, "$this->bancodedados") or die("Erro ao selecionar o banco");
            $sql_validarUsuario = "SELECT nome FROM tabela_usuarios_ WHERE nome = '$nome'";
            $consulta = mysqli_query($con, $sql_validarUsuario);

            if (mysqli_num_rows($consulta) > 0) {

                return "1";
            } else {
                return "0";
            }
        } catch (PDOException $erro_validarUsuario) {
            echo "Problema ao tentar validar o usuário, erro: $erro_validarUsuario";
        }
    }

    public function visualizarProdutos()
    {
        try {
            // Criando código SQL para a pesquisa:
            $sql_visualizarProdutos = 'SELECT * FROM tabela_produtos';

            // Preparando o statement:
            $stmt = $this->conectarMySQL()->prepare($sql_visualizarProdutos);
            $stmt->execute();

            echo '<div class="row">';
            echo '<div class="col-2"></div>';
            echo '<div class="col-md-8 col-xs-8">';
            echo '<table class="text-center mt-5" border="2" style="width: 100%">';
            echo '<tr>';
            echo '<th colspan="5">DADOS</th>';
            echo '</tr>';
            echo '<tr>';
            echo '<th>REGISTRO</th>';
            echo '<th>USUÁRIO</th>';
            echo '<th>PRODUTO</th>';
            echo '<th>FORNECEDOR</th>';
            echo '<th>QUANTIDADE</th>';
            echo '</tr>';

            // Criando linhas com os dados do banco:
            while ($resultadoVisualizarProdutos = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $id =  $resultadoVisualizarProdutos['id'];
                $nome_usuario =  $resultadoVisualizarProdutos['nome_usuario'];
                $nome_produto =  $resultadoVisualizarProdutos['nome_produto'];
                $nome_fornecedor =  $resultadoVisualizarProdutos['nome_fornecedor'];
                $quantidade =  $resultadoVisualizarProdutos['quantidade'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome_usuario</td>";
                echo "<td>$nome_produto</td>";
                echo "<td>$nome_fornecedor</td>";
                echo "<td>$quantidade</td>";
                echo '</tr>';
            }
            echo ' </table>';
            echo '</div>';
            echo '<div class="col-2"></div>';
            echo '</div>';
        } catch (PDOException $erro_visualizarProdutos) {
            echo "Problema ao tentar visualizar produtos, erro: $erro_visualizarProdutos";
        }
    }

    public function limparRegistros()
    {
        try {
            $sql_limparRegistros = "TRUNCATE TABLE tabela_produtos";
            $stmt = $this->conectarMySQL()->prepare($sql_limparRegistros);
            $stmt->execute();

            /*$sql_limparRegistros = "TRUNCATE TABLE tabela_usuarios";
            $stmt = $this->conectarMySQL()->prepare($sql_limparRegistros);*/

            if ($stmt->execute()) {
                return "1";
            } else {
                return "0";
            }
        } catch (PDOException $erro_limparRegistros) {
            echo "Problema ao tentar limpar os registros, erro: $erro_limparRegistros";
        }
    }

    public function loginSistema($email, $senha)
    {
        try {
            $con = mysqli_connect("$this->servidor", "$this->usuario", "$this->senha", "$this->bancodedados") or die("Conexão não realizada");
            $banco = mysqli_select_db($con, "$this->bancodedados") or die("Erro ao selecionar o banco");
            $sql_loginSistema = "SELECT nome FROM tabela_usuarios_ WHERE email = '$email' AND senha = '$senha'";
            $busca = mysqli_query($con, $sql_loginSistema);
            $resultado = mysqli_fetch_assoc($busca);
            $this->nome = $resultado['nome'];

            if (mysqli_num_rows($busca) > 0) {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                echo "<script>alert('Usuário reconhecido, bem - vindo $this->nome'); </script>";
                return "1";
            } else {
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                return "0";
            }
        } catch (PDOException $erro_loginSistema) {
            echo "Problema ao tentar logar no sistema, erro: $erro_loginSistema";
        }
    }

    public function getNome($email, $senha)
    {
        try {
            $con = mysqli_connect("$this->servidor", "$this->usuario", "$this->senha", "$this->bancodedados") or die("Conexão não realizada");
            $banco = mysqli_select_db($con, "$this->bancodedados") or die("Erro ao selecionar o banco");

            $sql_getNome = "SELECT nome FROM tabela_usuarios_ WHERE email = '$email' AND senha = '$senha'";
            $busca = mysqli_query($con, $sql_getNome);
            $resultado = mysqli_fetch_assoc($busca);
            $nome = $resultado['nome'];
            return $nome;
        } catch (PDOException $erro_getNome) {
            echo "Problema ao tentar receber o nome do usuário, erro: $erro_getNome";
        }
    }
}
