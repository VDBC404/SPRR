# 🍽️ SPRR – Sistema Personalizable de Registro de Restaurantes

Aplicación web para que los **restaurantes pequeños y familiares** digitalicen y organicen sus registros básicos (inventario, empleados y menús) de forma sencilla, económica y sin suscripciones mensuales.

> Proyecto desarrollado en la comuna 16 de Medellín, Antioquia, como proyecto de la media técnica en Programación de Software.

---

## 📌 Descripción

Muchos restaurantes familiares llevan sus registros en papel, libretas u hojas de Excel, lo que genera pérdidas de tiempo, errores humanos, desorden en el inventario y gasto innecesario de papel. Las soluciones que existen en el mercado (como OpenTable o Fudo) suelen ser costosas, requieren suscripción y traen más funciones de las que un negocio pequeño necesita.

**SPRR** ofrece una alternativa simple y práctica: un sitio web amigable donde el dueño del restaurante se registra y gestiona toda su información en un solo lugar, con una base de datos que almacena y centraliza los registros.

### ¿A quién va dirigido?

- Dueños de restaurantes pequeños y familiares
- Empleados de dichos restaurantes
- Clientes (beneficiarios indirectos, por una mejor atención)

---

## ✨ Funcionalidades

| Módulo | Descripción |
| --- | --- |
| 🔐 **Registro y acceso** | Registro de restaurantes (NIT, nombre, dirección, correo, contraseña) e inicio de sesión para propietarios. |
| 📋 **Menús** | Crear, editar, consultar y eliminar ítems del menú: nombre, categoría, ingredientes, precio e imagen. |
| 👥 **Empleados** | Registro y gestión del personal: documento, nombre, correo, rol, teléfono, foto y fecha de ingreso. |
| 📦 **Inventario** | Control de productos: cantidad, unidad de medida, categoría, proveedor, notas y fecha/hora de ingreso automática. |
| 🔎 **Búsqueda y filtros** | Búsqueda de menús, empleados y productos por nombre, categoría, etc. |
| 🗑️ **Eliminación en cascada** | Al eliminar un restaurante se eliminan automáticamente sus menús, empleados e inventario. |

---

## 🧰 Tecnologías

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Base de datos:** MySQL
- **Entorno de desarrollo:** Visual Studio Code
- **Servidor local:** XAMPP (Apache + MySQL)

---

## 🗄️ Modelo de datos

Base de datos **SPRR**, con cuatro tablas relacionadas por el `NIT_RESTAURANTE`:

- **`REGISTRO`**: datos del restaurante y su propietario (NIT, nombre, dueño, correo, contraseña, teléfono, dirección).
- **`MENUS`**: ítems del menú (`ID_MENU`, categoría: Entrada / Plato fuerte / Bebida / Postre / Otro, ingredientes, precio, imagen).
- **`REGISTRO_EMPLEADOS`**: empleados (`ID_EMPLEADO`, tipo y número de documento, rol: Cocinero / Mesero / Cajero / Administrador / Multipropósito / Otro, foto, fecha de ingreso).
- **`INVENTARIO`**: productos (`ID_PRODUCTO`, cantidad, unidad de medida, categoría: Verduras / Cárnicos / Lácteos / Bebidas / Otros, proveedor, notas, `TIMESTAMP` de ingreso).

Todas las tablas hijas (`MENUS`, `REGISTRO_EMPLEADOS`, `INVENTARIO`) dependen de `REGISTRO` mediante llave foránea con eliminación en cascada, evitando registros huérfanos.

---

## 📐 Requisitos

### Funcionales

- **RF1** – Registro de restaurantes
- **RF2** – Gestión de menús (CRUD)
- **RF3** – Gestión de empleados (CRUD)
- **RF4** – Gestión de inventario
- **RF5** – Control de acceso con correo y contraseña
- **RF6** – Búsqueda y filtrado
- **RF7** – Eliminación en cascada
- **RF8** – Registro automático de fecha y hora en el inventario

### No funcionales

- **RNF1** – Seguridad: contraseñas almacenadas de forma cifrada
- **RNF2** – Disponibilidad de al menos 99 %
- **RNF3** – Rendimiento: consultas en menos de 3 segundos
- **RNF4** – Escalabilidad para múltiples restaurantes
- **RNF5** – Usabilidad: interfaz intuitiva para usuarios sin experiencia técnica
- **RNF6** – Integridad de datos: sin registros huérfanos
- **RNF7** – Compatibilidad con Chrome, Firefox, Edge y dispositivos móviles
- **RNF8** – Mantenibilidad mediante estructura modular

---

## 🚀 Instalación y ejecución local

1. Instala [XAMPP](https://www.apachefriends.org/) e inicia **Apache** y **MySQL**.
2. Clona el repositorio dentro de la carpeta `htdocs`:
   ```bash
   git clone https://github.com/<tu-usuario>/sprr.git
   ```
3. Abre **phpMyAdmin** (`http://localhost/phpmyadmin`) y crea la base de datos `SPRR`.
4. Importa el script SQL del proyecto para crear las tablas.
5. Ajusta las credenciales de conexión a la base de datos en el archivo de configuración.
6. Abre `http://localhost/sprr` en tu navegador.

---

## 🎯 Objetivos

**General:** desarrollar un software que permita automatizar los registros de restaurantes pequeños o familiares, almacenando la información en una base de datos para su posterior gestión y visualización en la página web.

**Específicos:**

- Crear un software sencillo, práctico y fácil de usar.
- Adaptar el software a las necesidades de cada restaurante.
- Implementar funciones básicas de registro, consulta, modificación y eliminación de datos.
- Conectar la base de datos con la página web para visualizar y gestionar la información en línea.

---

## 💡 Valor agregado

- **Autonomía total** del restaurante para manejar sus registros como prefiera.
- **Sencillez y economía:** sin suscripción mensual, solo el costo de instalación inicial.
- **Personalización** al momento de la instalación.
- **Ahorro de papel**, con un impacto ambiental positivo.

| Área | Operación tradicional | Con SPRR |
| --- | --- | --- |
| Inventario | Control manual, pérdidas por errores | Registro digital de entradas y salidas |
| Empleados | Listados en papel, difícil seguimiento | Base de datos organizada |
| Información del restaurante | Documentos físicos | Acceso digital rápido |
| Eficiencia | Mucho tiempo en tareas administrativas | Ahorro de tiempo y menos errores |

---

## 🌱 Impacto

- **Económico:** alternativa viable y de bajo costo frente a otros sistemas.
- **Social:** acerca la tecnología a pequeños negocios de la comuna 16 de Medellín.
- **Ambiental:** reduce el consumo de papel.

---

## 🔭 Alcance

El proyecto abarca restaurantes pequeños y familiares de la comuna 16 de Medellín. Es un sistema intencionalmente simple y funcional, enfocado en los registros esenciales (inventario, empleados y menús), sin interconectividad entre sucursales ni funciones complejas de facturación.

---

## 📚 Referencias

- Villoslada Romero, E. D. (2017). *Implementación de un sistema de control interno para optimizar los procesos de facturación y registros de compra-venta del restaurante La Choza Náutica SAC de la sede de Los Olivos.*
- Nagano, C., & Almeida Junior, N. M. D. (2013). *Sistema para gerenciamento de restaurantes de pequeno porte.* Universidade Tecnológica Federal do Paraná.
- Velasco Neira, A. (2020). *Análisis de aplicación móvil para gestionar el registro de reservaciones en el restaurante "Maily"-Piura, 2020.*

---

## 📄 Licencia


Proyecto académico.
