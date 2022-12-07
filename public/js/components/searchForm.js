const homeForm = document.querySelector('.home-form')
const modal = document.querySelector('#modal-danger')
const modalTextContainer = document.querySelector('#modal-danger .content')
var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']

if (homeForm) {
  // document.getElementById('#search-day').setAttribute('min', new Date())

  const closeBtn = modal.querySelector('.close')
  const locationInput = homeForm.querySelector('#location-input')
  const servicesInput = homeForm.querySelector('#services-input')
  const dateInput = homeForm.querySelector('#search-day')

  // some date input configurations
  // // Use Javascript
  var today = new Date()
  var dd = today.getDate()
  var mm = today.getMonth() + 1 //January is 0 so need to add 1 to make it 1!
  var yyyy = today.getFullYear()
  if (dd < 10) {
    dd = '0' + dd
  }
  if (mm < 10) {
    mm = '0' + mm
  }

  today = yyyy + '-' + mm + '-' + dd

  dateInput.setAttribute('min', today)

  //****************en of date input config */

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
        // calendar.clear()
        input.value = null
      } else {
        input.value = ''
      }
      sessionStorage.removeItem(input.dataset.id)
    })
  })
}
