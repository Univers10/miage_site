<?php
        $len=8;
        $passwordGenerated="";
        $validChar= "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLWXCVBN1234567890";
        while (0<$len--){
            $passwordGenerated.=$validChar[random_int(0, strlen($validChar)-1)];
        }
?>