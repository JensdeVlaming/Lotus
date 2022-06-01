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
    provinceGatherLocation.classList.add("disabled-input")
    provinceGatherLocation.disabled = true;

    cityGatherLocation.value = document.getElementById('cityPlayGround').value;
    cityGatherLocation.classList.add("disabled-input")
    cityGatherLocation.disabled = true;

    streetGatherLocation.value = document.getElementById('streetPlayGround').value;
    streetGatherLocation.classList.add("disabled-input")
    streetGatherLocation.disabled = true;

    houseNumberGatherLocation.value = document.getElementById('houseNumberPlayGround').value;
    houseNumberGatherLocation.classList.add("disabled-input")
    houseNumberGatherLocation.disabled = true;

    annexGatherLocation.value = document.getElementById('annexPlayGround').value;
    annexGatherLocation.classList.add("disabled-input")
    annexGatherLocation.disabled = true;

    postalCodeGatherLocation.value = document.getElementById('postalCodePlayGround').value;
    postalCodeGatherLocation.classList.add("disabled-input")
    postalCodeGatherLocation.disabled = true;

    document.getElementById('provincePlayGround').onchange = function () {
      if (checkBox.checked) {
        provinceGatherLocation.value = document.getElementById('provincePlayGround').value;
        provinceGatherLocation.classList.add("disabled-input")
        provinceGatherLocation.disabled = true;
      }
    }

    document.getElementById('cityPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        cityGatherLocation.value = document.getElementById('cityPlayGround').value;
        cityGatherLocation.classList.add("disabled-input")
        cityGatherLocation.disabled = true;
      }
    }

    document.getElementById('streetPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        streetGatherLocation.value = document.getElementById('streetPlayGround').value;
        streetGatherLocation.classList.add("disabled-input")
        streetGatherLocation.disabled = true;
      }
    }

    document.getElementById('houseNumberPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        houseNumberGatherLocation.value = document.getElementById('houseNumberPlayGround').value;
        houseNumberGatherLocation.classList.add("disabled-input")
        houseNumberGatherLocation.disabled = true;
      }
    }

    document.getElementById('annexPlayGround').onkeyup = function () {
      if (checkBox.checked) {
        annexGatherLocation.value = document.getElementById('annexPlayGround').value;
        annexGatherLocation.classList.add("disabled-input")
        annexGatherLocation.disabled = true;
      }
    }

    document.getElementById('postalCodePlayGround').onkeyup = function () {
      if (checkBox.checked) {
        postalCodeGatherLocation.value = document.getElementById('postalCodePlayGround').value;
        postalCodeGatherLocation.classList.add("disabled-input")
        postalCodeGatherLocation.disabled = true;
      }
    }



  } else {
    cityGatherLocation.disabled = false;
    provinceGatherLocation.disabled = false;
    streetGatherLocation.disabled = false;
    houseNumberGatherLocation.disabled = false;
    annexGatherLocation.disabled = false;
    postalCodeGatherLocation.disabled = false;
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
    provinceBillingAddress.classList.add("disabled-input")
    provinceBillingAddress.disabled = true;

    cityBillingAddress.value = document.getElementById('cityBusinessAddress').value;
    cityBillingAddress.classList.add("disabled-input")
    cityBillingAddress.disabled = true;

    streetBillingAddress.value = document.getElementById('streetBusinessAddress').value;
    streetBillingAddress.classList.add("disabled-input")
    streetBillingAddress.disabled = true;

    houseNumberBillingAddress.value = document.getElementById('houseNumberBusinessAddress').value;
    houseNumberBillingAddress.classList.add("disabled-input")
    houseNumberBillingAddress.disabled = true;

    annexBillingAddress.value = document.getElementById('annexBusinessAddress').value;
    annexBillingAddress.classList.add("disabled-input")
    annexBillingAddress.disabled = true;

    postalCodeBillingAddress.value = document.getElementById('postalCodeBusinessAddress').value;
    postalCodeBillingAddress.classList.add("disabled-input")
    postalCodeBillingAddress.disabled = true;

    document.getElementById('provinceBusinessAddress').onchange = function () {
      if (checkBox.checked) {
        provinceBillingAddress.value = document.getElementById('provinceBusinessAddress').value;
        provinceBillingAddress.classList.add("disabled-input")
        provinceBillingAddress.disabled = true;
      }
    }

    document.getElementById('cityBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        cityBillingAddress.value = document.getElementById('cityBusinessAddress').value;
        cityBillingAddress.classList.add("disabled-input")
        cityBillingAddress.disabled = true;
      }
    }

    document.getElementById('streetBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        streetBillingAddress.value = document.getElementById('streetBusinessAddress').value;
        streetBillingAddress.classList.add("disabled-input")
        streetBillingAddress.disabled = true;
      }
    }

    document.getElementById('houseNumberBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        houseNumberBillingAddress.value = document.getElementById('houseNumberBusinessAddress').value;
        houseNumberBillingAddress.classList.add("disabled-input")
        houseNumberBillingAddress.disabled = true;
      }
    }

    document.getElementById('annexBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        annexBillingAddress.value = document.getElementById('annexBusinessAddress').value;
        annexBillingAddress.classList.add("disabled-input")
        annexBillingAddress.disabled = true;
      }
    }

    document.getElementById('postalCodeBusinessAddress').onkeyup = function () {
      if (checkBox.checked) {
        postalCodeBillingAddress.value = document.getElementById('postalCodeBusinessAddress').value;
        postalCodeBillingAddress.classList.add("disabled-input")
        postalCodeBillingAddress.disabled = true;
      }
    }

  } else {
    cityBillingAddress.disabled = false;
    provinceBillingAddress.disabled = false;
    streetBillingAddress.disabled = false;
    houseNumberBillingAddress.disabled = false;
    annexBillingAddress.disabled = false;
    postalCodeBillingAddress.disabled = false;

  }
}

const placeRequestFormContent = document.getElementById('placeRequestFormContent');
var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

if (viewportWidth > 768) {
  if (viewportWidth > 992) {
    placeRequestFormContent.classList.remove('w-75');
    placeRequestFormContent.classList.add('w-50');
  }
  placeRequestFormContent.classList.remove('w-50');
  placeRequestFormContent.classList.add('w-75');
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
      }
      placeRequestFormContent.classList.remove('w-50');
      placeRequestFormContent.classList.add('w-75');
    } else {
      placeRequestFormContent.classList.remove('w-75');
      placeRequestFormContent.classList.remove('w-50');
    }
  }
});