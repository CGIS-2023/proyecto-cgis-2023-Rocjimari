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

.container {     
    display: flex;
    flex-direction: row;
}

.leftSection {
    background-color: white;
    justify-content: space-around;      
    height: 100vh;
    width: 15vw;
    -webkit-box-shadow: 10px 2px 21px -15px rgba(0,0,0,0.48);
    -moz-box-shadow: 10px 2px 21px -15px rgba(0,0,0,0.48);
    box-shadow: 10px 2px 21px -15px rgba(0,0,0,0.48);
}

.brandTitle {
    display: flex;  
    justify-content: center;
    align-items: center;   
    height: 10vh;     
    color: rgb(32, 125, 251);
     
}

.brandTitle h1 {
    font-family: 'Ubuntu', sans-serif;
    font-weight: 700;
    padding: 0;
    margin: 0;
} 

.middleSection {
    
    height: 100vh;
    width: 30vw;
}



.menuSection {
    font-family: 'Ubuntu', sans-serif;
    font-weight: 400;    
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
    height: 90vh;
    text-align: center;
    color:  rgb(32, 125, 251);
    
}

.smallText .fa-lg {
    background-color: rgb(230, 238, 248);
    border-radius: 20%;
    padding: 10px;
    transform: scale(1);
    transition-duration: 300ms;

}

.smallText:hover .fa-lg {
    transform: scale(1.3);
    cursor: pointer;
}


.smallText p {
    color: rgb(43, 87, 128);
    
}


.profilePicture {
    opacity: 80%;
    overflow: hidden;  
    border-radius: 50%;
    width: 75px;
    height: 75px;
    transform: scale(1);
    transition-duration: 300ms;
}

.profilePicture:hover {
    opacity: 100%;
    transform: scale(1.2);
}

.profilePicture img {    
    object-fit: cover; 
    width: 100%;
}

.nameIcon {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.logoutIcon p {
    display: inline;
    padding-left: 10px;    
   
}

.logoutIcon:hover p {
    text-shadow: 0px 0px 1px black;
    cursor: pointer;
}

.dashboardIcon .fa-3x {
    transform: scale(1);
    transition-duration: 500ms;
}

.dashboardIcon:hover .fa-3x {
    transform: scale(1.2);
    cursor: pointer;;
}



/* Middle Section */

.brandMessage {    
    margin: 10px;
    padding-left: 20px;   
    height: 15vh; 
    display: flex;
    flex-direction: column;      
    align-items:  flex-start;
    justify-content: flex-start;
    color: rgb(43, 87, 128);
}

.brandMessage h2 {
    padding: 0;
    margin: 0;  
    font-size: 40px;
    font-weight: 700;
}

.brandMessage p {
    padding-left: 5px;
    margin: 0;   
    color:  rgb(137, 153, 167);

   
}

.eventList {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin: 30px;
    height: 50vh;
}

.event {
    box-sizing: border-box;
    background-color: rgb(230, 241, 254);
    color:  rgb(107, 121, 138);
    box-sizing: border-box;
    padding-left: 10px;
    padding-right: 10px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    border-radius: 10px;
    border: 2px solid  rgb(230, 241, 254);
    
    
}

.event:hover {
    box-shadow: 0 3px 3px rgba(0,0,0,0.2);
    box-sizing: border-box;
    color: rgb(32, 125, 251);
    border: 2px solid  rgb(32, 125, 251);
    
}

.leftText {  
    display: flex;
    flex-direction: row;
    align-items: center;
}

.leftText p {
    padding-left: 20px;
}

.rightText {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.rightText p {
    padding-left: 15px;
}

.buttonSection {    
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    margin: 30px;
    height: 35vh;
    

}

.button {
    box-shadow: 0 3px 3px rgba(0,0,0,0.2);
    box-sizing: border-box;
    background-color: rgb(230, 241, 254);
    color:  rgb(107, 121, 138);
    box-sizing: border-box;
    padding-left: 10px;
    padding-right: 10px;
    margin-bottom: 20px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    border: none;

}

.button:hover {
    cursor: pointer;
}

.button:active {
    box-shadow: none;
}

.blue {
    color: white;    
    text-align: center;
    background-color: rgb(32, 125, 251);
}

.blue:hover {
    background-color: rgb(61, 138, 245);
}

.gray:hover {
    background-color: rgb(205, 223, 247);
}

/* right section */

.rightSection {
    padding: 0;
    height: 100vh;
    width: 55vw;
}

.upRow {
    margin: 30px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    height: 30vh;
}



.box {
    border-radius: 20px;
    box-shadow: 0 3px 3px rgba(0,0,0,0.2);
    background-color: white;
}

.upRow .box {
    box-sizing: border-box;
    height: 30vh;    
}

.rightBox {
    padding: 0;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    overflow: hidden;    
    flex: 2;
    margin-left: 30px;
}

.leftBox {   
    padding: 0px;
    display: flex;
    flex-direction: column;
    align-content: flex-start;
    justify-content: flex-start;
    overflow: hidden;
    flex: 1;
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
    <center>
	<div class="mainBox box">
                    <div class="patientsTitle">
                        <h3>Información completa</h3>
                        <div class="patientsBox">
                            <div class="patient box">                             
                                <div class="patientImage">
                                    <img src="https://cdn-icons-png.flaticon.com/512/13/13732.png?w=740&t=st=1684363456~exp=1684364056~hmac=11b97908ad018048e032383309b71eff93873c0a309d52146e50685482bec13a" alt="">
                                </div>
                                <div class="name"> <h4>Número pacientes</h4></div>
                                <div class="status"><p>Conteo de todos los pacientes asignados</p></div>                          
								<div class="numbers">{{$countp}}</div>
                            </div>
                            <div class="patient box">                             
                                <div class="patientImage">
                                    <img src="https://cdn-icons-png.flaticon.com/512/47/47883.png?w=740&t=st=1684363555~exp=1684364155~hmac=62bd9df9d05580091c65014607f76492279490f22159ba8c0f5722646ae30ed4" alt="">
                                </div>
                                <div class="name"> <h4>Número de consultas</h4></div>
                                <div class="status"><p>Conteo de todos las consultas realizadas</p></div> 
								<div class="numbers">{{$consultas}}</div>

                            </div>
                          
                                                    
                        </div>
                    </div>
					<div class="container">
        
        <div class="middleSection">
           
        <div class="rightSection">
            <div class="upRow row">
                <div class="leftBox box">
                    <h3>May, 2020</h3>
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
                        <div class="date">24</div>
                        <div class="date">25</div>
                        <div class="date">26</div>
                        <div class="date">27</div>
                        <div class="date">28</div>
                        <div class="date">29</div>
                        <div class="date">30</div>
                        <div class="date">31</div>
                    </div>
                </div>
                <div class="rightBox box">
                    <div class="boxText">
                        <h3>Hello, {{}}</h3>                        
                        <p>Don't forget to assign your task!</p>
                        <div class="button blue"><p>Complete Report</p></div>
                    </div>
                    <div class="boxImage">
                        <img src="https://i.pinimg.com/originals/61/c7/a2/61c7a28bbb12ee7d75064e9dba23305e.png" alt="">
                    </div>
                </div>
            </div>
            <div class="bottomRow row">
                
            </div>
        </div>
                </div>
</center>

    

    

    <script src="https://kit.fontawesome.com/762a939896.js" crossorigin="anonymous"></script>
    
</body>
</x-app-layout>