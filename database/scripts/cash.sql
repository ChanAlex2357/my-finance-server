CREATE TABLE users(
   id VARCHAR(255) ,
   email VARCHAR(255) ,
   password VARCHAR(255)  NOT NULL,
   token VARCHAR(255) ,
   token_expiration TIMESTAMP,
   PRIMARY KEY(id)
);

CREATE TABLE professional_status(
   id VARCHAR(255) ,
   val VARCHAR(255)  NOT NULL,
   desce VARCHAR(255) ,
   PRIMARY KEY(id)
);

CREATE TABLE currency(
   id VARCHAR(255) ,
   val VARCHAR(255)  NOT NULL,
   desce VARCHAR(255) ,
   PRIMARY KEY(id)
);

CREATE TABLE mode(
   id VARCHAR(255) ,
   val VARCHAR(255)  NOT NULL,
   desce VARCHAR(255) ,
   PRIMARY KEY(id)
);

CREATE TABLE supplier(
   id VARCHAR(255) ,
   name VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE product_tva(
   id VARCHAR(255) ,
   tva NUMERIC(15,2)   NOT NULL,
   tva_date TIMESTAMP NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE bank(
   id VARCHAR(255) ,
   name VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE budget_post(
   id VARCHAR(255) ,
   val VARCHAR(255)  NOT NULL,
   desce VARCHAR(255) ,
   PRIMARY KEY(id)
);

CREATE TABLE assignment(
   id VARCHAR(255) ,
   name VARCHAR(255)  NOT NULL,
   id_user VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_user) REFERENCES users(id)
);

CREATE TABLE unit(
   id VARCHAR(255) ,
   val VARCHAR(255)  NOT NULL,
   desce VARCHAR(255) ,
   PRIMARY KEY(id)
);

CREATE TABLE product_info(
   id VARCHAR(255) ,
   id_unit VARCHAR(255)  NOT NULL,
   id_tva VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_unit) REFERENCES unit(id),
   FOREIGN KEY(id_tva) REFERENCES product_tva(id)
);

CREATE TABLE history(
   id VARCHAR(255) ,
   description VARCHAR(255) ,
   ref_id VARCHAR(255)  NOT NULL,
   ref_table VARCHAR(255) ,
   data VARCHAR(255) ,
   id_user VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_user) REFERENCES users(id)
);

CREATE TABLE user_profile(
   id VARCHAR(255) ,
   name VARCHAR(50) ,
   last_name VARCHAR(255) ,
   birth_date DATE,
   salary NUMERIC(15,2)  ,
   id_user VARCHAR(255)  NOT NULL,
   id_professional_status VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_user) REFERENCES users(id),
   FOREIGN KEY(id_professional_status) REFERENCES professional_status(id)
);

CREATE TABLE account(
   id VARCHAR(255) ,
   name VARCHAR(255) ,
   description VARCHAR(255) ,
   is_active BOOLEAN,
   id_bank VARCHAR(255)  NOT NULL,
   id_user VARCHAR(255)  NOT NULL,
   id_currency VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_bank) REFERENCES bank(id),
   FOREIGN KEY(id_user) REFERENCES users(id),
   FOREIGN KEY(id_currency) REFERENCES currency(id)
);

CREATE TABLE cash_report(
   id VARCHAR(255) ,
   description VARCHAR(255) ,
   report_date TIMESTAMP NOT NULL,
   report_amout NUMERIC(15,2)   NOT NULL,
   estimation_amount NUMERIC(15,2)  ,
   id_account VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_account) REFERENCES account(id)
);

CREATE TABLE category(
   id VARCHAR(255) ,
   val VARCHAR(255)  NOT NULL,
   desce VARCHAR(255) ,
   id_post VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_post) REFERENCES budget_post(id)
);

CREATE TABLE post_config(
   id VARCHAR(255) ,
   date_config TIMESTAMP NOT NULL,
   budget_limit NUMERIC(15,2)   NOT NULL,
   id_post VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_post) REFERENCES budget_post(id)
);

CREATE TABLE product(
   id VARCHAR(255) ,
   name VARCHAR(255)  NOT NULL,
   ref_product VARCHAR(255)  NOT NULL,
   img_url VARCHAR(255) ,
   purchasable BOOLEAN NOT NULL,
   saleable BOOLEAN NOT NULL,
   id_info VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(id_info),
   FOREIGN KEY(id_info) REFERENCES product_info(id)
);

CREATE TABLE contact(
   id VARCHAR(255) ,
   tel VARCHAR(255) ,
   adresse VARCHAR(255) ,
   id_user VARCHAR(255)  NOT NULL,
   id_supplier VARCHAR(255) ,
   PRIMARY KEY(id),
   FOREIGN KEY(id_user) REFERENCES user_profile(id),
   FOREIGN KEY(id_supplier) REFERENCES supplier(id)
);

CREATE TABLE product_supplier(
   id VARCHAR(255) ,
   price NUMERIC(15,2)   NOT NULL,
   price_date TIMESTAMP NOT NULL,
   id_product VARCHAR(255)  NOT NULL,
   id_supplier VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_product) REFERENCES product(id),
   FOREIGN KEY(id_supplier) REFERENCES supplier(id)
);

CREATE TABLE transfet(
   id VARCHAR(255) ,
   amount NUMERIC(15,2)   NOT NULL,
   status INTEGER NOT NULL,
   transfert_date TIMESTAMP NOT NULL,
   id_receiver VARCHAR(255)  NOT NULL,
   id_sender VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_receiver) REFERENCES account(id),
   FOREIGN KEY(id_sender) REFERENCES account(id)
);

CREATE TABLE account_info(
   id VARCHAR(255) ,
   etablissement VARCHAR(255) ,
   guichet_code VARCHAR(255) ,
   account_num VARCHAR(255) ,
   rib_key VARCHAR(255) ,
   bic VARCHAR(255) ,
   iban VARCHAR(255) ,
   id_account VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_account) REFERENCES account(id)
);

CREATE TABLE deposit(
   id VARCHAR(255) ,
   amount NUMERIC(15,2)   NOT NULL,
   deposit_date TIMESTAMP,
   id_account VARCHAR(255)  NOT NULL,
   id_user VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_account) REFERENCES account(id),
   FOREIGN KEY(id_user) REFERENCES users(id)
);

CREATE TABLE expense(
   id VARCHAR(255) ,
   description VARCHAR(255) ,
   expense_date TIMESTAMP NOT NULL,
   status INTEGER NOT NULL,
   id_user VARCHAR(255)  NOT NULL,
   id_assignment VARCHAR(255) ,
   id_mode VARCHAR(255)  NOT NULL,
   id_category VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_user) REFERENCES users(id),
   FOREIGN KEY(id_assignment) REFERENCES assignment(id),
   FOREIGN KEY(id_mode) REFERENCES mode(id),
   FOREIGN KEY(id_category) REFERENCES category(id)
);

CREATE TABLE transactions(
   id VARCHAR(255) ,
   entry NUMERIC(15,2)  ,
   exit NUMERIC(15,2)  ,
   mvt_date TIMESTAMP NOT NULL,
   id_deposit VARCHAR(255) ,
   id_transfert VARCHAR(255) ,
   id_expense VARCHAR(255) ,
   id_account VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_deposit) REFERENCES deposit(id),
   FOREIGN KEY(id_transfert) REFERENCES transfet(id),
   FOREIGN KEY(id_expense) REFERENCES expense(id),
   FOREIGN KEY(id_account) REFERENCES account(id)
);

CREATE TABLE expense_details(
   id VARCHAR(255) ,
   quantity INTEGER NOT NULL,
   amount_ht NUMERIC(15,2)   NOT NULL,
   amount_tva NUMERIC(15,2)   NOT NULL,
   amount_ttc VARCHAR(255)  NOT NULL,
   unit_price NUMERIC(15,2)   NOT NULL,
   tva NUMERIC(15,2)   NOT NULL,
   id_product_supplier VARCHAR(255)  NOT NULL,
   id_expense VARCHAR(255)  NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_product_supplier) REFERENCES product_supplier(id),
   FOREIGN KEY(id_expense) REFERENCES expense(id)
);
