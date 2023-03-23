[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-c66648af7eb3fe8bc4f294546bfd86ef473780cde1dea487d3c4ff354943c9ae.svg)](https://classroom.github.com/online_ide?assignment_repo_id=10206090&assignment_repo_type=AssignmentRepo)

# **Entregable I**
**Rocío Jiménez Arias**

## **Dominio del problema:**
La Unidad de Cuidados Intensivos (UCI) es el centro de atención médica que proporciona atención a pacientes con problemas de salud potencialmente mortales. Es la unidad de atención crítica de un hospital. Estos pacientes necesitan monitoreo y tratamiento constantes, lo cual puede incluir soporte para las funciones vitales. La ocupación hospitalaria , es la razón entre el número de camas ocupadas (número de pacientes-día) por el número de camas disponibles en determinado período.

  

Los problemas a tratar son la falta de planificación de la ocupación UCI y la limitación de su equipo médico .

Una solución para esto, es diseñar una aplicación que almacene los datos de los pacientes  que pasan por la UCI y las diferentes enfermedades que pueden padecer . Dichos datos, posteriormente se podrían utilizar para poder determinar los tiempos en UCI estimados de los pacientes y así, obtener patrones para poder planificar la salida de un paciente de UCI. Además la aplicación podría almacenar el equipo médico, pudiendo informar de cuál se encuentra disponible y en caso de que no, indicar su ubicación.

## **Objetivos:**

*OBJ-1.* Gestión de pacientes.

Llevar un registro de los pacientes que pasan por esta unidad

*OBJ-2.* Gestión de equipamiento médico.

Determinar qué tipo de equipo médico se encuentra disponible  en cada momento .
  

*OBJ-3.* Gestión de camillas.

Registrar donde se encuentran cada pacientes de esta unidad (ubicación de la cama en UCI).

  
  

## **Usuarios del sistema:**

Roles que interactúan:

  

-*Administrativo de la ICU*: accede al sistema para rellenar los datos personales del paciente y registrar la localización de cada equipo médico.

  

-*Médicos y enfermeros*: Acceden al sistema para registrar el estado de salud del paciente, los tratamientos, las revisiones médicas y todos los datos que fuesen necesarios respecto al estado de salud del paciente .

  

## **Requisitos de información**  

*RI-001. Paciente.*

El sistema deberá permitir almacenar la siguiente información sobre los pacientes
 

-   Nombre    
-   Sexo (Hombre/Mujer)    
-   Edad(Fecha de nacimiento)  
-   Estado de salud al entrar en UCI (agudo, grave o potencialmente recuperable)    
-   Fecha y hora de entrada y salida en la UCI    
-   Estado paciente (vivo o muerto)    
-   Nombre del médico asignado    
-   Número cama asignada    

  

 *RI-002. Enfermedad.*

El sistema deberá almacenar la siguiente información sobre las enfermedades:


-   Nombre enfermedad    
-   Tipo de enfermedad (cardiovascular, pulmonar ,genética, degenerativa, digestiva, respiratoria, locomotora…)    
-   Clasificación de enfermedad(aguda o crónica)    
-   Origen(infecciosa no infecciosa)    
-   Frecuencia(rara, esporádica,epidémicas o pandémicas)
    
 
   

*RI-003. Área UCI.*
El sistema deberá almacenar la siguiente información sobre las diferentes áreas de la UCI:

  
-   Tipo (Cuidados intensivos pediátricos (UCIP), UCI quirúrgica o UCI traumatológica,polivalente)    
-   Número de camas(número de camas que conforman la unidad)    
-   Ubicación(Ej.: Torre A, 1ª planta)
    

  
*RI-004.Equipamiento médico.*
El sistema deberá permitir disponer de la siguiente información sobre el equipo médico:

-   Nombre equipamiento(Ej.: monitor cardiorespiratorio, respirador,sonda pleural…)
-   Tipo de equipo(aparato complejo/dispositivo de monitoreo)    
-   Estado(ocupado/libre)    
-   Localización(ubicación en el almacén o cama del paciente que lo ocupa)
    
 

*RI-005. Personal del hospital.*

El sistema deberá permitir almacenar la siguiente información sobre los pacientes
 
-   Nombre    
-   Sexo (Hombre/Mujer)    
-   Puesto (médico, enfermero o personal administrativo)    
-   Especialidad
    
 
*RI-005. Cama*
El sistema deberá permitir almacenar la siguiente información sobre las camas del hospital
 

-   Número de cama    
-   Ubicación    

  
    

# **Requisitos funcionales :**

  

*RF-1 Datos del paciente.*

Como médico o enfermero:

Quiero poder consultar todos los datos almacenados de un paciente, tanto los datos personales como los relacionados con su enfermedad, además de un listado de todos los equipos médicos que esté ocupando.

Para conocer más al paciente y a su enfermedad para seguir un tratamiento más específico a él, su estado y el equipo médico que no se encuentra disponible

  

*RF-2  Iniciar sesión  Como médico, enfermero o administrativo*: Quiero poder iniciar sesión utilizando su nombre y contraseña Para poder acceder a consultar los datos almacenados en la aplicación, tan solo los usuarios del sistema permitidos pueden entrar.

*RF-3  Añadir nuevo paciente de UCI  Como administrativo*:  Quiero que el sistema permita registrar a un nuevo paciente que ingresa en la UCI por primera vez y no está almacenado en la base de datos. Además de asignarle un identificador único, que será utilizado para poderlo identificar en todos los procedimientos que se le realicen(equipamiento médico, cama que ocupe…).  Para poder incluirlo en la aplicación.

*RF-4  Añadir equipo médico al paciente  Como administrativo*:  Quiero almacenar qué paciente está usando un determinado equipo médico. Asociando el equipo médico al paciente que lo está ocupando.  Para informar que ese equipo médico está ocupado y que no puede ser usado por otro paciente hasta que dicho paciente no lo requiera.

*RF-5  Mostrar las camas que se encuentran disponibles  Como administrativo*:  Quiero que el sistema muestre el listado de camas que se encuentran desocupadas.  Para poder decidir si un paciente puede entrar en nuestra UCI, si hay camas disponibles, asignarle una y sino traspasarlo a otra UCI de otro hospital cercano.

  
# **Reglas de negocio:**

-   *RN-1. Reparto de equipo médico*:  Si hay una sola unidad de un equipo médico concreto, y es requerida por más de un paciente a la vez , se debe asignar al paciente cuyo estado de salud sea más crítico.
    
-   *RN-2 Asignación de equipo médico*:  Un equipo médico que se encuentre en estado ocupado no puede ser asignado a un paciente.
    
-   *RN-3 Liberación de equipo médico*:  Si el estado del paciente pasa a ser “muerto”, todos el equipo médico que tenga asociado pasa a estado “libre”.
    
-   *RN-4 Fecha entrada y salida del paciente en UCI*:  Si la fecha de entrada de un paciente en UCI es mayor a la de salida, aparece una notificación de error.
    
-   *RN-5  Registro en la aplicación para su entrada*:  Solo personal autorizado con cuenta registrada puede acceder a la información almacenada en la aplicación, por ser considerada como información sensible.
    
-   *RN-6  Registro paciente*: Un paciente no puede aparecer registrado dos veces en el sistema. Cada paciente debe estar asociado a un único identificador.
    


# **Requisitos no funcionales :**


-   *RNF-001 Seguridad*: El sistema debe estar preparado para no permitir el acceso a usuarios no autorizados.
    
-   *RNF-002 Adaptabilidad*:  El sistema debe estar preparado para poderse ejecutar en diferentes sistemas.
    
-  **RNF-003 Disponibilidad**:  El sistema debe estar operativo todo el tiempo posible a bajo coste, para poder registrar todos los datos posibles.
    
-  *RNF-004 Facilidad de uso*:  El sistema debe tener una organización y un diseño sencillo para que pueda ser consultado por cualquier tipo de empleado del hospital, ya sean tanto administrativos como personal sanitario.
    
-  *RNF-005 Actuación*:  El sistema debe tener una copia de seguridad para que en caso de emergencia esos datos almacenados no se pierdan.
    

Modelo conceptual UML:(Al menos una relación N-N, una relación 1-1 y una  1-N.

<img src="{{ asset('public\img\Modelo UML.jpg') }}">
