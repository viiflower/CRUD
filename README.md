\# Aplicación CRUD con PostgreSQL



Una aplicación web para gestionar clientes, desarrollada con PHP y PostgreSQL.



\## 🚀 Funcionalidades

\- ➕ Agregar nuevos clientes

\- ✏️ Editar información de clientes  

\- 🗑️ Eliminar clientes

\- 📋 Listar todos los clientes



\## 🛠️ Tecnologías utilizadas

\- \*\*Backend:\*\* PHP

\- \*\*Base de datos:\*\* PostgreSQL

\- \*\*Frontend:\*\* HTML, CSS

\- \*\*Servidor:\*\* Apache



\## 📊 Estructura de la base de datos

```sql

CREATE TABLE clientes (

&nbsp; id SERIAL PRIMARY KEY,

&nbsp; nombre VARCHAR(50),

&nbsp; correo VARCHAR(100)

);

