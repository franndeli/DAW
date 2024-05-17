## Proyecto: Desarrollo de Aplicaciones Web

Bienvenido a "Respiro natural", un proyecto desarrollado durante la asignatura de Desarrollo de Aplicaciones Web en el 3º año de Ingeniería Multimedia. Este proyecto consta de varias prácticas, cada una de las cuales contribuye al desarrollo y funcionalidad de un sistema gestor de álbumes de fotos que teníamos que crear. 

El repositorio está separado en ramas según el desarrollo de cada práctica, de esta manera se puede observar el desarrollo completo de la aplicación práctica a práctica. A continuación, se detallan cada una de las prácticas desarrolladas:

### Práctica 1: Prototipado de una Aplicación Web

#### Objetivos
- Aprender a prototipar una aplicación web.

#### Descripción del Sistema
Desarrollamos un sistema gestor de álbumes de fotos llamado "Respiro natural". Este sistema permite a los usuarios registrarse, crear álbumes y publicar fotos. Se implementan tres tipos de acceso:
- **Parte pública:** Accesible por cualquier usuario.
- **Parte pública restringida:** Accesible solo por usuarios registrados.
- **Parte privada:** Accesible únicamente por el usuario correspondiente.

#### Actividades Realizadas
- Diagramas de estructura y navegación.
- Prototipos (wireframes) de las páginas principales y resultados de búsqueda.

### Práctica 2: HTML (1)

#### Objetivos
- Aprender el lenguaje de marcado HTML.
- Publicar un sitio web en Internet.

#### Actividades Realizadas
- Creación de las primeras páginas web estáticas:
  - Página principal
  - Formulario de registro
  - Formulario de búsqueda
  - Resultados de búsqueda
  - Detalle de foto
- Publicación del sitio web en un servicio de alojamiento gratuito.

### Práctica 3: HTML (2)

#### Objetivos
- Aprender a diseñar formularios en HTML5.
- Mejorar la usabilidad e interacción de los formularios.

#### Actividades Realizadas
- Implementación de formularios con controles HTML5.
- Validación de formularios en el lado del cliente.
- Creación de formularios de control de acceso, menú de usuario registrado y solicitud de álbum impreso.

### Práctica 4: CSS (1)

#### Objetivos
- Aprender el lenguaje de estilos CSS.
- Crear un estilo adaptativo para dispositivos móviles y de escritorio.

#### Actividades Realizadas
- Aplicación de estilos CSS a las páginas web.
- Creación de un diseño responsivo.
- Integración de una biblioteca de iconos para mejorar la usabilidad.

### Práctica 5: CSS (2)

#### Objetivos
- Crear estilos alternativos, incluyendo un modo noche y estilos de accesibilidad.

#### Actividades Realizadas
- Desarrollo de cinco estilos nuevos:
  - Modo noche
  - Versión impresa
  - Accesibilidad con alto contraste
  - Accesibilidad con letra mayor
  - Combinación de alto contraste y letra mayor
- Implementación de una declaración de accesibilidad en el sitio web.

### Práctica 6: JavaScript

#### Objetivos
- Aprender JavaScript para manipulación del DOM y validación de formularios.

#### Actividades Realizadas
- Validación de formularios en el lado del cliente con JavaScript.
- Creación de una tabla de tarifas dinámicamente con JavaScript.
- Implementación de mensajes de error y validaciones eficientes y usables.

### Práctica 7: Administración de un Servidor Web y PHP (1)

#### Objetivos
- Instalar y configurar XAMPP.
- Aprender los conceptos básicos de PHP.

#### Actividades Realizadas
- Instalación y configuración de XAMPP.
- División de las páginas web en múltiples ficheros PHP.
- Procesamiento de formularios con PHP.
- Desarrollo de un miniframework con enrutador (Modelo-Vista-Controlador) y URL amigables.

### Práctica 8: PHP (2) - Cookies y Sesiones

#### Objetivos
- Aprender a utilizar cookies y sesiones en PHP.

#### Actividades Realizadas
- Implementación de la funcionalidad "Recordarme en este equipo".
- Mostrar mensajes de bienvenida personalizados basados en sesiones.
- Control de acceso seguro a la parte privada mediante sesiones.
- Conservación de estilos seleccionados por el usuario a través de sesiones.

### Práctica 9: PHP (3) - MySQL y Acceso a una Base de Datos

#### Objetivos
- Administrar una base de datos con MySQL.
- Realizar consultas SELECT y mostrar resultados en páginas web.

#### Actividades Realizadas
- Creación de una base de datos "pibd" con tablas para usuarios, países, estilos, álbumes, fotos y solicitudes.
- Modificación de páginas para mostrar datos dinámicos desde la base de datos.
- Implementación de formularios dinámicos con datos obtenidos de la base de datos.

### Práctica 10: PHP (4) - Acceso a una Base de Datos

#### Objetivos
- Realizar operaciones INSERT, UPDATE y DELETE en la base de datos.
- Validar datos en el servidor con PHP.

#### Actividades Realizadas
- Registro de nuevos usuarios y validación de datos.
- Modificación de perfiles de usuario.
- Eliminación de usuarios y sus datos asociados.
- Creación de álbumes y adición de fotos con validaciones.
- Inserción de solicitudes de álbumes impresos en la base de datos.

## Conclusión

Este proyecto ha permitido adquirir y practicar una amplia variedad de habilidades relacionadas con el desarrollo web, desde el prototipado inicial y la creación de páginas estáticas hasta la administración de bases de datos y la programación con PHP. Cada práctica ha contribuido al desarrollo de un sistema gestor de álbumes de fotos funcional y adaptativo, proporcionando una sólida base de conocimientos en desarrollo de aplicaciones web.

## Instalación y Configuración

Para ejecutar este proyecto en tu entorno local, sigue estos pasos:

1. Clona el repositorio: `git clone https://github.com/franndeli/DAW.git`
2. Configura XAMPP o cualquier otra plataforma de desarrollo web similar.
3. Importa la base de datos `pibd.sql` en tu servidor MySQL.
4. Configura las variables de conexión a la base de datos en el archivo `config.php`.
5. Inicia el servidor web y navega a la dirección `http://localhost/tu-proyecto`.

## Contacto

Para cualquier consulta o sugerencia, por favor contacta a `delicadofranvi@gmail.com`.

¡Gracias por tu interés en "Respiro natural"!