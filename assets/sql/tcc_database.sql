CREATE SEQUENCE SETOR_SEQ START WITH 1;
CREATE TABLE SETOR(
    ID_SETOR NUMBER NOT NULL PRIMARY KEY,
    NM_SETOR VARCHAR2(265) DEFAULT NULL
);

COMMENT ON COLUMN "SETOR"."NM_SETOR" IS 'NOME DO SETOR';

CREATE SEQUENCE USUARIO_SEQ START WITH 1;
CREATE TABLE USUARIO(
    ID_USUARIO NUMBER NOT NULL PRIMARY KEY,
    CD_MATRICULA VARCHAR2(10) DEFAULT NULL UNIQUE,
    NM_USUARIO VARCHAR2(265) DEFAULT NULL,
    CPF_USUARIO VARCHAR2(15) UNIQUE,
    DT_NASCIMENTO DATE,
    EMAIL_USUARIO VARCHAR2(64) DEFAULT NULL,
    CEL_USUARIO VARCHAR2(15) DEFAULT NULL,
    ENDERECO_USUARIO VARCHAR2(265) DEFAULT NULL, 
    ID_SETOR NUMBER NOT NULL,
    PSW_USUARIO VARCHAR2(265) NOT NULL,
    ATIVO VARCHAR2(1),
    CONSTRAINT FK_USUARIO_SETOR FOREIGN KEY (ID_SETOR) REFERENCES SETOR(ID_SETOR) ON DELETE CASCADE
);

COMMENT ON COLUMN "USUARIO"."CD_MATRICULA" IS 'CÓDIGO DE MATRICULA DO FUNCIONÁRIO';
COMMENT ON COLUMN "USUARIO"."NM_USUARIO" IS 'NOME DO FUNCIONÁRIO';
COMMENT ON COLUMN "USUARIO"."DT_NASCIMENTO" IS 'DATA DE NASCIMENTO DO FUNCIONÁRIO';
COMMENT ON COLUMN "USUARIO"."CEL_USUARIO" IS 'NÚMERO CELULAR DO FUNCIONÁRIO';
COMMENT ON COLUMN "USUARIO"."ID_SETOR" IS 'CÓDIGO DO SETOR DO FUNCIONÁRIO';
COMMENT ON COLUMN "USUARIO"."PSW_USUARIO" IS 'SENHA DO FUNCIONÁRIO';
COMMENT ON COLUMN "USUARIO"."ATIVO" IS 'FUNCIONÁRIO ATIVO';

CREATE SEQUENCE COVID_SEQ START WITH 1;
CREATE TABLE COVID(
    ID NUMBER NOT NULL PRIMARY KEY,
    DS_ARQUIVO VARCHAR2(256) DEFAULT NULL,
    DT_CRIACAO DATE,	
    DT_ATUALIZACAO DATE,
    ID_USUARIO NUMBER NOT NULL,
    SITE VARCHAR2(256) DEFAULT NULL,
    DIRETORIO VARCHAR2(256) DEFAULT NULL,
    CONSTRAINT FK_COVID_USUARIO FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO) ON DELETE CASCADE
);

COMMENT ON COLUMN "COVID"."DS_ARQUIVO" IS 'DESCRIÇÃO DO ARQUIVO';
COMMENT ON COLUMN "COVID"."DT_CRIACAO" IS 'DATA DE CRIAÇÃO';
COMMENT ON COLUMN "COVID"."DT_ATUALIZACAO" IS 'DATA DA ÚLTIMA ATUALIZAÇÃO';
COMMENT ON COLUMN "COVID"."SITE" IS 'ENDEREÇO WEB DO DOWNLOAD';
COMMENT ON COLUMN "COVID"."DIRETORIO" IS 'DIRETÓRIO DE ARMAZENAMENTO DO ARQUIVO';

INSERT INTO SETOR (ID_SETOR,NM_SETOR) VALUES (SETOR_SEQ.NEXTVAL,'TECNOLOGIA DA INFORMACAO');

INSERT INTO USUARIO (ID_USUARIO, CD_MATRICULA, NM_USUARIO, CPF_USUARIO, DT_NASCIMENTO, EMAIL_USUARIO, CEL_USUARIO, ENDERECO_USUARIO, ID_SETOR, PSW_USUARIO) 
VALUES (usuario_seq.nextval, 'F00001','Administrador','000.000.000-00',to_date('10/10/01','DD/MM/YYYY'),'email@email.com',''32 00000-0000','Rua A','1','25d55ad283aa400af464c76d713c07ad');
