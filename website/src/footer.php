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

        #button-image {
            position: absolute;
            left: 15%;
            width: auto; /* Regola la dimensione se necessario */
            height: 30px;
			
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
    		<img id="button-image" src="resources/buttonList.png" alt="Pulsante Lista">
    		<p>&copy; 2025 Il tuo sito. Tutti i diritti riservati.</p>
		</div>
	</div>
</footer>
