    let display = document.getElementById('display');
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

    function clearDisplay() {
        // Clear the display
        display.value = '';
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
    // document.addEventListener('keydown', (event) => {
    //     const key = event.key;

    //     // Allow numeric keys and some special keys
    //     if (/^[0-9%\+\-\*\/\.\r\n]$/.test(key)) {
    //         addToDisplay(key);
    //     } else if (key === 'Enter') {
    //         calculateResult();
    //     } else if (key === 'Escape') {
    //         clearDisplay();
    //     } else if (key === 'Backspace') {
    //         backspace();
    //     }

    //     event.preventDefault(); // Prevent default action (e.g., page scrolling)
    // });


    const clients = JSON.parse(localStorage.getItem("clients")) || [];

    function closeClientDropdown() {
        const clientDropdown = document.getElementById("clientDropdown");
        clientDropdown.style.display = 'none';
    }

    function clearClientInputField() {
        const clientSearch = document.getElementById("clientSearch");
        clientSearch.value = "";
        clientSearch.focus();
        filterClients();
    }

    function clearInputField() {
        const amountInput = document.getElementById("amountInput");
        amountInput.value = "";
        amountInput.focus();
    }

    function calculateFlour() {
        const amount = parseFloat(document.getElementById("amountInput").value);
        const result = (amount * 50 / 1000);
        const secondAmount = amount - result;
        document.getElementById("result1").innerHTML = `${result.toFixed(3)} KG`;
        document.getElementById("result2").innerHTML = `${secondAmount.toFixed(3)} KG`;
        document.getElementById("formula-line").innerHTML = `${amount.toFixed(2)} KG × 50 ÷ 1000 - ${amount.toFixed(2)} KG = ${secondAmount.toFixed(3)} KG`;
        document.querySelector(".input-container").style.display = "block";
        document.getElementById("result-container").style.display = "block";
        document.getElementById("result-line").style.display = "block";
        setTimeout(() => {
            document.getElementById("result-container").classList.add("active");
        }, 100);
        storeCalculationHistory(amount.toFixed(2), result.toFixed(3), secondAmount.toFixed(3));
    }

    function showCalculationHistory() {
        const historyPopup = document.getElementById("historyPopup");
        const historyTable = document.getElementById("historyTable");
        historyTable.innerHTML = "";
        const calculationHistory = JSON.parse(localStorage.getItem("calculationHistory")) || [];
        calculationHistory.reverse().forEach((entry) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${entry.timestamp}</td>
                <td>${entry.client}</td>
                <td>${entry.input}</td>
                <td>${entry.profit}</td>
                <td>${entry.remaining}</td>
            `;
            historyTable.appendChild(row);
        });
        historyPopup.style.display = "block";
        document.getElementById("historyIcon").innerHTML = "&#x21BB;";
    }

    function closePopup() {
        document.getElementById("historyPopup").style.display = "none";
        document.getElementById("historyIcon").innerHTML = "&#x21BB;";
    }

    function storeCalculationHistory(input, profit, remaining) {
        const clientSearch = document.getElementById("clientSearch");
        const clientValue = clientSearch.value;
        const now = new Date();
        const day = now.toLocaleDateString('en-US', {
            day: '2-digit'
        });
        const month = now.toLocaleDateString('en-US', {
            month: '2-digit'
        });
        const hours = now.toLocaleTimeString('en-US', {
            hour: 'numeric',
            hour12: true
        });
        const timestamp = `${day}-${month} / ${hours}`;
        const entry = {
            timestamp,
            input,
            profit,
            remaining,
            client: clientValue
        };
        let calculationHistory = JSON.parse(localStorage.getItem("calculationHistory")) || [];
        calculationHistory.push(entry);
        if (calculationHistory.length > 40) {
            calculationHistory.shift();
        }
        localStorage.setItem("calculationHistory", JSON.stringify(calculationHistory));
    }

    function filterClients() {
        const input = document.getElementById("clientSearch");
        const filter = input.value.toLowerCase();
        const clientDropdown = document.getElementById("clientDropdown");
        clientDropdown.innerHTML = '';
        clientDropdown.style.display = 'block';
        let filteredClients = clients.slice(-3).reverse().filter(client => client.name.toLowerCase().includes(filter) || client.area.toLowerCase().includes(filter));
        for (const client of filteredClients) {
            const clientDiv = document.createElement("div");
            clientDiv.innerHTML = client.name + " (" + client.area + ")";
            clientDiv.onclick = function() {
                input.value = client.name + " (" + client.area + ")";
                clientDropdown.style.display = 'none';
            }
            clientDropdown.appendChild(clientDiv);
        }
        const addNewDiv = document.createElement("div");
        addNewDiv.innerHTML = "<strong>Add New Client...</strong>";
        addNewDiv.onclick = addNewClientPopup;
        clientDropdown.appendChild(addNewDiv);
        const closeDiv = document.createElement("div");
        closeDiv.innerHTML = "<strong>Close</strong>";
        closeDiv.onclick = closeClientDropdown;
        clientDropdown.appendChild(closeDiv);
    }

    function addNewClientPopup() {
        const modal = document.getElementById("addClientModal");
        modal.style.display = "block";
        document.body.classList.add('no-scroll'); // Add the class to the body
    }

    function closeAddClientModal() {
        const modal = document.getElementById("addClientModal");
        modal.style.display = "none";
        document.body.classList.remove('no-scroll'); // Remove the class from the body
    }

    function addClient() {
        const clientName = document.getElementById("clientName").value;
        const clientArea = document.getElementById("clientArea").value;
        const client = {
            name: clientName,
            area: clientArea
        };
        clients.push(client);
        localStorage.setItem("clients", JSON.stringify(clients));
        document.getElementById("clientName").value = "";
        document.getElementById("clientArea").value = "";
        document.getElementById("clientSearch").value = clientName + " (" + clientArea + ")";
        closeAddClientModal();
    }

    document.addEventListener('click', function(event) {
        const input = document.getElementById("clientSearch");
        const dropdown = document.getElementById("clientDropdown");
        if (!input.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    document.getElementById("clientSearch").addEventListener('focus', function() {
        document.getElementById("clientDropdown").style.display = 'block';
    });

    document.addEventListener("DOMContentLoaded", function() {
        const clientSelect = document.getElementById("clientSelect");
        clients.forEach(client => {
            const option = document.createElement("option");
            option.value = client.name;
            option.text = client.name + " (" + client.area + ")";
            clientSelect.appendChild(option);
        });
    });