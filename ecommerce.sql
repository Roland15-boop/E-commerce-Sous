/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  14/02/2021 15:57:13                      */
/*==============================================================*/


drop table if exists ADMINISTRATEUR;

drop table if exists CLIENT;

drop table if exists COMMANDER;

drop table if exists PRODUIT;

/*==============================================================*/
/* Table : ADMINISTRATEUR                                       */
/*==============================================================*/
create table ADMINISTRATEUR
(
   IDADMIN              int not null AUTO_INCREMENT,
   NOMADMIN             varchar(20),
   PRENOMADMIN          varchar(40),
   PSEUDOADMIN          varchar(20),
   MDPADMIN             varchar(20),
   primary key (IDADMIN)
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   IDCLIENT             int not null AUTO_INCREMENT,
   NOMCLIENT            varchar(20),
   PRENOMCLIENT         varchar(40),
   NUMEROCLIENT         varchar(12),
   LIEUHABITATCLIENT    varchar(150),
   primary key (IDCLIENT)
);

/*==============================================================*/
/* Table : COMMANDER                                            */
/*==============================================================*/
create table COMMANDER
(
   IDCOMMANDE           int not null,
   IDCLIENT             int not null,
   IDPRODUIT            int not null,
   QUANTITECOMMANDE     varchar(10),
   PRIXCOMMANDE         varchar(10),
   DETAILSCOMMANDE      varchar(200),
   DATECOMMANDE         varchar(15),
   HEURECOMMANDE        varchar(10),
   primary key (IDCOMMANDE)
);

/*==============================================================*/
/* Table : PRODUIT                                              */
/*==============================================================*/
create table PRODUIT
(
   IDPRODUIT            int not null AUTO_INCREMENT,
   NOMPRODUIT           varchar(40),
   PRIXPRODUIT          varchar(20),
   DESCRIPPRODUIT       varchar(200),
   CATEGORIEPRODUIT     varchar(20),
   IMAGEPRODUIT1        longblob,
   IMAGEPRODUIT2        longblob,
   IMAGEPRODUIT3        longblob,
   IMAGEPRODUIT4        longblob,
   primary key (IDPRODUIT)
);

alter table COMMANDER add constraint FK_COMMANDER foreign key (IDPRODUIT)
      references PRODUIT (IDPRODUIT) on delete restrict on update restrict;

alter table COMMANDER add constraint FK_COMMANDER2 foreign key (IDCLIENT)
      references CLIENT (IDCLIENT) on delete restrict on update restrict;
