<?php

#----------------------------------------------------------------------
# Archivo de configuracion
#
# Contiene configuraciones relacionadas con el envio de correos
#----------------------------------------------------------------------

#----------------------------------------------------------------------
# Section [MODE]
# LOGS
# [Variables]
#   MAIL_DEBUG  : SI-DEGUG/SI-NORMAL/NO: 2/1/0
#   MAIL_STATUS : Define el estatus actual del envío de correos
#                 [Posibles valores]
#                 1 : (ACTIVA) Envío de emails se encuentra en funcionamiento. Los correos van a las cuentas registradas en la APP.
#                 2 : (EN MANTENIMIENTO) Los correos SIEMPRE van a las cuentas de los desarrolladores y no a las cuentas de la APP.
#----------------------------------------------------------------------
define("MAIL_DEBUG", "0");
define("MAIL_STATUS", 1);

#----------------------------------------------------------------------
# Section [GENERAL]
# Configuracion general
# [Variables]
#   MAIL_HOST  : Servidor de correo
#   MAIL_PORT  : Puerto
#   MAIL_USER  : Usuario
#   MAIL_PASS  : Password
#----------------------------------------------------------------------
#define("MAIL_HOST", "stbeehive.oracle.com");
#define("MAIL_PORT", 465); //465,587
#define("MAIL_USER", "l.luis.gonzalez@oracle.com");
#define("MAIL_PASS", "5dY&Kn981");
#define("MAIL_SECURE_SMTP", "ssl"); //ssl,tls

define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_PORT", 465); //465,587
define("MAIL_USER", "monicayluisboda@gmail.com");
define("MAIL_PASS", "Domola8405*"); //P4m4k4J3lug*
define("MAIL_SECURE_SMTP", "ssl");

#----------------------------------------------------------------------
# Section [GENERAL]
# Configuracion general
# [Variables]
#   MAIL_FROM      : Correo "from"
#   MAIL_FROMNAME  : Nombre "from"
#   MAIL_WORDWRAP  : Word wrap
#   MAIL_REPLYTO   : Responder a:
#                    [Posibles valores]
#                       0 : NO
#                       1 : SI 
#----------------------------------------------------------------------
define("MAIL_FROM", "MonicaYLuisBoda@gmail.com");
define("MAIL_FROMNAME", "Monica & Luis");
define("MAIL_WORDWRAP", 80);
define("MAIL_REPLYTO", 1);

#----------------------------------------------------------------------
# Section [GENERAL]
# Configuracion general
# [Variables]
#   MAIL_SUPPORT   : Cuenta de Correo de soporte. Que recibe los correos de Contactenos.
#   MAIL_DEVELOP1  : Cuenta de Correo del 1er desarrollador. Para efectos de Pruebas.
#   MAIL_DEVELOP2  : Cuenta de Correo del 2do desarrollador. Para efectos de Pruebas.
#----------------------------------------------------------------------
define("MAIL_SUPPORT", "support@qcuanto.com");
define("MAIL_DEVELOP1", "lugo.ing@gmail.com");
define("MAIL_DEVELOP2", "moni.olivella@gmail.com");

?>
