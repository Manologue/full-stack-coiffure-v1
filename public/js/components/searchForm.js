const homeForm = document.querySelector('.home-form')
const modal = document.querySelector('#modal-danger')
const modalTextContainer = document.querySelector('#modal-danger .content')

if (homeForm) {
  const closeBtn = modal.querySelector('.close')
  const locationInput = homeForm.querySelector('#location-input')
  const servicesInput = homeForm.querySelector('#services-input')
  const dateInput = homeForm.querySelector('#search-day')
  homeForm.addEventListener('submit', (e) => {
    e.preventDefault()
    sessionStorage.setItem('location', locationInput.value)
    sessionStorage.setItem('services', servicesInput.value)
    sessionStorage.setItem('date', dateInput.value)
    if (locationInput.value === '') {
      modal.style.display = 'block'
      modalTextContainer.innerHTML = `<p>
      s'il vous plait veillez entrez votre emplacement
      pour que nous puissions vous mettre en contact avec les meilleur coiffeur de votre region
      </p>`
    } else {
      homeForm.submit()
    }
  })

  closeBtn.addEventListener('click', (e) => {
    modal.style.display = 'none'
  })

  // set inputs after loading page
  locationInput.value = sessionStorage.getItem('location')
  servicesInput.value = sessionStorage.getItem('services')
  dateInput.value = sessionStorage.getItem('date')

  let calendar = flatpickr('#search-day', {
    altInput: true,
    altFormat: 'F j, Y',
    dateFormat: 'Y-m-d',
    minDate: 'today',
    value: dateInput.value,
    locale: 'de', // locale for this instance only
  })

  const inputs = homeForm.querySelectorAll('.field input')
  inputs.forEach((input) => {
    // if input value is not empty show close btn
    if (input.value !== '') {
      input.parentElement.querySelector('i:nth-child(2)').style.display = 'block'
    }
    console.log(input.parentElement.querySelector('i:nth-child(2)'))
    // on click of close btn
    input.parentElement.querySelector('i:nth-child(2)').addEventListener('click', () => {
      input.parentElement.querySelector('i:nth-child(2)').style.display = 'none'

      if (input.dataset.id === 'date') {
        calendar.clear()
      } else {
        input.value = ''
      }
      sessionStorage.removeItem(input.dataset.id)
    })
  })
}
