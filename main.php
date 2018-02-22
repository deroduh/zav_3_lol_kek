<?php 

require_once 'Db.php';

class Db_a {


	public static function getAll()
    {
        // Зєднання з БД
        $db = Db::getConnection();

        // Текст запиту до БД
        $sql = 'SELECT * FROM main';

        // Використовується підготований запит
        $result = $db->prepare($sql);

        // Вказання що вихідні дани потрібно оформити в вигляді масиву
      //  $result->setFetchMode(PDO::FETCH_ASSOC);

        // Виконання запиту
        $result->execute();

        // Повертання даних
        return $result->fetch();
    }
}


 $lol = new Db_a;


 $result = $lol->getAll();



 $myrow=mysql_fetch_array($result);

 echo ($myrow);