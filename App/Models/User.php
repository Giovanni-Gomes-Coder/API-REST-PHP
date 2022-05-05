<?php
namespace App\Models;

class User
{
    private static $table = 'users';

    public static function select(int $id) {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }
    }

    public static function selectAll() {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM '.self::$table;
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }
    }

    public static function insert($data)
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'INSERT INTO '.self::$table.' (nome, idade, cpf, email) VALUES (:nome, :idade, :cpf, :email)';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':nome', $data['nome']);
        $stmt->bindValue(':idade', $data['idade']);
        $stmt->bindValue(':cpf', $data['cpf']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Usuário inserido com sucesso!';
        } else {
            throw new \Exception("Falha ao inserir usuário!");
        }
    }

    public static function update($data, $id)
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'UPDATE '.self::$table.' SET nome = :nome, idade = :idade, cpf = :cpf, email = :email WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $data['nome']);
        $stmt->bindValue(':idade', $data['idade']);
        $stmt->bindValue(':cpf', $data['cpf']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Usuário atualizado com sucesso!';
        } else {
            throw new \Exception("Falha ao atualizado usuário!");
        }
    }

    public static function delete($id)
    {
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'DELETE FROM '.self::$table.' WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Usuário excluído com sucesso!';
        } else {
            throw new \Exception("Falha ao excluir usuário!");
        }
    }
}