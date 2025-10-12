<?php
declare(strict_types=1);

// DB fetch & update 전용 클래스
class WorldCityRepository {

    public function __construct(private PDO $pdo) {}

    private function arrayToModel(array $entry): WorldCityModel {
        return new WorldCityModel(
            $entry['id'],
            $entry['city'],
            $entry['country'],
            $entry['population'],
            $entry['capital'],
            $entry['iso2'],
            $entry['iso3'],
            (float) $entry['lat'],
            (float) $entry['lng'],
            $entry['city_ascii'],
            $entry['admin_name'],
        );
    }

    public function fetch():array {
        // 데이터베이스에서 fetch
        $stmt = $this->pdo->prepare(
            "SELECT *
             FROM `worldcities`
             ORDER BY `population` DESC
             LIMIT 10;"
        );
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $city_ascii, $admin_name과 같은 컬럼명 naming convension이 php와 맞지 않는 관계로 사용 불가
        // $entries = $stmt->fetchAll(PDO::FETCH_CLASS, 'WorldCityModel');

        // 모델 속성명에 맞게 수동 변환
        $models = [];
        foreach( $entries AS $entry ) {
            // $models[] = $this->arrayToModel($entry);
            $models[] = new WorldCityModel(
                $entry['id'],
                $entry['city'],
                $entry['country'],
                $entry['population'],
                $entry['capital'],
                $entry['iso2'],
                $entry['iso3'],
                (float) $entry['lat'],
                (float) $entry['lng'],
                $entry['city_ascii'],
                $entry['admin_name'],
            );
        }

        return $models;
    }

    public function count(): int {
        $stmt = $this->pdo->prepare(
            "SELECT count(`city`) AS `cnt`
             FROM `worldcities`;"
        );
        $stmt->execute();
        $count = $stmt->fetch();
        return $count['cnt'];
    }

    public function paginate(int $crntPage, int $perPage = 15): array {
        // [예외 처리] 유효하지 않은 page의 경우 1로 설정
        $crntPage = max(1, $crntPage);
        
        // 1 페이지 요청옴 --> 0
        // 2 페이지 요청옴 --> 1 * 15
        // 3 페이지 요청옴 --> 2 * 15
        
        $stmt = $this->pdo->prepare(
            "SELECT *
             FROM `worldcities`
             ORDER BY `population` DESC
             LIMIT :perPage OFFSET :offset"
        );
        // 디폴트로 string이 bind되니 int임을 명시
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', ($crntPage - 1) * $perPage, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchall(PDO::FETCH_ASSOC);

        $ary = [];
        foreach ( $results AS $result ) {
            $ary[] = $this->arrayToModel($result);
        };

        return $ary;
    }

    public function fetchById(int $id): ?WorldCityModel {

        $stmt = $this->pdo->prepare(
            "SELECT *
             FROM `worldcities`
             WHERE `id` = :id"
        );
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( !empty($entry) ) {
            return $this->arrayToModel($entry);
        }

        // DB 조회 결과 id 존재하지 않을 경우 null 리턴
        return null;
    }

    public function update(int $id, array $properties): WorldCityModel {
        // 'city' => $city,
        // 'country' => $country,
        // 'iso2' => $iso2,
        // 'population' => $population,

        $stmt = $this->pdo->prepare(
            "UPDATE `worldcities`
             SET 
             `city` = :city,
             `country` = :country,
             `iso2` = :iso2,
             `population` = :population
             WHERE `id` = :id"
        );
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':city', $properties['city']);
        $stmt->bindValue(':country', $properties['country']);
        $stmt->bindValue(':iso2', $properties['iso2']);
        $stmt->bindValue(':population', $properties['population'], PDO::PARAM_INT);
        $stmt->execute();
    
        return $this->fetchById($id);
    }
}