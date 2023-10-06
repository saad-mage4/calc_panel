// BASIC CALCULATOR START
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


// BASIC CALCULATOR END



        // FLOUR CALCULATOR START

        const flour_clients = JSON.parse(localStorage.getItem("clients")) || [];
    
        function closeClientDropdown() {
            const clientDropdown = document.getElementById("flour-clientDropdown");
            clientDropdown.style.display = 'none';
        }
    
        function flour_clearClientInputField() {
            const clientSearch = document.getElementById("flour-clientSearch");
            clientSearch.value = "";
            clientSearch.focus();
            flour_filterClients();
        }
    
        function flour_clearInputField() {
            const amountInput = document.getElementById("flour-amountInput");
            amountInput.value = "";
            amountInput.focus();
        }
    
        function flour_calculateFlour() {
            const amount = parseFloat(document.getElementById("flour-amountInput").value);
            const result = (amount * 50 / 1000);
            const secondAmount = amount - result;
            document.getElementById("flour-result1").innerHTML = `${result.toFixed(3)} KG`;
            document.getElementById("flour-result2").innerHTML = `${secondAmount.toFixed(3)} KG`;
            document.getElementById("flour-formula-line").innerHTML = `${amount.toFixed(2)} KG × 50 ÷ 1000 - ${amount.toFixed(2)} KG = ${secondAmount.toFixed(3)} KG`;
            document.querySelector(".input-container").style.display = "block";
            document.getElementById("flour-result-container").style.display = "block";
            document.getElementById("flour-result-line").style.display = "block";
            setTimeout(() => {
                document.getElementById("flour-result-container").classList.add("active");
            }, 100);
            storeCalculationHistory(amount.toFixed(2), result.toFixed(3), secondAmount.toFixed(3));
        }
    
        function flour_showCalculationHistory() {
            const historyPopup = document.getElementById("flour-historyPopup");
            const historyTable = document.getElementById("flour-historyTable");
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
            document.getElementById("flour-historyIcon").innerHTML = "&#x21BB;";
        }
    
        function flour_closePopup() {
            document.getElementById("flour-historyPopup").style.display = "none";
            document.getElementById("flour-historyIcon").innerHTML = "&#x21BB;";
        }
    
        function storeCalculationHistory(input, profit, remaining) {
            const clientSearch = document.getElementById("flour-clientSearch");
            console.log(clientSearch);
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
    
        function flour_filterClients() {
            const input = document.getElementById("flour-clientSearch");
            const filter = input.value.toLowerCase();
            const clientDropdown = document.getElementById("flour-clientDropdown");
            clientDropdown.innerHTML = '';
            clientDropdown.style.display = 'block';
            let filteredClients = flour_clients.slice(-3).reverse().filter(client => client.name.toLowerCase().includes(filter) || client.area.toLowerCase().includes(filter));
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
            addNewDiv.onclick = flour_addNewClientPopup;
            clientDropdown.appendChild(addNewDiv);
            const closeDiv = document.createElement("div");
            closeDiv.innerHTML = "<strong>Close</strong>";
            closeDiv.onclick = closeClientDropdown;
            clientDropdown.appendChild(closeDiv);
        }
    
        function flour_addNewClientPopup() {
            const modal = document.getElementById("flour-addClientModal");
            modal.style.display = "block";
            document.body.classList.add('no-scroll'); // Add the class to the body
        }
    
        function flour_closeAddClientModal() {
            const modal = document.getElementById("flour-addClientModal");
            modal.style.display = "none";
            document.body.classList.remove('no-scroll'); // Remove the class from the body
        }
    
        function flour_addClient() {
            const clientName = document.getElementById("flour-clientName").value;
            const clientArea = document.getElementById("flour-clientArea").value;
            const client = {
                name: clientName,
                area: clientArea
            };
            flour_clients.push(client);
            localStorage.setItem("clients", JSON.stringify(flour_clients));
            document.getElementById("flour-clientName").value = "";
            document.getElementById("flour-clientArea").value = "";
            document.getElementById("flour-clientSearch").value = clientName + " (" + clientArea + ")";
            flour_closeAddClientModal();
        }
    
        document.addEventListener('click', function(event) {
            const input = document.getElementById("flour-clientSearch");
            const dropdown = document.getElementById("flour-clientDropdown");
            if (!input.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });
    
        document.getElementById("flour-clientSearch").addEventListener('focus', function() {
            document.getElementById("flour-clientDropdown").style.display = 'block';
        });
    
        document.addEventListener("DOMContentLoaded", function() {
            const clientSelect = document.getElementById("flour-clientSelect");
            flour_clients.forEach(client => {
                const option = document.createElement("option");
                option.value = client.name;
                option.text = client.name + " (" + client.area + ")";
                clientSelect.appendChild(option);
            });
        });
    
    // FLOUR CALCULATOR END

