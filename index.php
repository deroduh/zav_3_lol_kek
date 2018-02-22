<?php 

require_once 'Db.php';

class Db_a {


	public static function getRecordById($id)
    {
        // Зєднання з БД
        $db = Db::getConnection();

        // Текст запиту до БД
        $sql = 'SELECT * FROM main WHERE `WorkOrder_ID` = :id';

        // Використовується підготований запит
        $result = $db->prepare($sql);
         $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Вказання що вихідні дани потрібно оформити в вигляді масиву
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Виконання запиту
        $result->execute();

        // Повертання даних

        return $result->fetch();
    }
    public static function getIds(){

        $db = Db::getConnection();

        // Запит до БД
        $result = $db->query('SELECT WorkOrder_ID FROM main ORDER BY WorkOrder_ID ASC ');
        // Отримання і повернення результатів
        $i = 0;
        $idsList = array();
        while ( $row = $result->fetch()) {
            $idsList[$i]['WorkOrder_ID'] = $row['WorkOrder_ID'];
            $i++;
        }
        return $idsList;
    }



    public static function createRecord($param)
    {
        // Зєднання з БД
        $db = Db::getConnection();

        // Текст запиту до БД
        $sql = 'INSERT INTO category (name, sort_order, status) '
                . 'VALUES (:name, :sort_order, :status)';

        // Отримання і повернення результатів. Використовується підготований запит
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}


$id = 1213;


 //$result = Db_a::getRecordById($id);
$result = Db_a::getIds();

echo $result;
print $result;
var_dump($result);
 ?>


  <?php foreach ($result as $key => $value): ?>
                        <p><?php echo $key."=".$value; ?></p>
                      
                <?php endforeach; ?>

 