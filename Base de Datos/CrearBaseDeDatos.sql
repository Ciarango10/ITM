CREATE database MiBase
--mdf
on primary 
(Name = mibasededatos, filename='D:\Data\mibasededatos.mdf',
size=50mb,
Filegrowth = 25%)
--log
log on 
(Name = mibasededatosLog, filename='D:\Data\mibasededatos.ldf',
size=25mb,
Filegrowth = 25%)