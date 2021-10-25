CREATE TABLE `administrators` (
  `id_administrator` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `email` char(50) NOT NULL UNIQUE,
  `password` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `students` (
  `id_student` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_career` int UNSIGNED NOT NULL,
  `identifier` int UNSIGNED NOT NULL UNIQUE,
  `name` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `email` char(50) NOT NULL UNIQUE,
  `password` char(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `students_subjects` (
  `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_student` int UNSIGNED NOT NULL,
  `id_subject` int UNSIGNED NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `careers` (
  `id_career` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` char(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `subjects` (
  `id_subject` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` char(80) NOT NULL UNIQUE,
  `teacher` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `subjects_careers` (
  `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_subject` int UNSIGNED NOT NULL,
  `id_career` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

COMMIT;