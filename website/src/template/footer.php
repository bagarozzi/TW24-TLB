<style>
	.footer {
    margin-top: auto; /* Spinge il footer verso il basso */
}

#footer-container {
    background-image: url("resources/footer.png");
    background-size: cover;
    background-repeat: no-repeat;
    height: 150px; /* Altezza del footer */
    width: 100%;
    position: relative; /* Permette all'immagine di posizionarsi correttamente */
}

#footer-background-opacity {
    background-color: rgba(88, 55, 46, 0.8);
    width: 100%;
    height: 100%;
    align-items: center;
    display: flex;
    justify-content: center; /* Centra i contenuti orizzontalmente */
}

.social-button {
    background: transparent;
    border: 2px solid transparent;
    width: auto;
    height: auto;
}
</style>
<footer class="mt-3">
    <div id="footer-container">
        <div id="footer-background-opacity">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-6 d-flex justify-content-center justify-content-md-start">
                        <button class="social-button"><img src="resources/X.png" alt="Profilo X"></button>
                        <button class="social-button"><img src="resources/Icon.png" alt="Pulsante icon"></button>
                        <button class="social-button"><img src="resources/Youtube.png" alt="Profilo youtube"></button>
                        <button class="social-button"><img src="resources/Instagram.png" alt="Profilo Instagram"></button>
                    </div>
                    <div class="col-6" style="color: rgba(255, 255, 255, 0.7);">
                        <p>&copy; 2025 Il tuo sito. Tutti i diritti riservati.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>