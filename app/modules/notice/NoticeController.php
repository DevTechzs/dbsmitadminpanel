<?php

/**  Current Version: 1.0.0
 *  Createdby : sumit (30/07/2024)
 *  Created On:
 *  Modified By: 
 *  Modified On:
 */

namespace app\modules\notice;
use app\core\Controller;
use app\modules\notice\classes\Notice;

class NoticeController implements Controller
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
        $viewpath = "../app/modules/notice/views/";

        switch ($page[0]) {
            case 'notice':
                load($viewpath . "notice.php");
                break;
                case 'calendar':
                    load($viewpath . "calendar.php");
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