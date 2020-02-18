<?php

    use \PHP2\Homework_2\classes as HW2;

    spl_autoload_register(function ($className){
        $path = explode('\\',$className);
        $className = $path[count($path)-1];
        include "classes/$className.php";
    });

    new HW2\DigitalItem(5);
    new HW2\PhysicalUnitItem(5);
    new HW2\PhysicalWeightItem(15, 10);

    $conn1 = HW2\DB::getObject();
    $conn2 = HW2\DB::getObject();

    echo "Сравнивание подключения<br>";
    echo '$conn1 === $conn2 '. ($conn1 === $conn2?'True':'False');
    echo "<br><br>";
    echo "Сравнивание подключения<br>spl_object_id<br>";
    echo '$conn1 id = '. spl_object_id ( $conn1 );
    echo "<br>";
    echo '$conn1 id = '. spl_object_id ( $conn2 );
    echo "<br>";
    echo "Сравнивание подключения<br>spl_object_hash<br>";
    echo '$conn1 hash = '. spl_object_hash ( $conn1 );
    echo "<br>";
    echo '$conn1 hash = '. spl_object_hash ( $conn2 );
    echo "<br>";