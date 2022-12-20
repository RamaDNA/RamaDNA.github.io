<?php

// use function PHPSTORM_META\type;
        $type = $_GET['type'];
        $itemProvincep = $_GET['itemProvince'];

        switch ($type){

            case 1 :
                if ($itemProvincep=="jakarta") {
                    # code...
                    echo"<option value='Jaktim'> JakTim </option>";
                    echo"<option value='Jakpus'> Jakpus </option>";
                }else if ($itemProvincep=="jawa barat"){
                    echo"<option value='Bandung'> Bandung </option>";
                    echo"<option value='Bogor'> Bogor </option>";
                }
                break;
                default;
        }

         ?>