var currentTab = 0;
const tabOne = document.getElementById('tabOne');
const tabTwo = document.getElementById('tabTwo');
const tabThree = document.getElementById('tabThree');
const one = document.getElementById('1');
const two = document.getElementById('2');
const three = document.getElementById('3');
const stepBack = document.getElementById('stepBack');
const stepNext = document.getElementById('stepNext');
const submitButton = document.getElementById('submitButton');
const form = document.getElementById('tabFormContent');
const tabButtons = form.querySelectorAll(".tabButton");
const tab = form.querySelectorAll(".tab");

let numbers = [];
let tabs = [];

tabs.push(tabOne);
tabs.push(tabTwo);
tabs.push(tabThree);

numbers.push(one);
numbers.push(two);
numbers.push(three);

switchTabs(currentTab);

function nextTab() {
    let clear = true;
    const inputfields = tabs[currentTab].querySelectorAll(".stepInputField");
    inputfields.forEach(input => {
        if (!(input.value)) {
            clear = false;
        }
    });
    if (clear) {
        if (currentTab <= 2) {
            currentTab++;
        }
        switchTabs(currentTab);
    } else {
        alert('Gelieve alle velden in te vullen!');
    }
}

function prevTab() {
    if (currentTab >= 1) {
        currentTab--;
    }
    switchTabs(currentTab);
}

function switchTabs(currentTab) {

    switch (currentTab) {
        case 0:
            stepBack.classList.add('hide-this');
            tabs.forEach(tab => {
                if (tab === tabOne) {
                    tab.classList.add('d-block');
                    tab.classList.remove('d-none');
                } else {
                    tab.classList.add('d-none');
                    tab.classList.remove('d-block');
                }
            });

            numbers.forEach(number => {
                if (!(number === one)) {
                    number.classList.remove('btn-number-current');
                }
            });

            break;

        case 1:
            stepBack.classList.remove('hide-this');
            tabs.forEach(tab => {
                if (tab === tabTwo) {
                    tab.classList.add('d-block');
                    tab.classList.remove('d-none');
                } else {
                    tab.classList.add('d-none');
                    tab.classList.remove('d-block');
                }
            });

            numbers.forEach(number => {
                if (number === three) {
                    number.classList.remove('btn-number-current');
                } else {
                    number.classList.add('btn-number-current');
                }
            });
            break;

        case 2:
            tabs.forEach(tab => {
                if (tab === tabThree) {
                    tab.classList.add('d-block');
                    tab.classList.remove('d-none');
                } else {
                    tab.classList.add('d-none');
                    tab.classList.remove('d-block');
                }
            });

            numbers.forEach(number => {
                number.classList.add('btn-number-current');
            });
            break;

        case 3:
            stepBack.classList.add('hide-this');
            stepBack.onclick = null;
            stepNext.classList.add('hide-this');
            stepNext.onclick = null;

            tabButtons.forEach(button => {
                button.classList.add('d-none');
            });

            tabs.forEach(x => {
                tab.forEach(tab => {
                    tab.classList.remove('d-none');
                    tab.classList.add('d-block');
                });
            });

            submitButton.classList.add("d-block");
            submitButton.classList.remove('d-none');

            break;

        default:
            console.log('probleempie');
            break;
    }
}

window.addEventListener('resize', resizeScreen);

var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

if (viewportWidth > 768) {
    if (viewportWidth > 992) {
        form.classList.add('w-25');
    } else {
        form.classList.add('w-50');
    }
} else {
    form.classList.remove('w-25');
    form.classList.remove('w-50');
}

function resizeScreen() {
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;


    console.log('e');

    if (viewportWidth > 768) {
        if (viewportWidth > 1000) {
            console.log('e');
            form.classList.remove('w-50');
            form.classList.add('w-25');
        } else {
            console.log('i');
            form.classList.remove('w-25');
            form.classList.add('w-50');
        }
    } else {
        console.log('a');
        form.classList.remove('w-25');
        form.classList.remove('w-50');
    }
};