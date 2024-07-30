<?php

namespace app\modules\settings\classes;

use app\database\DBController;

class Training
{

    function addTrainingTypes($data)
    {
        $param = array(
            array(":TrainingType", strip_tags($data['TrainingType'])),
        );

        $query = "SELECT count(*) as SameTrainingType FROM  `Settings_TrainingType` WHERE  `TrainingType` =:TrainingType ";
        $res = DBController::sendData($query, $param);
        if ($res['SameTrainingType'] > 0) {
            return array("return_code" => false, "return_data" => "Same Training  Type already exists");
        } else {
            $query = "INSERT INTO `Settings_TrainingType` (`TrainingType`,`isActive`,`CreatedByID`) VALUES (:TrainingType,:isActive,:CreatedByID)";
            $params = array(
                array(':TrainingType', $data['TrainingType']),
                array(':isActive', 1),
                array(':CreatedByID', $_SESSION['UserID']), // Corrected parameter name
            );
            $res = DBController::ExecuteSQL($query, $params);
            if ($res) {
                return array("return_code" => true, "return_data" => "Training Type added successfully");
            } else {
                return array("return_code" => false, "return_data" => "Error while saving the TrainingType");
            }
        }
    }


    function addTraining($data)
    {

        $param = array(
            array(":TrainingTypeID", strip_tags($data['TrainingTypeID'])),
            array(":StaffID", strip_tags($data['StaffID'])),
        );
        $query = "SELECT count(*) as SameTraining FROM  `Settings_Training` WHERE  `TrainingTypeID` =:TrainingTypeID  AND `StaffID` =:StaffID";
        $res = DBController::sendData($query, $param);
        if ($res['SameTraining'] > 0) {
            return array("return_code" => false, "return_data" => "Same Training already exists");
        }
        $param2 = array(
            array(":TrainingTypeID", strip_tags($data['TrainingTypeID'])),
            array(":StaffID", strip_tags($data['StaffID'])),
            array(":FromDate", strip_tags($data['FromDate'])),
            array(":ToDate", strip_tags($data['ToDate'])),
            array(":Description", strip_tags($data['Description'])),

        );

        $insert = "INSERT INTO `Settings_Training` (TrainingTypeID,StaffID,FromDate,ToDate,Description) VALUES (:TrainingTypeID,:StaffID,:FromDate,:ToDate,:Description)";
        $result = DBController::ExecuteSQL($insert, $param2);
        if ($result) {
            return array("return_code" => true, "return_data" => "Training added successfully");
        } else {
            return array("return_code" => false, "return_data" => "Error while saving the Training");
        }
    }


    function getAllTrainingTypes()
    {
        $query = "SELECT * FROM `Settings_TrainingType` WHERE  `isActive` = 1 ";
        $res = DBController::getDataSet($query);
        if ($res) {
            return array("return_code" => true, "return_data" => $res);
        }
        return array("return_code" => false, "return_data" => "No Training Type Available");
    }


    function editTrainingType($data)
    {

        $param = array(
            array(":TrainingTypeID", strip_tags($data['TrainingTypeID'])),
            array(":TrainingType", strip_tags($data['TrainingType'])),
        );
        $query = " UPDATE Settings_TrainingType SET TrainingType=:TrainingType,LastUpdatedDateTime = NOW()  WHERE TrainingTypeID=:TrainingTypeID";
        $res = DBController::ExecuteSQL($query, $param);
        if ($res) {
            return array("return_code" => true, "return_data" => "Training Type updated successfully");
        } else {
            return array("return_code" => false, "return_data" => "Error while updating the Training Type");
        }
    }

    function getAllTraining()
    {
        $query = "SELECT st.FromDate,st.ToDate,st2.TrainingType,s.StaffName,st.isActive  FROM `Settings_Training`  st 
        inner join settings_trainingtype st2  on st2.TrainingTypeID = st.TrainingTypeID
        inner join staff s on s.StaffID  = st.StaffID WHERE  st.`isActive` = 1";
        $res = DBController::getDataSet($query);
        if ($res) {
            return array("return_code" => true, "return_data" => $res);
        }
        return array("return_code" => false, "return_data" => "No Training Available");
    }
}
