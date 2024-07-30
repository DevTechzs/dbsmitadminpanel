<?php

/**  Current Version: 1.0.0
 *  Createdby : Angelbert (01/02/2024)
 *  Created On:
 *  Modified By: 
 *  Modified On:
 */

namespace app\modules\auth\classes;
use app\database\DBController;
use app\misc\SMS;

class Signup
{
     /**
     * parameters{Username,Name,ContactNo,EmailID,StaffID(used both for Staff and Intern),UserType,ValidateUsernameOnly}
     *  Description: request for SignUp
     *  Createdby : Angelbert (01/02/2024)
     *  Updates:
     *    07-02-2024 (Angelbert):  Adding the commenting format   
     * 
     */
    function request($data)
    {
        //check only based on UserName
        if (isset($data["ValidateUsernameOnly"]) &&  $data["ValidateUsernameOnly"] == true) {
            $user = (new Users())->isUsernameExists($data);
            if ($user["return_code"] == true) {
                return array("return_code" => false, "return_data" => "UserExists");
            }
        } else {
            // check based on {EmailID and ContactNo}
            $user = (new Users())->exists($data);
            $user = $user['return_data'];

            if ($user) {
                if ((isset($user["EmailID"]) && ($user["EmailID"] == $data["EmailID"])) && (isset($user["ContactNo"]) && ($user["EmailID"] == $data["EmailID"]))) {
                    return array("return_code" => false, "return_data" =>  "EmailID and Contact No Already Exists!!", "ExistsType" => 3);
                } elseif (isset($user["EmailID"]) && ($user["EmailID"] == $data["EmailID"])) {
                    return array("return_code" => false, "return_data" =>  "EmailID Already Exists!!", "ExistsType" => 2);
                } elseif (isset($user["ContactNo"]) && ($user["ContactNo"] == $data["ContactNo"])) {
                    return array("return_code" => false, "return_data" =>  "Contact No Already Exists!!", "ExistsType" => 1);
                }
            }
        }

        $password = rand(100000, 999999);
        $isActive = false;
        if (!isset($data["UserType"])) {
            $data["UserType"] = 3;
            $isActive = true;
        }

        //assign the staff and intern id
        if (isset($data['StaffID'])) {
            $staffid = strip_tags($data['StaffID']);
        } else {
            $staffid = strip_tags($data['InternID']);
        }
        $params = array(
            array(":Name", strip_tags($data["Name"])),
            array(":Username",  strip_tags($data["Username"])),
            array(":Password", hash("sha256", substr($data["Username"], 0, 1) . $password)),
            array(":EmailID", strip_tags($data["EmailID"])),
            array(":ContactNo", strip_tags($data["ContactNo"])),
            array(":UserType", strip_tags($data["UserType"])),
            array(":StaffInternID", strip_tags($staffid)), //store staffID / InternID
            array(":isActive", 1),
            array(":SessionID", 1),
        );
        $query = "INSERT INTO `Users`(`Name`, `Username`, `Password`, `EmailID`, `ContactNo`, `UserType`, `StaffID`, `isActive`, `SessionID`)
        VALUES (:Name,:Username,:Password,:EmailID,:ContactNo,:UserType,:StaffInternID,:isActive,:SessionID)";
        $array = DBController::ExecuteSQLID($query, $params);
        if ($array) {
            // DBController::logs("New user created :" . $data["Name"]);
            DBController::logs("New User Created UserName ::: " . $data["Username"] . "Password :::" . $password);
            //DISABLE
            //check if SMS is enable (USER SMS) 
           
                    SMS::SendSms("Signup", $data["ContactNo"],
                    [
                        "personname" => $data["Name"],
                        "applicationname" => "ITPL App/Portal",
                        "username" =>   $data["Username"]  ,
                        "password" =>   $password,
                        "regards" =>  "ITPL App"
                    ]
                );
                
            return array("return_code" => true, "return_data" => "User Successfully Created");
        }
    }

    function  createUser($data)
    {
        //$usernameparam =   array(":Username" => $data["Username"]);
        $user = (new Users())->isUsernameExists($data);
        $user = $user['return_data'];
        if ($user) {
            return array("return_code" => false, "return_data" => "UserExists");
        }
    }
}
