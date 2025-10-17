<?php
namespace App\Repository;

use PDO;
use App\Model\PageModel;

class PagesRepository {

    public function __construct(private PDO $pdo) {}

    public function fetchForNav(): array {
        $stmt = $this->pdo->prepare('SELECT `title`, `slug` FROM `pages`');
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_CLASS, PageModel::class);
        return $entries;
    }

    public function fetchBySlug(string $slug): bool|PageModel {
        $stmt = $this->pdo->prepare(
            "SELECT *
             FROM `pages`
             WHERE `slug` = :slug"
        );
        $stmt->bindValue(':slug', $slug);
        $stmt->execute();
        
        // 인스턴스 하나만 fetch 할때
        $stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);
        $entries = $stmt->fetch();

        // 다수의 인스턴스 fetch 할때
        // $entries = $stmt->fetchAll(PDO::FETCH_CLASS, PageModel::class);

        return $entries;

    }

}