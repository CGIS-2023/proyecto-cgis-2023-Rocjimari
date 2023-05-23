<x-app-layout>
<style>
body {
    font-family: 'Ubuntu', sans-serif;
    max-width: 100vw;
    max-height: 100vh;
    margin: 0;
    background-color: rgb(248, 251, 255);
}

/* Left Section */





.box {
    border-radius: 20px;
    box-shadow: 0 3px 3px rgba(0,0,0,0.2);
    background-color: white;
}


.rightBox {
    padding: 0;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    overflow: hidden;    
    flex: 2;
    margin-left: 20px;
}

.leftBox {
    padding: 0px;
    overflow: hidden;
    flex : 1;
    width: 45%;    
    overflow: hidden;  

}
.rightBox img {
    object-fit: cover;
    width: 150%;
    opacity: 85%;
}

.boxText {
    padding: 10px;
    display: flex;
    flex-direction: column;
    margin: 0;
    display: flex;   
    flex: 1;
    color: rgb(43, 87, 128);
}

.boxImage {
    height: 100%;   
    margin: 0;
    display: flex;
    flex: 1;
   
}

h3 {    
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 25px;
    font-weight: 700;
    color: rgb(43, 87, 128);
    padding-left: 25px;   
    
}

.calendar {         
    padding: 0px 0px 0px 10px;  
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
}

.date {
    color: rgb(172, 177, 182);  
    text-align: center;
    width: 25px;
    height: 25px;
    box-sizing: border-box;
    margin: 3px;
    padding: 2px;
    border: 1px solid rgb(127, 136, 143);  
    border-radius: 7px;
}
.datehoy {
    color: black;
    text-align: center;
    width: 25px;
    height: 25px;
    box-sizing: border-box;
    margin: 3px;
    padding: 2px;
    border: 1px solid rgb(127, 136, 143);
    border-radius: 7px;
    background-color: rgb(255, 187, 128);
}

.date:hover {
    background-color: rgb(32, 125, 251);
    color : white;
    border: 1px solid rgb(32, 125, 251);
    cursor: pointer;
}

.mainBox {
    height: 53vh;
    margin: 30px;
    display: flex;
    margin-bottom: 30px;
   
}

.patientsBox {
    margin-top: 25px;
    margin-left: 40px;
    width: 45vw; 
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.patient {    
    display: flex;
    flex-direction: column;   
    align-items: center;
    justify-content: space-evenly;      
    border-radius: 10px;
    width: 13vw;
    height: 40vh;  
    background-color: rgb(230, 241, 254);

   
}

.patientsTitle h3 {
    margin-left: 10px;
    margin-top: 15px;
}

.patientImage {
    border-radius: 50%;
    overflow: hidden; 
    width: 75px;
    height: 75px;
     
}


.patientImage img {   
    width: 100%;
    object-fit: cover;        
}

.name {
    color:  rgb(43, 87, 128);;
}

.status {
    color: rgb(137, 153, 167);;
}
</style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  @if (Auth::user()->tipo_usuario_id == 2 || Auth::user()->tipo_usuario_id == 3) 

    <center>
	<div class="mainBox box">
                    <div class="patientsTitle">
                        <h3>Información completa</h3>
                        <div class="patientsBox">
                            <div class="patient box">                             
                                <div class="patientImage">
                                    <img src="https://cdn-icons-png.flaticon.com/512/387/387585.png" alt="">
                                </div>
                                <div class="name"> <h4>Número pacientes</h4></div>
                                <div class="status"><p>Conteo de todos los pacientes asignados</p></div>                          
								<div class="numbers">{{$countp}}</div>
                            </div>
                            <div class="patient box">                             
                                <div class="patientImage">
                                    <img src="https://img.freepik.com/vector-premium/historial-medico-icono-servicios-linea_116137-3643.jpg" alt="">
                                </div>
                                <div class="name"> <h4>Número de consultas</h4></div>
                                <div class="status"><p>Conteo de todos las consultas realizadas</p></div> 
								<div class="numbers">{{$consultas}}</div>

                            </div>
                            <div class="patient box">                             
                                <div class="patientImage">
                                    <img src="https://cdn-icons-png.flaticon.com/512/568/568038.png?w=740&t=st=1684707274~exp=1684707874~hmac=eccb4e6494b5db34b0462db3b9f943a7ffa51ff7280fa60621a0c561e76eca24" alt="">
                                </div>
                                <div class="name"> <h4>Notificaciones nuevas</h4></div>
                                <div class="status"><p></p></div> 
								<div class="numbers">{{0}}</div>

                            </div>
                          
                                                    
                        </div>
                    </div>
					<div class="container">
        
        <div class="middleSection">
           
        <div class="rightSection">
            <div class="upRow row">
                <div class="leftBox box">
                    <h3>May, 2023</h3>
                    <div class="calendar">
                        <div class="date">1</div>
                        <div class="date">2</div>
                        <div class="date">3</div>
                        <div class="date">4</div>
                        <div class="date">5</div>
                        <div class="date">6</div>
                        <div class="date">7</div>
                        <div class="date">8</div>
                        <div class="date">9</div>
                        <div class="date">10</div>
                        <div class="date">11</div>
                        <div class="date">12</div>
                        <div class="date">13</div>
                        <div class="date">14</div>
                        <div class="date">15</div>
                        <div class="date">16</div>
                        <div class="date">17</div>
                        <div class="date">18</div>
                        <div class="date">19</div>
                        <div class="date">20</div>
                        <div class="date">21</div>
                        <div class="date">22</div>                        
                        <div class="date">23</div>
                        <div class="datehoy">24</div>
                        <div class="date">25</div>
                        <div class="date">26</div>
                        <div class="date">27</div>                        
                        <div class="date">28</div>
                        <div class="date">29</div>
                        <div class="date">30</div>
                        <div class="date">31</div>
                        
                    </div>
                </div>
                    
</center>

    @endif

    

    <script src="https://kit.fontawesome.com/762a939896.js" crossorigin="anonymous"></script>

     @if(Auth::user()->tipo_usuario_id == 4)
                    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <center>
	<div class="mainBox box">
                    <div class="patientsTitle">
                        <h3>Información completa</h3>
                        <div class="patientsBox">
                            <div class="patient box">                             
                                <div class="patientImage">
                                    <img src="https://cdn-icons-png.flaticon.com/512/387/387585.png" alt="">
                                </div>
                                <div class="name"> <h4>Número pacientes</h4></div>
                                <div class="status"><p>Conteo de todos los pacientes registrados</p></div>                          
								<div class="numbers">{{$pacientes}}</div>
                            </div>
                            <div class="patient box">                             
                                <div class="patientImage">
                                    <img src="https://img.freepik.com/vector-premium/historial-medico-icono-servicios-linea_116137-3643.jpg" alt="">
                                </div>
                                <div class="name"> <h4>Número de médicos total</h4></div>
                                <div class="status"><p>Conteo de todos los médicos registrados</p></div> 
								<div class="numbers">{{$medicos}}</div>

                            </div>
                            <div class="patient box">                             
                                <div class="patientImage">
                                    <img src="https://cdn-icons-png.flaticon.com/512/568/568038.png?w=740&t=st=1684707274~exp=1684707874~hmac=eccb4e6494b5db34b0462db3b9f943a7ffa51ff7280fa60621a0c561e76eca24" alt="">
                                </div>
                                <div class="name"> <h4>Número de enfemeros total</h4></div>                                
                                <div class="status"><p>Conteo de todos los enfemeros registrados</p></div>
                                <div class="status"><p></p></div> 
								<div class="numbers">{{$enfermeros}}</div>

                            </div>
                          
                                                    
                        </div>
                    </div>
					<div class="container">
        
        <div class="middleSection">
           
        <div class="rightSection">
            <div class="upRow row">
                <div class="leftBox box">
                    <h3>May, 2023</h3>
                    <div class="calendar">
                        <div class="date">1</div>
                        <div class="date">2</div>
                        <div class="date">3</div>
                        <div class="date">4</div>
                        <div class="date">5</div>
                        <div class="date">6</div>
                        <div class="date">7</div>
                        <div class="date">8</div>
                        <div class="date">9</div>
                        <div class="date">10</div>
                        <div class="date">11</div>
                        <div class="date">12</div>
                        <div class="date">13</div>
                        <div class="date">14</div>
                        <div class="date">15</div>
                        <div class="date">16</div>
                        <div class="date">17</div>
                        <div class="date">18</div>
                        <div class="date">19</div>
                        <div class="date">20</div>
                        <div class="date">21</div>
                        <div class="date">22</div>                        
                        <div class="date">23</div>
                        <div class="datehoy">24</div>
                        <div class="date">25</div>
                        <div class="date">26</div>
                        <div class="date">27</div>                        
                        <div class="date">28</div>
                        <div class="date">29</div>
                        <div class="date">30</div>
                        <div class="date">31</div>
                        
                    </div>
                </div>
                    
</center>

    

    

    <script src="https://kit.fontawesome.com/762a939896.js" crossorigin="anonymous"></script>
    @endif
</body>
</body>
</x-app-layout>