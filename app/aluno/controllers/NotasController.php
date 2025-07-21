<?php
class NotasController 
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function mediaAluno($idAluno)
    {
        $stmt = $this->conexao->prepare(" CALL calcular_media_alunos(?)");
        $stmt->bind_param("i", $idAluno);
        return $stmt->execute();

    }

}

?>
