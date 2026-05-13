const answPar = document.getElementById('answPar');
const moreOptsBtn = document.getElementById('moreOptsBtn');
const otherOptionsPanel = document.getElementById('otherOptionsPanel');

let expression = "0";
let justCalced = false;

const buttons = {
    zeroBtn: "0",
    oneBtn: "1",
    twoBtn: "2",
    threeBtn: "3",
    fourBtn: "4",
    fiveBtn: "5",
    sixBtn: "6",
    sevenBtn: "7",
    eightBtn: "8",
    nineBtn: "9",

    plusBtn: "+",
    minusBtn: "-",
    mulBtn: "*",
    divBtn: "/",
    closeParBtn: ')',
    openParBtn: '(',

    expBtn: '**',
    rootBtn: '√(',
    lnBtn: 'ln(',
    logBtn: 'log(',
    piBtn: 'π',
    eBtn: 'e',
    factBtn: '!',
    dotBtn: '.'
};

const isOperator = (v) =>
    v === "+" || v === "-" || v === "*" || v === "/" || v === "!" || v === "**" || v == '.';

for (const id in buttons) {
    const button = document.getElementById(id);

    button.addEventListener("click", () => {

        const value = buttons[id];
        const lastChar = expression.slice(-1);
        const specialValues = ['(', ')', 'ln(', 'log(', '√(', 'π', 'e'];

        if (justCalced) {

            if (!isNaN(value) || value === '-' || specialValues.includes(value)) {
                expression = value;
            } else if (expression && isOperator(value)) {
                expression += value;
            }

            justCalced = false;
            updateDisplay();
            return;
        }


        if (isOperator(value) && isOperator(lastChar)) {
            return;
        }

        if (expression === "0") {
            
            if (!isNaN(value) || value === '-' || specialValues.includes(value)) {
                expression = value;
            } else if (isOperator(value) && !(value === '-')) {
                expression = "0" + value;
            }

            updateDisplay();
            return;
        }


        expression += value;
        updateDisplay();
    });
}


function updateDisplay() {
    answPar.textContent = expression || "0";
    answPar.scrollTo({
        left: answPar.scrollWidth,
        behavior: "smooth"
    });
}

function moreOptsBtnClicked() {
    if (otherOptionsPanel.classList.contains('translate-x-17.5')) {
        otherOptionsPanel.classList.remove('translate-x-17.5');
        otherOptionsPanel.classList.add('translate-x-60');
    } else {
        otherOptionsPanel.classList.add('translate-x-17.5');
        otherOptionsPanel.classList.remove('translate-x-60');
    }

}

function clearLastSymbBtnClicked() {
    if (expression === '0') {
        return;
    }
    expression = expression.slice(0, -1);
    updateDisplay();
}

function answBtnClicked() {
    if (!expression) {
        return;
    }

    const url = "calculations.php?expression=" + encodeURIComponent(expression);

    fetch(url)
        .then(res => res.json())
        .then(data => {

            if (data.result !== undefined) {
                expression = data.result.toString();
                justCalced = true;
                updateDisplay();
            } else {
                answPar.textContent = "Ошибка";
            }
        })
        .catch(() => {
            answPar.textContent = "Ошибка сервера";
        });
}

function clearAllBtnClicked() {
    expression = "0";
    updateDisplay();
}

document.getElementById("clearAllBtn")
    .addEventListener("click", clearAllBtnClicked);


document.getElementById("clearLastSymbBtn")
    .addEventListener("click", clearLastSymbBtnClicked);



document.getElementById("answBtn")
    .addEventListener("click", answBtnClicked);




moreOptsBtn.addEventListener('click', moreOptsBtnClicked)
document.addEventListener('keydown', function (e) {
    if (e.key === 'Shift' || e.key === 'Meta' || e.key === 'CapsLock' || e.key === "Escape") {
        return;
    } 
    if (e.key === 'Backspace') {
        clearLastSymbBtnClicked();
        return;
    } 
    if (e.key === 'Enter') {
        answBtnClicked();
        return;
    }
    if (e.key === "Control") {
        clearAllBtnClicked();
        return;
    }  
    if (e.key === 'Alt') {
        moreOptsBtnClicked();
        return;
    } 
    const allowed = "0123456789()lngoe√π+-/*.";
    if (e.key === "/") {
        e.preventDefault();
    }
    if (!allowed.includes(e.key)) {
        e.preventDefault();
        return;
    }
    if (expression === '0' && !isOperator(e.key)) {
        expression = e.key;
    } else {
        expression += e.key;
    }
    updateDisplay();
})