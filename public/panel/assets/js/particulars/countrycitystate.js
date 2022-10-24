var headers = new Headers();
headers.append("X-CSCAPI-KEY", "RkI3U1Y4YzVPYzlRQXJ3QUlvRmRJOFAxWUhXZkpOcXNJcXpoRDZiMQ==");

var requestOptions = {
method: 'GET',
headers: headers,
redirect: 'follow'
};

const getCountries = (element) =>{
    fetch("https://api.countrystatecity.in/v1/countries", requestOptions)
    .then(response => response.text())
    .then(result => {
        result = JSON.parse(result);
        result.forEach(res => {
            let htmlElement = document.createElement('option');
            htmlElement.innerText = res.name;
            htmlElement.value=res.name;
            htmlElement.dataset.id=res.iso2;
            htmlElement.dataset.name=replacer(res.name);
            element.insertAdjacentElement('afterend',htmlElement);
        });
        
        
    })
    .catch(error => console.log('error', error));
}
// element.parentElement.innerHTML = `<option value=" " class="citys" >İl Seçiniz</option>`;
const getCitys = async (element,country) =>{
    fetch(`https://api.countrystatecity.in/v1/countries/${country}/states`, requestOptions)
    .then(response => response.text())
    .then(result => {
        result = JSON.parse(result);
        result.forEach(res => {
            let htmlElement = document.createElement('option');
            htmlElement.innerText = res.name;
            htmlElement.value=res.name;
            htmlElement.dataset.id=res.iso2;
            htmlElement.dataset.name=replacer(res.name);
            element.insertAdjacentElement('afterend',htmlElement);
        })
    })
    .catch(error => console.log('error', error));
}

const getStates = (element,country,city) =>{
    fetch(`https://api.countrystatecity.in/v1/countries/${country}/states/${city}/cities`, requestOptions)
    .then(response => response.text())
    .then(result => {
        result = JSON.parse(result);
        result.forEach(res => {
            let htmlElement = document.createElement('option');
            htmlElement.innerText = res.name;
            htmlElement.value=res.name;
            element.insertAdjacentElement('afterend',htmlElement);
        })
    })
    .catch(error => console.log('error', error));
}

const replacer =  (str) =>{
    str = str.replaceAll(' ','');
    str = str.replaceAll('(','');
    str = str.replaceAll(')','');
    return str;
}

window.addEventListener('load',()=>{
    let countryCode = '';
    getCountries(document.querySelector('.countrySelect'));
    

    let form = document.querySelector("#kt_modal_new_address_form");
    $(form.querySelector('[name="country"]'))
        .select2()
            .on("change", function (event) {
                let val = event.target.value;
                let element = event.target.querySelectorAll(`[data-name=${replacer(val)}]`)[0];
                let code = element.dataset.id;
                document.querySelector('.states').parentElement.innerHTML =  `<option value=" " class="states" >İlçe Seçiniz</option>`;
                document.querySelector('.citys').parentElement.innerHTML =  `<option value=" " class="citys" >İl Seçiniz</option>`;
                countryCode=code;
                getCitys(document.querySelector('.citys'),code);
    });
    $(form.querySelector('[name="city"]'))
        .select2()
            .on("change", function (event) {
                let val = event.target.value;
                let element = event.target.querySelectorAll(`[data-name=${replacer(val)}]`)[0];
                let code = element.dataset.id;
                document.querySelector('.states').parentElement.innerHTML =  `<option value=" " class="states" >İlçe Seçiniz</option>`;
                getStates(document.querySelector('.states'),countryCode,code);
    });

    
})

