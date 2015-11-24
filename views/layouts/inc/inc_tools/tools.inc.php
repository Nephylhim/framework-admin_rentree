<?php
    /*
     * returns, from the defined MENU, the Item Name related to the current active page.
     * if the current script is not found into the MENU, the script name without extension is returned.
     */
    function get_currentPageName(& $project_menu) {
        $retunedValue = basename($_SERVER["SCRIPT_FILENAME"], '.php');

        if (isset($project_menu) == true and is_array($project_menu) == true) {
            foreach($project_menu as $menu_ITEM) {
                if (is_array($menu_ITEM) == true
                        and isset($menu_ITEM['item']) == true
                        and isset($menu_ITEM['action']) == true
                        and $menu_ITEM['action'] == basename($_SERVER["SCRIPT_FILENAME"])) {
                    $retunedValue = $menu_ITEM['item'];
                }
            }
        }

        return $retunedValue;
    }
?>
