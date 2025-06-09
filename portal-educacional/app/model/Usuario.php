<?php
namespace App\Model;

use App\Core\BaseModel;
use PDO;

class Usuario extends BaseModel
{
    public static function salvar($dados) {
        if (isset($dados['id']) && !empty($dados['id'])) {
            return self::atualizar($dados['id'], $dados);
        } else {
            $sql = "INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento, tipo)
                    VALUES (?, ?, ?, ?, ?, 'comum')";
            $senhaHash = password_hash($dados['senha'], PASSWORD_DEFAULT);
            return self::executar($sql, [
                $dados['nome'], $dados['email'], $senhaHash,
                $dados['cpf'], $dados['data_nascimento']
            ]);
        }
    }

    public static function verificarLogin($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $usuario = self::buscarUm($sql, [$email]);
        return ($usuario && password_verify($senha, $usuario['senha'])) ? $usuario : false;
    }

    public static function listarUsuarios() {
        $sql = "SELECT * FROM usuarios";
        return self::buscarTodos($sql);
    }

    public static function buscarPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        return self::buscarUm($sql, [$id]);
    }

    public static function atualizar($id, $dados) {
        $sql = "UPDATE usuarios
                SET nome = ?, email = ?, cpf = ?, data_nascimento = ?
                WHERE id = ?";
        return self::executar($sql, [
            $dados['nome'], $dados['email'],
            $dados['cpf'], $dados['data_nascimento'], $id
        ]);
    }

    public static function deletar($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        return self::executar($sql, [$id]);
    }

    public static function buscarPorCpfData($cpf, $data_nascimento) {
        $sql = "SELECT * FROM usuarios WHERE cpf = ? AND data_nascimento = ?";
        return self::buscarUm($sql, [$cpf, $data_nascimento]);
    }

    public static function atualizarSenha($id, $novaSenha) {
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
        return self::executar($sql, [$senhaHash, $id]);
    }

    // NOVO: Salva o token de recuperação de senha no banco
    public static function salvarTokenRecuperacao($id, $token) {
        $sql = "UPDATE usuarios SET token_recuperacao = ? WHERE id = ?";
        return self::executar($sql, [$token, $id]);
    }

    // NOVO: Atualiza senha a partir do token
    public static function atualizarSenhaPorToken($token, $novaSenha) {
        $usuario = self::buscarUm("SELECT * FROM usuarios WHERE token_recuperacao = ?", [$token]);
        if ($usuario) {
            $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET senha = ?, token_recuperacao = NULL WHERE id = ?";
            return self::executar($sql, [$senhaHash, $usuario['id']]);
        }
        return false;
    }
}
