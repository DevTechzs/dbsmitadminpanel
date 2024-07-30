-- Added By dev On 30/7/2024
CREATE TABLE `users` (
  `UserID` mediumint(9) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `UserType` tinyint(4) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'0',
  `CreatedDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `FCMToken` text DEFAULT NULL,
  `SessionID` tinyint(4) NOT NULL
   ADD PRIMARY KEY (`UserID`)
);

ALTER TABLE `users`
  MODIFY `UserID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

  INSERT INTO `users` (`UserID`, `Name`, `Username`, `Password`, `EmailID`, `ContactNo`, `UserType`, `StaffID`, `isActive`, `CreatedDateTime`, `FCMToken`, `SessionID`) VALUES
(1, 'Administrator', 'admin', '7c04837eb356565e28bb14e5a1dedb240a5ac2561f8ed318c54a279fb6a9665e', 'admin@techz.in', '8794151912', 1, NULL, b'1', '2021-11-23 03:38:06', NULL, 1)
-----------------------------------------------------------------


CREATE TABLE `logindetails` (
  `LoginDetailsID` bigint(20) NOT NULL,
  `UserID` int(11) NOT NULL,
  `SessionKey` varchar(50) NOT NULL,
  `SessionExpiryDateTime` datetime NOT NULL,
  `IPAddress` varchar(20) NOT NULL,
  `LoginDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `isSuccessfull` bit(1) NOT NULL DEFAULT b'0',
  `isActive` bit(1) NOT NULL DEFAULT b'0',
  `SessionID` tinyint(4) DEFAULT NULL,
   PRIMARY KEY (`LoginDetailsID`)
);

ALTER TABLE `logindetails`
  MODIFY `LoginDetailsID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;
 ---------------------------------------------------

 CREATE TABLE `iplogging` (
  `ID` bigint(20) NOT NULL,
  `IPAddress` varchar(20) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `URL` text NOT NULL,
  `DATA` text NOT NULL,
  `AccessTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `SessionID` int(11) DEFAULT NULL,
   ADD PRIMARY KEY (`ID`)
);


ALTER TABLE `iplogging`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7892;
  