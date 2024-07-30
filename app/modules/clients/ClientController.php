<?php

namespace app\modules\clients;

use app\core\Controller;
use app\modules\clients\classes\Client;
use app\modules\settings\classes\Server;

class ClientController implements Controller
{

    public function Route($data)
    {
        $jsondata = $data["JSON"];

        switch ($data["Page_key"]) {
            case 'Unsubscribe':
                return (new Client())->Unsubscribe($jsondata);

            case 'getClients':
                return (new Client())->getClients($jsondata);

            case 'addClient':
                return (new Client())->addClient($jsondata);

            case 'addClientSubscription':
                return (new Client())->addClientSubscription($jsondata);

            case 'deleteClient':
                return (new Client())->deleteClient($jsondata);

            case 'getAllServer':
                return (new Server())->getAllServer($jsondata);

            case 'getClient_subscription':
                return (new Client())->getClient_subscription($jsondata);

            case 'deleteClientSubscription':
                return (new Client())->deleteClientSubscription($jsondata);

            case 'getExpiredClients':
                return (new Client())->getExpiredClients($jsondata);

            case 'getActiveClients':
                return (new Client())->getActiveClients($jsondata);

            case 'getUnsubscribeClients':
                return (new Client())->getUnsubscribeClients($jsondata);

            case 'getMostSubscribeProduct':
                return (new Client())->getMostSubscribeProduct($jsondata);

            case 'getMostSubscribeClients':
                return (new Client())->getMostSubscribeClients($jsondata);

            case 'clientAboutToExpired':
                return (new Client())->clientAboutToExpired($jsondata);

            case 'getDomainNameById':
                return (new Client())->getDomainNameById($jsondata);    // added by dev on 26/10/23    

            case 'getPrayageduLeads':
                return (new Client())->getPrayageduLeads($jsondata);

            case 'getClientsBySubscriptionCode':
                return (new Client())->getClientsBySubscriptionCode($jsondata);

                // case 'getAPIByClientSubscriptionId':
                //     return (new Client())->getAPIByClientSubscriptionId($jsondata);

            case "getDataFromAPI":
                return (new Client())->getDataFromAPI($jsondata);

            case "sendotp":
                return (new Client())->sendotp($jsondata);

            case "deletePrayageduLeads":
                return (new Client())->deletePrayageduLeads($jsondata); //added by Devkanta on 16/02/2024

            case 'getPrayageduArchivedLeads':
                return (new Client())->getPrayageduArchivedLeads($jsondata); //added by Devkanta on 17/02/2024

            case 'restorePrayageduLeads':
                return (new Client())->restorePrayageduLeads($jsondata); //added by Devkanta on 21/02/2024


            case 'moveToRawLeads':
                return (new Client())->moveToRawLeads($jsondata); //added by Devkanta on 04/03/2024


            case 'changeactivestatus':
                return (new Client())->changeactivestatus($jsondata); //added by Devkanta on 14/03/2024

            case 'changeactivestatusContacted':
                return (new Client())->changeactivestatusContacted($jsondata); //added by Devkanta on 14/03/2024



            default:
                header('HTTP/1.1 401  Unauthorized Access');
                header("Status: 401 ");
                session_destroy();
                return array("return_code" => false, "return_data" => array("Page Key not found"));
        }
    }

    public static function Views($page)
    {

        $viewpath = "../app/modules/$page[0]/views/";

        switch ($page[1]) {

            case 'viewclient':
                load($viewpath . "viewclient.php");
                break;
            case 'clientsubscription':
                load($viewpath . "clientsubscription.php");
                break;
            case 'clientreport':
                load($viewpath . "clientReport.php");
                break;
            case 'invoice':
                load($viewpath . "invoice.php");
                break;

            case 'viewleads':
                load($viewpath . "viewleads.php");
                break;

            case "archivedleads":
                load($viewpath . "archivedleads.php"); //added by Devkanta on 16/02/2024
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
