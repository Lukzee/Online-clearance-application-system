/*! studentInfo table*/
CREATE TABLE `studentInfo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,  
  `department` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `regNo` varchar(20) NOT NULL,
  `yearEnt` varchar(10) NOT NULL,
  `yearGrad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `studentInfo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `studentInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


  
/*! hodInfo table*/
CREATE TABLE `hodInfo` (
  `hodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,  
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `hodInfo`
  ADD PRIMARY KEY (`hodId`);

ALTER TABLE `hodInfo`
  MODIFY `hodId` int(11) NOT NULL AUTO_INCREMENT;
  
  
  
/*! librarianInfo table*/
CREATE TABLE `librarianInfo` (
  `libId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `librarianInfo`
  ADD PRIMARY KEY (`libId`);

ALTER TABLE `librarianInfo`
  MODIFY `libId` int(11) NOT NULL AUTO_INCREMENT;



/*! csoInfo table*/
CREATE TABLE `csoInfo` (
  `csoId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `csoInfo`
  ADD PRIMARY KEY (`csoId`);

ALTER TABLE `csoInfo`
  MODIFY `csoId` int(11) NOT NULL AUTO_INCREMENT;



/*! saoInfo table*/
CREATE TABLE `saoInfo` (
  `saoId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `saoInfo`
  ADD PRIMARY KEY (`saoId`);

ALTER TABLE `saoInfo`
  MODIFY `saoId` int(11) NOT NULL AUTO_INCREMENT;



/*! cRequest table*/
CREATE TABLE `cRequest` (
  `rid` int(11) NOT NULL,
  `sName` varchar(50) NOT NULL,
  `regNo` varchar(20) NOT NULL,
  `sDepartment` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `hodreply` varchar(10) NOT NULL,  
  `hRepdate` varchar(20) NULL,
  `libreply` varchar(10) NOT NULL,  
  `lRepdate` varchar(20) NULL,
  `csoreply` varchar(10) NOT NULL,  
  `csoRepdate` varchar(20) NULL,
  `saoreply` varchar(10) NOT NULL,  
  `saoRepdate` varchar(20) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `cRequest`
  ADD PRIMARY KEY (`rid`);

ALTER TABLE `cRequest`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
