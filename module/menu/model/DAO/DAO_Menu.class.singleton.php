<?php

    class DAOMenu{
        function search($con){
            $nombre=$con['nombre'];
            $sql = "SELECT DISTINCT nombre FROM videogames WHERE nombre LIKE '%$nombre%'";
            
            $conexion = connect::con();
            $res = mysqli_query($conexion, $sql);
            connect::close($conexion);
            while($row = $res->fetch_array(MYSQLI_ASSOC)) {
                $resArray[] = $row;
            }
            return $resArray;
        }
    }