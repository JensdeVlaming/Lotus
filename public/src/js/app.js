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
    provinceGatherLocation.readonly = true;

    cityGatherLocation.value = document.getElementById('cityPlayGround').value;
    cityGatherLocation.classList.add("readonly-input")
    cityGatherLocation.readonly = true;

    streetGatherLocation.value = document.getElementById('streetPlayGround').value;
    streetGatherLocation.classList.add("readonly-input")
    streetGatherLocation.readonly = true;

    houseNumberGatherLocation.value = document.getElementById('houseNumberPlayGround').value;
    houseNumberGatherLocation.classList.add("readonly-input")
    houseNumberGatherLocation.readonly = true;

    annexGatherLocation.value = document.getElementById('annexPlayGround').value;
    annexGatherLocation.classList.add("readonly-input")
    annexGatherLocation.readonly = true;

    postalCodeGatherLocation.value = document.getElementById('postalCodePlayGround').value;
    postalCodeGatherLocation.classList.add("readonly-input")
    postalCodeGatherLocation.readonly = true;

    document.getElementById('provincePlayGround').onchange = function () {
      if (checkBox.checked) {
        provinceGatherLocation.value = document.getElementById('provincePlayGround').value;
        provinceGatherLocation.classList.add("readonly-input")
        provinceGatherLocation.readonly = true;
      }
    }

    document.getElementById('cityPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        cityGatherLocation.value = document.getElementById('cityPlayGround').value;
        cityGatherLocation.classList.add("readonly-input")
        cityGatherLocation.readonly = true;
      }
    }

    document.getElementById('streetPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        streetGatherLocation.value = document.getElementById('streetPlayGround').value;
        streetGatherLocation.classList.add("readonly-input")
        streetGatherLocation.readonly = true;
      }
    }

    document.getElementById('houseNumberPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        houseNumberGatherLocation.value = document.getElementById('houseNumberPlayGround').value;
        houseNumberGatherLocation.classList.add("readonly-input")
        houseNumberGatherLocation.readonly = true;
      }
    }

    document.getElementById('annexPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        annexGatherLocation.value = document.getElementById('annexPlayGround').value;
        annexGatherLocation.classList.add("readonly-input")
        annexGatherLocation.readonly = true;
      }
    }

    document.getElementById('postalCodePlayGround').onkeyup = function () {
      if (checkBox.checked) {
        postalCodeGatherLocation.value = document.getElementById('postalCodePlayGround').value;
        postalCodeGatherLocation.classList.add("readonly-input")
        postalCodeGatherLocation.readonly = true;
      }
    }



  } else {
    cityGatherLocation.readonly = false;
    provinceGatherLocation.readonly = false;
    streetGatherLocation.readonly = false;
    houseNumberGatherLocation.readonly = false;
    annexGatherLocation.readonly = false;
    postalCodeGatherLocation.readonly = false;
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
    provinceBillingAddress.readonly = true;

    cityBillingAddress.value = document.getElementById('cityBusinessAddress').value;
    cityBillingAddress.classList.add("readonly-input")
    cityBillingAddress.readonly = true;

    streetBillingAddress.value = document.getElementById('streetBusinessAddress').value;
    streetBillingAddress.classList.add("readonly-input")
    streetBillingAddress.readonly = true;

    houseNumberBillingAddress.value = document.getElementById('houseNumberBusinessAddress').value;
    houseNumberBillingAddress.classList.add("readonly-input")
    houseNumberBillingAddress.readonly = true;

    annexBillingAddress.value = document.getElementById('annexBusinessAddress').value;
    annexBillingAddress.classList.add("readonly-input")
    annexBillingAddress.readonly = true;

    postalCodeBillingAddress.value = document.getElementById('postalCodeBusinessAddress').value;
    postalCodeBillingAddress.classList.add("readonly-input")
    postalCodeBillingAddress.readonly = true;

    document.getElementById('provinceBusinessAddress').onchange = function () {
      if (checkBox.checked) {
        provinceBillingAddress.value = document.getElementById('provinceBusinessAddress').value;
        provinceBillingAddress.classList.add("readonly-input")
        provinceBillingAddress.readonly = true;
      }
    }

    document.getElementById('cityBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        cityBillingAddress.value = document.getElementById('cityBusinessAddress').value;
        cityBillingAddress.classList.add("readonly-input")
        cityBillingAddress.readonly = true;
      }
    }

    document.getElementById('streetBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        streetBillingAddress.value = document.getElementById('streetBusinessAddress').value;
        streetBillingAddress.classList.add("readonly-input")
        streetBillingAddress.readonly = true;
      }
    }

    document.getElementById('houseNumberBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        houseNumberBillingAddress.value = document.getElementById('houseNumberBusinessAddress').value;
        houseNumberBillingAddress.classList.add("readonly-input")
        houseNumberBillingAddress.readonly = true;
      }
    }

    document.getElementById('annexBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        annexBillingAddress.value = document.getElementById('annexBusinessAddress').value;
        annexBillingAddress.classList.add("readonly-input")
        annexBillingAddress.readonly = true;
      }
    }

    document.getElementById('postalCodeBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        postalCodeBillingAddress.value = document.getElementById('postalCodeBusinessAddress').value;
        postalCodeBillingAddress.classList.add("readonly-input")
        postalCodeBillingAddress.readonly = true;
      }
    }

  } else {
    cityBillingAddress.readonly = false;
    provinceBillingAddress.readonly = false;
    streetBillingAddress.readonly = false;
    houseNumberBillingAddress.readonly = false;
    annexBillingAddress.readonly = false;
    postalCodeBillingAddress.readonly = false;

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