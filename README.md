# Lab4-PHP-XML-XSL
Laboratorio 4 sobre PHP, XML y XSL

-------------------------------------------------TAREAS OBLIGATORIAS-----------------------------------------------------

1. Modifica el script PHP (InsertarPregunta.php) para que además de guardar la pregunta
en la BD, la incluya como un nuevo elemento <assessmentItem> del fichero preguntas.xml.
Ese programa devolverá como resultado:
  a. Mensaje de error, si la inserción no es posible.
  b. Mensaje de confirmación en caso de ser correcta la inserción y un enlace que permita
  la visualización del contenido del fichero preguntas.xml (el programa de visualización
  es la tarea 2).

2. Escribe un script PHP (VerPreguntasXML.php) para visualizar, mediante una tabla HTML,
el contenido del fichero preguntas.xml. La tabla mostrará el enunciado, la complejidad y
la temática de cada pregunta.


--------------------------------------------------TAREAS OPCIONALES--------------------------------------------------------

Tarea 1: Escribe una transformación XSL (VerPreguntas.xsl) para visualizar mediante una tabla
html el contenido del fichero preguntas.xml. Modificar el fichero preguntas.xml para que
aplique la transformación al ser visualizado en el navegador.

Tarea 2: En el fichero usuarios.xml tenemos información sobre los datos personales de
potenciales usuarios de nuestra aplicación Quiz . Escribir un formulario (ObtenerDatos.html),
para que el profesor pueda, a partir del correo de un usuario, visualizar automáticamente su
Nombre, Apellidos y Teléfono. Para ello el formulario deberá incluir un script que obtenga el
fichero xml, busque los datos del usuario y se los presente en los controles del formulario.
En el caso que el alumno no esté incluido en el fichero, se dará un aviso y se pedirá que se
introduzca un nuevo correo.

NOTA: Todos los ficheros necesarios para realizar estas tareas se subirán a Hostinger y en el
formulario de entrega de la tarea se incluirán enlaces directos a los ficheros preguntas.xml
(tarea 1) y ObtenerDatos.html (tarea 2).
