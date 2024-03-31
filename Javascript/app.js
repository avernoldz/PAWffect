var config = {
  cUrl: "https://psgc.gitlab.io/api/regions/",
  cUrlProv: "https://psgc.gitlab.io/api/provinces/",
  cUrlBrgy: "https://psgc.gitlab.io/api/municipalities/",
  // ckey: "NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA==",
};

var countrySelect = document.querySelector(".country"),
  stateSelect = document.querySelector(".state"),
  citySelect = document.querySelector(".city"),
  brgySelect = document.querySelector(".brgy");

function loadCountries() {
  let apiEndPoint = config.cUrl;

  fetch(apiEndPoint, { headers: {} })
    .then((Response) => Response.json())
    .then((data) => {
      console.log(data);

      data.forEach((country) => {
        const option = document.createElement("option");
        option.id = country.code;
        option.value = country.regionName;
        option.textContent = country.regionName;
        countrySelect.appendChild(option);
      });
    })
    .catch((error) => console.error("Error loading countries:", error));

  stateSelect.disabled = true;
  citySelect.disabled = true;
  brgySelect.disabled = true;
  stateSelect.style.pointerEvents = "none";
  citySelect.style.pointerEvents = "none";
  brgySelect.style.pointerEvents = "none";
}

function loadProvince() {
  stateSelect.disabled = false;
  citySelect.disabled = true;
  stateSelect.style.pointerEvents = "auto";
  citySelect.style.pointerEvents = "none";
  brgySelect.style.pointerEvents = "none";

  const selectedCountryCode =
    countrySelect.options[countrySelect.selectedIndex].id;

  console.log(selectedCountryCode);
  stateSelect.innerHTML = '<option value="">Select State</option>'; // for clearing the existing states
  citySelect.innerHTML = '<option value="">Select City</option>'; // Clear existing city options
  brgySelect.innerHTML = '<option value="">Select Brgy.</option>'; // Clear existing brgy options

  fetch(`${config.cUrl}/${selectedCountryCode}/provinces`, {
    headers: {},
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      data.forEach((state) => {
        const option = document.createElement("option");
        option.id = state.code;
        option.value = state.name;
        option.textContent = state.name;
        stateSelect.appendChild(option);
      });
    })
    .catch((error) => console.error("Error loading countries:", error));
}

function loadCities() {
  citySelect.disabled = false;
  citySelect.style.pointerEvents = "auto";

  const selectedStateCode = stateSelect.options[stateSelect.selectedIndex].id;
  console.log(selectedStateCode);

  citySelect.innerHTML = '<option value="">Select City</option>'; // Clear existing city options

  fetch(`${config.cUrlProv}/${selectedStateCode}/municipalities`, {
    headers: {},
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      data.forEach((city) => {
        const option = document.createElement("option");
        option.id = city.code;
        option.value = city.name;
        option.textContent = city.name;
        citySelect.appendChild(option);
      });
    });
}

function loadBrgy() {
  brgySelect.disabled = false;
  brgySelect.style.pointerEvents = "auto";

  const selectedCity = citySelect.options[citySelect.selectedIndex].id;

  console.log(selectedCity);
  brgySelect.innerHTML = '<option value="">Select Brgy.</option>'; // Clear existing city options

  fetch(`${config.cUrlBrgy}/${selectedCity}/barangays`, {
    headers: {},
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      data.forEach((brgy) => {
        const option = document.createElement("option");
        option.value = brgy.name;
        option.textContent = brgy.name;
        brgySelect.appendChild(option);
      });
    });
}
window.onload = loadCountries;

function load() {
  console.log(brgySelect.value);
}
