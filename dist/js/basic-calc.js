// BASIC CALCULATOR START
    let display = document.getElementById('display');
    let displaySpan = document.getElementById('displaySpan');
    let lastChar = '';

    function addToDisplay(value) {
        // Prevent adding operators consecutively
        if (['+', '-', '×', '÷'].includes(lastChar) && ['+', '-', '×', '÷'].includes(value)) {
            return;
        }

        // Prevent adding % consecutively
        if (lastChar === '%' && value === '%') {
            return;
        }

        // Append the value to the display and update lastChar
        display.value += value;
        lastChar = value;
        calculateResultSpan();
    }

    function addPercentage() {
        // Add % to the display if it's not already there
        if (lastChar !== '%') {
            display.value += '%';
            lastChar = '%';
        }
    }

    function calculateResult() {
        try {
            // Replace ÷, ×, and % with /, *, and /100 respectively for evaluation
            const expression = display.value.replace(/÷/g, '/').replace(/×/g, '*').replace(/%/g, '/100');
            display.value = eval(expression);
        } catch (error) {
            // Handle errors by displaying "Error"
            display.value = 'Error';
        }
    }
    function calculateResultSpan() {
        try {
            // Replace ÷, ×, and % with /, *, and /100 respectively for evaluation
            const expression = display.value.replace(/÷/g, '/').replace(/×/g, '*').replace(/%/g, '/100');
            displaySpan.innerHTML = eval(expression);
        } catch (error) {
            // Handle errors by displaying "Error"
            displaySpan.innerHTML = '';
        }
    }

    function clearDisplay() {
        // Clear the display
        display.value = '';
        displaySpan.innerHTML = '';
    }

    function toggleSign() {
        // Toggle the sign (positive/negative) of the displayed number
        if (display.value.charAt(0) === '-') {
            display.value = display.value.slice(1);
        } else {
            display.value = '-' + display.value;
        }
    }

    function backspace() {
        // Remove the last character from the display
        display.value = display.value.slice(0, -1);
    }

    // Event listener for keyboard input
    document.addEventListener('keydown', (event) => {
        const key = event.key;

        // Allow numeric keys and some special keys
        if (/^[0-9%\+\-\*\/\.\r\n]$/.test(key)) {
            addToDisplay(key);
        } else if (key === 'Enter') {
            calculateResult();
        } else if (key === 'Escape') {
            clearDisplay();
        } else if (key === 'Backspace') {
            backspace();
        }

        event.preventDefault(); // Prevent default action (e.g., page scrolling)
    });


// BASIC CALCULATOR END