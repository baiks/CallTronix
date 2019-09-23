<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class controller {

    public function route($page) {
        $func = new Functions();
        switch ($page) {
            case "usermanagement";
                include "./usermanagement.php";
                break;
            case "products";
                include "./products.php";
                break;
            case "ChangePassword";
                include "./ChangePassword.php";
                break;
            default;
                include "./Dashboardhtml.php";
                break;
        }
    }

}
