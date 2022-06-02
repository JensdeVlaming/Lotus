$("textarea").each(function () {
  this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
}).on("input", function () {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
});

function automateGatherLocationDataOnCheck() {

  const checkBox = document.getElementById("gatherLocationCheckbox");

  const provinceGatherLocation = document.getElementById('provinceGatherLocation');
  const cityGatherLocation = document.getElementById('cityGatherLocation');
  const streetGatherLocation = document.getElementById('streetGatherLocation');
  const houseNumberGatherLocation = document.getElementById('houseNumberGatherLocation');
  const annexGatherLocation = document.getElementById('annexGatherLocation');
  const postalCodeGatherLocation = document.getElementById('postalCodeGatherLocation');

  if (checkBox.checked) {

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
  }
};

function automateUserDataOnCheck() {

};

function automateBillingAddressDataOnCheck() {

  const checkBox = document.getElementById("billingAddressCheckbox");

  const provinceBillingAddress = document.getElementById('provinceBillingAddress');
  const cityBillingAddress = document.getElementById('cityBillingAddress');
  const streetBillingAddress = document.getElementById('streetBillingAddress');
  const houseNumberBillingAddress = document.getElementById('houseNumberBillingAddress');
  const annexBillingAddress = document.getElementById('annexBillingAddress');
  const postalCodeBillingAddress = document.getElementById('postalCodeBillingAddress');

  if (checkBox.checked) {

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

  }
}

const placeRequestFormContent = document.getElementById('placeRequestFormContent');
var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

if (viewportWidth > 768) {
  if (viewportWidth > 992) {
    placeRequestFormContent.classList.remove('w-75');
    placeRequestFormContent.classList.add('w-50');
  } else {
    placeRequestFormContent.classList.remove('w-50');
    placeRequestFormContent.classList.add('w-75');
  }
} else {
  placeRequestFormContent.classList.remove('w-75');
  placeRequestFormContent.classList.remove('w-50');
}

var width = $(window).width();
$(window).on('resize', function () {
  if ($(this).width() !== width) {
    width = $(this).width();

    const placeRequestFormContent = document.getElementById('placeRequestFormContent');
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

    if (viewportWidth > 768) {
      if (viewportWidth > 992) {
        placeRequestFormContent.classList.remove('w-75');
        placeRequestFormContent.classList.add('w-50');
      } else {
        placeRequestFormContent.classList.remove('w-50');
        placeRequestFormContent.classList.add('w-75');
      }
    } else {
      placeRequestFormContent.classList.remove('w-75');
      placeRequestFormContent.classList.remove('w-50');
    }
  }
});