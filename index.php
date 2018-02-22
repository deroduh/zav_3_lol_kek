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


     public static function deleteRecordById($id)
    {
        // Зєднання з БД
        $db = Db::getConnection();

        // Текст запиту до БД
        $sql = 'DELETE FROM main WHERE WorkOrder_ID = :id';

        // Отримання і повернення результатів. Використовується підготований запит
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createRecord($param)
    {
        // Зєднання з БД
        $db = Db::getConnection();

        // Текст запиту до БД
        $sql = 'INSERT INTO main(`Subject`, `WorkOrder_ID`, `WorkOrder_URL`, `Description`, `Internal Description`, `Response/Solution`, `Assigned_to`, `Progress`, `Spec`, `QA`, `Project`, `Registration_Date`, `Estimated_Hours`, `Actual_Hours`, `Module`, `Started_Date`) '
                . 'VALUES ()';

        // Отримання і повернення результатів. Використовується підготований запит
        $result = $db->prepare($sql);
        return $result->execute();
    }
}


$id = 1213;


 //$result = Db_a::getRecordById($id);
//$result = Db_a::getRecordById($id);
//$lol = Db_a::createRecord($result);
$result = Db_a::deleteRecordById($id);



echo $result;
print $result;
var_dump($result);
 ?>




  <?php foreach ($result as $key => $value): ?>
                        <p><?php echo $key."=".$value; ?></p>
                      
                <?php endforeach; ?>

 