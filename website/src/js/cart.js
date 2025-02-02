document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-primary').forEach(function(button) {
        button.addEventListener('click', function(event) {
            const input = event.target.parentElement.querySelector('input[type="text"]');
            let value = parseInt(input.value);

            if (event.target.textContent === '+') {
                value++;
            } else if (event.target.textContent === '-') {
                value--;
            }

            if (value < 1) {
                value = 1;
            }

            input.value = value;
        });
    });
});