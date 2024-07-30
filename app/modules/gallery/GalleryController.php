<?php

/**  Current Version: 1.0.0
 *  Createdby : sumit (30/07/2024)
 *  Created On:
 *  Modified By: 
 *  Modified On:
 */

namespace app\modules\gallery;
use app\core\Controller;
use app\modules\gallery\classes\Gallery;

class GalleryController implements Controller
{
    function Route($data)
    {

        $jsondata = $data["JSON"];
        switch ($data["Page_key"]) {

                
        
            // case 'getAllLetters':
            //     return (new Letter())->getAllLetters();
            default:
                header('HTTP/1.1 401  Unauthorized Access');
                header("Status: 401 ");
                //session_destroy();
                return array("return_code" => false, "return_data" => array("Page Key not found"));
        }
    }

    static function Views($page)
    {
        $viewpath = "../app/modules/gallery/views/";

        switch ($page[0]) {
            case 'gallery':
                load($viewpath . "gallery.php");
                break;

          
            default:
                // session_destroy();
                include '404.php';
                header('HTTP/1.1 401  Unauthorized Access');
                header("Status: 401 ");
                break;
        }
    }
}