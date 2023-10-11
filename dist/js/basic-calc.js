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
            flour_storeCalculationHistory(amount.toFixed(2), result.toFixed(3), secondAmount.toFixed(3));
        }
    
        function flour_showCalculationHistory() {
            const historyPopup = document.getElementById("flour-historyPopup");
            const historyTable = document.getElementById("flour-historyTable");
            historyTable.innerHTML = "";
            const calculationHistory = JSON.parse(localStorage.getItem("flour_calculationHistory")) || [];
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
    
        function flour_storeCalculationHistory(input, profit, remaining) {
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
            let calculationHistory = JSON.parse(localStorage.getItem("flour_calculationHistory")) || [];
            calculationHistory.push(entry);
            if (calculationHistory.length > 40) {
                calculationHistory.shift();
            }
            localStorage.setItem("flour_calculationHistory", JSON.stringify(calculationHistory));
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









            // RICE CALCULATOR START

            const rice_clients = JSON.parse(localStorage.getItem("clients")) || [];
    
            function closeClientDropdown() {
                const clientDropdown = document.getElementById("rice-clientDropdown");
                clientDropdown.style.display = 'none';
            }
        
            function rice_clearClientInputField() {
                const clientSearch = document.getElementById("rice-clientSearch");
                clientSearch.value = "";
                clientSearch.focus();
                rice_filterClients();
            }
        
            function rice_clearInputField() {
                const amountInput = document.getElementById("rice-amountInput");
                amountInput.value = "";
                amountInput.focus();
            }
        
            function rice_calculateFlour() {
                const amount = parseFloat(document.getElementById("rice-amountInput").value);
                const result = (amount * 50 / 1000);
                const secondAmount = amount - result;
                document.getElementById("rice-result1").innerHTML = `${result.toFixed(3)} KG`;
                document.getElementById("rice-result2").innerHTML = `${secondAmount.toFixed(3)} KG`;
                document.getElementById("rice-formula-line").innerHTML = `${amount.toFixed(2)} KG × 50 ÷ 1000 - ${amount.toFixed(2)} KG = ${secondAmount.toFixed(3)} KG`;
                document.querySelector(".input-container").style.display = "block";
                document.getElementById("rice-result-container").style.display = "block";
                document.getElementById("rice-result-line").style.display = "block";
                setTimeout(() => {
                    document.getElementById("rice-result-container").classList.add("active");
                }, 100);
                rice_storeCalculationHistory(amount.toFixed(2), result.toFixed(3), secondAmount.toFixed(3));
            }
        
            function rice_showCalculationHistory() {
                const historyPopup = document.getElementById("rice-historyPopup");
                const historyTable = document.getElementById("rice-historyTable");
                historyTable.innerHTML = "";
                const calculationHistory = JSON.parse(localStorage.getItem("rice_calculationHistory")) || [];
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
                document.getElementById("rice-historyIcon").innerHTML = "&#x21BB;";
            }
        
            function rice_closePopup() {
                document.getElementById("rice-historyPopup").style.display = "none";
                document.getElementById("rice-historyIcon").innerHTML = "&#x21BB;";
            }
        
            function rice_storeCalculationHistory(input, profit, remaining) {
                const clientSearch = document.getElementById("rice-clientSearch");
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
                let calculationHistory = JSON.parse(localStorage.getItem("rice_calculationHistory")) || [];
                calculationHistory.push(entry);
                if (calculationHistory.length > 40) {
                    calculationHistory.shift();
                }
                localStorage.setItem("rice_calculationHistory", JSON.stringify(calculationHistory));
            }
        
            function rice_filterClients() {
                const input = document.getElementById("rice-clientSearch");
                const filter = input.value.toLowerCase();
                const clientDropdown = document.getElementById("rice-clientDropdown");
                clientDropdown.innerHTML = '';
                clientDropdown.style.display = 'block';
                let filteredClients = rice_clients.slice(-3).reverse().filter(client => client.name.toLowerCase().includes(filter) || client.area.toLowerCase().includes(filter));
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
                addNewDiv.onclick = rice_addNewClientPopup;
                clientDropdown.appendChild(addNewDiv);
                const closeDiv = document.createElement("div");
                closeDiv.innerHTML = "<strong>Close</strong>";
                closeDiv.onclick = closeClientDropdown;
                clientDropdown.appendChild(closeDiv);
            }
        
            function rice_addNewClientPopup() {
                const modal = document.getElementById("rice-addClientModal");
                modal.style.display = "block";
                document.body.classList.add('no-scroll'); // Add the class to the body
            }
        
            function rice_closeAddClientModal() {
                const modal = document.getElementById("rice-addClientModal");
                modal.style.display = "none";
                document.body.classList.remove('no-scroll'); // Remove the class from the body
            }
        
            function rice_addClient() {
                const clientName = document.getElementById("rice-clientName").value;
                const clientArea = document.getElementById("rice-clientArea").value;
                const client = {
                    name: clientName,
                    area: clientArea
                };
                rice_clients.push(client);
                localStorage.setItem("clients", JSON.stringify(rice_clients));
                document.getElementById("rice-clientName").value = "";
                document.getElementById("rice-clientArea").value = "";
                document.getElementById("rice-clientSearch").value = clientName + " (" + clientArea + ")";
                rice_closeAddClientModal();
            }
        
            document.addEventListener('click', function(event) {
                const input = document.getElementById("rice-clientSearch");
                const dropdown = document.getElementById("rice-clientDropdown");
                if (!input.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.style.display = 'none';
                }
            });
        
            document.getElementById("rice-clientSearch").addEventListener('focus', function() {
                document.getElementById("rice-clientDropdown").style.display = 'block';
            });
        
            document.addEventListener("DOMContentLoaded", function() {
                const clientSelect = document.getElementById("rice-clientSelect");
                rice_clients.forEach(client => {
                    const option = document.createElement("option");
                    option.value = client.name;
                    option.text = client.name + " (" + client.area + ")";
                    clientSelect.appendChild(option);
                });
            });
        
        // RICE CALCULATOR END








     // SUGAR CALCULATOR START

     const sugar_clients = JSON.parse(localStorage.getItem("clients")) || [];
    
     function closeClientDropdown() {
         const clientDropdown = document.getElementById("sugar-clientDropdown");
         clientDropdown.style.display = 'none';
     }
 
     function sugar_clearClientInputField() {
         const clientSearch = document.getElementById("sugar-clientSearch");
         clientSearch.value = "";
         clientSearch.focus();
         sugar_filterClients();
     }
 
     function sugar_clearInputField() {
         const amountInput = document.getElementById("sugar-amountInput");
         amountInput.value = "";
         amountInput.focus();
     }
 
     function sugar_calculateFlour() {
         const amount = parseFloat(document.getElementById("sugar-amountInput").value);
         const result = (amount * 50 / 1000);
         const secondAmount = amount - result;
         document.getElementById("sugar-result1").innerHTML = `${result.toFixed(3)} KG`;
         document.getElementById("sugar-result2").innerHTML = `${secondAmount.toFixed(3)} KG`;
         document.getElementById("sugar-formula-line").innerHTML = `${amount.toFixed(2)} KG × 50 ÷ 1000 - ${amount.toFixed(2)} KG = ${secondAmount.toFixed(3)} KG`;
         document.querySelector(".input-container").style.display = "block";
         document.getElementById("sugar-result-container").style.display = "block";
         document.getElementById("sugar-result-line").style.display = "block";
         setTimeout(() => {
             document.getElementById("sugar-result-container").classList.add("active");
         }, 100);
         sugar_storeCalculationHistory(amount.toFixed(2), result.toFixed(3), secondAmount.toFixed(3));
     }
 
     function sugar_showCalculationHistory() {
         const historyPopup = document.getElementById("sugar-historyPopup");
         const historyTable = document.getElementById("sugar-historyTable");
         historyTable.innerHTML = "";
         const calculationHistory = JSON.parse(localStorage.getItem("sugar_calculationHistory")) || [];
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
         document.getElementById("sugar-historyIcon").innerHTML = "&#x21BB;";
     }
 
     function sugar_closePopup() {
         document.getElementById("sugar-historyPopup").style.display = "none";
         document.getElementById("sugar-historyIcon").innerHTML = "&#x21BB;";
     }
 
     function sugar_storeCalculationHistory(input, profit, remaining) {
         const clientSearch = document.getElementById("sugar-clientSearch");
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
         let calculationHistory = JSON.parse(localStorage.getItem("sugar_calculationHistory")) || [];
         calculationHistory.push(entry);
         if (calculationHistory.length > 40) {
             calculationHistory.shift();
         }
         localStorage.setItem("sugar_calculationHistory", JSON.stringify(calculationHistory));
     }
 
     function sugar_filterClients() {
         const input = document.getElementById("sugar-clientSearch");
         const filter = input.value.toLowerCase();
         const clientDropdown = document.getElementById("sugar-clientDropdown");
         clientDropdown.innerHTML = '';
         clientDropdown.style.display = 'block';
         let filteredClients = sugar_clients.slice(-3).reverse().filter(client => client.name.toLowerCase().includes(filter) || client.area.toLowerCase().includes(filter));
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
         addNewDiv.onclick = sugar_addNewClientPopup;
         clientDropdown.appendChild(addNewDiv);
         const closeDiv = document.createElement("div");
         closeDiv.innerHTML = "<strong>Close</strong>";
         closeDiv.onclick = closeClientDropdown;
         clientDropdown.appendChild(closeDiv);
     }
 
     function sugar_addNewClientPopup() {
         const modal = document.getElementById("sugar-addClientModal");
         modal.style.display = "block";
         document.body.classList.add('no-scroll'); // Add the class to the body
     }
 
     function sugar_closeAddClientModal() {
         const modal = document.getElementById("sugar-addClientModal");
         modal.style.display = "none";
         document.body.classList.remove('no-scroll'); // Remove the class from the body
     }
 
     function sugar_addClient() {
         const clientName = document.getElementById("sugar-clientName").value;
         const clientArea = document.getElementById("sugar-clientArea").value;
         const client = {
             name: clientName,
             area: clientArea
         };
         sugar_clients.push(client);
         localStorage.setItem("clients", JSON.stringify(sugar_clients));
         document.getElementById("sugar-clientName").value = "";
         document.getElementById("sugar-clientArea").value = "";
         document.getElementById("sugar-clientSearch").value = clientName + " (" + clientArea + ")";
         sugar_closeAddClientModal();
     }
 
     document.addEventListener('click', function(event) {
         const input = document.getElementById("sugar-clientSearch");
         const dropdown = document.getElementById("sugar-clientDropdown");
         if (!input.contains(event.target) && !dropdown.contains(event.target)) {
             dropdown.style.display = 'none';
         }
     });
 
     document.getElementById("sugar-clientSearch").addEventListener('focus', function() {
         document.getElementById("sugar-clientDropdown").style.display = 'block';
     });
 
     document.addEventListener("DOMContentLoaded", function() {
         const clientSelect = document.getElementById("sugar-clientSelect");
         sugar_clients.forEach(client => {
             const option = document.createElement("option");
             option.value = client.name;
             option.text = client.name + " (" + client.area + ")";
             clientSelect.appendChild(option);
         });
     });
 
 // SUGAR CALCULATOR END