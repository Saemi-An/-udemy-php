<?php
// Fatal error: Namespace declaration statement has to be the very first statement or ...
// 해당 파일의 네임스페이스 먼저 선언 후, 해당 페이지에서 사용할 다른 네임스페이스 정의해 줘야함
namespace App\Repository;

use PDO;
use App\Model\PageModel;

class PagesRepository {

    public function __construct(private PDO $pdo){}
   
    // 어드민 전체 목록
    public function fetchAll(): array {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM `pages`
             ORDER BY `id` ASC"
        );
        $stmt->execute();
        $entries = $stmt->fetchALL(PDO::FETCH_CLASS, PageModel::class);

        return $entries;
    }

    // 프론트 네비게이션 바
    public function fetchForNav(): array {
        
        $stmt = $this->pdo->prepare(
            "SELECT `title`, `slug` FROM `pages`
             ORDER BY `id` ASC"
        );
        $stmt->execute();
        // fetch 데이터를 class로 변환
        $entries = $stmt->fetchAll(PDO::FETCH_CLASS, PageModel::class);
        
        return $entries;
    }

    // slug 기준 페이지 정보 가져오기
    public function fetchBySlug(string $slug): ?PageModel {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM `pages`
             WHERE `slug` = :slug"
        );
        $stmt->bindValue(':slug', $slug);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);
        $entry = $stmt->fetch();

        // 일치하는 slug 없는 경우
        if ( empty($entry) ) {
            return null;
        }
        // 일치하는 slug 페이지 컨텐츠가 있는 경우        
        return $entry;
        // $entries = $stmt->fetchAll(PDO::FETCH_CLASS, PageModel::class);
    }

    public function fetchById(int $id): ?PageModel {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM `pages`
             WHERE `id` = :id"
        );
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);
        $entry = $stmt->fetch();

        // 찾는 레코드가 없는 경우
        if ( empty($entry) ) {
            return null;
        }

        return $entry;
    }

    public function checkDuplicateSlug(string $slug): bool {
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(*) AS `cnt` FROM `pages`
             WHERE `slug` = :slug"
        );
        $stmt->bindValue(':slug', $slug);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return ( $result['cnt'] >= 1 );
    }

    public function create(string $title, string $slug, string $content) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO `pages` (`title`, `slug`, `content`)
             VALUES(:title, :slug, :content)"
        );
        $params = [
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
        ];
        // $stmt->bindValue(':title', $title);
        // $stmt->bindValue(':title', $title);
        // $stmt->bindValue(':title', $title);
        $stmt->execute($params);
    }

    public function update(int $id, string $title, string $slug, string $content) {
        $stmt = $this->pdo->prepare(
            "UPDATE `pages`
             SET `title` = :title, `slug` = :slug, `content` = :content
             WHERE `id` = :id"
        );
        $params = [
            'id' => $id,
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
        ];
        $result = $stmt->execute($params);
        // 업데이트 실패시 예외처리 필요
    }

    public function delete($id): bool {
        $stmt = $this->pdo->prepare(
            "DELETE FROM `pages`
             WHERE `id` = :id"
        );
        // bind 기본값이 string이기 때문에 타입 명시 필요
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ( empty($result) ) {
            return false;
        }

        return true;
    }

}