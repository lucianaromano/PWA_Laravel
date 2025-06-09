# PWA | TP LARAVEL | Grupo Nro 5
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
 - Tecnicatura Universitaria en Desarrollo Web
 - Facultad de Informática
 - Universidad Nacional del Comahue
 - Programacion Web Avanzada
 
 ## Integrantes del Grupo N°5
 - **Braian Ledantes** - Legajo FAI-1686 - mail: braian.ledantes@est.fi.uncoma.edu.ar - Github: braianledantes
 - **Clara Pelozo** - Legajo FAI-4938 - mail: clara.pelozo@est.fi.uncoma.edu.ar - Github: ClariMel1
 - **Luciana Romano** - Legajo FAI-3075 - mail: luciana.romano@est.fi.uncoma.edu.ar - Github: Lucianaromano


## Instalación

Sigue estos pasos para instalar y ejecutar este proyecto Laravel:

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/tu-usuario/laravel-myPosts.git
   cd laravel-myPosts
   ```

2. **Instala las dependencias de PHP:**
   ```bash
   composer install
   ```

3. **Copia el archivo de entorno y genera la clave de la aplicación:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configura la base de datos**  
   Edita el archivo `.env` y ajusta las variables `DB_DATABASE`, `DB_USERNAME`, y `DB_PASSWORD` según tu entorno.

5. **Ejecuta las migraciones:**
   ```bash
   php artisan migrate
   ```

6. **Instala las dependencias de Node.js y compila los assets (opcional):**
   ```bash
   npm install
   npm run build
   ```

7. **Inicia el servidor de desarrollo:**
   ```bash
   composer run dev
   ```

Accede a la aplicación en [http://localhost:8000](http://localhost:8000).

## Esquema de íconos para los commits
por
| Ícono | Tipo de Cambio | Descripción |
| --- | --- | --- |
| ✨ (`:sparkles:`) | **Nueva Funcionalidad** | Agregar una nueva característica o funcionalidad. |
| 🐛 (`:bug:`) | **Corrección de Errores** | Resolver un bug o problema reportado. |
| ♻️ (`:recycle:`) | **Refactorización** | Mejorar el código sin cambiar su funcionalidad (reorganización o limpieza). |
| 📝 (`:memo:`) | **Documentación** | Cambios o adiciones en la documentación del proyecto. |
| 🎨 (`:art:`) | **Mejoras de Estilo** | Ajustes relacionados con el formato o estilo del código (p. ej., indentación). |
| 🔧 (`:wrench:`) | **Configuración** | Cambios en archivos de configuración (p. ej., `.env`, `package.json`). |
| 🚀 (`:rocket:`) | **Optimización** | Mejoras en el rendimiento o en el tiempo de ejecución. |
| 🔥 (`:fire:`) | **Eliminación de Código** | Quitar código o archivos innecesarios. |
| ✅ (`:white_check_mark:`) | **Tests** | Añadir o modificar tests automatizados. |
| 🚑️ (`:ambulance:`) | **Hotfix** | Correcciones urgentes en producción. |
| 🐎 (`:horse_racing:`) | **Performance** | Cambios para mejorar el rendimiento del sistema. |
| 🛠️ (`:hammer_and_wrench:`) | **Mantenimiento** | Tareas de mantenimiento general (p. ej., actualización de dependencias). |
| 📦️ (`:package:`) | **Dependencias** | Cambios relacionados con dependencias (p. ej., instalación o actualización). |
| ⚙️ (`:gear:`) | **Infraestructura** | Cambios en la infraestructura del proyecto (p. ej., CI/CD, Docker). |
| 🌐 (`:globe_with_meridians:`) | **Internacionalización** | Cambios en soporte de idiomas o localización. |
| 💄 (`:lipstick:`) | **UI/UX** | Cambios en la interfaz de usuario o experiencia del usuario. |



## Paleta de colores utilizada

https://colorhunt.co/palette/e55050732255b2c6d5e7f2e4