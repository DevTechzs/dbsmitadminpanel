<?php

namespace app\modules\clients\classes;

use app\database\DBController;
use \app\database\Helper;

class Client
{


    function clientAboutToExpired()
    {
        $query = "SELECT c.ClientName,p.Name,ps.SubscriptionName,cs.Enddate,cs.Amount,cs.Installment,cs.NextDueDate, DATEDIFF(EndDate,CURDATE()) AS daysleft 
        FROM `ClientSubscriptions` cs 
        INNER JOIN Clients c on cs.ClientID=c.ClientID
        INNER JOIN Products p on cs.ProductID=p.ProductID
        INNER JOIN ProductSubscriptions ps on cs.ProductSubscriptionID=ps.ProductSubscriptionID
        where EndDate > CURDATE();";
        $notices = DBController::getDataSet($query);
        if ($notices) {
            return array("return_code" => true, "return_data" =>  $notices);
        }
        return array("return_code" => false, "return_data" => "No Data found!");
    }


    function getMostSubscribeClients()
    {
        $query = "SELECT c.ClientName,c.MobileNo,sts.StateName,std.DistrictName, count(cs.clientID) as numberofsubscribe
        FROM Clients c 
        INNER JOIN ClientSubscriptions cs on c.ClientID=cs.ClientID
        INNER JOIN Settings_state sts on c.StateID=sts.StateID
        INNER JOIN Settings_District std on c.DistrictID=std.DistrictID
        GROUP BY cs.ClientID
        ORDER BY SUM(cs.ClientID) DESC;";
        $notices = DBController::getDataSet($query);
        if ($notices) {
            return array("return_code" => true, "return_data" =>  $notices);
        }
        return array("return_code" => false, "return_data" => "No Data found!");
    }

    function getMostSubscribeProduct()
    {
        $query = "SELECT
                p.Name,p.Code,p.isActive,p.Website, count(c.productID) as numberofsubscribe
                FROM
                ClientSubscriptions c inner join Products p on c.ProductID=p.ProductID
                GROUP BY
                c.productID
                ORDER BY
                SUM(c.productID) DESC;";
        $notices = DBController::getDataSet($query);
        if ($notices) {
            return array("return_code" => true, "return_data" =>  $notices);
        }
        return array("return_code" => false, "return_data" => "No Data found!");
    }

    function getUnsubscribeClients()
    {
        $query = "SELECT c.`ClientName`,p.`Name`,ps.`SubscriptionName`,cs.`MaxUsers`,cs.`Remarks`,cs.`Installment`,cs.`Amount`,cs.`NextDueAmount`,cs.`NextDueDate`,cs.`SubscriptionEndReason`,cs.`SubscriptionEndedDateTime`
                from ClientSubscriptions cs inner join Clients c on cs.ClientID=c.ClientID 
                inner JOIN Products p on cs.ProductID=p.ProductID
                inner join ProductSubscriptions ps on cs.ProductSubscriptionID=ps.ProductSubscriptionID
                where `isSubscriptionEnded`=1;";
        $notices = DBController::getDataSet($query);
        if ($notices) {
            return array("return_code" => true, "return_data" =>  $notices);
        }
        return array("return_code" => false, "return_data" => "No Data found!");
    }

    function getActiveClients()
    {
        $query = "select c.`clientName`,c.`MobileNo`,cs.`ProductSubscriptionID`,cs.`NextDueDate`,cs.`amount`
        from Clients as c
        inner join ClientSubscriptions as cs on c.`ClientID`=cs.`ClientID`
        where EndDate >= CURDATE()";
        $notices = DBController::getDataSet($query);
        if ($notices) {
            return array("return_code" => true, "return_data" =>  $notices);
        }
        return array("return_code" => false, "return_data" => "No Data found!");
    }

    function getExpiredClients()
    {
        // $query="select c.`clientName`,c.`MobileNo`,cs.`ProductSubscriptionID`,cs.`EndDate` 
        // from clients as c
        // inner join ClientSubscriptions as cs on c.`ClientID`=cs.`ClientID`
        // where EndDate < CURDATE();";

        $query = "select concat(c.`clientName`,' , ',p.`Name`,' ,  ',ps.SubscriptionName) as clientdescription ,c.`MobileNo`,cs.`ProductSubscriptionID`,cs.`EndDate` 
        from Clients as c
        inner join ClientSubscriptions as cs on c.`ClientID`=cs.`ClientID`
        INNER JOIN Products p on cs.ProductID=p.ProductID
        INNER JOIN ProductSubscriptions ps on cs.ProductSubscriptionID=ps.ProductSubscriptionID
        where EndDate < CURDATE();";
        $notices = DBController::getDataSet($query);
        if ($notices) {
            return array("return_code" => true, "return_data" =>  $notices);
        }
        return array("return_code" => false, "return_data" => "No Data found!");
    }

    /**
     * Description: update the  ClientSubscriptions by marking the  isSubscriptionEnded as 1 based on the ClientSubscriptionID
     * Created By: 
     * Creted On: 
     * Update:
     *      06-02-2024 : (Angelbert) added the commenting format
     */
    function Unsubscribe($data)
    {
        if (!isset($data["ClientSubscriptionID"])) {
            return array("return_code" => false, "return_data" => "Invalid Request");
        }

        $params = array(
            array(":ClientSubscriptionID", $data["ClientSubscriptionID"]),
            array(":unsubscribereason", $data["unsubscribereason"]),
        );
        $query = "UPDATE `ClientSubscriptions` SET `SubscriptionEndReason`=:unsubscribereason,`isSubscriptionEnded`=1 WHERE `ClientSubscriptionID`=:ClientSubscriptionID;";
        $res = DBController::ExecuteSQL($query, $params);
        if ($res) {
            return array("return_code" => true, "return_data" => "Sucessfully Unsubscribe");
        }
        return array("return_code" => false, "return_data" => "Some Error occur while unsubscribe");
    }

    /**
     * Description: Delete  ClientSubscriptions based on ID
     * Created By: 
     * Creted On: 
     * Update:
     *      06-02-2024 : (Angelbert) added the commenting format
     */
    function deleteClientSubscription($data)
    {
        $params = array(
            array(":subscriptionID", strip_tags($data["subscriptionId"])),
        );
        $query = "DELETE FROM `ClientSubscriptions` where `ClientSubscriptionID`=:subscriptionID;";
        $res = DBController::ExecuteSQL($query, $params);
        return array("retrun_code" => true, "return_data" => "Sucessfully Removed subscription");
    }

    /**
     * Description: get all the client who has subscribe for product and the subscription is  still active
     * Created By: Angelbert
     * Creted On: 05/02/2024
     * Update:
     *      06-02-2024 : added SubscriptionCode and validation for the codes
     */
    function getClient_subscription()
    {
        $query = "SELECT cs.`ClientSubscriptionID`, c.`ClientID`,c.`ClientName`, p.`ProductID`,p.`Name`, ps.`ProductSubscriptionID`,ps.`SubscriptionName`,ps.`Amount` as productAmount, cs.`StartDate`, cs.`EndDate`, cs.`Amount`, cs.`MaxUsers`, cs.`TransectionID`, cs.`Remarks`, cs.`Installment`, cs.`NextDueDate`, cs.`NextDueAmount`, cs.`API`, cs.`ProductLogoPath`, cs.`TermsPath` 
        FROM `ClientSubscriptions` as cs  
        INNER JOIN Clients  as c on cs.ClientID=c.ClientID
        INNER JOIN Products as p on p.ProductID=cs.ProductID
        INNER JOIN ProductSubscriptions as ps on ps.ProductSubscriptionID=cs.`ProductSubscriptionID`
        where cs.`isSubscriptionEnded`=0;";
        $notices = DBController::getDataSet($query);
        if ($notices) {
            return array("return_code" => true, "return_data" =>  $notices);
        }
        return array("return_code" => false, "return_data" => "No Data for Client Subscription!");
    }

    /**
     * Description: Add the client for product subscription
     * Created By: 
     * Creted On: 08/02/2024
     * Update:
     *      06-02-2024 : add code for photo adding and update  and also put striptag,Commenting format 
     */
    function addClientSubscription($data)
    {
        if ($_SESSION['UserType'] != 1) {
            return array("return_code" => false, "return_data" => "Invalid Request");
        }

        //update
        if (isset($data["ClientSubscriptionID"])) {
            $ClientTerm = "";
            $ClientLogo = "";
            // check for logo and term
            if (isset($data["Terms"]))  //for terms
            {
                $image_info = getimagesize($data["Terms"]);
                $ClientTerm = uniqid("TERM_") . "." . (isset($image_info["mime"]) ? explode('/', $image_info["mime"])[1] : "");
                file_put_contents("../app/data/temp/" . $ClientTerm, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data["Terms"])));
            }

            //for LOGO
            if (isset($data["Logo"])) {
                $image_info = getimagesize($data["Logo"]);
                $ClientLogo = uniqid("LOGO_") . "." . (isset($image_info["mime"]) ? explode('/', $image_info["mime"])[1] : "");
                file_put_contents("../app/data/temp/" . $ClientLogo, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data["Logo"])));
            }

            $params = array(
                array(":clientId", strip_tags($data["clientId"])),
                array(":ProductId", strip_tags($data["ProductId"])),
                array(":productSubscriptionId", strip_tags($data["SubscriptionId"])),
                array(":StartDate", strip_tags($data["StartDate"])),
                array(":Enddate", strip_tags($data["Enddate"])),
                array(":Amount", strip_tags($data["Amount"])),
                array(":MaxUser", strip_tags($data["MaxUser"])),
                array(":Remarks", strip_tags($data["Remarks"])),
                array(":Installment", strip_tags($data["Installment"])),
                array(":NextDueDate", strip_tags($data["NextDueDate"])),
                array(":nextDueAmount", strip_tags($data["nextDueAmount"])),
                array(":aPi", strip_tags($data["aPi"])),
                array(":Terms", $ClientTerm),
                array(":Logo", $ClientLogo),
                array(":UserID", $_SESSION['UserID']),
                array(":ClientSubscriptionID", strip_tags($data['ClientSubscriptionID']))
            );

            $query = "UPDATE `ClientSubscriptions` SET `ClientID`=:clientId,`ProductID`=:ProductId,`ProductSubscriptionID`=:productSubscriptionId,`StartDate`=:StartDate,`EndDate`=:Enddate,
                `Amount`=:Amount,`MaxUsers`=:MaxUser,`Remarks`=:Remarks,`CreatedBy`=:UserID,`Installment`=:Installment,`NextDueDate`=:NextDueDate,
                `NextDueAmount`=:nextDueAmount,`API`=:aPi,`ProductLogoPath`=:Logo,`TermsPath`=:Terms WHERE `ClientSubscriptionID`=:ClientSubscriptionID;";
            $res = DBController::ExecuteSQL($query, $params);
            if ($res) {
                //TERMS
                if (isset($data["Terms"])  &&  $ClientTerm != "") {
                    rename("../app/data/temp/" . $ClientTerm, "../app/data/client/" . pathinfo($ClientTerm, PATHINFO_BASENAME));
                }
                //LOGO
                if (isset($data["Logo"]) && $ClientLogo != "") {
                    rename("../app/data/temp/" . $ClientLogo, "../app/data/client/" . pathinfo($ClientLogo, PATHINFO_BASENAME));
                }
                return array("return_code" => true, "return_data" => "Sucessfully Updated");
            } else {
                return array("return_code" => false, "return_data" => "Error!! some error occur while updating.");
            }
        }
        //add 
        else {

            // check for logo and term
            $ClientTerm = "";
            $ClientLogo = "";
            if (isset($data["Terms"]) && !empty($data["Terms"]))  //for terms
            {
                $image_info = getimagesize($data["Terms"]);
                $ClientTerm = uniqid("TERM_") . "." . (isset($image_info["mime"]) ? explode('/', $image_info["mime"])[1] : "");
                file_put_contents("../app/data/temp/" . $ClientTerm, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data["Terms"])));
            }

            //for LOGO
            if (isset($data["Logo"]) && !empty($data["Logo"])) {

                $image_info = getimagesize($data["Logo"]);
                $ClientLogo = uniqid("LOGO_") . "." . (isset($image_info["mime"]) ? explode('/', $image_info["mime"])[1] : "");
                file_put_contents("../app/data/temp/" . $ClientLogo, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data["Logo"])));
            }
            $params = array(
                array(":clientId", strip_tags($data["clientId"])),
                array(":ProductId", strip_tags($data["ProductId"])),
                array(":SubscriptionId", strip_tags($data["SubscriptionId"])),
                array(":StartDate", strip_tags($data["StartDate"])),
                array(":Enddate", strip_tags($data["Enddate"])),
                array(":Amount", strip_tags($data["Amount"])),
                array(":MaxUser", strip_tags($data["MaxUser"])),
                array(":Remarks", strip_tags($data["Remarks"])),
                array(":Installment", strip_tags($data["Installment"])),
                array(":NextDueDate", strip_tags($data["NextDueDate"])),
                array(":nextDueAmount", strip_tags($data["nextDueAmount"])),
                array(":aPi", strip_tags($data["aPi"])),
                array(":Terms", $ClientTerm),
                array(":Logo", $ClientLogo),
                array(":UserID", $_SESSION['UserID']),
            );

            $query = "INSERT INTO `ClientSubscriptions`( `ClientID`, `ProductID`, `ProductSubscriptionID`, `StartDate`, `EndDate`, `Amount`, `MaxUsers`,`Remarks`, `CreatedBy`, `Installment`, `NextDueDate`, `NextDueAmount`, `API`, `ProductLogoPath`, `TermsPath`)
            VALUES (:clientId,:ProductId,:SubscriptionId,:StartDate,:Enddate,:Amount,:MaxUser,:Remarks,:UserID,:Installment,:NextDueDate,:nextDueAmount,:aPi,:Logo,:Terms)";
            $res = DBController::ExecuteSQLID($query, $params);

            if ($res) {

                //TERMS
                if (isset($data["Terms"]) &&  $ClientTerm != "") {
                    rename("../app/data/temp/" . $ClientTerm, "../app/data/client/" . pathinfo($ClientTerm, PATHINFO_BASENAME));
                }
                //LOGO
                if (isset($data["Logo"]) &&  $ClientLogo != "") {
                    rename("../app/data/temp/" . $ClientLogo, "../app/data/client/" . pathinfo($ClientLogo, PATHINFO_BASENAME));
                }
                return array("return_code" => true, "return_data" => "Added Subscription", "data" => $res);
            }
        }
        return array("return_code" => false, "return_data" => " Error while saving");
    }


    function getDomainNameById($data) // added by dev on 26/10/23
    {
        // Prepare array
        $params = array(
            array(":ClientSubscriptionID", $data["ClientSubscriptionID"])
        );
        $domainName = "SELECT api,ClientID from `ClientSubscriptions`  WHERE `ClientSubscriptionID`=:ClientSubscriptionID;";
        $res = DBController::sendData($domainName, $params);
        //checking is it valid or not 
        if ($res) {
            $domain_url = parse_url($res['api']);
            $domain = $domain_url['host'];
            return array("return_code" => true, "return_data" => $res, "domain" => $domain);
        }
        return array("return_code" => false, "return_data" => "Could not find the domain for the subscription.");
    }

    


    /**
     * parameter{ClientID}
     *  Description:  Delete the client
     *  before delete check first if the client has any subscription
     *  Createdby : Angelbert (01/02/2024)
     *  Updates:
     *    07-02-2024 (Angelbert):   adding the strip tag,param and comment format   
     * 
     */
    function deleteClient($data)
    {

        $params = array(
            array(":ClientID", strip_tags($data["ClientID"]))
        );
        $query = "SELECT ClientID  FROM `ClientSubscriptions` WHERE `ClientID`=:ClientID;";
        $resultss = DBController::sendData($query, $params);
        if ($resultss) {
            return array("return_code" => false, "return_data" => "Client cannot be deleted. As Subscription Exists. ");
        }

        $query = "UPDATE  `Clients` set isActive=0 WHERE `ClientID`=:ClientID";
        $res = DBController::ExecuteSQL($query, $params);
        return array("return_code" => true, "return_data" => "Successfully Removed & Disabled !!!");
    }


    /**
     *  Description:  Get All Active Clients
     *  Createdby : Angelbert (01/02/2024)
     *  Updates:
     *    07-02-2024 (Angelbert):   modify the sql for null data   
     * 
     */
    function getClients($data)
    {
        $query = "SELECT  `ClientID`,`ClientName`, `TelephoneNo`, `MobileNo`, `Fax`, `ContactPersonName`, `ContactPersonMobileNo`, 
        `ContactPersonDesignation`, IFNULL(`ContactPersonDesignation`,'N/A')as DesignationName, Clients.DistrictID, `DistrictName`,Clients.StateID, IFNULL(`StateName`,'N/A') as StateName, `CityName`, `PinCode`, `Landmark`, `Logo`, `MaxUsers`  
        FROM `Clients`
        LEFT JOIN Settings_State on Clients.StateID=Settings_State.StateID 
         LEFT JOIN Settings_District on Clients.DistrictID=Settings_District.DistrictID where Clients.isActive =1;";

        $ClientList = DBController::getDataSet($query);
        if ($ClientList) {
            return array("return_code" => true, "return_data" =>  $ClientList);
        }
        return array("return_code" => false, "return_data" => "No data for clients");
    }

    /**
     * parameters{ClientName,telephoneName,MobileNo,Fax,ContactName,ContactNumber,PersonDesignation,State,District,City,Pincode,Landmark,Maxuser,File}
     *  Description: Add/ Update Clients
     *  Createdby : Angelbert (01/02/2024)
     *  Updates:
     *    08-02-2024 (Angelbert):  Adding param and strip tag, Also update the code for Adding the logo   
     * 
     */
    function addClient($data)
    {
        if (isset($data["ClientID"])) { //update  


            if (isset($data["File"])) {
                $image_info = getimagesize($data["File"]);
                $Photo = uniqid("C") . "." . (isset($image_info["mime"]) ? explode('/', $image_info["mime"])[1] : "");

                file_put_contents("../app/data/temp/" . $Photo, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data["File"])));
            }

            $params = array(
                array(":ClientName", strip_tags($data["ClientName"])),
                array(":telephoneNumber", strip_tags($data["telephoneName"])),
                array(":MobileNo", strip_tags($data["MobileNo"])),
                array(":Fax", strip_tags($data["Fax"])),
                array(":ContactName", strip_tags($data["ContactName"])),
                array(":ContactPersonMobile", strip_tags($data["ContactNumber"])),
                array(":PersonDesignation", strip_tags($data["PersonDesignation"])),
                array(":State", strip_tags($data["State"])),
                array(":District", strip_tags($data["District"])),
                array(":City", strip_tags($data["City"])),
                array(":Pincode", strip_tags($data["Pincode"])),
                array(":Landmark", strip_tags($data["Landmark"])),
                array(":Maxuser", strip_tags($data["Maxuser"])),
                array(":Logo", $Photo ?? NULL),
                array(":ClientID", strip_tags($data['ClientID']))
            );

            $query = "UPDATE `Clients` SET `ClientName`=:ClientName,`TelephoneNo`=:telephoneNumber,`MobileNo`=:MobileNo,`Fax`=:Fax,`ContactPersonName`=:ContactName,`ContactPersonMobileNo`=:ContactPersonMobile,`ContactPersonDesignation`=:PersonDesignation,`StateID`=:State,`DistrictID`=:District,`CityName`=:City,`PinCode`=:Pincode,`Landmark`=:Landmark,`MaxUsers`=:Maxuser,Logo=:Logo WHERE `ClientID`=:ClientID;";
            $res = DBController::ExecuteSQL($query, $params);
            if ($res) {
                if (isset($data["File"])) {
                    rename("../app/data/temp/" . $Photo, "../app/data/client/" . pathinfo($Photo, PATHINFO_BASENAME));
                }
                return array("return_code" => true, "return_data" => "Client Update  successfully");
            }
        } else {

            if (isset($data["File"])) {
                $image_info = getimagesize($data["File"]);
                $Photo = uniqid("C") . "." . (isset($image_info["mime"]) ? explode('/', $image_info["mime"])[1] : "");

                file_put_contents("../app/data/temp/" . $Photo, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data["File"])));
            }
            $params = array(
                array(":ClientName", strip_tags($data["ClientName"])),
                array(":telephoneName", strip_tags($data["telephoneName"])),
                array(":MobileNo", strip_tags($data["MobileNo"])),
                array(":Fax", strip_tags($data["Fax"])),
                array(":ContactName", strip_tags($data["ContactName"])),
                array(":ContactNumber", strip_tags($data["ContactNumber"])),
                array(":PersonDesignation", strip_tags($data["PersonDesignation"])),
                array(":State", strip_tags($data["State"])),
                array(":District", strip_tags($data["District"])),
                array(":City", strip_tags($data["City"])),
                array(":Pincode", strip_tags($data["Pincode"])),
                array(":Landmark", strip_tags($data["Landmark"])),
                array(":Maxuser", strip_tags($data["Maxuser"])),
                array(":Logo", $Photo ?? NULL),
                array(":UserID", $_SESSION['UserID']),
            );
            $query = "INSERT INTO `Clients`( `ClientName`, `TelephoneNo`, `MobileNo`, `Fax`, `ContactPersonName`, `ContactPersonMobileNo`, `ContactPersonDesignation`, `StateID`, `DistrictID`, `CityName`, `PinCode`, `Landmark`, `MaxUsers`,`Logo`,`CreatedBy`)
            VALUES (:ClientName,:telephoneName,:MobileNo,:Fax,:ContactName,:ContactNumber,:PersonDesignation,:State,:District,:City,:Pincode,:Landmark,:Maxuser,:Logo,:UserID);";
            $res = DBController::ExecuteSQLID($query, $params);
        }
        if ($res) {
            if (isset($data["File"])) {
                rename("../app/data/temp/" . $Photo, "../app/data/client/" . pathinfo($Photo, PATHINFO_BASENAME));
            }

            return array("return_code" => true, "return_data" => "Client added successfully");
        }
        return array("return_code" => false, "return_data" => " Error while saving");
    }


    function getPrayageduLeads()
    {
        $query = "SELECT `LeadsID`, `Name`, `OrganizationTypeID`, `SchoolGroupName`, `BrandCount`, `ContactNo`, `Email`, `Role`, `isContacted`, `ContactedRemarks`, `ContactedDate`, `isPositive`,`EntryDateTime` 
        FROM `Prayagedu_Leads` WHERE `isDeleted` IS NULL AND isMoveToRawLeads=0;";
        $res = DBController::getDataSet($query);
        return array("return_code" => true, "return_data" => $res);
    }

    function getClient_subscriptionById($data)
    {
        $query = "SELECT cs.`ClientSubscriptionID`, c.`ClientName`,c.`ClientID`, cs.`API`
        FROM `ClientSubscriptions` as cs  
        LEFT JOIN Clients  as c on cs.ClientID=c.ClientID
        where cs.`isSubscriptionEnded`=0;";
        $notices = DBController::getDataSet($query);
        if ($notices) {
            return array("return_code" => true, "return_data" =>  $notices);
        }
        return array("return_code" => false, "return_data" => "No Data for Client Subscription!");
    }


    // function getDataFromAPI($data, $method = 'GET')
    // {
    //     // Your code to fetch API and generate secret key

    //     // Fetch API based on ClientSubscriptionID
    //     $params = array(
    //         array(":ClientSubscriptionID", (int)strip_tags($data["ClientSubscriptionID"]))
    //     );
    //     $query = "SELECT `ClientSubscriptionID`, `API`
    //               FROM `ClientSubscriptions` 
    //               WHERE `ClientSubscriptionID` = :ClientSubscriptionID;";
    //     $notices = DBController::sendData($query, $params);

    //     if ($notices) {
    //         $API = $notices['API'];
    //         $requestData = array(
    //             "Module" => "publics",
    //             "Page_key" => "getUserInfoBasedOnContact",
    //             "JSON" => array(
    //                 "Contact" => strip_tags($data['PhoneNumber']),
    //                 "Key" => "Test123"
    //             ),
    //             "MSC" => "751d31dd6b56b26b29dac2c0e1839e34"
    //         );

    //         // Convert the array to JSON format
    //         $json = json_encode($requestData);
    //         $api_url = $API; // Static for testing
    //         $ch = curl_init($api_url);

    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //         if ($method === 'GET') {
    //             // Use GET method
    //             $queryData = http_build_query($requestData);
    //             $api_url .= '?' . $queryData;
    //         } else {
    //             // Use POST method
    //             curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //             curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    //             curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //                 'Content-Type: application/json',
    //                 'Content-Length: ' . strlen($json)
    //             ));
    //         }

    //         curl_setopt($ch, CURLOPT_URL, $api_url);

    //         $response = curl_exec($ch);
    //         if (curl_errno($ch)) {
    //             // Handle curl errors
    //             // For example: echo 'Error: ' . curl_error($ch);
    //         } else {
    //             // Handle response
    //             // For example: echo $response;
    //         }

    //         curl_close($ch);

    //         $response = json_decode($response);

    //         if ($response->return_code == true) {
    //             return array("return_code" => true, "return_data" => $response->return_data);
    //         } else {
    //             return array("return_code" => false, "return_data" => "Not associated with this number.");
    //         }
    //     }

    //     return array("return_code" => false, "return_data" => "No Data for Client Subscription!");
    // }




    //getAPIByClientSubscriptionId

    function getDataFromAPI($data)
    {


        //get  API (based on ID)
        //generate secret key

        // send to API
        //return thr reult getting from API


        // Prepare array
        //  array(":Contact", strip_tags($data["PhoneNumber"]));
        $params = array(
            array(":ClientSubscriptionID", (int)strip_tags($data["ClientSubscriptionID"]))
        );
        $query = "SELECT `ClientSubscriptionID`,`API`
    FROM `ClientSubscriptions` 
    WHERE `ClientSubscriptionID`=:ClientSubscriptionID;";
        $notices = DBController::sendData($query, $params);
        if ($notices) {
            $API = $notices['API'];
            $data = array(
                "Module" => "publics",
                "Page_key" => "getUserInfoBasedOnContact",
                "JSON" => array(
                    "Contact" => strip_tags($data['PhoneNumber']),
                    "Key" => "Test123"
                ),
                "MSC" => "751d31dd6b56b26b29dac2c0e1839e34"
            );
            //Key,Contact
            // Convert the array to JSON format
            $json = json_encode($data);
            $api_url = $API; //static for testing
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json)
            ));

            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                // echo 'Error: ' . curl_error($ch);
            } else {
                // echo $response;
            }
            curl_close($ch);
            $response = json_decode($response);

            if ($response->return_code == true)
                return array("return_code" => true, "return_data" =>  $response->return_data);
            else
                return array("return_code" => false, "return_data" =>  "Not associated with this number.");
        }
        return array("return_code" => false, "return_data" => "No Data for Client Subscription!");
    }


    function sendotp($data)
    {

        // function generateEncryptionKey()
        // {
        //     return openssl_random_pseudo_bytes(32); // 32 bytes for AES-256
        // }

        // function encryptData($datas, $key)
        // {
        //     $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        //     $encryptedData = openssl_encrypt($datas, 'aes-256-cbc', $key, 0, $iv);
        //     return [
        //         'data' => base64_encode($encryptedData),
        //         'iv' => base64_encode($iv)
        //     ];
        // }
        // $key = generateEncryptionKey();
        // $dataToEncrypt = strip_tags($data['PhoneNumber']);

        $params = array(
            array(":ClientSubscriptionID", (int)strip_tags($data["ClientSubscriptionID"]))
        );
        $query = "SELECT `ClientSubscriptionID`,`API`
    FROM `ClientSubscriptions` 
    WHERE `ClientSubscriptionID`=:ClientSubscriptionID;";
        $notices = DBController::sendData($query, $params);
        if ($notices) {
            $API = $notices['API'];
            $data = array(
                "Module" => "publics",
                "Page_key" => "getUserInfoBasedOnContact",
                "JSON" => array(
                    "Contact" => strip_tags($data['PhoneNumber']),
                    "Key" => "Test123"
                ),
                "MSC" => "751d31dd6b56b26b29dac2c0e1839e34"
            );
            //Key,Contact

            $json = json_encode($data);
            $api_url = $API; //static for testing
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json)
            ));

            // $encrypted = encryptData($dataToEncrypt, $key);

            // echo "Original Data: " . $dataToEncrypt . "\n";
            // echo "Encrypted Data: " . $encrypted['data'] . "\n";
            // echo "IV: " . $encrypted['iv'] . "\n";

            // function decryptData($encryptedData, $key, $iv)
            // {
            //     $data = openssl_decrypt(base64_decode($encryptedData), 'aes-256-cbc', $key, 0, base64_decode($iv));
            //     return $data;
            // }

            // $decryptedData = decryptData($encrypted['data'], $key, $encrypted['iv']);

            // echo "Decrypted Data: " . $decryptedData . "\n";
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                // echo 'Error: ' . curl_error($ch);
            } else {
                // echo $response;
            }
            curl_close($ch);
            $response = json_decode($response);

            if ($response->return_code == true)
                return array("return_code" => true, "return_data" => "Send OTP");
            else
                return array("return_code" => false, "return_data" =>  "Not associated with this number.");
        }
        return array("return_code" => false, "return_data" => "No Data for Client Subscription!");
    }

    /**
     * Description: returns the client information based on the product code and active Subscription Code
     * Created By: Angelbert
     * Creted On: 05/02/2024
     * Update:
     *      06-02-2024 : added SubscriptionCode and validation for the codes
     */
    function getClientsBySubscriptionCode($data)
    {

        if (!isset($data["ProductCode"]) || !isset($data["SubscriptionCode"])) {
            return array("return_code" => false, "return_data" => "Not valid request");
        }
        $param = array(
            array(":ProductCode", strip_tags($data["ProductCode"])),
            array(":ClientSubscriptionCode", strip_tags($data['SubscriptionCode']))
        );
        DBController::logs(json_encode($param));
        $query = "SELECT Clients.`ClientID`,`ClientName`,ss.StateName, `CityName`, Clients.Logo,cs.`MaxUsers`,cs.API
        FROM `Clients` 
        LEFT JOIN Settings_State ss on ss.StateID=Clients.StateID
        LEFT JOIN Settings_District sd on sd.DistrictID=Clients.DistrictID
        INNER JOIN ClientSubscriptions cs on cs.ClientID=Clients.ClientID
        inner join Products p on p.ProductID=cs.ProductID
        WHERE p.Code=:ProductCode AND cs.ClientSubscriptionCode = :ClientSubscriptionCode AND Clients.isActive=1 AND IFNULL(cs.isSubscriptionEnded,0)=0 and DATE(cs.EndDate)>=CURDATE() LIMIT 1;";
        $ClientData = DBController::sendData($query, $param);

        if ($ClientData) {
            return array("return_code" => true, "return_data" => $ClientData);
        } else {
            return array("return_code" => false, "return_data" => "Unable to get Information, Contact Organization Admin");
        }
    }


    /**
     *  parameters{LeadsID}
     *  Description:  Update the PrayageduLeads based on the LeadsID
     *  Createdby : Devkanta (16/02/2024)
     *  Updates:
     *    
     */

    function deletePrayageduLeads($data)
    {
        $params3 = array(
            array(":LeadsID", $data["LeadsID"]),
        );
        $deletequery = "UPDATE `Prayagedu_Leads` SET `isDeleted`=1 WHERE `LeadsID`=:LeadsID";
        $res3 = DBController::ExecuteSQL($deletequery, $params3);
        if ($res3) {
            return array("return_code" => true, "return_data" => "Sucessfully Archived");
        } else {
            return array("return_code" => false, "return_data" => "Unable to delete at this point of time.");
        }
    }


    /**
     *  parameters{LeadsID}
     *  Description:  Get  All the Prayagedu Archived Leads  
     *  Createdby : Devkanta (17/02/2024)
     *  Updates:
     *    
     */

    function getPrayageduArchivedLeads()
    {

        $query = "SELECT `LeadsID`, `Name`, `OrganizationTypeID`, `SchoolGroupName`, `BrandCount`, `ContactNo`, `Email`, `Role`, `isContacted`, `ContactedRemarks`, `ContactedDate`, `isPositive`,`EntryDateTime` 
        FROM `Prayagedu_Leads` WHERE `isDeleted` = 1;";
        $res = DBController::getDataSet($query);
        return array("return_code" => true, "return_data" => $res);
    }




    /**
     *  parameters{LeadsID}
     *  Description:  Restore the PrayageduLeads based on the LeadsID
     *  Createdby : Devkanta (21/02/2024)
     *  Updates:
     *    
     */

    function restorePrayageduLeads($data)
    {
        $params3 = array(
            array(":LeadsID", $data["LeadsID"]),
        );
        $deletequery = "UPDATE `Prayagedu_Leads` SET `isDeleted`= NULL WHERE `LeadsID`=:LeadsID";
        $res3 = DBController::ExecuteSQL($deletequery, $params3);
        if ($res3) {
            return array("return_code" => true, "return_data" => "Sucessfully Restored");
        } else {
            return array("return_code" => false, "return_data" => "Unable to delete at this point of time.");
        }
    }


    function moveToRawLeads($data)
    {

        $param = array(
            array(":ClientName", (string)strip_tags($data['ClientName'])),
            array(":PhoneNumbers", $data['PhoneNumbers']),
            // array(":Address", (string)strip_tags($data['Address'])),
            // array(":pincode", strip_tags($data['pincode'])),
            // array(":CountryID", strip_tags($data['CountryID'])),
            // array(":city", strip_tags($data['city'])),
            // array(":stateID", strip_tags($data['stateID'])),
            // array(":EmailIDs", $data['EmailIDs']),
            array(":ContactpersonName", strip_tags($data['ContactpersonName'])),
            // array(":ContactPersonNumber", strip_tags($data['ContactPersonNumber'])),
            array(":ContactPersonDesignation", strip_tags($data['ContactPersonDesignation'])),
            // array(":LandlineNo", strip_tags($data['LandlineNo'])),
            // array(":website", strip_tags($data['website'])),
            // array(":Landmark", strip_tags($data['Landmark'])),
            // array(":enrollment", strip_tags($data['enrollment'])),
            // array(":AppointmentDate", strip_tags($data['AppointmentDate'])),
            // array(":ColdCallDate", strip_tags($data['ColdCallDate'])),
            // array(":InterestedProductIDs", strip_tags($data['InterestedProductIDs'])),
            array(":CreatedBy", $_SESSION['UserID']),
            // array(":discussion", strip_tags($data['discussion']))
        );
        $query = "INSERT INTO `Marketing_Sales_Activity`(`ClientName`,`MobileNos`,`ContactPersons`, `ContactPersonDesignation`,`CreatedBy`)
              VALUES (:ClientName,:PhoneNumbers,:ContactpersonName,:ContactPersonDesignation,:CreatedBy)";
        $res = DBController::ExecuteSQLID($query, $param);
        if ($res) {
            $params2 = array(
                array(":LeadsID", $data["LeadsID"]),
            );
            $updatequery = "UPDATE `Prayagedu_Leads` SET `isMoveToRawLeads`=1 WHERE `LeadsID`=:LeadsID";
            $res2 = DBController::ExecuteSQL($updatequery, $params2);
            if ($res2) {
                return array("return_code" => true, "return_data" => "Sucessfully Move to raw leads");
            } else {
                return array("return_code" => false, "return_data" => "Unable to Move to raw leads.");
            }
        } else {
            return array("return_code" => false, "return_data" => "Unable to create at this point of time.");
        }
    }



    function changeactivestatus($data)
    {
        $params = array(
            array(":LeadsID", strip_tags($data["LeadsID"])),
            array(":isPositive", (bool)(strip_tags($data["isPositive"]))),
        );

        $update = "UPDATE `Prayagedu_Leads` SET `isPositive`=:isPositive WHERE `LeadsID`=:LeadsID";
        $res3 = DBController::ExecuteSQL($update, $params);
        if ($res3) {
            return array("return_code" => true, "return_data" => "Sucessfully Updated");
        } else {
            return array("return_code" => false, "return_data" => "Unable to update at this point of time.");
        }
    }
    function changeactivestatusContacted($data)
    {
        $params = array(
            array(":LeadsID", strip_tags($data["LeadsID"])),
            array(":isContacted", (bool)(strip_tags($data["isContacted"]))),
        );

        $update = "UPDATE `Prayagedu_Leads` SET `isContacted`=:isContacted WHERE `LeadsID`=:LeadsID";
        $res3 = DBController::ExecuteSQL($update, $params);
        if ($res3) {
            return array("return_code" => true, "return_data" => "Sucessfully Updated");
        } else {
            return array("return_code" => false, "return_data" => "Unable to update at this point of time.");
        }
    }
}
