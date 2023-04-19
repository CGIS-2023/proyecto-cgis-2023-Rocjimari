<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <style>
        
        body
        {
        margin: 0;
        padding: 0;
        
        /* make it look decent enough */
        background: #ededed;
        color: #232323;
        font-family: "Avenir Next", "Avenir", sans-serif;
        }

        #menuToggle
        {
        display: block;
        position: relative;
        top: 50px;
        left: 50px;
        
        z-index: 1;
        
        -webkit-user-select: none;
        user-select: none;
        }

        #menuToggle a
        {
        text-decoration: none;
        color: #232323;
        
        transition: color 0.3s ease;
        }

        #menuToggle a:hover
        {
        color: tomato;
        }


        #menuToggle input
        {
        display: block;
        width: 40px;
        height: 32px;
        position: absolute;
        top: -7px;
        left: -5px;
        
        cursor: pointer;
        
        opacity: 0; /* hide this */
        z-index: 2; /* and place it over the hamburger */
        
        -webkit-touch-callout: none;
        }

        /*
        * Just a quick hamburger
        */
        #menuToggle span
        {
        display: block;
        width: 33px;
        height: 4px;
        margin-bottom: 5px;
        position: relative;
        
        background: #cdcdcd;
        border-radius: 3px;
        
        z-index: 1;
        
        transform-origin: 4px 0px;
        
        transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
                    background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
                    opacity 0.55s ease;
        }

        #menuToggle span:first-child
        {
        transform-origin: 0% 0%;
        }

        #menuToggle span:nth-last-child(2)
        {
        transform-origin: 0% 100%;
        }

        /* 
        * Transform all the slices of hamburger
        * into a crossmark.
        */
        #menuToggle input:checked ~ span
        {
        opacity: 1;
        transform: rotate(45deg) translate(-2px, -1px);
        background: #232323;
        }

        /*
        * But let's hide the middle one.
        */
        #menuToggle input:checked ~ span:nth-last-child(3)
        {
        opacity: 0;
        transform: rotate(0deg) scale(0.2, 0.2);
        }

        /*
        * Ohyeah and the last one should go the other direction
        */
        #menuToggle input:checked ~ span:nth-last-child(2)
        {
        transform: rotate(-45deg) translate(0, -1px);
        }

        /*
        * Make this absolute positioned
        * at the top left of the screen
        */
        #menu
        {
        position: absolute;
        width: 300px;
        margin: -100px 0 0 -50px;
        padding: 50px;
        padding-top: 125px;
        
        background: #ededed;
        list-style-type: none;
        -webkit-font-smoothing: antialiased;
        /* to stop flickering of text in safari */
        
        transform-origin: 0% 0%;
        transform: translate(-100%, 0);
        
        transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
        }

        #menu li
        {
        padding: 10px 0;
        font-size: 22px;
        }

        /*
        * And let's slide it in from the left
        */
        #menuToggle input:checked ~ ul
        {
        transform: none;
        }
    </style>
    <div id="menuToggle">
      <!--
      A fake / hidden checkbox is used as click reciever,
      so you can use the :checked selector on it.
      -->
      <input type="checkbox" />
      
      <!--
      Some spans to act as a hamburger.
      
      They are acting like a real hamburger,
      not that McDonalds stuff.
      -->
      <span></span>
      <span></span>
      <span></span>
      
      <!--
      Too bad the menu has to be inside of the button
      but hey, it's pure CSS magic.
      -->
      <ul id="menu">
        <a href="#"><li>Home</li></a>
        <a href="{{route('pacientes.index')}}"><li>Paciente</li></a>
        <a href="#"><li>Info</li></a>
        <a href="#"><li>Contact</li></a>
        <a href="https://erikterwan.com/" target="_blank"><li>Show me more</li></a>
      </ul>
    </div>
  
</body>
</html>
    