<?php

/**
 *  Current Version: 1.0.0
 *  Created By: Angelbert,  prayagedu@techz.in
 *  Created On: 2-02-2024
 *  Modified By: Angelbert, prayagedu@techz.in
 *  Modified On: (7-01-2024) : checking all the valid function
 */

namespace app\modules\auth\classes;

use app\database\DBController;

class Users
{

    /**
     * paramenters{Username}
     *  Description:  Check if username exist
     *  Createdby : Angelbert (29/01/2024) (Copy from Prayagedu)
     *  Updates: Angelbert(7-2-2024) : Adding the strip_tag, and commenting format 
     *         
     */
    function isUsernameExists($data)
    {
        $params = array(
            array(":Username", strip_tags($data["Username"]))
        );

        $query = "SELECT UserID, Username, EmailID FROM Users WHERE Username=:Username";
        $user = DBController::sendData($query, $params);
        if ($user) {
            return array("return_code" => true, "return_data" =>  $user);
        }
        return array("return_code" => false, "return_data" => "User does not exists!");
    }

    /**
     * paramenters{EmailID,ContactNo}
     *  Description:  Check if user exist based on EmailID and ContactNo
     *  Createdby : Angelbert (29/01/2024) (Copy from Prayagedu)
     *  Updates: Angelbert(7-2-2024) : Adding the strip_tag, and commenting format 
     *         
     */
    function exists($data)
    {
        $params = array(
            array(":EmailID", strip_tags($data["EmailID"])),
            array(":ContactNo", strip_tags($data["ContactNo"])),
            array(":Username", strip_tags($data["ContactNo"]))
        );

        $query = "SELECT Username,EmailID,ContactNo FROM Users WHERE EmailID=:EmailID OR ContactNo=:ContactNo OR Username=:Username;";
        $user = DBController::sendData($query, $params);

        if ($user) {
            return array("return_code" => true, "return_data" =>  $user);
        }
        return array("return_code" => false, "return_data" => "User does not exists!");
    }

    /**
     *  Description:  Add new User  (NOT USING FOR NOW (Need to check if Used))
     *  Createdby : Angelbert (29/01/2024) (Copy from Prayagedu)
     *  Updates:
     *         
     */
    // function addUser($data)
    // {
    //     $user = $this->exists($data);
    //     $user = $user['return_data'];

    //     if ($user) {
    //         if ((isset($user["EmailID"]) && ($user["EmailID"]==$data["EmailID"])) && (isset($user["ContactNo"]) && ($user["EmailID"]==$data["EmailID"]))) {
    //             return array("return_code" => false, "return_data" =>  "EmailID and Contact No Already Exists!!");
    //         } elseif (isset($user["EmailID"]) && ($user["EmailID"]==$data["EmailID"])) {
    //             return array("return_code" => false, "return_data" =>  "EmailID Already Exists!!");
    //         } elseif (isset($user["ContactNo"]) && ($user["ContactNo"]==$data["ContactNo"])) {
    //             return array("return_code" => false, "return_data" =>  "Contact No Already Exists!!");
    //         }
    //     }

    //     $password = rand(100000, 999999);

    //     if (!isset($data["UserType"])) {
    //         $data["UserType"] = 2;
    //     }

    //     $params = array(
    //         array(":Name", $data["Name"]),
    //         array(":Username", $data["ContactNo"]),
    //         array(":Password", hash("sha256", substr($data["ContactNo"], 0, 1) . $password)),
    //         array(":EmailID", $data["EmailID"]),
    //         array(":ContactNo", $data["ContactNo"]),
    //         array(":UserType", $data["UserType"]),
    //         array(":StudentID", $data["StudentID"]?? NULL),
    //         array(":TeacherID", $data["TeacherID"]?? NULL),
    //         array(":SessionID",1)
    //     );

    //     $query = "INSERT INTO Users(Name, Username, Password, EmailID, ContactNo, UserType, StudentID, TeacherID, SessionID) VALUES (:Name,:Username,:Password,:EmailID,:ContactNo,:UserType, :StudentID, :TeacherID,:SessionID)";

    //     $array = DBController::ExecuteSQLID($query, $params);

    //     if ($array) {
    //         $body='<span class="im">
    // 					<p style="color:#333333;margin:10px 0;padding:0">Hi <strong>' . $data['Name'] . '</strong>,</p>
    // 					<p style="color:#333333;margin:10px 0;padding:0">You have been successfully Registered with PrayagEdu<br/>
    // 					and the following is your password for login into the Portal.</p>
    // 					<p style="color:#333333;margin:10px 0;padding:0">Username : ' . $data['ContactNo'] . '</p>
    // 					<p style="color:#333333;margin:10px 0;padding:0">Password : ' . $password . '</p>
    // 				</span>
    // 				<p style="color:#333333;max-width:600px;margin:10px 0;padding:0 0 15px">
    // 					The link for the web portal is :<br>
    // 					<a style="color:#2c7cb0;font-size:20px" href="https://PrayagEdu.in/" target="_blank">Login</a>
    // 				</p>';

    //         $Subject = "PrayagEdu Registration";
    //         $message ="Dear ".$data["Name"].",\n\n Your password of PrayagEdu portal is \n Password: ".$password ." \n\nFor login go to https://PrayagEdu.techz.in/";

    //         if (SMS::send('ITPLTZ', $message,  $data["ContactNo"]) || Email::send($body, $data['EmailID'], $Subject)) {
    //             return array("return_code" => true, "return_data" => "Please Check Your Mail for your autogenerated password.\n There may be a delay of few minutes before you recieve the mail.\nThank You");
    //         } else {
    //             return array("return_code" => true, "return_data" => "Problem Sending mail\nThank You");
    //         }
    //     }

    //     return array("return_code" => false, "return_data" => "Error creating user!!");
    // }

    /**
     *  Description:  Get the basis info of  login user 
     *  Createdby : Angelbert (29/01/2024)
     *  Updates:
     *         
     */
    function getUserInfo()
    {
        //DBController::logs("UserID - " . $_SESSION['UserID']);

        if (!isset($_SESSION['UserID'])) {
            return array("return_code" => false, "return_data" =>  "Invalid User");
        }

        $param = array(
            array(":UserID", $_SESSION['UserID'])
        );
        $query = "SELECT u.UserType,u.StaffID FROM `Users` u 
        WHERE u.`UserID`=:UserID and u.isActive=1;";
        $ActiveUser = DBController::sendData($query, $param);
        if ($ActiveUser) {
            //admin 
            if ($ActiveUser['UserType'] == 1) {
                $query = "SELECT `UserID`, `Name`, `Username`, `EmailID`, `ContactNo` FROM `Users` WHERE `isActive`=1 and UserType=1 limit 1;";
                $UserData = DBController::sendData($query);
                return array("return_code" => true, "return_data" =>  $UserData);
            }
            //staff
            else  if ($ActiveUser['UserType'] == 2) {
                $param1 = array(
                    array(":StaffID", $ActiveUser['StaffID'])
                );
                $query1 = "SELECT `StaffID`, `StaffName`, Staff.`ContactNo`, Staff.`EmailID`, Staff.`GenderCode`, `DOB`, Staff.ReligionID,Settings_Religion.Religion,Staff.CasteCode, Settings_Caste.Caste,Staff.CommunityID, Settings_Community.`CommunityName`, Staff.NationalityID,Settings_Nationality.NationalityName, Staff.`Address`, `Photo`, Staff.`DesignationID`, Staff.`DepartmentID`,`BloodGroup`, `isPhotoUpdateEnable`,so.OfficeName,Designation.DesignationName FROM Staff
                LEFT JOIN Setting_Designation Designation ON Designation.DesignationID=Staff.DesignationID
                LEFT JOIN Settings_Gender ON Settings_Gender.GenderCode=Staff.GenderCode 
                LEFT JOIN Settings_Caste ON Settings_Caste.CasteCode=Staff.CasteCode 
                LEFT JOIN Settings_Religion ON Settings_Religion.ReligionID=Staff.ReligionID 
                LEFT JOIN Settings_Community ON Settings_Community.CommunityID=Staff.CommunityID 
                LEFT JOIN Settings_Nationality on Settings_Nationality.NationalityID=Staff.NationalityID
                LEFT JOIN Settings_Office so on so.OfficeID=Staff.OfficeID
                WHERE Staff.isRemoved=0 and Staff.StaffID=:StaffID;";
                $UserData = DBController::sendData($query1, $param1);
                return array("return_code" => true, "return_data" =>  $UserData);
            }
            // intern
            else  if ($ActiveUser['UserType'] == 3) {

                $param1 = array(
                    array(":StaffInternID", $ActiveUser['StaffID'])
                );
                $query1 = "SELECT si.`StaffInternID`, si.`StaffInternName`, si.`StaffInternCode`, si.`ContactNo`, si.`EmailID`, si.`GenderCode`, si.`DOB`, si.`ReligionID`, si.`CasteCode`, si.`CommunityID`, si.`NationalityID`, si.`Address`, si.`Photo`, si.`CategoryID`, si.`DepartmentID`,Settings_Religion.Religion, Settings_Caste.Caste, Settings_Community.`CommunityName`,Settings_Nationality.NationalityName
                FROM `Staff_Intern` si
                LEFT JOIN Settings_Gender ON Settings_Gender.GenderCode=si.GenderCode 
                LEFT JOIN Settings_Caste ON Settings_Caste.CasteCode=si.CasteCode 
                LEFT JOIN Settings_Religion ON Settings_Religion.ReligionID=si.ReligionID 
                LEFT JOIN Settings_Community ON Settings_Community.CommunityID=si.CommunityID 
                LEFT JOIN Settings_Nationality on Settings_Nationality.NationalityID=si.NationalityID
                WHERE si.`isRemoved`=0 and si.StaffInternID=:StaffInternID;";
                $UserData = DBController::sendData($query1, $param1);
                return array("return_code" => true, "return_data" =>  $UserData);
            } else {
                return array("return_code" => false, "return_data" =>  "Invalid UserType");
            }
        }
    }
}
