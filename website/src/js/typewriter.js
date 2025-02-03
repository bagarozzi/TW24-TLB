document.addEventListener('DOMContentLoaded', function() {
    const words = ["Search the Harvest Hub", "Tractor", "Fertilizer", "Plow", "Apple seeds", "Subsoiler", "Roller", "Seed drill", "Hydroponics"];
    let wordIndex = 0;
    let charIndex = 0;
    const placeholder = document.querySelector('input[type="search"]').placeholder;
    const input = document.querySelector('input[type="search"]');

    function type() {
        if (charIndex < words[wordIndex].length) {
            input.placeholder += words[wordIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, 100);
        } else {
            setTimeout(erase, 2000);
        }
    }

    function erase() {
        if (charIndex > 0) {
            input.placeholder = input.placeholder.substring(0, charIndex - 1);
            charIndex--;
            setTimeout(erase, 50);
        } else {
            wordIndex = (wordIndex + 1) % words.length;
            setTimeout(type, 500);
        }
    }

    type();
});