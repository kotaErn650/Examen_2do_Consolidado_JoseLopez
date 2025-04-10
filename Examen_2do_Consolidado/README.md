Se desea realizar un sistema CRUD (Crear, Leer, Actualizar  y Eliminar ) por medio de un aplicacion 
la cual Gestionara la informacion de estudiantes, cursos e Inscripcones


1) realizar estructura de las MIGRACIONES  con sus respectivas relaciones y llaveas primarias
    Estudiantes - cursus - Inscripciones
    
    *Estudiantes (Entidad Fuerte)
        id (PK)
        nombre
        apellido
        fecha_nacimiento
        email
    *Cursos (Entidad Fuerte)
        id (PK)
        nombre
        descripción
        duración
    *Inscripciones (Entidad Débil - Relaciona Estudiantes y Cursos)
        id (PK)
        estudiante_id (FK)
        curso_id (FK)
        fecha_inscripción



2) realizar l0s respectivos Contrioladores ( par caa una de las tablas)

3) crear los MIDELS da cada uno 

4) ealizar los VIEWS 

5) Implement Herramientas BootsTrap paaara agilizar el proceso de Eslilos E interfaces Graficas

6) implemetar Contrtolador de verciones GITHub

