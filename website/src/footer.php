<footer>
    <style>
        #footer-container {
            background-image: url("resources/footer.png");
            background-size: cover;
            background-repeat: no-repeat;
            height: 150px; /* Aggiunto per rendere visibile il footer */
            width: 100%;
            position: relative; /* Permette all'img di posizionarsi dentro */
            
            
        }
 
		#footer-background-opacity {
			background-size: cover;
			background-color:rgba(88, 55, 46, 0.8);
			width: 100%;
			height: 100%;
			align-items: center;
			display: flex;
		}

        .social-button {
            position: relative;
			background: transparent;
			border: 2px solid transparent; /* Bordo invisibile */
            width: auto; /* Regola la dimensione se necessario */
            height: auto;
			margin-left:40px;
        }

		#first-button {
			margin-left:200px;
		}
		
        p {
            position: absolute;
            color: white;
            text-align: center;
            font-weight: bold;
            left: 60%;
        }
    </style>
	<div id = "footer-container">	
		<div id= "footer-background-opacity">
    		<p>&copy; 2025 Il tuo sito. Tutti i diritti riservati.</p>
			<button id="first-button" class = "social-button"><img src="resources/X.png" alt="Profilo X"></button>
			<button class = "social-button"><img src="resources/Icon.png" alt="Pulsante icon"></button>
			<button class = "social-button"><img src="resources/Youtube.png" alt="Profilo youtube"></button>
			<button class = "social-button"><img src="resources/Instagram.png" alt="Profilo Instagram"></button>
		</div>
	</div>
</footer>
