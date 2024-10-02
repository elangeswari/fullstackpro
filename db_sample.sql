
CREATE TABLE IF NOT EXISTS `fproject` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `CAF` varchar(150) NOT NULL,
  `DOJ` varchar(50) NOT NULL,
  `RN` varchar(50) NOT NULL,
  `NAME` varchar(150) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `BG` varchar(50) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
