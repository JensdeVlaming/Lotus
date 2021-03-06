function automateGatherLocationDataOnCheck() {

  const checkBox = document.getElementById("gatherLocationCheckbox");

  let gatherLocationArray = [];

  const provinceGatherLocation = document.getElementById('provinceGatherLocation');
  const cityGatherLocation = document.getElementById('cityGatherLocation');
  const streetGatherLocation = document.getElementById('streetGatherLocation');
  const houseNumberGatherLocation = document.getElementById('houseNumberGatherLocation');
  const annexGatherLocation = document.getElementById('annexGatherLocation');
  const postalCodeGatherLocation = document.getElementById('postalCodeGatherLocation');

  gatherLocationArray.push(provinceGatherLocation);
  gatherLocationArray.push(cityGatherLocation);
  gatherLocationArray.push(streetGatherLocation);
  gatherLocationArray.push(houseNumberGatherLocation);
  gatherLocationArray.push(annexGatherLocation);
  gatherLocationArray.push(postalCodeGatherLocation);

  let provinceArray = [];

  const defaultOptionGatherLocation = document.getElementById('defaultOptionGatherLocation');
  const DrentheGatherLocation = document.getElementById('DrentheGatherLocation');
  const FlevolandGatherLocation = document.getElementById('FlevolandGatherLocation');
  const FrieslandGatherLocation = document.getElementById('FrieslandGatherLocation');
  const GelderlandGatherLocation = document.getElementById('GelderlandGatherLocation');
  const GroningenGatherLocation = document.getElementById('GroningenGatherLocation');
  const LimburgGatherLocation = document.getElementById('LimburgGatherLocation');
  const NoordBrabantGatherLocation = document.getElementById('NoordBrabantGatherLocation');
  const NoordHollandGatherLocation = document.getElementById('NoordHollandGatherLocation');
  const OverijsselGatherLocation = document.getElementById('OverijsselGatherLocation');
  const UtrechtGatherLocation = document.getElementById('UtrechtGatherLocation');
  const ZeelandGatherLocation = document.getElementById('ZeelandGatherLocation');
  const ZuidHollandGatherLocation = document.getElementById('ZuidHollandGatherLocation');

  provinceArray.push(defaultOptionGatherLocation);
  provinceArray.push(DrentheGatherLocation);
  provinceArray.push(FlevolandGatherLocation);
  provinceArray.push(FrieslandGatherLocation);
  provinceArray.push(GelderlandGatherLocation);
  provinceArray.push(GroningenGatherLocation);
  provinceArray.push(LimburgGatherLocation);
  provinceArray.push(NoordBrabantGatherLocation);
  provinceArray.push(NoordHollandGatherLocation);
  provinceArray.push(OverijsselGatherLocation);
  provinceArray.push(UtrechtGatherLocation);
  provinceArray.push(ZeelandGatherLocation);
  provinceArray.push(ZuidHollandGatherLocation);


  if (checkBox.checked) {

    provinceArray.forEach(element => {

      if (element.value === document.getElementById('provincePlayGround')) {
        element.selected = true;
        element.disabled = false;
      } else {
        element.selected = false;
        element.disabled = true;
      }
    });

    provinceGatherLocation.value = document.getElementById('provincePlayGround').value;
    provinceGatherLocation.classList.add("readonly-input")
    provinceGatherLocation.readOnly = true;

    cityGatherLocation.value = document.getElementById('cityPlayGround').value;
    cityGatherLocation.classList.add("readonly-input")
    cityGatherLocation.readOnly = true;

    streetGatherLocation.value = document.getElementById('streetPlayGround').value;
    streetGatherLocation.classList.add("readonly-input")
    streetGatherLocation.readOnly = true;

    houseNumberGatherLocation.value = document.getElementById('houseNumberPlayGround').value;
    houseNumberGatherLocation.classList.add("readonly-input")
    houseNumberGatherLocation.readOnly = true;

    annexGatherLocation.value = document.getElementById('annexPlayGround').value;
    annexGatherLocation.classList.add("readonly-input")
    annexGatherLocation.readOnly = true;

    postalCodeGatherLocation.value = document.getElementById('postalCodePlayGround').value;
    postalCodeGatherLocation.classList.add("readonly-input")
    postalCodeGatherLocation.readOnly = true;

    document.getElementById('provincePlayGround').onchange = function () {
      if (checkBox.checked) {
        provinceGatherLocation.value = document.getElementById('provincePlayGround').value;
        provinceGatherLocation.classList.add("readonly-input")
        provinceGatherLocation.readOnly = true;
      }
    }

    document.getElementById('cityPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        cityGatherLocation.value = document.getElementById('cityPlayGround').value;
        cityGatherLocation.classList.add("readonly-input")
        cityGatherLocation.readOnly = true;
      }
    }

    document.getElementById('streetPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        streetGatherLocation.value = document.getElementById('streetPlayGround').value;
        streetGatherLocation.classList.add("readonly-input")
        streetGatherLocation.readOnly = true;
      }
    }

    document.getElementById('houseNumberPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        houseNumberGatherLocation.value = document.getElementById('houseNumberPlayGround').value;
        houseNumberGatherLocation.classList.add("readonly-input")
        houseNumberGatherLocation.readOnly = true;
      }
    }

    document.getElementById('annexPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        annexGatherLocation.value = document.getElementById('annexPlayGround').value;
        annexGatherLocation.classList.add("readonly-input")
        annexGatherLocation.readOnly = true;
      }
    }

    document.getElementById('postalCodePlayGround').onkeyup = function () {
      if (checkBox.checked) {
        postalCodeGatherLocation.value = document.getElementById('postalCodePlayGround').value;
        postalCodeGatherLocation.classList.add("readonly-input")
        postalCodeGatherLocation.readOnly = true;
      }
    }



  } else {
    cityGatherLocation.readOnly = false;
    provinceGatherLocation.readOnly = false;
    streetGatherLocation.readOnly = false;
    houseNumberGatherLocation.readOnly = false;
    annexGatherLocation.readOnly = false;
    postalCodeGatherLocation.readOnly = false;

    provinceArray.forEach(element => {
      element.disabled = false;
      element.selected = false;
      defaultOptionGatherLocation.selected = true;
    });

    gatherLocationArray.forEach(element => {
      element.classList.remove("readonly-input")
      element.readOnly = false;
    });
  }
};

function automateUserDataOnCheck() {

};

function automateBillingAddressDataOnCheck() {

  const checkBox = document.getElementById("billingAddressCheckbox");

  let billingAddressArray = [];

  const provinceBillingAddress = document.getElementById('provinceBillingAddress');
  const cityBillingAddress = document.getElementById('cityBillingAddress');
  const streetBillingAddress = document.getElementById('streetBillingAddress');
  const houseNumberBillingAddress = document.getElementById('houseNumberBillingAddress');
  const annexBillingAddress = document.getElementById('annexBillingAddress');
  const postalCodeBillingAddress = document.getElementById('postalCodeBillingAddress');

  billingAddressArray.push(provinceBillingAddress);
  billingAddressArray.push(cityBillingAddress);
  billingAddressArray.push(streetBillingAddress);
  billingAddressArray.push(houseNumberBillingAddress);
  billingAddressArray.push(annexBillingAddress);
  billingAddressArray.push(postalCodeBillingAddress);

  let provinceArray = [];

  const defaultOptionBillingAddress = document.getElementById('defaultOptionBillingAddress');
  const DrentheBillingAddress = document.getElementById('DrentheBillingAddress');
  const FlevolandBillingAddress = document.getElementById('FlevolandBillingAddress');
  const FrieslandBillingAddress = document.getElementById('FrieslandBillingAddress');
  const GelderlandBillingAddress = document.getElementById('GelderlandBillingAddress');
  const GroningenBillingAddress = document.getElementById('GroningenBillingAddress');
  const LimburgBillingAddress = document.getElementById('LimburgBillingAddress');
  const NoordBrabantBillingAddress = document.getElementById('NoordBrabantBillingAddress');
  const NoordHollandBillingAddress = document.getElementById('NoordHollandBillingAddress');
  const OverijsselBillingAddress = document.getElementById('OverijsselBillingAddress');
  const UtrechtBillingAddress = document.getElementById('UtrechtBillingAddress');
  const ZeelandBillingAddress = document.getElementById('ZeelandBillingAddress');
  const ZuidHollandBillingAddress = document.getElementById('ZuidHollandBillingAddress');

  provinceArray.push(defaultOptionBillingAddress);
  provinceArray.push(DrentheBillingAddress);
  provinceArray.push(FlevolandBillingAddress);
  provinceArray.push(FrieslandBillingAddress);
  provinceArray.push(GelderlandBillingAddress);
  provinceArray.push(GroningenBillingAddress);
  provinceArray.push(LimburgBillingAddress);
  provinceArray.push(NoordBrabantBillingAddress);
  provinceArray.push(NoordHollandBillingAddress);
  provinceArray.push(OverijsselBillingAddress);
  provinceArray.push(UtrechtBillingAddress);
  provinceArray.push(ZeelandBillingAddress);
  provinceArray.push(ZuidHollandBillingAddress);

  if (checkBox.checked) {

    provinceArray.forEach(element => {

      if (element.value === document.getElementById('provinceCompanyAddress')) {
        element.selected = true;
        element.disabled = false;
      } else {
        element.selected = false;
        element.disabled = true;
      }
    });

    provinceBillingAddress.value = document.getElementById('provinceBusinessAddress').value;
    provinceBillingAddress.classList.add("readonly-input")
    provinceBillingAddress.readOnly = true;

    cityBillingAddress.value = document.getElementById('cityBusinessAddress').value;
    cityBillingAddress.classList.add("readonly-input")
    cityBillingAddress.readOnly = true;

    streetBillingAddress.value = document.getElementById('streetBusinessAddress').value;
    streetBillingAddress.classList.add("readonly-input")
    streetBillingAddress.readOnly = true;

    houseNumberBillingAddress.value = document.getElementById('houseNumberBusinessAddress').value;
    houseNumberBillingAddress.classList.add("readonly-input")
    houseNumberBillingAddress.readOnly = true;

    annexBillingAddress.value = document.getElementById('annexBusinessAddress').value;
    annexBillingAddress.classList.add("readonly-input")
    annexBillingAddress.readOnly = true;

    postalCodeBillingAddress.value = document.getElementById('postalCodeBusinessAddress').value;
    postalCodeBillingAddress.classList.add("readonly-input")
    postalCodeBillingAddress.readOnly = true;

    document.getElementById('provinceBusinessAddress').onchange = function () {
      if (checkBox.checked) {
        provinceBillingAddress.value = document.getElementById('provinceBusinessAddress').value;
        provinceBillingAddress.classList.add("readonly-input")
        provinceBillingAddress.readOnly = true;
      }
    }

    document.getElementById('cityBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        cityBillingAddress.value = document.getElementById('cityBusinessAddress').value;
        cityBillingAddress.classList.add("readonly-input")
        cityBillingAddress.readOnly = true;
      }
    }

    document.getElementById('streetBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        streetBillingAddress.value = document.getElementById('streetBusinessAddress').value;
        streetBillingAddress.classList.add("readonly-input")
        streetBillingAddress.readOnly = true;
      }
    }

    document.getElementById('houseNumberBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        houseNumberBillingAddress.value = document.getElementById('houseNumberBusinessAddress').value;
        houseNumberBillingAddress.classList.add("readonly-input")
        houseNumberBillingAddress.readOnly = true;
      }
    }

    document.getElementById('annexBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        annexBillingAddress.value = document.getElementById('annexBusinessAddress').value;
        annexBillingAddress.classList.add("readonly-input")
        annexBillingAddress.readOnly = true;
      }
    }

    document.getElementById('postalCodeBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        postalCodeBillingAddress.value = document.getElementById('postalCodeBusinessAddress').value;
        postalCodeBillingAddress.classList.add("readonly-input")
        postalCodeBillingAddress.readOnly = true;
      }
    }

  } else {
    cityBillingAddress.readOnly = false;
    provinceBillingAddress.readOnly = false;
    streetBillingAddress.readOnly = false;
    houseNumberBillingAddress.readOnly = false;
    annexBillingAddress.readOnly = false;
    postalCodeBillingAddress.readOnly = false;

    billingAddressArray.forEach(element => {
      element.classList.remove("readonly-input")
      element.readOnly = false;
    });

    provinceArray.forEach(element => {
      element.disabled = false;
      element.selected = false;
      defaultOptionGatherLocation.selected = true;
    });

  }
}

const formContent = document.getElementById('formContent');
var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

if (viewportWidth > 768) {
  if (viewportWidth > 992) {
    formContent.classList.remove('w-75');
    formContent.classList.add('w-50');
  } else {
    formContent.classList.remove('w-50');
    formContent.classList.add('w-75');
  }
} else {
  formContent.classList.remove('w-75');
  formContent.classList.remove('w-50');
}

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd;
}

if (mm < 10) {
  mm = '0' + mm;
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("playDate").setAttribute("min", today);

var width = $(window).width();
$(window).on('resize', function () {
  if ($(this).width() !== width) {
    width = $(this).width();

    const formContent = document.getElementById('formContent');
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

    if (viewportWidth > 768) {
      if (viewportWidth > 992) {
        formContent.classList.remove('w-75');
        formContent.classList.add('w-50');
      } else {
        formContent.classList.remove('w-50');
        formContent.classList.add('w-75');
      }
    } else {
      formContent.classList.remove('w-75');
      formContent.classList.remove('w-50');
    }
  }
});

function hideGatherInfo() {
  const gatherBoxes = document.querySelectorAll('.gatherBox');
  const chevronDown = '<span id="gatherChevron" class="fa fa-chevron-down">';
  const chevronUp = '<span id="gatherChevron" class="fa fa-chevron-up">';

  let chevron = document.getElementById('gatherChevron');

  gatherBoxes.forEach(box => {
    if (box.classList.contains('d-none')) {
      box.classList.add('d-block');
      box.classList.remove('d-none');
    } else {
      box.classList.add('d-none');
      box.classList.remove('d-block');
    }
  });

  if (gatherBoxes[0].classList.contains('d-block')) {
    chevron.outerHTML = chevronDown;
  } else {
    chevron.outerHTML = chevronUp;
  }
}

function hideBillingInfo() {
  const billingBoxes = document.querySelectorAll('.billingBox');
  const chevronDown = '<span id="billingChevron" class="fa fa-chevron-down">';
  const chevronUp = '<span id="billingChevron" class="fa fa-chevron-up">';

  let chevron = document.getElementById('billingChevron');


  billingBoxes.forEach(box => {
    if (box.classList.contains('d-none')) {
      box.classList.add('d-block');
      box.classList.remove('d-none');
    } else {
      box.classList.add('d-none');
      box.classList.remove('d-block');
    }
  });

  if (billingBoxes[0].classList.contains('d-block')) {
    chevron.outerHTML = chevronDown;
  } else {
    chevron.outerHTML = chevronUp;
  }
}



// !Keep down here

$("textarea").each(function () {
  this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
}).on("input", function () {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
});