CREATE TABLE DragoManagers (
 DragoManagerID      INT(11)      NOT NULL   AUTO_INCREMENT,
 emailAddress VARCHAR(255) NOT NULL   UNIQUE,
 password     VARCHAR(64)     NOT NULL,
 pronouns    VARCHAR(60)  NOT NULL,
 firstName    VARCHAR(60)  NOT NULL,
 lastName     VARCHAR(60)  NOT NULL,
 dateCreated    DATETIME  NOT NULL,
  PRIMARY KEY (DragoManagerID)
);

INSERT INTO StoreManagers
(emailAddress, password, pronouns, firstName, lastName, dateCreated)
VALUES
('john@electronicsstore.com', SHA2('E1ectr0n1cPass!', 256), 'He/Him', 'John', 'Smith', NOW());

INSERT INTO StoreManagers
(emailAddress, password, pronouns, firstName, lastName, dateCreated)
VALUES
('jackie@electronicsstore.com', SHA2('B00kL0v3r$', 256), 'She/Her', 'Jackie', 'Rowe', NOW());

INSERT INTO StoreManagers
(emailAddress, password, pronouns, firstName, lastName, dateCreated)
VALUES
('bob@electronicsstore.com', SHA2('F4sh10n@cc3ss!', 256), 'He/Him', 'Bob', 'Johnson', NOW());

