// BASIC CALCULATOR START
    // let display = document.getElementById('display');
    // let displaySpan = document.getElementById('displaySpan');
    // let lastChar = '';

    // function addToDisplay(value) {
        
    //     if (['+', '-', '×', '÷'].includes(lastChar) && ['+', '-', '×', '÷'].includes(value)) {
    //         return;
    //     }

        
    //     if (lastChar === '%' && value === '%') {
    //         return;
    //     }

        
    //     display.value += value;
    //     lastChar = value;
    //     calculateResultSpan();
    // }

    // function addPercentage() {
        
    //     if (lastChar !== '%') {
    //         display.value += '%';
    //         lastChar = '%';
    //     }
    // }

    // function calculateResult() {
    //     try {
            
    //         const expression = display.value.replace(/÷/g, '/').replace(/×/g, '*').replace(/%/g, '/100');
    //         display.value = eval(expression);
    //     } catch (error) {
            
    //         display.value = 'Error';
    //     }
    // }
    // function calculateResultSpan() {
    //     try {
            
    //         const expression = display.value.replace(/÷/g, '/').replace(/×/g, '*').replace(/%/g, '/100');
    //         displaySpan.innerHTML = eval(expression);
    //     } catch (error) {
            
    //         displaySpan.innerHTML = '';
    //     }
    // }

    // function clearDisplay() {
        
    //     display.value = '';
    //     displaySpan.innerHTML = '';
    // }

    // function toggleSign() {
        
    //     if (display.value.charAt(0) === '-') {
    //         display.value = display.value.slice(1);
    //     } else {
    //         display.value = '-' + display.value;
    //     }
    // }

    // function backspace() {
        
    //     display.value = display.value.slice(0, -1);
    // }

    
    // document.addEventListener('keydown', (event) => {
    //     const key = event.key;

        
    //     if (/^[0-9%\+\-\*\/\.\r\n]$/.test(key)) {
    //         addToDisplay(key);
    //     } else if (key === 'Enter') {
    //         calculateResult();
    //     } else if (key === 'Escape') {
    //         clearDisplay();
    //     } else if (key === 'Backspace') {
    //         backspace();
    //     }

    //     event.preventDefault(); 
    // });


// BASIC CALCULATOR END







const display1 = document.querySelector('.dis1');
const display2 = document.querySelector('.dis2');
const display3 = document.querySelector('.dis3');
const number_cons = document.querySelectorAll('.number');
const operators = document.querySelectorAll('.oper');
const equal_btn = document.querySelector('.equal');
const clr = document.querySelector('.clear');
const ce_btn = document.querySelector('.ce_clear');

let dis1_num = '';
let dis2_num = '';
let result = null;
let last_oper = '';
let dot_btn = false;

number_cons.forEach( number => {

    number.addEventListener('click', (e)=> {

        if (e.target.value == '.' && !dot_btn) {
            dot_btn = true;
        } else if (e.target.value == '.' && dot_btn){
            return;
        }

        dis2_num += e.target.value;``
        console.log(dis2_num);
        display2.innerText = dis2_num;
    })

})


operators.forEach( oper => {
    oper.addEventListener('click', (e)=> {
        if (!dis2_num) return;
        dot_btn = false;

        const operation = e.target.value;

        if (dis1_num && dis2_num && last_oper) {
            math_operation()
        } else{
            result = parseFloat (dis2_num)
        }
        clearVar(operation)
        last_oper = operation
    })

})


function clearVar(name =''){
    dis1_num += dis2_num+ ' ' + name + ' ';
    display1.innerText = dis1_num;
    dis2_num = '';
    display2.innerText = '';
    display3.innerHTML = result;
}


function math_operation(){
    if (last_oper == 'x') {
        result = parseFloat(result) * parseFloat(dis2_num)
    } else if (last_oper == '+') {
        result = parseFloat(result) + parseFloat(dis2_num)
    } else if (last_oper == '-') {
        result = parseFloat(result) - parseFloat(dis2_num)
    } else if (last_oper == '/') {
        result = parseFloat(result) / parseFloat(dis2_num)
    } else if (last_oper == '%') {
        result = parseFloat(result) % parseFloat(dis2_num)
    }
}


equal_btn.addEventListener('click', (e)=>{
    if (!dis1_num || !dis2_num) return;
    dot_btn = false;
    math_operation()
    clearVar()
    display3.innerText = result;
    display2.innerText = '';
    dis2_num = result;
    dis1_num = '';
})


clr.addEventListener('click', (e)=>{
    display1.innerText = '0';
    display2.innerText = '0';
    display3.innerText = '0';
    dis2_num = '';
    dis1_num = '';
    result = '';
})


ce_btn.addEventListener('click', (e)=>{
    display2.innerText = '';
    dis2_num = '';
});


window.addEventListener('keydown', (e)=>{
    if (e.key == '0' ||
        e.key == '1' ||
        e.key == '2' ||
        e.key == '3' ||
        e.key == '4' ||
        e.key == '5' ||
        e.key == '6' ||
        e.key == '7' ||       
        e.key == '8' ||       
        e.key == '9' ||       
        e.key == '.'     
        ){
        clickButton(e.key)
    }else if(
        e.key == '+' ||
        e.key == '-' ||
        e.key == '/' ||
        e.key == '%'
    ){
        clickOper(e.key)
    } else if (e.key == '*') {
        e.key == '*'
        clickOper('x')
    } else if (e.key == 'Enter' || e.key == '=') {
        clickEqual()
    } else if (e.key == 'Backspace') {
        clickBack()
    } else if (e.key == 'Escape') {
        clickDel()
    } else if (e.key == 'Delete') {
        clickDel()
    }

})

function clickButton(key) {
    number_cons.forEach( button =>{
        if(button.value == key ) {
            button.click();
        }
    })
}



function clickOper(key) {
    operators.forEach( button =>{
        if(button.value == key ) {
            button.click();
        }
    })
}

function clickEqual(){
    equal_btn.click();
}

function clickBack(){
    ce_btn.click();
}

function clickDel(){
    clr.click();
}