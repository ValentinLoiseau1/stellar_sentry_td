CREATE TABLE _user(
   id_user INT AUTO_INCREMENT,
   login VARCHAR(50)  NOT NULL,
   password VARCHAR(50)  NOT NULL,
   email VARCHAR(50)  NOT NULL,
   name VARCHAR(50)  NOT NULL,
   surname VARCHAR(50)  NOT NULL,
   role VARCHAR(50)  NOT NULL,
   version_tester VARCHAR(50) ,
   PRIMARY KEY(id_user),
   UNIQUE(login),
   UNIQUE(email)
);

CREATE TABLE _update(
   id_update INT AUTO_INCREMENT,
   creation_date DATETIME NOT NULL,
   uptdate_date DATETIME NOT NULL,
   content VARCHAR(300)  NOT NULL,
   id_user INT NOT NULL,
   PRIMARY KEY(id_update),
   FOREIGN KEY(id_user) REFERENCES _user(id_user)
);

CREATE TABLE roadmap_item(
   id_roadmap_item INT AUTO_INCREMENT,
   title VARCHAR(100)  NOT NULL,
   version VARCHAR(100) ,
   date_range VARCHAR(100)  NOT NULL,
   id_user INT NOT NULL,
   PRIMARY KEY(id_roadmap_item),
   FOREIGN KEY(id_user) REFERENCES _user(id_user)
);

CREATE TABLE comment(
   id_comment INT AUTO_INCREMENT,
   title VARCHAR(50)  NOT NULL,
   content VARCHAR(500)  NOT NULL,
   validation_status BOOLEAN NOT NULL,
   id_user INT NOT NULL,
   PRIMARY KEY(id_comment),
   FOREIGN KEY(id_user) REFERENCES _user(id_user)
);
