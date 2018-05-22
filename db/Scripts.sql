--karin espinoza
--ana maria castañeda

create table usuarios(
  id varchar(100) PRIMARY KEY,
  nombre varchar(100),
  email varchar(100),
  celular varchar(100),
  nro_invitados int(6),
  invitado varchar(10),
  fecha_invitacion TIMESTAMP,
  confirmo varchar(10),
  nro_confirmados int(6),
  fecha_confirmo TIMESTAMP,
  obs varchar(1000),
  mesa varchar(20)
);

alter table usuarios add obs varchar(1000)

create table invitados(
  id_usuario varchar(100),
  seq int(6),
  nombre varchar(100),
  nombre_completo varchar(100),
  email varchar(100),
  celular varchar(100),
  confirmado varchar(10),
  llego int(6) default -1,
  PRIMARY KEY (id_usuario, seq),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id) 
);


--  Isa
insert into usuarios(id,nombre,email,celular,nro_invitados,
                     invitado,fecha_invitacion,confirmo,nro_confirmados,fecha_confirmo)
values('isa','Isa','isa@gmail.com','3004509080',1,
       'SI',CURDATE(),'NO',0,NULL);
       
insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('isa',1,'Isa','Isabel AAA','isa@gmail.com',
       '3004509080','NO'); 
       
       
--  truizd
insert into usuarios(id,nombre,email,celular,nro_invitados,
                     invitado,fecha_invitacion,confirmo,nro_confirmados,fecha_confirmo)
values('truizd','Tulio','truizd@gmail.com','3004509080',2,
       'SI',CURDATE(),'NO',0,NULL);
       
insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('truizd',1,'Tulio','Tulio Ruiz','truizd@gmail.com',
       '3004509080','NO');                      

insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('truizd',2,'Yanet','Yanet Ortiz','yanet.ortiz@mvm.com.co',
       '3056785645','NO'); 

--  etachej
insert into usuarios(id,nombre,email,celular,nro_invitados,
                     invitado,fecha_invitacion,confirmo,nro_confirmados,fecha_confirmo)
values('etachej','Edith','etachej@gmail.com','3004509080',2,
       'SI',CURDATE(),'NO',0,NULL);
       
insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('etachej',1,'Edith','Edith Tache','etachej@gmail.com',
       '3004509080','NO');                      

insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('etachej',2,'Ramon','Ramon Ortiz','ramon.ortiz@mvm.com.co',
       '3056785645','NO'); 

-- lili
insert into usuarios(id,nombre,email,celular,nro_invitados,
                     invitado,fecha_invitacion,confirmo,nro_confirmados,fecha_confirmo)
values('lili','Liliam','lili@gmail.com','3004509080',3,
       'SI',CURDATE(),'NO',0,NULL);
       
insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('lili',1,'Liliam','Liliam AAA','liliam@gmail.com',
       '3004509080','NO');    

insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('lili',2,'Monica','Monica AAA','monica@gmail.com',
       '3004509080','NO'); 
       
insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('lili',3,'Julio','Julio AAA','julio@gmail.com',
       '3004509080','NO'); 

--  albertog
insert into usuarios(id,nombre,email,celular,nro_invitados,
                     invitado,fecha_invitacion,confirmo,nro_confirmados,fecha_confirmo)
values('albertog','Alberto','lugo.ing@gmail.com','3116552659',2,
       'SI',CURDATE(),'NO',0,NULL);
       
insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('albertog',1,'Alberto','Alberto Gonzalez','lugo.ing@gmail.com',
       '3116552659','NO');                      

insert into invitados(id_usuario,seq,nombre,nombre_completo,email,
                      celular,confirmado)
values('albertog',2,'Andrea','Andrea Olivella','moni.olivella@gmail.com',
       '3005141198','NO'); 
       
create table opciones(
  nro_invitados int(6),
  seq int(6),
  seq_inv varchar(100),
  PRIMARY KEY (nro_invitados, seq)
);

-- 1 invitado
insert into opciones(nro_invitados,seq,seq_inv)
values(1,1,'Si Asistir&eacute; ({1})');

-- 2 invitados
insert into opciones(nro_invitados,seq,seq_inv)
values(2,1,'Ambos Asistiremos ({1} y {2})');

insert into opciones(nro_invitados,seq,seq_inv)
values(2,2,'Solo Asistir&aacute; {1}');

insert into opciones(nro_invitados,seq,seq_inv)
values(2,3,'Solo Asistir&aacute; {2}');

-- 3 invitados
insert into opciones(nro_invitados,seq,seq_inv)
values(3,1,'Los 3 Asistiremos ({1}, {2} y {3})');

insert into opciones(nro_invitados,seq,seq_inv)
values(3,2,'Solo Asistir&aacute; {1}');

insert into opciones(nro_invitados,seq,seq_inv)
values(3,3,'Solo Asistir&aacute; {2}');

insert into opciones(nro_invitados,seq,seq_inv)
values(3,4,'Solo Asistir&aacute; {3}');

insert into opciones(nro_invitados,seq,seq_inv)
values(3,5,'Asistiremos {1} y {2}');

insert into opciones(nro_invitados,seq,seq_inv)
values(3,6,'Asistiremos {1} y {3}');

insert into opciones(nro_invitados,seq,seq_inv)
values(3,7,'Asistiremos {2} y {3}');


select o.seq_inv
from usuarios u, opciones o
where u.id = 'truizd'
and o.nro_invitados = u.nro_invitados
order by o.seq;

UPDATE usuarios SET mesa = '10' WHERE id = 'lili';
UPDATE usuarios SET mesa = '5' WHERE id = 'truizd';
UPDATE usuarios SET mesa = '7' WHERE id = 'etachej';
UPDATE usuarios SET mesa = '3' WHERE id = 'isa';

update invitados
set email = 'lugo.ing@gmail.com'
where seq = '1';

update invitados
set email = 'eroseninpaisa@gmail.com'
where seq = '2';

update invitados
set email = 'moni.olivella@gmail.com'
where seq = '3';