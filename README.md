# Comic Viewer 📖

Este proyecto es una web generada a partir de scripts (SSG) escritos en PHP para poder visualizar comics y estar a la última del manga "One Piece"

## Comenzando 🚀

El proyecto en cuanto lo descargas está completamente preparado para ejecutar, pero si deseas saber como funciona mira **Deployment** para conocer como desplegar el proyecto.


### Pre-requisitos 📋 e Instalación 🔧

Para este proyecto se necesita poder ejecutar php en tu máquina.

Hay diferentes formas, en nuestro caso nuestra favorita es docker. A continuación te dejamos unos breves comandos para que puedas preparar el entorno de desarrollo: 



```
- docker image pull ubuntu
- docker run -it --name CONTAINER_NAME ubuntu bash
  Ejemplo: docker run -it --name dwes ubuntu bash
- (Ejecutar como root dentro del contenedor)
  apt update
  apt upgrade
  apt install nano
  apt install git
  apt install lynx
  apt install php
  apt install php-xdebug
  [Ctrl-D]
- docker container commit CONTAINER_NAME IMAGE_NAME
  Ejemplo: docker container commit dwes dwes
```

## Despliegue 📦

Para poder ejecutar el proyecto debes situarte en el archivo "generator.php" y ejecutar "CTRL + F5", de esta forma se ejecutaran todos los scripts y se generaran los html correspondientes en la carpeta "public". Puedes ejecutarlo las veces que quieras **nunca se duplican los archivos!**

*Ejecutar servidor*

Gracias a nuestra instalación de php podemos ejecutar un pequeño servidor web.

Para ejecutar el servidor lo primero que debemos es situarnos en la carpeta "public" y ejecutar los siguiente:

```
- php -S 0.0.0.0:8080 -t .
```

## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* [PHP](https://www.php.net/) - El lenguaje de programación usado
* [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/) - Framework de CSS usado
* [Docker](https://www.docker.com/) - Tecnología usada para la administración de contenedores

## Autores ✒️

* **Jairo Alonso Juárez** - *Programador, documentador y project manager* - [jairoalonsodev](https://github.com/jairoalonsodev)
* **David Moyano Lopez** - *Diseño y Programador* - [daviiidmoyano](https://github.com/daviiidmoyano)

* **Marc Sabina Sala** - *Programador y Tester* - [marcss2003](https://github.com/marcss2003)

También puedes mirar la lista de todos los [contribuyentes](https://github.com/jairoalonsodev/m07_UF1_practice/graphs/contributors) quíenes han participado en este proyecto. 

## Expresiones de Gratitud 🎁

* Comenta a otros sobre este proyecto 📢
* Invita una cerveza 🍺 o un café ☕ a alguien del equipo. 
* Da las gracias públicamente 🤓.
* Si te ha gustado el proyecto danos una estrella 🌟



---
⌨️ con ❤️ por [jairoalonsodev](https://github.com/jairoalonsodev) 😊

